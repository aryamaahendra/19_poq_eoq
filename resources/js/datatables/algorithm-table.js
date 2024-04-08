import initDataTable from "../utils/datatable-basic";
import { btnDelete, linkEdit, wrapper } from "../utils/datatable-buttons";

const initAlgorithmTable = (ID, el) => {
    const url = `${base_url}/dashboard/algorithm/data`;

    const table = initDataTable(ID, el, url, {
        order: [[2, "desc"]],
        columns: [
            {
                data: "component_name",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "POQ",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "EOQ",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "ROP",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "order_frequency",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "created_at",
                className: "w-1 whitespace-nowrap",
                render: $.fn.dataTable.render.text(),
            },
            {
                data: "id",
                render: (data, type, row) => {
                    return wrapper(
                        ''
                    );
                },
            },
        ],
    });
};

export default initAlgorithmTable;