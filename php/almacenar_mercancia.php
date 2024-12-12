<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $almacen = $_POST['almacen'];
    $mercancia = $_POST['mercancia'];
    $costo = $_POST['costo2'];
    $cantidad = $_POST['cantidad2'];

    $sql = $database->prepare('INSERT INTO almacen_mercancia(mercancia, almacen, cantidad, precio_unidad) VALUES (?, ?, ?, ?)');
    $sql->bind_param("ssid", $mercancia, $almacen, $cantidad, $costo);
    $sql->execute();
    $sql->close();
};

header("Location: ../sistema/almacen.php");
exit;
