document.getElementById("signupForm").onsubmit = function(event) {
    var name = document.getElementById("name").value.trim();
    var username = document.getElementById("username").value.trim();
    var number = document.getElementById("number").value.trim();
    var gmail = document.getElementById("gmail").value.trim();
    var password = document.getElementById("password").value.trim();
    var confirmPassword = document.getElementById("confirmPassword").value.trim();
    var isValid = true;

    if (name === "") {
        document.getElementById("nameError").innerText = "Name is required.";
        isValid = false;
    } else {
        document.getElementById("nameError").innerText = "";
    }
    
    if (username === "" || !/^[a-zA-Z0-9_-]{3,16}$/.test(username)) {
        document.getElementById("usernameError").innerText = "Invalid username format. (3-16 characters, letters, numbers, _, - allowed)";
        isValid = false;
    } else {
        document.getElementById("usernameError").innerText = "";
    }
    
    if (number === "" || !/^\d{10}$/.test(number)) {
        document.getElementById("numberError").innerText = "Invalid phone number. (10 digits required)";
        isValid = false;
    } else {
        document.getElementById("numberError").innerText = "";
    }
    
    if (gmail === "" || !/^[\w.-]+@gmail\.com$/.test(gmail)) {
        document.getElementById("gmailError").innerText = "Invalid Gmail format. (example@gmail.com)";
        isValid = false;
    } else {
        document.getElementById("gmailError").innerText = "";
    }
    
    if (password === "" || !/^[a-zA-Z0-9_-]{6,16}$/.test(password)) {
        document.getElementById("passwordError").innerText = "Invalid password format. (6-16 characters, letters, numbers, _, - allowed)";
        isValid = false;
    } else {
        document.getElementById("passwordError").innerText = "";
    }
    
    if (confirmPassword !== password) {
        document.getElementById("confirmPasswordError").innerText = "Passwords do not match.";
        isValid = false;
    } else {
        document.getElementById("confirmPasswordError").innerText = "";
    }
    
    if (!isValid) {
        event.preventDefault();
    }
};
