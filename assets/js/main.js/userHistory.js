function togglePeriodInput() {
    const period = document.getElementById("historyPeriod").value;
    const wrapper = document.getElementById("periodInputWrapper");
    const dateInput = document.getElementById("specificDate");
    const monthInput = document.getElementById("specificMonth");
    const yearInput = document.getElementById("specificYear");

    // скрываем все поля
    wrapper.classList.add("d-none");
    dateInput.classList.add("d-none");
    monthInput.classList.add("d-none");
    yearInput.classList.add("d-none");

    // показываем нужное поле
    if (period === "day") {
        wrapper.classList.remove("d-none");
        dateInput.classList.remove("d-none");
    } else if (period === "month") {
        wrapper.classList.remove("d-none");
        monthInput.classList.remove("d-none");
    } else if (period === "year") {
        wrapper.classList.remove("d-none");
        yearInput.classList.remove("d-none");
    }
}
function loadTrainingHistory() {
    const sortOrder = document.getElementById("sortOrder").value;
    let period = document.getElementById("historyPeriod").value;
    const userId = sessionStorage.getItem("clientId");

    let periodValue = "";
    if (period === "day") {
        periodValue = document.getElementById("specificDate").value;
    } else if (period === "month") {
        periodValue = document.getElementById("specificMonth").value;
    } else if (period === "year") {
        periodValue = document.getElementById("specificYear").value;
    }

    if (period !== "all" && periodValue === "") {
        period = "all";
    }

    fetch("assets/php/load_user_history.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ userId, sortOrder, period, periodValue }),
    })
        .then((response) => response.json())
        .then((data) => {
            document.getElementById("trainingSchedule").innerHTML =
                data.historyRecords;
        })
        .catch((error) => console.error("Ошибка AJAX:", error));
}

//для заполнения списка выбора года
function populateYearSelect(selectId, minYear = 2000) {
    const select = document.getElementById(selectId);
    const currentYear = new Date().getFullYear();

    select.innerHTML = "";

    for (let year = currentYear; year >= minYear; year--) {
        const option = document.createElement("option");
        option.value = year;
        option.textContent = year;
        select.appendChild(option);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    if (
        !(sessionStorage.getItem("isAuthenticated") === "true") ||
        checkAdminAccess()
    ) {
        window.location.href = "index.html";
    }
    loadTrainingHistory();
    populateYearSelect("specificYear");
});
