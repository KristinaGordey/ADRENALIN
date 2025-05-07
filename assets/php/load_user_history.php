<?php
include 'config.php';
header('Content-Type: application/json');

$sortOrder = $_POST['sortOrder'] ?? 'asc';
$period = $_POST['period'] ?? 'all';
$periodValue = $_POST['periodValue'] ?? '';

if (!isset($_POST['userId'])) {
    $historyRecords = "<tr><td colspan='6'>Ошибка загрузки</td></tr>";
    echo json_encode(["historyRecords" => $historyRecords]);
    exit;
}

$userId = (int)$_POST['userId'];

 
$whereClause = "WHERE r.user_id = ?";
$params[] = $userId;
$types = "i";

if ($period === "day" && !empty($periodValue)) {
    $whereClause = "WHERE r.user_id = ? AND t.training_date = ?";
    $params[] = $periodValue;
    $types .= "s";
} elseif ($period === "month" && !empty($periodValue)) {
    $date = DateTime::createFromFormat('Y-m', $periodValue);
    $year = $date->format('Y');  
    $month = $date->format('m');  

    $whereClause = "WHERE r.user_id = ? AND YEAR(t.training_date) = ? AND MONTH(t.training_date) = ?";
    $params[] = $year;
    $params[] = $month;
    $types .= "ss";  
} elseif ($period === "year" && !empty($periodValue)) {
    $whereClause = "WHERE r.user_id = ? AND YEAR(t.training_date) = ?";
    $params[] = $periodValue;
    $types .= "s";
}

 
$query = "SELECT r.id, tt.name AS training_type, c.full_name AS coach, t.training_date, t.training_time, 
    CASE 
        WHEN r.attend_status = TRUE THEN 'посещена'
        WHEN t.training_date < CURDATE() AND r.attend_status = FALSE THEN 'пропущена'
        ELSE 'ожидание'
    END AS user_status
FROM record r
JOIN training t ON r.training_id = t.id
JOIN trainers c ON t.coach_id = c.id
JOIN type_training tt ON t.type_training = tt.id
$whereClause
ORDER BY t.training_date $sortOrder, t.training_time $sortOrder";

$stmt = $conn->prepare($query);
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Ошибка подготовки запроса: " . $conn->error]);
    exit();
}
$stmt->bind_param($types, ...$params);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    $historyRecords = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $trainingId = $row['id'];
            $trainingType = $row['training_type'];
            $coach = $row['coach'];
            $trainingDate = date("d.m.Y", strtotime($row['training_date']));
            $trainingTime = date("H:i", strtotime($row['training_time']));
            $userStatus = $row['user_status'];
            $deleteButtonStatus = (strtotime("$trainingDate $trainingTime") > time()) ? '' : 'disabled'; 
        
             
            $rowClass = ($userStatus === 'посещена') ? 'table-success' : (($userStatus === 'пропущена') ? 'table-danger' : 'table-light');
        
            $historyRecords .= "<tr class='$rowClass'>
                <td>{$trainingType}</td>
                <td>{$coach}</td>
                <td>{$trainingDate}</td>
                <td>{$trainingTime}</td>
                <td>{$userStatus}</td>
                <td><button class='btn btn-outline-danger' onclick='deleteRecord($trainingId)' {$deleteButtonStatus}><i class='fa-solid fa-trash'></i></button></td>
            </tr>";
        }
    } else {
        $historyRecords .= "<tr><td colspan='6'>Нет записей на тренировки</td></tr>"; 
    }
    echo json_encode(["historyRecords" => $historyRecords]);
    
} else {
    $historyRecords .= "<tr><td colspan='6'>Ошибка загрузки тренировок</td></tr>"; 
    echo json_encode(["historyRecords" => $historyRecords]);
}
$stmt->close();
$conn->close();
?>
