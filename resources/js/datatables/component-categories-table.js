import initDataTable from "../utils/datatable-basic";
import { btnDelete, linkEdit, wrapper } from "../utils/datatable-buttons";

const initComponentCategories = (ID, el) => {
    const url = `${base_url}/dashboard/components/categories/data`;

    const table = initDataTable(ID, el, url, {
        order: [[1, "desc"]],
        columns: [
            {
                data: "name",
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
                        linkEdit(`${dashboard_url}/components/categories/${data}/edit`),
                        btnDelete(`${dashboard_url}/components/categories/${data}`)
                    );
                },
            },
        ],
    });
};

export default initComponentCategories;