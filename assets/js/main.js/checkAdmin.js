function checkAdminAccess() {
    let isAuthenticated = sessionStorage.getItem("isAuthenticated") === "true";
    let isAdmin = sessionStorage.getItem("isAdmin") === "true";

    if (isAuthenticated && isAdmin) {
        return true; 
    } else {
        return false; 
    }
}
