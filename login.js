document.getElementById("loginForm").onsubmit = function(event) {
    var username = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value.trim();
    var isValid = true;
    if (username === "") {
        document.getElementById("usernameError").innerText = "Username is required.";
        isValid = false;
    } else if (!/^[a-zA-Z0-9_-]{3,16}$/.test(username)) {
        document.getElementById("usernameError").innerText = "Invalid username format. (3-16 characters, letters, numbers, _, - allowed)";
        isValid = false;
    } else {
        document.getElementById("usernameError").innerText = "";
    }
    if (password === "") {
        document.getElementById("passwordError").innerText = "Password is required.";
        isValid = false;
    } else if (!/^[a-zA-Z0-9_-]{3,16}$/.test(password)) {
        document.getElementById("passwordError").innerText = "Invalid password format. (3-16 characters, letters, numbers, _, - allowed)";
        isValid = false;
    } else {
        document.getElementById("passwordError").innerText = "";
    }
    if (!isValid) {
        event.preventDefault();
    }
};
