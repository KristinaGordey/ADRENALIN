<?php

include 'config.php';


$recordId = isset($_POST['record_id']) ? (int)$_POST['record_id'] : 0;

if ($recordId > 0) {
    
    $sql = "DELETE FROM record WHERE id = ?";
    
   
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $recordId);
        if ($stmt->execute()) {
            
            echo json_encode(["status" => "success", "message" => "Запись успешно удалена!"]);
        } else {
             
            echo json_encode(["status" => "error", "message" => "Ошибка при удалении записи. Попробуйте еще раз."]);
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
