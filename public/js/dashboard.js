const myModal = document.getElementById("ModalCreate");
const myInput = document.getElementById("task_name_input");

myModal.addEventListener("shown.bs.modal", () => {
    myInput.focus();
});
