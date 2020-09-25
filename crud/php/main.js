$(".btnedit").click(e => {
    let x = display(e);
    let id = $("input[name*='id']");
    let nombre = $("input[name*='nombre']");
    let cantidad = $("input[name*='cantidad']");

    id.val(x[0]);
    nombre.val(x[1]);
    cantidad.val(x[2]);
})

function display(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let valores = [];

    for (const valor of td) {
        if (valor.dataset.id == e.target.dataset.id) {
            valores[id++] = valor.textContent;
        }
    }
    return valores;
}