import $ from "jquery";

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
        boards: JSON.parse(data.board)
    });

    window.kanban = kanban;
}

export default initKanban;