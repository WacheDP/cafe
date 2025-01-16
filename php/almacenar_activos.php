<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $almacen = $_POST['almacen'];
    $objeto = $_POST['obj'];
    $costo = $_POST['costo'];
    $cantidad = $_POST['cantidad'];

    date_default_timezone_set("America/Caracas");
    $hoy = date("Y-m-d");

    $sql = $database->prepare('SELECT a.id, a.cantidad FROM almacen_activos AS a WHERE a.objeto = ? AND a.almacen = ? AND a.fecha_adquisicion = ?');
    $sql->bind_param("sss", $objeto, $almacen, $hoy);
    $sql->execute();
    $activos = $sql->get_result();
    $sql->close();

    if ($activos->num_rows == 0) {
        $sql = $database->prepare('INSERT INTO almacen_activos(objeto, almacen, costo_unidad, cantidad) VALUES (?, ?, ?, ?)');
        $sql->bind_param("ssdi", $objeto, $almacen, $costo, $cantidad);
        $sql->execute();
        $sql->close();
    } else {
        $activos = $activos->fetch_assoc();
        $cantidad = $cantidad + $activos['cantidad'];
        $sql = $database->prepare('UPDATE almacen_activos SET cantidad = ? WHERE id = ?');
        $sql->bind_param("is", $cantidad, $activos['id']);
        $sql->execute();
        $sql->close();
    }
};

header("Location: ../sistema/crud/Almacen/inventario.php?sebo=1&id=" . $almacen);
exit;
