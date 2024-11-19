<?php
include 'config.php';

$id = intval($_GET['id']); //извлекаем значение  параметра id из URL cтроки, приводим к целому
$sql = "SELECT name, description, small_description FROM type_training WHERE id = $id";
$result = $conn->query($sql);

$training = $result->fetch_assoc();//извлекаем одну строку в виде ассоциативного массива
echo json_encode($training); //преобразуем в json 

$conn->close();
?>
