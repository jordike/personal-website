const pages = document.getElementsByClassName("dashboard-page");

function showPage(pageName) {
    const page = document.getElementById(pageName);

    for (const otherPage of pages) {
        otherPage.classList.remove("d-none");
    }

    if (page !== null) {
        page.classList.add("d-none");
    }
}