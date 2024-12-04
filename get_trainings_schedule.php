<?php
// Подключение к базе данных
include 'config.php';

// Получение выбранной даты из AJAX запроса
$selectedDate = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');

// SQL-запрос для получения данных из таблицы training по выбранной дате
$sql = "SELECT t.type_training, t.training_date, t.training_time, c.full_name, tt.name 
        FROM training t 
        JOIN trainers c ON t.coach_id = c.id 
        JOIN type_training tt ON t.type_training = tt.id
        WHERE t.training_date = '$selectedDate'";

$trainings = '';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Вывод данных каждой строки
    while ($row = $result->fetch_assoc()) {
        // Приведение даты к формату день.месяц.год
        $date = date("d.m.Y", strtotime($row["training_date"]));
        // Приведение времени к формату часы:минуты
        $time = date("H:i", strtotime($row["training_time"]));
        $trainings .= "<tr>";
        $trainings .= "<td><a href='category.html?id={$row['type_training']}' class='training-content-title'>{$row['name']}</a></td>";
        $trainings .= "<td>{$date}</td>";
        $trainings .= "<td>{$time}</td>";
        $trainings .= "<td>{$row['full_name']}</td>";
        $trainings .= "<td><button class='btn btn-secondary'><i class='fa-regular fa-square-plus'></i></button></td>";
        $trainings .= "</tr>";
    }
} else {
    $trainings .= "<tr><td colspan='5'>Нет запланированных тренировок</td></tr>";
}

echo $trainings;
$conn->close();
?>
