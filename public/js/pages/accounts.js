function fillEditForm(account) {
    console.log(account);
}

function fillLockForm(account) {
}

function fillDeleteForm(account) {
}

$("document").ready(function () {
    $(".table").DataTable({
        language: {
            url: "/datatable-vertaling.json"
        },
        columnDefs: [
            {
                target: "no-sort",
                orderable: false
            },
            {
                target: "hide-column",
                visible: false
            }
        ]
    });
});