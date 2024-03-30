import initDataTable from "../utils/datatable-basic";
import { btnDelete, linkEdit, wrapper } from "../utils/datatable-buttons";

const initComponentTable = (ID, el) => {
    const url = `${base_url}/dashboard/components/data`;

    const table = initDataTable(ID, el, url, {
        order: [[4, "desc"]],
        columns: [
            {
                data: "name",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "category.name",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "in_stock",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "measurement",
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
                        linkEdit(`${dashboard_url}/components/${data}/edit`),
                        btnDelete(`${dashboard_url}/components/${data}`)
                    );
                },
            },
        ],
    });
};

export default initComponentTable;