$(document).ready(function() {
    $('#registerForm').on('submit', function(event) {
        event.preventDefault(); // Предотвращает стандартное поведение формы

        var form = this;
        if (!form.checkValidity()) {
            event.stopPropagation();
            form.classList.add('was-validated');
            return;
        }
        var formData = new FormData(form);
        $.ajax({
            url: 'assets/php/register.php',
            type: 'POST',
            data: $(this).serialize(), // Сериализует данные формы
            success: function(response) {
                var data = JSON.parse(response);
                if (!data.success) {
                    $('#errorLoginExist').text(data.message).show();
                } else {
                    // Извлекаем имя пользователя из FormData
                    var username = formData.get('name'); 
                    // Обновляем содержимое модального окна
                    document.getElementById("username").textContent = username; 
                    var modal = new bootstrap.Modal(document.getElementById('welcomeModal')); 
                    modal.show(); 
                }
            }
        });
        $('#welcomeModal').on('hidden.bs.modal', function () { 
            window.location.href = 'index.html'; // Замените на нужный URL 
            });
    });
});