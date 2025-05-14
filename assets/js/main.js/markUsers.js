function updateAttendance(userId) {
    if (checkAdminAccess()) {
        const selectedRow = document.querySelector("#selectedTrainingList tr");
        const trainingId = selectedRow.dataset.trainingId;
        const trainingStatus = selectedRow.dataset.trainingStatus;
        const row = document.querySelector(`tr[data-user-id='${userId}']`);
        const currentStatus = row.dataset.attendStatus;
        const newStatus = currentStatus === "1" ? "0" : "1";
        console.log(userId);
        console.log(trainingId);
        if (trainingStatus !== "прошла") {
            alert(
                "Вы не можете отмечать пользователей до окончания тренировки!"
            );
            return;
        }
        fetch("assets/php/update_attendance.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({
                user_id: userId,
                training_id: trainingId,
                attend_status: newStatus,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                if (data.status === "success") {
                    row.dataset.attendStatus = newStatus;
                    row.querySelector("#attend-status-text").textContent =
                        newStatus === "1" ? "был" : "не был";

                    const button = row.querySelector(".mark-attendance");

                    // **Создаем новую кнопку**
                    const newButton = document.createElement("button");
                    newButton.className = `btn ${
                        newStatus === "1"
                            ? "btn-success"
                            : "btn-outline-secondary"
                    } mark-attendance`;
                    newButton.dataset.userId = userId;
                    newButton.onclick = () => updateAttendance(userId);
                    const icon = document.createElement("i");
                    icon.className = `fa-square-check ${
                        newStatus === "1" ? "fa-solid" : "fa-regular"
                    }`;
                    newButton.appendChild(icon);

                    // **Заменяем старую кнопку**
                    button.replaceWith(newButton);
                }
            })
            .catch((error) => console.error("Ошибка запроса:", error));
    } else {
        alert("У вас недостаточно прав для данной операции");
    }
}

function updateTrainings(trainerId, trainingTypeId) {
    fetch("assets/php/get_training_attendance.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
            trainer_id: trainerId,
            training_type: trainingTypeId,
        }),
    })
        .then((response) => response.text())
        .then((html) => {
            document.getElementById("trainingSchedule").innerHTML = html;
        });
}
function loadUsers(trainingId) {
    console.log(trainingId);
    fetch("assets/php/get_training_users.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ training_id: trainingId }),
    })
        .then((response) => response.text())
        .then((html) => {
            document.getElementById("usersList").innerHTML = html;
            console.log(html);
            document
                .getElementById("usersContainer")
                .classList.remove("d-none");
        });
}

// Выбор тренера
document
    .getElementById("trainersDropdown")
    .addEventListener("click", function (event) {
        if (event.target.classList.contains("trainer")) {
            const trainerId = event.target.dataset.id;
            document.getElementById("trainers").textContent =
                event.target.textContent;
            updateTrainings(
                trainerId,
                document.getElementById("trainingType").dataset.typeId || 0
            );
        }
    });

// Выбор типа тренировки
document
    .getElementById("trainingTypeDropdown")
    .addEventListener("click", function (event) {
        if (event.target.classList.contains("training-type")) {
            const trainingTypeId = event.target.dataset.id;
            document.getElementById("trainingType").textContent =
                event.target.textContent;
            updateTrainings(
                document.getElementById("trainers").dataset.trainerId || 0,
                trainingTypeId
            );
        }
    });

document
    .getElementById("trainingSchedule")
    .addEventListener("click", function (event) {
        if (event.target.closest("tr")) {
            const row = event.target.closest("tr").cloneNode(true);
            const trainingId = row.getAttribute("data-training-id");

            document.getElementById("selectedTrainingList").innerHTML = "";
            document.getElementById("selectedTrainingList").appendChild(row);
            console.log(trainingId);
            loadUsers(trainingId);
        }
    });

document.addEventListener("DOMContentLoaded", function () {
    if (!checkAdminAccess()) {
        window.location.href = "index.html";
    }
    updateTrainings(0, 0);
});
