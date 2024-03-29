import Metoast from './meetoast'

const initFlashMessage = () => {
    const flashType = $(`[name="flash_type"]`).val();
    const flashMessage = $(`[name="flash_message"]`).val();

    if (flashType && flashMessage)
        setTimeout(() => new Metoast(flashType, flashMessage).show(), 250);

    const errorType = $(`[name="error_type"]`).val();
    const errorMessage = $(`[name="error_message"]`).val();

    console.log(errorType, errorMessage);

    if (errorType && errorMessage)
        setTimeout(() => new Metoast(errorType, errorMessage).show(), 250);
}

export { Metoast, initFlashMessage }