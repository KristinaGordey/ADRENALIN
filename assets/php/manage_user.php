<?php
include 'config.php';
function unblockUser($conn, $userId) {
    $stmt = $conn->prepare("UPDATE user SET is_blocked = FALSE WHERE id = ?");
    if (!$stmt) {
        return ["status" => "error", "message" => "Ошибка подготовки запроса"];
    }
    $stmt->bind_param("i", $userId);
    if (!$stmt->execute()) {
        return ["status" => "error", "message" => "Ошибка выполнения запроса"];
    }
    $stmt->close();
    return ["status" => "success", "message" => "Пользователь разблокирован"];
}

function blockUser($conn, $userId) {
     
    $stmt = $conn->prepare("UPDATE user SET is_blocked = TRUE WHERE id = ?");
    if (!$stmt) {
        return ["status" => "error", "message" => "Ошибка подготовки запроса"];
    }
    $stmt->bind_param("i", $userId);
    if (!$stmt->execute()) {
        return ["status" => "error", "message" => "Ошибка выполнения запроса"];
    }
    $stmt->close();
    $stmtDelete = $conn->prepare("
        DELETE FROM record 
        WHERE user_id = ? 
        AND training_id IN (
            SELECT id FROM training WHERE training_date > CURDATE()
        )
    ");
    if (!$stmtDelete) {
        return ["status" => "error", "message" => "Ошибка подготовки удаления записей"];
    }
    $stmtDelete->bind_param("i", $userId);
    if (!$stmtDelete->execute()) {
        return ["status" => "error", "message" => "Ошибка удаления записей на тренировки"];
    }
    $stmtDelete->close();
    return ["status" => "success", "message" => "Пользователь заблокирован, будущие тренировки удалены"];
}



$userId = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
$action = isset($_POST['action']) ? $_POST['action'] : "";

if ($userId <= 0 || !in_array($action, ["block", "unblock"])) {
    echo json_encode(["status" => "error", "message" => "Некорректные данные"]);
    exit;
}

 
$response = ($action === "block") ? blockUser($conn, $userId) : unblockUser($conn, $userId);

echo json_encode($response);
$conn->close();
?>
