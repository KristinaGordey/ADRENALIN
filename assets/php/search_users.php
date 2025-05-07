<?php
include 'config.php';

header('Content-Type: application/json');  

 
$name = isset($_POST['name']) ? trim($_POST['name']) : "";
$email = isset($_POST['email']) ? trim($_POST['email']) : "";
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";

 
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Ошибка подключения к базе данных"]);
    exit;
}

 
$query = "SELECT id, username, email, tel, is_blocked FROM user WHERE 1=1";
$params = [];
$types = "";

if (!empty($name)) {
    $query .= " AND username LIKE ?";
    $params[] = "%$name%";
    $types .= "s";
}
if (!empty($email)) {
    $query .= " AND email LIKE ?";
    $params[] = "%$email%";
    $types .= "s";
}
if (!empty($phone)) {
    $query .= " AND tel LIKE ?";
    $params[] = "%$phone%";
    $types .= "s";
}

$query .= " ORDER BY username ASC";

 
$stmt = $conn->prepare($query);
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Ошибка подготовки запроса"]);
    exit;
}

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

 
if (!$stmt->execute()) {
    echo json_encode(["status" => "error", "message" => "Ошибка выполнения запроса"]);
    exit;
}

$result = $stmt->get_result();

$activeUsers = "";
$blockedUsers = "";

 
while ($row = $result->fetch_assoc()) {
    $userId = $row["id"];
    $name = $row["username"];
    $email = $row["email"];
    $phone = $row["tel"];
    $actionButton = $row["is_blocked"] ? 
    "<button class='btn btn-outline-success' onclick='unblockUser($userId)'><i class='fa-solid fa-unlock'></i> </button>" : 
    "<button class='btn btn-outline-danger' onclick='blockUser($userId)'><i class='fa-solid fa-lock'></i> </button>";

    $rowHtml = "<tr>
        <td>{$name}</td>
        <td>{$email}</td>
        <td>{$phone}</td>
        <td>{$actionButton}</td>
    </tr>";

    if ($row["is_blocked"]) {
        $blockedUsers .= $rowHtml;
    } else {
        $activeUsers .= $rowHtml;
    }
}

 
if (empty($activeUsers)) {
    $activeUsers = "<tr><td colspan='4'>Нет пользователей</td></tr>";
}
if (empty($blockedUsers)) {
    $blockedUsers = "<tr><td colspan='4'>Нет пользователей</td></tr>";
}

 
echo json_encode(["status" => "success", "activeUsers" => $activeUsers, "blockedUsers" => $blockedUsers]);

$stmt->close();
$conn->close();
?>
