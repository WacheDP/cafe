var sucursal = document.getElementById('sucursal')
var almacenes = document.getElementById('almacenes');

sucursal.addEventListener("change", () => {
    var id = sucursal.value
    var ajax = new XMLHttpRequest
    ajax.open("GET", "../php/cargar_almacenes.php?id=" + encodeURIComponent(id))

    ajax.onload = () => {
        almacenes.innerHTML = ajax.responseText;
    }

    ajax.send();
});