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
            .then(response => {
                if (!response.ok) {
                    throw new Error('Ошибка сети');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    console.log("Аутентификация успешна. Перенаправление..."); 

                    // Извлекаем имя пользователя из FormData
                    var username = formData.get('username'); 
                    console.log(username); 

                    // Обновляем содержимое модального окна
                    document.getElementById("username").textContent = username; 
                    var modal = document.getElementById("welcomeModal"); 
                    modal.style.display = "block"; 
                    var closeButton = document.querySelector('.btn-close'); 
                    closeButton.onclick = function() { 
                        modal.style.display = "none"; 
                        window.location.href = "index.html"; // Перенаправление после закрытия окна 
                    }; 
                    var footerButton = document.querySelector('.btn-secondary'); 
                    footerButton.onclick = function() { 
                        modal.style.display = "none"; 
                        window.location.href = "index.html"; // Перенаправление после нажатия на кнопку 
                    };
                    window.onclick = function(event) { 
                        if (event.target == modal) { 
                            modal.style.display = "none"; 
                            window.location.href = "index.html"; // Перенаправление после закрытия окна 
                        } 
                    };
                } else {
                    console.log("Аутентификация не удалась.");
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
