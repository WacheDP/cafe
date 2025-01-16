<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $almacen = $_POST['almacen'];
    $mercancia = $_POST['mercancia'];
    $costo = $_POST['costo2'];
    $cantidad = $_POST['cantidad2'];
    $condicion = $_POST['condicion'];

    date_default_timezone_set("America/Caracas");
    $hoy = date("Y-m-d");

    $sql = $database->prepare('SELECT m.id, m.cantidad FROM almacen_mercancia as m WHERE m.mercancia = ? AND m.almacen = ? AND m.fecha_adquisicion = ?');
    $sql->bind_param("sss", $mercancia, $almacen, $hoy);
    $sql->execute();
    $mercancias = $sql->get_result();
    $sql->close();

    if ($mercancias->num_rows == 0) {
        if (!empty($condicion)) {
            $sql = $database->prepare('INSERT INTO almacen_mercancia(mercancia, almacen, condicion, cantidad, precio_unidad) VALUES (?, ?, ?, ?, ?)');
            $sql->bind_param("sssid", $mercancia, $almacen, $condicion, $cantidad, $costo);
        } else {
            $sql = $database->prepare('INSERT INTO almacen_mercancia(mercancia, almacen, cantidad, precio_unidad) VALUES (?, ?, ?, ?)');
            $sql->bind_param("ssid", $mercancia, $almacen, $cantidad, $costo);
        }

        $sql->execute();
        $sql->close();
    } else {
        $mercancias = $mercancias->fetch_assoc();
        $cantidad = $cantidad + $mercancias['cantidad'];
        $sql = $database->prepare('UPDATE almacen_mercancia SET cantidad = ? WHERE id = ?');
        $sql->bind_param("is", $cantidad, $mercancias['id']);
        $sql->execute();
        $sql->close();
    }
};

header("Location: ../sistema/crud/Almacen/inventario.php?sebo=1&id=" . $almacen);
exit;
