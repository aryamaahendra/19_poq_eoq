import $ from "jquery";
import "datatables.net-dt";
import { initFlashMessage } from "./utils";
import { initComponentCategories, initUserTable } from "./datatables";
import initCOmponent from "./datatables/component";
import initComponentTable from "./datatables/component";

window.$ = $;
window.base_url = import.meta.env.VITE_APP_URL;
window.dashboard_url = `${base_url}/dashboard`;

$.when($.ready).then(function () {

    $(`[datatable]`).each((idx, el) => {
        const ID = $(el).attr("datatable");

        switch (ID) {
            case "users-table":
                initUserTable(ID, el);
                break;

            case "components-caegories-table":
                initComponentCategories(ID, el);
                break;

            case "components-table":
                initComponentTable(ID, el);
                break;

            default:
                console.error("Error: tables not found.");
                return;
        }
    });

    initFlashMessage();
});