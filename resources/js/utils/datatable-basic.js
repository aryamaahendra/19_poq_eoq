import $ from "jquery";
import { getcookie, MeConfirmDelete } from "../utils";
// import Metoast from "../utils/toast";

const initDataTable = (ID, el, url, config) => {
    const table = $(`#${ID}`).DataTable({
        dom: `<<<"overflow-x-auto"t>><"pagination" ip>>`,
        ajax: {
            url: url,
            headers: {
                "X-XSRF-TOKEN": getcookie("XSRF-TOKEN"),
                Accept: "application/json",
            },
            data: (query) => {
                query.columns = null;
            },
        },
        processing: true,
        serverSide: true,
        ...config,
    });

    initBasicFilter(table, el);

    return table;
};

const initBasicFilter = (table, el) => {
    table.on("submit", "tbody tr form.conf-delete", async (e) => {
        e.preventDefault();
        const modal = new MeConfirmDelete();
        if (await modal.show()) {
            e.currentTarget.submit();
            return;
        }

        return;
    });

    table.on("click", "tbody tr .show-qrcode", async (e) => {
        e.preventDefault();
        const url = $(e.currentTarget).data("url");
        const modal = document.getElementById("qrcode_modal")
        $("#qrcode_modal img").attr('src', url);

        modal.showModal();
        return;
    });

    $(el)
        .find(".search")
        .on("keyup", (e) => {
            table.search(e.currentTarget.value).draw();
        });

    $(el)
        .find(".perpage")
        .on("change", (e) => {
            table.page.len(e.currentTarget.value).draw();
        });
}

export { initBasicFilter };

export default initDataTable;