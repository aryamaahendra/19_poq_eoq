import initDataTable from "../utils/datatable-basic";
import { btnDelete, linkEdit, wrapper } from "../utils/datatable-buttons";

const initSellTable = (ID, el) => {
    const url = `${base_url}/dashboard/penjualan/data`;

    const table = initDataTable(ID, el, url, {
        order: [[1, "desc"]],
        columns: [
            {
                data: "no",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "vehicle_number",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "driver_name",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "company",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "total_price",
                className: "w-1 whitespace-nowrap",
                render: $.fn.dataTable.render.text(),
            },
            {
                data: "date",
                className: "w-1 whitespace-nowrap",
                render: $.fn.dataTable.render.text(),
            },
            {
                data: "id",
                render: (data, type, row) => {
                    return wrapper(
                        linkEdit(`${dashboard_url}/penjualan/${data}/edit`),
                        btnDelete(`${dashboard_url}/penjualan/${data}`)
                    );
                },
            },
        ],
    });
};

export default initSellTable;