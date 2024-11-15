document.addEventListener("DOMContentLoaded", function() {
    var loginForm = document.getElementById("login-form");
    if (loginForm) {
        loginForm.addEventListener("submit", function(event) {
            event.preventDefault();

            var form = event.target;
            var formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'welcome.php';
                } else {
                    document.getElementById("error-message").style.display = "block";
                }
            })
            .catch(error => {
                console.error("Ошибка:", error);
                document.getElementById("error-message").textContent = "Произошла ошибка. Попробуйте снова.";
                document.getElementById("error-message").style.display = "block";
            });
        });
    } else {
        console.error("Элемент с ID 'login-form' не найден");
    }
});
