import $ from "jquery";

const initKanban = () => {
    if ($(`#kanban-wrapper`).length <= 0) return;
    const kanban = new jKanban({
        element: "#kanban-wrapper",
        responsivePercentage: true,
        boards: [
            {
                "id": "_board_01",
                "title": "Board 01",
                "item": []
            },
            {
                "id": "_board_02",
                "title": "Board 02",
                "item": []
            },
            {
                "id": "_board_03",
                "title": "Board 03",
                "item": []
            }
        ]
    });

    window.kanban = kanban;
}

export default initKanban;