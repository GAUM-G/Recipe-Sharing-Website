function toggleMenu() {
    var menu = document.getElementById("sideMenu");
    var currentLeft = window.getComputedStyle(menu).left;

    if (currentLeft === "0px") {
        menu.style.left = "-250px";
    } else {
        menu.style.left = "0px";
    }
}
