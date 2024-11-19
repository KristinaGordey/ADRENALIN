<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Проверка, существует ли пользователь с таким email
    $sql = "SELECT email FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "Пользователь с таким email уже существует."]);
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
        // Перенаправление на index.html 
        header("Location: index.html"); 
        exit();
         } else {
        echo json_encode(["success" => false, "message" => "Ошибка регистрации. Попробуйте еще раз."]);
    }

    $stmt->close();
}

$conn->close();
?>
