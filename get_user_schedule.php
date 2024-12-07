<?php
// Подключение к базе данных
include 'config.php';

// Получение выбранной даты и id тренера из AJAX запроса
$userId = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
$currentDate = date('Y-m-d');

// SQL-запрос для получения данных из таблицы training по выбранной дате и id тренера
$sql = "SELECT r.id, t.type_training, t.training_date, t.training_time, tr.full_name, tt.name
        FROM record r
        JOIN training t ON r.training_id = t.id 
        JOIN type_training tt ON t.type_training = tt.id
        JOIN trainers tr ON t.coach_id = tr.id
        WHERE r.user_id = $userId AND t.training_date >= '$currentDate'";

$trainings = '';
$result = $conn->query($sql);
if ($result->num_rows > 0 && $userId > 0) {
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
        $trainings .= "<td><button class='btn btn-secondary' onclick='deleteRecord({$row['id']})'><i class='fa-regular fa-circle-xmark'></i></button></td>";
        $trainings .= "</tr>";
    }
} else if ($userId === 0) {
    $trainings .= "<tr><td colspan='5'> Необходимо авторизоваться чтобы просмотреть список записей</td></tr>";
}else{
    $trainings .= "<tr><td colspan='5'> Записей нет</td></tr>";
}

echo $trainings;
$conn->close();
?>
