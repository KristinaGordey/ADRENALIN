$(document).ready(function () {
    $("#registerForm").on("submit", function (event) {
        event.preventDefault();

        var form = this;
        if (!form.checkValidity()) {
            event.stopPropagation();
            form.classList.add("was-validated");
            return;
        }
        var formData = new FormData(form);
        $.ajax({
            url: "assets/php/register.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                var data = JSON.parse(response);
                console.log(response);
                if (!data.success) {
                    $("#errorLoginExist").text(data.message).show();
                } else {
                    var username = formData.get("name");

                    document.getElementById("username").textContent = username;
                    var modal = new bootstrap.Modal(
                        document.getElementById("welcomeModal")
                    );
                    modal.show();
                }
            },
        });
        $("#welcomeModal").on("hidden.bs.modal", function () {
            window.location.href = "index.html";
        });
    });
});
