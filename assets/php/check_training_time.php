<?php
 include 'config.php';


$coach_id = $_POST['coach_id'];
$type_training = $_POST['type_training'];
$training_date = $_POST['training_date'];
$training_time = $_POST['training_time']; 
$end_time = date("H:i:s", strtotime($training_time) + 3600); 

$trainingDateTime = strtotime($training_date . " " . $training_time);
$isPast = $trainingDateTime < strtotime(date('Y-m-d H:i:s')); 
if($isPast){
    echo json_encode(["status" => "error", "message" => "Неккоректное время тренировки."]);
    exit();
}
$stmt = $conn->prepare("
    SELECT id FROM training
    WHERE coach_id = ? 
    AND training_date = ?
    AND (
        (training_time <= ? AND TIME(training_time + INTERVAL 1 HOUR) > ?) -- Существующая тренировка продолжается во время новой
        OR (training_time >= ? AND training_time < ?) -- Новая тренировка начнется в течение часа после существующей
    )
");
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Ошибка подготовки запроса: " . $conn->error]);
    exit();
}
$stmt->bind_param("ssssss", $coach_id, $training_date, $training_time, $training_time, $training_time, $end_time);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Тренер занят в выбранное время"]);
} else {
    echo json_encode(["status" => "success"]);
}
} else {
    echo json_encode(["status" => "error", "message" => "Ошибка выполнения запроса: " . $stmt->error]);
}
?>