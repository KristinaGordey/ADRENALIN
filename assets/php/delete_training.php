<?php
include 'config.php';  

$trainingId = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM training WHERE id = ?");
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Ошибка подготовки запроса: " . $conn->error]);
    exit();
}
$stmt->bind_param("s", $trainingId);

if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Ошибка удаления записи"]);
}

$stmt->close();
$conn->close();
?>
