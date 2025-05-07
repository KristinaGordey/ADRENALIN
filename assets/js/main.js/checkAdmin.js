function checkAdminAccess() {
    let isAuthenticated = sessionStorage.getItem("isAuthenticated") === "true";
    let isAdmin = sessionStorage.getItem("isAdmin") === "true";

    if (isAuthenticated && isAdmin) {
        return true; // Все в порядке, продолжаем работу
    } else {
        return false; // Остановка выполнения
    }
}
