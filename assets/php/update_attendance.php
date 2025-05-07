<?php
include 'config.php';

if (!isset($_POST['user_id']) || !isset($_POST['training_id']) || !isset($_POST['attend_status'])) {
    echo json_encode(["status" => "error", "message" => "Некорректные данные"]);
    exit;
}

$userId = (int)$_POST['user_id'];
$trainingId = (int)$_POST['training_id'];
$attendStatus = (int)$_POST['attend_status'];  

 
$query = "UPDATE record SET attend_status = ? WHERE user_id = ? AND training_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $attendStatus, $userId, $trainingId);
$success = $stmt->execute();
$stmt->close();

echo json_encode(["status" => $success ? "success" : "error", "new_status" => $attendStatus]);

$conn->close();
?>
