<?php

include 'config.php';


$selectedDate = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');
$trainerId = isset($_POST['trainer_id']) ? (int)$_POST['trainer_id'] : 0;
$trainingTypeId = isset($_POST['training_type']) ? (int)$_POST['training_type'] : 0;
$isAdmin = isset($_POST['isAdmin']) ? $_POST['isAdmin'] === "true" : false;


$query = "SELECT t.id, t.type_training, t.training_date, t.training_time, c.full_name, tt.name,
       CASE 
           WHEN NOW() BETWEEN TIMESTAMP(t.training_date, t.training_time) AND TIMESTAMP(t.training_date, ADDTIME(t.training_time, '01:00:00')) THEN 'идет'
           WHEN TIMESTAMP(t.training_date, t.training_time) > NOW() THEN 'не прошла'
           ELSE 'прошла'
       END AS status
FROM training t
JOIN trainers c ON t.coach_id = c.id
JOIN type_training tt ON t.type_training = tt.id
WHERE t.training_date = '$selectedDate'";


if ($trainerId == 0 && $trainingTypeId == 0) {
    $sql = $query;
} elseif ($trainingTypeId == 0) {
    $sql = $query . " AND t.coach_id = $trainerId";
} elseif ($trainerId == 0) {
    $sql = $query . " AND t.type_training = $trainingTypeId";
} else {
    $sql = $query . " AND t.coach_id = $trainerId AND t.type_training = $trainingTypeId";
}


$sql .= " ORDER BY t.training_time ASC";

$trainings = '';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
        $date = date("d.m.Y", strtotime($row["training_date"]));
        $time = date("H:i", strtotime($row["training_time"]));
        $buttonStatus = ($row["status"] !== "не прошла") ? "disabled" : ""; 
        $status = $row["status"];
        $rowClass = ($status === "идет") ? "table-secondary" : (($status === "не прошла") ? "table-light" : "table-success");

        if ($isAdmin) {
           
            $trainings .= "<tr class='$rowClass'>";
            $trainings .= "<td><a href='category.html?id={$row['type_training']}' class='training-content-title'>{$row['name']}</a></td>";
            $trainings .= "<td>{$date}</td>";
            $trainings .= "<td>{$time}</td>";
            $trainings .= "<td>{$row['full_name']}</td>";
            $trainings .= "<td>{$row['status']}</td>"; 
            $trainings .= "<td><button class='btn btn-outline-danger' onclick='deleteTraining({$row['id']})' {$buttonStatus}><i class='fa-solid fa-trash'></i></button></td>";
            $trainings .= "</tr>";
        } else {
            
            $trainings .= "<tr class='$rowClass'>";
            $trainings .= "<td><a href='category.html?id={$row['type_training']}' class='training-content-title'>{$row['name']}</a></td>";
            $trainings .= "<td>{$date}</td>";
            $trainings .= "<td>{$time}</td>";
            $trainings .= "<td>{$row['full_name']}</td>";
            $trainings .= "<td>{$row['status']}</td>";
            $trainings .= "<td><button class='btn btn-secondary' onclick='checkAuthentication({$row['id']}, \"{$row['name']}\", \"{$row['full_name']}\", \"{$date}\", \"{$time}\")' {$buttonStatus}><i class='fa-regular fa-square-plus'></i></button></td>";
            $trainings .= "</tr>";
        }
    }
} else {
    $trainings .= "<tr><td colspan='6'>Нет запланированных тренировок</td></tr>"; 
}

echo $trainings;
$conn->close();
?>
