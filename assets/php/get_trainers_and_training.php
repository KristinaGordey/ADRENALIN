<?php 
include "config.php";
 
$stmt = $conn->query("SELECT id, full_name FROM trainers");
$trainers = $stmt->fetch_all(MYSQLI_ASSOC);

 
$stmt = $conn->query("SELECT id, name FROM type_training");
$trainings = $stmt->fetch_all(MYSQLI_ASSOC);;

 
echo json_encode(["trainers" => $trainers, "trainings" => $trainings]);
?>