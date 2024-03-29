class Metoast {
    constructor(type, message) {
        this.type = type ?? "success";
        this.message = message.toLowerCase() ?? "...";

        this.parent = document.getElementById("toast-wrapper");

        this.toast = undefined;

        this._create();
    }

    _create() {
        this.toast = document.createElement("div");
        this.toast.classList.add(
            "alert",
            `alert-${this.type}`,
            "shadow-lg",
            "hidden",
            "p-3",
            "gap-2",
            "w-fit",
            "text-sm",
            "rounded"
        );

        const icon = document.createElement("div");

        if (this.type === "error") {
            icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
        } else {
            icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 stroke-current" fill="none" viewBox="0 0 24 24"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
        }

        const textWrapper = document.createElement("span");
        const type = document.createElement("span");
        type.textContent = this.type + ": ";
        type.classList.add("font-semibold");

        const text = document.createElement("span");
        text.textContent = this.message;

        textWrapper.appendChild(type);
        textWrapper.appendChild(text);

        this.toast.appendChild(icon);
        this.toast.appendChild(textWrapper);

        this.parent.appendChild(this.toast);
    }

    _destroy() {
        this.parent.removeChild(this.toast);
        delete this;
    }

    show() {
        this.toast.classList.remove("hidden");
        setTimeout(() => {
            this.toast.classList.remove("show");
            this.toast.addEventListener("animationend", () => { });
            this._destroy();
        }, 5000);
    }
}

export default Metoast;