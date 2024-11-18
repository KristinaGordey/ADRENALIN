<?php
include 'config.php';

$id = intval($_GET['id']);
$sql = "SELECT name, description FROM type_training WHERE id = $id";
$result = $conn->query($sql);

$training = $result->fetch_assoc();
echo json_encode($training);

$conn->close();
?>
