<?php
include 'config.php';
$response = array("success" => false);

try {
   
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = strtolower(mysqli_real_escape_string($conn, $_POST['username']));
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $isAdmin = isset($_POST['isAdminButton']) && $_POST['isAdminButton'] === "admin";

             
            $tableName = $isAdmin ? "admin" : "user";
    
             
            if($isAdmin){
                $query = "SELECT id, username, password FROM $tableName WHERE username = ?";
            }else{
                $query = "SELECT id, username, password, is_blocked FROM $tableName WHERE username = ?";
            }
            
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashed_password = $row['password'];
    
                if (password_verify($password, $hashed_password)) {
                    if(!$isAdmin && $row["is_blocked"]){
                        $response["block"] = true;
                        $response["message"] = "Данный пользователь заблокирован";
                    }else{
                        $response["success"] = true;
                        $response["id"] = $row['id'];
                        $response["username"] = $row['username'];
                        $response["isAdmin"] = $isAdmin;
                    }   
                }
            }

            $stmt->close();
        }
    
} catch (Exception $e) {
    error_log("Ошибка: " . $e->getMessage());
}

header('Content-Type: application/json');
echo json_encode($response);
$conn->close();
?>
