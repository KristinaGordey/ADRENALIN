<?php
 
include 'config.php';

 
$trainingId = isset($_POST['training_id']) ? (int)$_POST['training_id'] : 0;
$userId = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;

 
if ($trainingId > 0 && $userId > 0) {
     
    $sql = "INSERT INTO record (training_id, user_id) VALUES (?, ?)";
    
     
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ii", $trainingId, $userId);
        if ($stmt->execute()) {
             
            echo json_encode(["status" => "success", "message" => "Вы успешно записаны на тренировку!"]);
        } else {
             
            echo json_encode(["status" => "error", "message" => "Ошибка при записи на тренировку. Попробуйте еще раз."]);
        }
        $stmt->close();
    } else {
         
        echo json_encode(["status" => "error", "message" => "Ошибка подготовки запроса. Попробуйте еще раз."]);
    }
} else {
     
    echo json_encode(["status" => "error", "message" => "Некорректные данные. Пожалуйста, проверьте и попробуйте еще раз."]);
}

 
$conn->close();
?>
