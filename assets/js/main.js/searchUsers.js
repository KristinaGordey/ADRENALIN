function searchUsers() {
    const name = document.getElementById("searchName").value.trim();
    const email = document.getElementById("searchEmail").value.trim();
    const phone = document.getElementById("searchPhone").value.trim();

    fetch("assets/php/search_users.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ name, email, phone }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.status === "error") {
                console.log(`Ошибка: ${data.message}`);
            } else {
                document.getElementById("activeUsers").innerHTML =
                    data.activeUsers;
                document.getElementById("blockedUsers").innerHTML =
                    data.blockedUsers;
            }
        })
        .catch((error) => {
            console.error("Ошибка AJAX:", error);
        });
}

function manageUser(userId, action) {
    fetch("assets/php/manage_user.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ user_id: userId, action: action }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.status === "success") {
                alert(data.message);
                searchUsers(); 
            }
        })
        .catch((error) => {
            alert("Ошибка запроса.");
            console.error("Ошибка AJAX:", error);
        });
}


function blockUser(userId) {
    if (confirm("Вы уверены, что хотите заблокировать этого пользователя?")) {
        manageUser(userId, "block");
    }
}

function unblockUser(userId) {
    if (confirm("Вы уверены, что хотите разблокировать этого пользователя?")) {
        manageUser(userId, "unblock");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    if (!checkAdminAccess()) {
        window.location.href = "index.html";
    }
    searchUsers();
});
