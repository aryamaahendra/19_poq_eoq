import $ from "jquery";
import { getcookie, Metoast } from "./utils";

const base_url = import.meta.env.VITE_APP_URL;
const dashboard_url = `${base_url}/dashboard`;

const initKanban = async () => {
    if ($(`#kanban-wrapper`).length <= 0) return;

    const data = await $.ajax({
        method: "GET",
        url: `${dashboard_url}/kanban-board/data`,
        headers: { Accept: "application/json" },
    })

    const kanban = new jKanban({
        element: "#kanban-wrapper",
        responsivePercentage: true,
        boards: JSON.parse(data.board),
        dragBoards: false,
        dropEl: async function (el, target, source, sibling) {
            const ID = $(el).data('orderid')
            const order = $(target).parent(`[data-order]`).data('order')

            new Metoast('warning', 'updating order status!').show()

            let status = 'pendding';
            if (order == 2) status = 'dileviry';
            if (order == 3) status = 'success';

            $.ajax({
                method: 'PUT',
                url: `${dashboard_url}/pembelian/status/${ID}`,
                data: {
                    status: status
                },
                headers: {
                    "X-XSRF-TOKEN": getcookie("XSRF-TOKEN"),
                    Accept: "application/json",
                }
            })
                .done(() => new Metoast('success', 'pembelian status berhasil diupdate!').show())
                .fail(() => new Metoast('error', 'pembelian status gagal diupdate!').show())
        }
    });

    window.kanban = kanban;
}

export default initKanban;