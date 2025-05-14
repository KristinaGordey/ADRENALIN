
(() => {
    "use strict";

    
    const forms = document.querySelectorAll(".needs-validation");

    
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

    
    var isAuthenticated = sessionStorage.getItem("isAuthenticated") === "true";
    let isAdmin = sessionStorage.getItem("isAdmin") === "true";
    var username = sessionStorage.getItem("username");
    var accountButton = document.getElementById("account-button");
    var dropdownItems = document.querySelectorAll(
        ".dropdown-menu .dropdown-item"
    );

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function updateDropdown(condition) {
        let dropdownMenu = document.querySelector(".dropdown-menu");

        if (condition && accountButton) {
            accountButton.innerText = username || "Аккаунт";
            accountButton.classList.add("no-arrow", "dropdown-toggle");
            accountButton.setAttribute("data-toggle", "dropdown");
            
            dropdownMenu.innerHTML = "";
            
            let logoutItem = document.createElement("a");
            logoutItem.classList.add("dropdown-item");
            logoutItem.innerText = "Выйти";
            dropdownMenu.appendChild(logoutItem);
            
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
            
            dropdownMenu.innerHTML = "";
            dropdownItems.forEach((item) => {
                dropdownMenu.appendChild(item);
            });
        }
    }

    
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

    
    
    
    

    
    
    
    
    
    
    
    
    

    
    document.addEventListener("click", function (event) {
        event.stopPropagation();
    });
});
