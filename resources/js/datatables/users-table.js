import initDataTable from "../utils/datatable-basic";
import { btnDelete, linkEdit, wrapper } from "../utils/datatable-buttons";

const initUserTable = (ID, el) => {
    const url = `${base_url}/dashboard/users/data`;

    const table = initDataTable(ID, el, url, {
        order: [[2, "desc"]],
        columns: [
            {
                data: "name",
                render: $.fn.dataTable.render.text(),
                className: "whitespace-nowrap",
            },
            {
                data: "email",
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
                        linkEdit(`${dashboard_url}/users/${data}/edit`),
                        btnDelete(`${dashboard_url}/users/${data}`)
                    );
                },
            },
        ],
    });
};

export default initUserTable;