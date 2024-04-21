import initDataTable from "../utils/datatable-basic";
import { orderStatus, btnDelete, checklistIcons, clockIcon, dileviryIcon, linkEdit, wrapper, basicLink, spreadsheetIcon } from "../utils/datatable-buttons";

const initOrderTable = (ID, el) => {
    const url = `${base_url}/dashboard/pembelian/data`;

    const table = initDataTable(ID, el, url, {
        order: [[2, "desc"]],
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
                className: "whitespace-nowrap w-1",
            },
            {
                data: "total_price",
                className: "w-1 whitespace-nowrap",
                render: $.fn.dataTable.render.text(),
            },
            {
                data: "status",
                className: "w-1 whitespace-nowrap",
                render: (data, type, row) => {
                    let show = 'ghost';

                    if (data == 'pendding') {
                        show = 'warning';
                    }
                    else if (data == 'dileviry') {
                        show = 'info';
                    }
                    else if (data == 'success') {
                        show = 'success';
                    }

                    return `<div class="badge badge-${show} badge-md uppercase">${data}</div>`;
                },
            },
            {
                data: "id",
                render: (data, type, row) => {
                    console.log(row);
                    return wrapper(
                        basicLink(`${dashboard_url}/pembelian/${data}/excel`, spreadsheetIcon),
                        row.status && row.status != 'pendding' ? orderStatus(`${dashboard_url}/pembelian/status/${data}`, clockIcon, 'pendding') : '',
                        row.status && row.status != 'dileviry' ? orderStatus(`${dashboard_url}/pembelian/status/${data}`, dileviryIcon, 'dileviry') : '',
                        row.status && row.status != 'success' ? orderStatus(`${dashboard_url}/pembelian/status/${data}`, checklistIcons, 'success') : '',
                        linkEdit(`${dashboard_url}/pembelian/${data}/edit`),
                        btnDelete(`${dashboard_url}/pembelian/${data}`),
                    );
                },
            },
        ],
    });
};

export default initOrderTable;