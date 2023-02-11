const bodyElement = document.getElementsByTagName("body").item(0);
const toggleButtonIcon = document.getElementById("theme-toggle-icon");

function toggleTheme() {
    bodyElement.classList.toggle("dark-theme");

    if (bodyElement.classList.contains("dark-theme")) {
        toggleButtonIcon.classList.remove("fa-moon");
        toggleButtonIcon.classList.add("fa-sun");
    } else {
        toggleButtonIcon.classList.remove("fa-sun");
        toggleButtonIcon.classList.add("fa-moon");
    }
}