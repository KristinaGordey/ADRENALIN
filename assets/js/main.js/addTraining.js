document.addEventListener("DOMContentLoaded", function () {
    if (!checkAdminAccess()) {
        window.location.href = "index.html";
    }
    function populateSelect(data, selectId) {
        const select = document.getElementById(selectId);
        data.forEach((item) => {
            const option = document.createElement("option");
            option.value = item.id;
            option.textContent = item.name || item.full_name;
            select.appendChild(option);
        });
    }
    function updateTimeLimits(dateString) {
        const selectedDate = new Date(dateString);
        const dayOfWeek = selectedDate.getDay(); // 0 = воскресенье, 6 = суббота

        const hours =
            dayOfWeek === 0 || dayOfWeek === 6 ? weekendHours : weekdayHours;
        timeInput.setAttribute("min", hours.min);
        timeInput.setAttribute("max", hours.max);
        console.log(hours.min, hours.max);
    }

    const trainerSelect = document.getElementById("trainerSelect");
    const trainingTypeSelect = document.getElementById("trainingTypeSelect");
    const dateInput = document.getElementById("trainingDate");
    const timeInput = document.getElementById("trainingTime");
    const modal = document.getElementById("addTrainingModal");
    const errorMes = document.getElementById("error-message");
    const saveBtn = document.getElementById("saveBtn");
    const form = document.getElementById("addTrainingForm");

    const weekdayHours = { min: "07:00", max: "22:00" };
    const weekendHours = { min: "09:00", max: "20:00" };

    fetch("assets/php/get_trainers_and_training.php")
        .then((response) => response.json())
        .then((data) => {
            populateSelect(data.trainings, "trainingTypeSelect");
            populateSelect(data.trainers, "trainerSelect");
        })
        .catch((error) => console.error("Ошибка загрузки данных:", error));

    modal.addEventListener("shown.bs.modal", function () {
        const today = new Date().toISOString().split("T")[0];
        dateInput.value = today;
        updateTimeLimits(today);
    });

    modal.addEventListener("hidden.bs.modal", function () {
        this.querySelector("form").reset();
    });

    dateInput.addEventListener("change", function () {
        updateTimeLimits(this.value);
    });

    saveBtn.addEventListener("click", function (event) {
        if (checkAdminAccess()) {
            if (!form.checkValidity()) {
                form.reportValidity();
                event.preventDefault();
            } else {
                event.preventDefault();
                fetch("assets/php/check_training_time.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: new URLSearchParams({
                        coach_id: trainerSelect.value,
                        training_date: dateInput.value,
                        training_time: timeInput.value,
                        type_training: trainingTypeSelect.value,
                    }),
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.status === "error") {
                            errorMes.style.display = "block";
                            errorMes.textContent = data.message;
                        } else {
                            errorMes.textContent = "";
                            saveTraining(
                                trainerSelect.value,
                                dateInput.value,
                                timeInput.value,
                                trainingTypeSelect.value
                            ); // Если тренер свободен, вызываем функцию добавления
                        }
                    })
                    .catch((error) => console.error("Ошибка запроса:", error));
            }
        } else {
            alert("У вас недостаточно прав для выполнения этой операции!");
        }
    });
    function saveTraining(coachId, trainingDate, trainingTime, typeTraining) {
        fetch("assets/php/add_training.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({
                coach_id: coachId,
                training_date: trainingDate,
                training_time: trainingTime,
                type_training: typeTraining,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "success") {
                    const modalElement =
                        document.getElementById("addTrainingModal");
                    const modalInstance =
                        bootstrap.Modal.getInstance(modalElement);
                    modalInstance.hide();
                    alert(data.message);
                    location.reload();
                }
            })
            .catch((error) => console.error("Ошибка добавления:", error));
    }
});
