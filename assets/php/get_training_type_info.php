<?php
include 'config.php';

$id = intval($_GET['id']);  
$sql = "SELECT name, description, small_description, photo_path, video_path, physical_level,mini_descriptions FROM type_training WHERE id = $id";
$result = $conn->query($sql);

$training = $result->fetch_assoc(); 
echo json_encode($training);  

$conn->close();
?>
