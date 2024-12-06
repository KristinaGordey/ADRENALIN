<?php
include 'config.php';

$name = strtolower($_POST['name']);
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// Проверка, существует ли пользователь с таким email
$sql = "SELECT username FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $name);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Пользователь с таким логином уже существует."]);
    $stmt->close();
    $conn->close();
    exit();
}

$stmt->close();

// Хеширование пароля
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Сохранение нового пользователя в базу данных
$sql = "INSERT INTO user (username, password, tel, email) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $hashed_password, $phone, $email);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Регистрация успешна!"]);
} else {
    echo json_encode(["success" => false, "message" => "Ошибка регистрации. Попробуйте еще раз."]);
}

$stmt->close();
$conn->close();
?>
