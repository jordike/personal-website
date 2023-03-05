const bodyElement = document.getElementsByTagName("body").item(0);
const toggleButtonIcon = document.getElementById("theme-toggle-icon");

function darkThemeOn() {
    return localStorage.getItem("dark-theme") == "true";
}

function updateTogglerIcon() {
    if (darkThemeOn()) {
        toggleButtonIcon.classList.remove("fa-moon");
        toggleButtonIcon.classList.add("fa-sun");
    } else {
        toggleButtonIcon.classList.remove("fa-sun");
        toggleButtonIcon.classList.add("fa-moon");
    }
}

function setTheme(dark) {
    if (dark) {
        bodyElement.classList.add("dark-theme");
    } else {
        bodyElement.classList.remove("dark-theme");
    }

    localStorage.setItem("dark-theme", dark);

    updateTogglerIcon();
}

function loadTheme() {
    const dark = localStorage.getItem("dark-theme");

    if (dark !== null) {
        setTheme(dark == "true");
    }
}

function toggleTheme() {
    bodyElement.classList.toggle("dark-theme");

    localStorage.setItem("dark-theme", !darkThemeOn());

    updateTogglerIcon();
}

loadTheme();
