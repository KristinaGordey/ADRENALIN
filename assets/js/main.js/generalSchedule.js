$(document).ready(function () {
    // Инициализация календаря
    var urlParams = new URLSearchParams(window.location.search); //извлекаем параметры URL текущего
    var urlTrainingId = urlParams.get("trainingId");
    var urlTrainerId = urlParams.get("trainerId"); // извлекаем id из URL
    $("#calendar").fullCalendar({
        header: {
            left: "title",
            center: "prev,next today",
            right: "",
        },
        locale: "ru",
        defaultView: "month",
        editable: false,
        selectable: true,
        select: function (start, end, jsEvent, view) {
            var date = moment(start).format("YYYY-MM-DD");
            $("#calendar").data("selected-date", date); // Сохранение выбранной даты
            var trainerId = $("#trainers").data("selected-trainer-id") || 0;
            var typeId = $("#trainingType").data("selected-training-id") || 0;
            loadTrainings(date, trainerId, typeId);
        },
        eventLimit: true,
        validRange: { start: moment().format("YYYY-MM-DD") },
    });
    $(document).on("click", ".dropdown-item.trainer", function () {
        //отслеживаем клики по элементам дропдауна
        var trainerId = $(this).data("id");
        $("#trainers").data("selected-trainer-id", trainerId); // Сохранение выбранного тренера
        var selectedDate =
            $("#calendar").data("selected-date") ||
            moment().format("YYYY-MM-DD"); // Получаем выбранную дату или сегодняшнюю дату
        var selectedTypeId =
            $("#trainingType").data("selected-training-id") || 0;
        var trainerName = $(this).text();
        $("#trainers").text(trainerName);
        loadTrainings(selectedDate, trainerId, selectedTypeId);
    });
    $(document).on("click", ".dropdown-item.training-type", function () {
        //отслеживаем клики по элементам дропдауна
        var typeId = $(this).data("id");
        $("#trainingType").data("selected-training-id", typeId); // Сохранение выбранного тренера
        var selectedDate =
            $("#calendar").data("selected-date") ||
            moment().format("YYYY-MM-DD"); // Получаем выбранную дату или сегодняшнюю дату
        var selectedTrainerId = $("#trainers").data("selected-trainer-id") || 0;
        var trainingName = $(this).text();
        $("#trainingType").text(trainingName);
        loadTrainings(selectedDate, selectedTrainerId, typeId);
    });
    if (urlTrainerId === null && urlTrainingId === null) {
        loadTrainings(moment().format("YYYY-MM-DD"), 0, 0);
    } else {
        loadTrainings(
            moment().format("YYYY-MM-DD"),
            urlTrainerId,
            urlTrainingId
        );
        var typeId = urlTrainingId !== null ? urlTrainingId : 0;
        $("#trainingType").data("selected-training-id", typeId);
        var trainerId = urlTrainerId !== null ? urlTrainerId : 0;
        $("#trainers").data("selected-trainer-id", trainerId);
    }

    function loadTrainings(date, trainerId, trainingTypeId) {
        $.ajax({
            url: "assets/php/get_trainings_schedule.php",
            type: "POST",
            data: {
                date: date,
                trainer_id: trainerId,
                training_type: trainingTypeId,
                isAdmin: checkAdminAccess() ? "true" : "false",
            }, // Передаем дату и id тренера
            success: function (response) {
                $("#trainingSchedule").html(response);
            },
            error: function (xhr, status, error) {
                console.error("Ошибка при загрузке тренировок:", status, error);
            },
        });
    }
});
function checkAuthentication(
    trainingId,
    trainingName,
    trainerName,
    trainingDate,
    trainingTime
) {
    var isAuthenticated = sessionStorage.getItem("isAuthenticated") === "true";
    if (!isAuthenticated) {
        window.location.href = "login.html";
    } else {
        var clientId = sessionStorage.getItem("clientId");

        // **Проверяем, записан ли пользователь**
        $.ajax({
            url: "assets/php/check_registration.php",
            type: "POST",
            data: { training_id: trainingId, user_id: clientId },
            success: function (response) {
                console.log(response.registered);
                if (response.registered) {
                    alert("Вы уже записаны на эту тренировку!");
                } else {
                    // **Показываем модальное окно**
                    document.getElementById("typeTrainingName").textContent =
                        trainingName;
                    document.getElementById("trainerName").textContent =
                        trainerName;
                    document.getElementById("trainingTime").textContent =
                        trainingTime;
                    document.getElementById("trainingDate").textContent =
                        trainingDate;

                    var modal = new bootstrap.Modal(
                        document.getElementById("confirmModal")
                    );
                    modal.show();

                    // **Обрабатываем запись на тренировку**
                    document.getElementById("registerButton").onclick =
                        function () {
                            $.ajax({
                                url: "assets/php/register_training.php",
                                type: "POST",
                                data: {
                                    training_id: trainingId,
                                    user_id: clientId,
                                },
                                success: function () {
                                    alert("Вы успешно записаны на тренировку!");
                                    modal.hide();
                                },
                                error: function (xhr, status, error) {
                                    console.error(
                                        "Ошибка при записи:",
                                        status,
                                        error
                                    );
                                },
                            });
                        };
                }
            },
            error: function (xhr, status, error) {
                console.error("Ошибка при проверке записи:", status, error);
            },
        });
    }
}
