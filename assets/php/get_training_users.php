<?php
include 'config.php';  

if (!isset($_POST['training_id'])) {
    echo "<tr><td colspan='5'>Ошибка</td></tr>";
    exit;
}



$trainingId = (int)$_POST['training_id'];

$query = "SELECT u.id, u.username, u.tel, u.email, r.attend_status
          FROM record r
          JOIN user u ON r.user_id = u.id
          WHERE r.training_id = ?";

$stmt = $conn->prepare($query);
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Ошибка подготовки запроса: " . $conn->error]);
    exit();
}
$stmt->bind_param("i", $trainingId);
if ($stmt->execute()) {
    $result = $stmt->get_result();
$users = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $checked = $row["attend_status"] ? 'fa-solid' : 'fa-regular';
        $buttonClass = $row["attend_status"] ? "btn-success" : "btn-outline-secondary";
        $statusText = $row["attend_status"] ? "был" : "не был"; 
        $attendStatus = $row["attend_status"] ? "1" : "0";

        $users .= "<tr data-user-id='{$row['id']}' data-attend-status='{$attendStatus}'>";
        $users .= "<td>{$row['username']}</td>";
        $users .= "<td>{$row['tel']}</td>";
        $users .= "<td>{$row['email']}</td>";
        $users .= "<td id='attend-status-text'>{$statusText}</td>"; 
        $users .= "<td><button class='btn {$buttonClass} mark-attendance' data-user-id='{$row['id']}' onclick='updateAttendance(this.dataset.userId)'>";
        $users .= "<i class='fa-square-check {$checked}'></i>";
        $users .= "</button></td>";
        $users .= "</tr>";
    }
} else {
    $users .= "<tr><td colspan='5'>Нет записанных пользователей</td></tr>";  
    
}
} else {
    $users .= "<tr><td colspan='5'>Ошибка сбора данных</td></tr>";  
    
}

echo $users;

$stmt->close();
$conn->close();

?>
