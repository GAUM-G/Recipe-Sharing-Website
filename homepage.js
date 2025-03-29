document.addEventListener("DOMContentLoaded", function () {
    function updateAuthButtons() {
        const user = JSON.parse(sessionStorage.getItem("loggedInUser"));

        if (user) {
            document.getElementById("authButtons").innerHTML = 
                `<button id="profileBtn" onclick="window.location.href='profile.html'">${user.id}</button>
                 <button id="logoutBtn">Logout</button>`;

            document.getElementById("logoutBtn").addEventListener("click", function () {
                sessionStorage.removeItem("loggedInUser"); 
                window.location.href = "logout.php"; 
            });
        } else {
            document.getElementById("authButtons").innerHTML = `
                <button onclick="window.location.href='login.html'">Login</button>
                <button onclick="window.location.href='signup.html'">Signup</button>
            `;
        }
    }

    updateAuthButtons(); // Call on page load

    // Fix for Hamburger Menu Toggle
    function toggleMenu() {
        const sideMenu = document.getElementById("sideMenu");
        sideMenu.classList.toggle("open");
    }

    // Ensure toggleMenu is globally accessible
    window.toggleMenu = toggleMenu;
});
