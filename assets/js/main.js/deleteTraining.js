function deleteTraining(trainingId) {
    if (checkAdminAccess()) {
        if (!confirm("Вы уверены, что хотите удалить эту тренировку?")) return; // Подтверждение удаления

        fetch("assets/php/delete_training.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ id: trainingId }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "success") {
                    alert("Тренировка успешно удалена!");
                    location.reload(); // Обновляем страницу
                } else {
                    alert("Ошибка удаления: " + data.message);
                }
            })
            .catch((error) => console.error("Ошибка запроса:", error));
    } else {
        alert("У вас недостаточно прав для выполнения этой операции!");
    }
}
