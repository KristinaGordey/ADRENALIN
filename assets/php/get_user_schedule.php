<?php
 
include 'config.php';

 
$userId = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
$currentDate = date('Y-m-d');

 
$sql = "SELECT r.id, t.type_training, t.training_date, t.training_time, tr.full_name, tt.name
        FROM record r
        JOIN training t ON r.training_id = t.id 
        JOIN type_training tt ON t.type_training = tt.id
        JOIN trainers tr ON t.coach_id = tr.id
        WHERE r.user_id = $userId AND t.training_date >= '$currentDate'";

$trainings = '';
$result = $conn->query($sql);
if ($result->num_rows > 0 && $userId > 0) {
     
    while ($row = $result->fetch_assoc()) {
        
        $date = date("d.m.Y", strtotime($row["training_date"]));
        
        $time = date("H:i", strtotime($row["training_time"]));

        $trainingDateTime = strtotime($row["training_date"] . " " . $row["training_time"]);
        $isPast = $trainingDateTime < strtotime(date('Y-m-d H:i:s')); 
        $buttonStatus = $isPast ? 'disabled' : '';

        $trainings .= "<tr>";
        $trainings .= "<td><a href='category.html?id={$row['type_training']}' class='training-content-title'>{$row['name']}</a></td>";
        $trainings .= "<td>{$date}</td>";
        $trainings .= "<td>{$time}</td>";
        $trainings .= "<td>{$row['full_name']}</td>";
        $trainings .= "<td><button class='btn btn-secondary' onclick='deleteRecord({$row['id']})' {$buttonStatus}><i class='fa-regular fa-circle-xmark'></i></button></td>";
        $trainings .= "</tr>";
    }
} else if ($userId === 0) {
    $trainings .= "<tr><td colspan='5'> Необходимо авторизоваться чтобы просмотреть список записей</td></tr>";
}else{
    $trainings .= "<tr><td colspan='5'> Записей нет</td></tr>";
}

echo $trainings;
$conn->close();
?>
