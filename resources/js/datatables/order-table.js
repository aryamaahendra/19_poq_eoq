import initDataTable from "../utils/datatable-basic";
import { btnDelete, linkEdit, wrapper } from "../utils/datatable-buttons";

const initOrderTable = (ID, el) => {
    const url = `${base_url}/dashboard/pembelian/data`;

    const table = initDataTable(ID, el, url, {
        order: [[4, "desc"]],
        columns: [
            {
                data: "no",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "from",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "date",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "total_item",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "total_price",
                className: "w-1 whitespace-nowrap",
                render: $.fn.dataTable.render.text(),
            },
            {
                data: "id",
                render: (data, type, row) => {
                    return wrapper(
                        linkEdit(`${dashboard_url}/pembelian/${data}/edit`),
                        btnDelete(`${dashboard_url}/pembelian/${data}`)
                    );
                },
            },
        ],
    });
};

export default initOrderTable;