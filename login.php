<?php
include 'config.php';
$response = array("success" => false);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $response["success"] = true;
        } else {
            $response["success"] = false;
        }

        $stmt->close();
    } else {
        $response["success"] = false;
    }
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>
