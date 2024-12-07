<?php
// Подключение к базе данных
include 'config.php';

// Получение ID записи, которую необходимо удалить
$recordId = isset($_POST['record_id']) ? (int)$_POST['record_id'] : 0;

if ($recordId > 0) {
    // SQL-запрос для удаления записи
    $sql = "DELETE FROM record WHERE id = ?";
    
    // Подготовка и выполнение запроса
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $recordId);
        if ($stmt->execute()) {
            // Успешное выполнение запроса
            echo json_encode(["status" => "success", "message" => "Запись успешно удалена!"]);
        } else {
            // Ошибка выполнения запроса
            echo json_encode(["status" => "error", "message" => "Ошибка при удалении записи. Попробуйте еще раз."]);
        }
        $stmt->close();
    } else {
        // Ошибка подготовки запроса
        echo json_encode(["status" => "error", "message" => "Ошибка подготовки запроса. Попробуйте еще раз."]);
    }
} else {
    // Некорректные данные
    echo json_encode(["status" => "error", "message" => "Некорректные данные. Пожалуйста, проверьте и попробуйте еще раз."]);
}

// Закрытие подключения к базе данных
$conn->close();
?>
