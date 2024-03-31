import Metoast from "./meetoast";
import MeConfirmDelete from "./confirm-delete";

const initFlashMessage = () => {
    const flashType = $(`[name="flash_type"]`).val();
    const flashMessage = $(`[name="flash_message"]`).val();

    if (flashType && flashMessage)
        setTimeout(() => new Metoast(flashType, flashMessage).show(), 250);

    const errorType = $(`[name="error_type"]`).val();
    const errorMessage = $(`[name="error_message"]`).val();

    if (errorType && errorMessage)
        setTimeout(() => new Metoast(errorType, errorMessage).show(), 250);
}

const getcookie = (cookieName) => {
    const cookies = document.cookie.split("; ");

    for (const cookie of cookies) {
        const [name, value] = cookie.split("=");
        if (name === cookieName) {
            return decodeURIComponent(value);
        }
    }

    return null; // Return null if the cookie is not found
};

export { Metoast, initFlashMessage, MeConfirmDelete, getcookie }