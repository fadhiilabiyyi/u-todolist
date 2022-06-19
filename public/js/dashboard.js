const myModal = document.getElementById("ModalCreate");
const myInput = document.getElementById("task_name_input");

myModal.addEventListener("shown.bs.modal", () => {
    myInput.focus();
});

// Shorcut open create modal | Ctrl + /
document.addEventListener("keydown", (e) => {
    if (e.key.toLowerCase() === "/" && e.ctrlKey) {
        let myModal = new bootstrap.Modal(
            document.getElementById("ModalCreate"),
            {}
        );
        myModal.show();
    }
});
