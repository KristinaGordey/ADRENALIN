<?php
include 'config.php';
$response = array("success" => false);

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {// убрать эту строчку 
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = strtolower(mysqli_real_escape_string($conn, $_POST['username']));
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $stmt = $conn->prepare("SELECT id, username, password FROM user WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashed_password = $row['password'];

                if (password_verify($password, $hashed_password)) {
                    $response["success"] = true;
                    $response["id"] = $row['id']; 
                    $response["username"] = $row['username'];
                }
            }

            $stmt->close();
        }
    }
} catch (Exception $e) {
    error_log("Ошибка: " . $e->getMessage());
}

header('Content-Type: application/json');
echo json_encode($response);
$conn->close();
?>
