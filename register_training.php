<?php
// Подключение к базе данных
include 'config.php';

// Получение данных из POST запроса
$trainingId = isset($_POST['training_id']) ? (int)$_POST['training_id'] : 0;
$userId = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;

// Проверка наличия необходимых данных
if ($trainingId > 0 && $userId > 0) {
    // SQL-запрос для добавления новой записи в таблицу record
    $sql = "INSERT INTO record (training_id, user_id) VALUES (?, ?)";
    
    // Подготовка и выполнение запроса
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ii", $trainingId, $userId);
        if ($stmt->execute()) {
            // Успешное выполнение запроса
            echo json_encode(["status" => "success", "message" => "Вы успешно записаны на тренировку!"]);
        } else {
            // Ошибка выполнения запроса
            echo json_encode(["status" => "error", "message" => "Ошибка при записи на тренировку. Попробуйте еще раз."]);
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
