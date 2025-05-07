<?php
include 'config.php';

$trainerId = isset($_POST['trainer_id']) ? (int)$_POST['trainer_id'] : 0;
$trainingTypeId = isset($_POST['training_type']) ? (int)$_POST['training_type'] : 0;

$query = "SELECT t.id, t.type_training, tt.name AS training_name, t.training_date, t.training_time, c.full_name AS coach,
       CASE 
           WHEN NOW() BETWEEN t.training_time AND ADDTIME(t.training_time, '01:00:00') THEN 'идет'
           WHEN t.training_time > NOW() THEN 'не прошла'
           ELSE 'прошла'
       END AS status
FROM training t
JOIN trainers c ON t.coach_id = c.id
JOIN type_training tt ON t.type_training = tt.id
WHERE t.training_date = CURDATE()";

if ($trainerId > 0 && $trainingTypeId == 0) {
    
    $query .= " AND t.coach_id = $trainerId";
} else if ($trainerId == 0 && $trainingTypeId > 0) {
    
    $query .= " AND t.type_training = $trainingTypeId";
} else if ($trainerId > 0 && $trainingTypeId > 0) {
    
    $query .= " AND t.coach_id = $trainerId AND t.type_training = $trainingTypeId";
}

$query .= " ORDER BY status = 'идет' DESC, status = 'не прошла' DESC, t.training_time ASC";

$result = $conn->query($query);
$trainings = '';
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $date = date("d.m.Y", strtotime($row["training_date"]));
    $time = date("H:i", strtotime($row["training_time"]));
    $status = $row["status"];
    $rowClass = ($status === "идет") ? "table-secondary" : (($status === "не прошла") ? "table-light" : "table-success");

    $trainings .= "<tr class='{$rowClass}' data-training-status = '{$status}' data-training-id='{$row['id']}'>";
    $trainings .= "<td>{$row['training_name']}</td>";
    $trainings .= "<td>{$date}</td>";
    $trainings .= "<td>{$time}</td>";
    $trainings .= "<td>{$row['coach']}</td>";
    $trainings .= "<td>{$status}</td>";
    $trainings .= "</tr>";
}
}else {
    $trainings .= "<tr><td colspan='5'>Нет запланированных тренировок</td></tr>";
}

echo $trainings;
$conn->close();
?>



