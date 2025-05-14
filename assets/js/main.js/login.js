document.addEventListener("DOMContentLoaded", function () {
    var loginForm = document.getElementById("login-form");
    if (loginForm) {
        loginForm.addEventListener("submit", function (event) {
            event.preventDefault(); 

            var form = event.target;
            var formData = new FormData(form);

            fetch(form.action, {
                
                method: form.method,
                body: formData,
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Ошибка сети");
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data.success) {
                        console.log(
                            "Аутентификация успешна. Перенаправление..."
                        );

                        
                        sessionStorage.setItem("clientId", data.id);
                        sessionStorage.setItem("username", data.username);
                        sessionStorage.setItem("isAuthenticated", "true");
                        sessionStorage.setItem("isAdmin", data.isAdmin);

                        let isAdmin = sessionStorage.getItem("isAdmin");
                        console.log(typeof isAdmin);
                        
                        var username = formData.get("username");
                        console.log(username);
                        
                        document.getElementById("username").textContent =
                            username;
                        var modal = new bootstrap.Modal(
                            document.getElementById("welcomeModal")
                        );
                        modal.show();
                        $("#welcomeModal").on("hidden.bs.modal", function () {
                            if (isAdmin) {
                                window.location.href = "schedule.html";
                            } else {
                                window.location.href = "index.html";
                            }
                        });
                    } else if (data.block) {
                        alert(data.message);
                    } else {
                        console.log("Аутентификация не удалась.");
                        document.getElementById("error-message").style.display =
                            "block";
                    }
                })
                .catch((error) => {
                    console.error("Ошибка:", error);
                    document.getElementById("error-message").textContent =
                        "Произошла ошибка. Попробуйте снова.";
                });
        });
    } else {
        console.error("Элемент с ID 'login-form' не найден");
    }
});
