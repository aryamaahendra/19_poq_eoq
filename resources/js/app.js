import $ from "jquery";
import "datatables.net-dt";
import Choices from "choices.js";
import { initFlashMessage } from "./utils";

import {
    initComponentCategories, initComponentTable,
    initOrderTable, initUserTable
} from "./datatables";
import initSellTable from "./datatables/sell-table";

import initKanban from "./kanban";
import initAlgorithmTable from "./datatables/algorithm-table";

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

            case "order-table":
                initOrderTable(ID, el);
                break;

            case "sell-table":
                initSellTable(ID, el);
                break;

            case "algorithm-table":
                initAlgorithmTable(ID, el);
                break;

            default:
                console.error("Error: tables not found.");
                return;
        }
    });

    initFlashMessage();

    initKanban();

    $(`[choicejs="components"]`).each((idx, el) => {

        let items = [];

        el.childNodes.forEach(child => {
            items.push({
                value: $(child).attr("value"),
                label: $(child).text().trim(),
                customProperties: {
                    measurement: $(child).data("measurement"),
                },
            })
        });

        el.innerHTML = "";

        const choices = new Choices(el, {
            classNames: {
                containerInner: "choices__inner !rounded-full h-12 border border-base-300 bg-base-100",
            },
        });

        choices.setValue(items);
        items = [];

        el.addEventListener("choice", (e) => {

            if (items.includes(e.detail.choice.value)) return;
            items.push(e.detail.choice.value);

            $("#component-container").append(
                `
                    <div id="component-item-${e.detail.choice.value}" class="p-4 border border-base-300 rounded-3xl">
                        <div class="flex items-start gap-2">
                            <span class="flex-1">${e.detail.choice.label}</span>
                            <button delete-component="${e.detail.choice.value}" tabindex="-1" type="button" class="btn btn-xs btn-error">
                                hapus
                            </button>
                        </div>

                        <div class="mt-4 space-y-2">
                            <input type="hidden" name="components[${e.detail.choice.value}][label]" value="${e.detail.choice.label}" />
                            <label class="flex items-center gap-2 input input-sm input-bordered">
                                Harga Unit
                                <input type="text" name="components[${e.detail.choice.value}][unit_price]" class="grow" placeholder="1000000" required />
                            </label>

                            <label class="flex items-center gap-2 input input-sm input-bordered">
                                <span>Quantity</span>
                                <input type="text" name="components[${e.detail.choice.value}][qty]" class="grow" placeholder="9999" required />
                                <span>Buah</span>
                            </label>
                            <label class="flex items-center gap-2 input input-sm input-bordered vehicle_number_wrapper">
                                <span>No Kendaraan</span>
                                <input type="text" name="components[${e.detail.choice.value}][vehicle_number]" class="grow" placeholder="DN 9999 WR" />
                            </label>
                            <label class="flex items-center gap-2 input input-sm input-bordered">
                                <span>Ket</span>
                                <input type="text" name="components[${e.detail.choice.value}][description]" class="grow" placeholder="-" required value="-" />
                            </label>
                        </div>
                    </div>
                `
            );
        });

        $("#component-container").on("click", "[delete-component]", (e) => {
            const currEl = e.currentTarget;
            const val = $(currEl).attr("delete-component");
            $(`#component-container #component-item-${val}`).remove();
            items = items.filter(item => item != val);
        })
    })
});