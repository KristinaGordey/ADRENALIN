<?php
 include 'config.php'; 

 
 $coach_id = $_POST['coach_id'];
 $type_training = $_POST['type_training'];
 $training_date = $_POST['training_date'];
 $training_time = $_POST['training_time'];
 
 
 $stmt = $conn->prepare("
     INSERT INTO training (type_training, training_date, training_time, coach_id)
     VALUES (?, ?, ?, ?)
 ");
 
 if (!$stmt) {
     echo json_encode(["status" => "error", "message" => "Ошибка подготовки запроса: " . $conn->error]);
     exit();
 }
 
 $stmt->bind_param("ssss", $type_training, $training_date, $training_time, $coach_id);
 
 if ($stmt->execute()) {
     echo json_encode(["status" => "success", "message" => "Тренировка успешно добавлена"]);
 } else {
     echo json_encode(["status" => "error", "message" => "Ошибка добавления: " . $stmt->error]);
 }
 
 $stmt->close();
 $conn->close();
?>