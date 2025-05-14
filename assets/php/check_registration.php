<?php
include 'config.php';

header('Content-Type: application/json'); 

$userId = (int)$_POST['user_id'];
$trainingId = (int)$_POST['training_id'];

$query = "SELECT COUNT(*) AS count FROM record WHERE user_id = ? AND training_id = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Ошибка подготовки запроса: " . $conn->error]);
    exit();
}
$stmt->bind_param("ii", $userId, $trainingId);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    $conn->close();

    $isRegistered = $row["count"] > 0;
    echo json_encode(["status" => "success", "registered" => $isRegistered]);
} else {
    echo json_encode(["status" => "error", "message" => "Ошибка выполнения запроса: " . $stmt->error]);
}
