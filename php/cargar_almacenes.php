<?php
require "./base_datos.php";
$id = $_GET['id'];

$sql = $database->prepare('SELECT * FROM almacenes AS a WHERE sucursal = ?');
$sql->bind_param("s", $id);
$sql->execute();
$almacenes = $sql->get_result();
$sql->close();

$html = '
<div class="card caja-formulario border-dark">
    <h5 class="card-header bg-dark text-white">Almacenes</h5>

    <div class="card-body">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
';

$num = 1;
while ($almacen = $almacenes->fetch_assoc()) {
    $html .= '<tr><th scope="row">' . $num . '</th><td>' . $almacen['direccion'] . '</td>';
    $html .= '<td>' . $almacen['estado'] . '</td>';
    $html .= '<td><a href="">';
    $html .= '<button type="button" class="btn btn-outline-primary">';
    $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">';
    $html .= '<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>';
    $html .= '<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>';
    $html .= '</svg></button></a></td>';
    $html .= '<td><a href="./crud/Almacen/form.php?sebo=1&id=' . $almacen['id'] . '">';
    $html .= '<button type="button" class="btn btn-outline-success">';
    $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">';
    $html .= '<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>';
    $html .= '</svg></button></a></td>';
    $html .= '<td><a href="./crud/Almacen/borrar.php?id=' . $almacen['id'] . '">';
    $html .= '<button type="button" class="btn btn-outline-danger">';
    $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">';
    $html .= '<path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>';
    $html .= '</svg></button></a></td></tr>';

    $num++;
};

$html .= '</tbody></table></div></div>';

$html .= '
<div class="card caja-formulario border-dark">
    <h5 class="card-header bg-dark text-white">Incorporar Nuevo Almacen</h5>

    <div class="card-body">
        <form action="../php/procesar_almacen.php" method="post">
            <input type="hidden" name="sucursal" value="' . $id . '">

            <div class="form-group caja-input">
                <label for="dir">Dirección</label>
                <textarea class="form-control" id="dir" name="dir" rows="3" maxlength="100" required></textarea>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-outline-success" name="btn" value="Registrar">
                </div>
            </div>
        </form>
    </div>
</div>
';

echo $html;
