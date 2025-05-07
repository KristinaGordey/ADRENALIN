// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();

window.addEventListener("scroll", () => {
    document
        .getElementById("header-nav")
        .classList.toggle("headernav-scroll", window.scrollY > 135);
});

document.addEventListener("DOMContentLoaded", () => {
    var topButton = document.getElementById("top");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 300) {
            topButton.style.display = "block";
        } else {
            topButton.style.display = "none";
        }
    });

    topButton.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });

    // Проверка состояния аутентификации
    var isAuthenticated = sessionStorage.getItem("isAuthenticated") === "true";
    let isAdmin = sessionStorage.getItem("isAdmin") === "true";
    var username = sessionStorage.getItem("username");
    var accountButton = document.getElementById("account-button");
    var dropdownItems = document.querySelectorAll(
        ".dropdown-menu .dropdown-item"
    );

    // function updateDropdown(condition) {
    //     if (condition && accountButton) {
    //         accountButton.innerText = username || 'Выйти';
    //         accountButton.classList.add('no-arrow');
    //         dropdownItems.forEach(item => {
    //             item.style.display = 'none';
    //         });
    //     } else if (accountButton) {
    //         accountButton.innerText = 'Аккаунт';
    //         accountButton.classList.remove('no-arrow');
    //         dropdownItems.forEach(item => {
    //             item.style.display = 'block';
    //         });
    //     }
    // }
    function updateDropdown(condition) {
        let dropdownMenu = document.querySelector(".dropdown-menu");

        if (condition && accountButton) {
            accountButton.innerText = username || "Аккаунт";
            accountButton.classList.add("no-arrow", "dropdown-toggle");
            accountButton.setAttribute("data-toggle", "dropdown");
            // Удаляем все старые элементы из дропдауна
            dropdownMenu.innerHTML = "";
            // Добавляем новый элемент для выхода
            let logoutItem = document.createElement("a");
            logoutItem.classList.add("dropdown-item");
            logoutItem.innerText = "Выйти";
            dropdownMenu.appendChild(logoutItem);
            // Добавляем событие для кнопки выхода
            logoutItem.addEventListener("click", function (event) {
                event.stopPropagation();
                isAuthenticated = false;
                isAdmin = false;
                sessionStorage.setItem(
                    "isAuthenticated",
                    isAuthenticated.toString()
                );
                sessionStorage.setItem("isAdmin", isAdmin.toString());
                sessionStorage.removeItem("username");
                sessionStorage.removeItem("clientId");
                updateDropdown(isAuthenticated);
                window.location.href = "index.html";
            });
        } else if (accountButton) {
            accountButton.innerText = "Аккаунт";
            accountButton.classList.remove(
                "no-arrow",
                "dropdown-toggle",
                "admin-mode"
            );
            accountButton.removeAttribute("data-toggle");
            // Восстанавливаем старые элементы дропдауна
            dropdownMenu.innerHTML = "";
            dropdownItems.forEach((item) => {
                dropdownMenu.appendChild(item);
            });
        }
    }

    // Проверка условия при загрузке страницы
    updateDropdown(isAuthenticated);

    if (!isAdmin) {
        const offcanvasCartEl = document.getElementById("offcanvasCart");
        const offcanvasCart = new bootstrap.Offcanvas(offcanvasCartEl);

        document.querySelectorAll(".closecart").forEach((item) => {
            item.addEventListener("click", (e) => {
                e.preventDefault();
                offcanvasCart.hide();
                const href = item.dataset.href;
                offcanvasCartEl.addEventListener("hidden.bs.offcanvas", () => {
                    document.getElementById(href).scrollIntoView();
                });
            });
        });
    }

    // // Событие при клике на кнопку
    // if (accountButton) {
    //     accountButton.addEventListener('click', function(event) {
    //         event.stopPropagation();

    //         if (isAuthenticated) {
    //             isAuthenticated = false;
    //             sessionStorage.setItem('isAuthenticated', isAuthenticated.toString());
    //             updateDropdown(isAuthenticated);
    //             sessionStorage.removeItem('username');
    //             sessionStorage.removeItem('clientId');
    //         }
    //     });
    // }

    // Добавляем слушатель событий на документ
    document.addEventListener("click", function (event) {
        event.stopPropagation();
    });
});
