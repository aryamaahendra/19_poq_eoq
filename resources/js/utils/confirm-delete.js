class MeConfirmDelete {
    constructor() {
        this.body = document.querySelector("body");
        this.dialog = document.createElement("dialog");
        this.dialog.id = "confirm_delete_modal";
        this.dialog.className = "modal";

        this.body.appendChild(this.dialog);
    }

    _destroy() {
        this.dialog.close();
        this.dialog.remove();
        delete this;
    }

    show() {
        const warning = `<svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 stroke-warning" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v4" /><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" /><path d="M12 16h.01" /></svg>`;

        return new Promise((resolve, reject) => {
            const modalBox = document.createElement("div");
            modalBox.className = "text-center modal-box";
            this.dialog.appendChild(modalBox);

            const icon = document.createElement("div");
            icon.className = "flex justify-center mb-4";
            icon.innerHTML = warning;
            modalBox.appendChild(icon);

            const title = document.createElement("h3");
            title.className = "text-lg font-bold";
            title.textContent = "Yakin nih?";
            modalBox.appendChild(title);

            const text = document.createElement("p");
            text.textContent = "Data yang dihapus gk bakal balik lagi lohh..";
            modalBox.appendChild(text);

            const modalAction = document.createElement("div");
            modalAction.className = "justify-center modal-action";
            modalBox.appendChild(modalAction);

            const confirm = document.createElement("button");
            confirm.type = "button";
            confirm.className = "btn btn-error";
            confirm.textContent = "Hapus aja!";
            modalAction.appendChild(confirm);

            const cencel = document.createElement("button");
            cencel.type = "button";
            cencel.className = "btn btn-ghost";
            cencel.textContent = "Gk jadi deh!";
            modalAction.appendChild(cencel);

            this.dialog.showModal();

            const meee = this;

            confirm.addEventListener("click", () => {
                meee._destroy();
                resolve(true);
            });

            cencel.addEventListener("click", () => {
                meee._destroy();
                resolve(false);
            });
        });
    }
}

export default MeConfirmDelete;