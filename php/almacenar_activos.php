<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $almacen = $_POST['almacen'];
    $objeto = $_POST['obj'];
    $costo = $_POST['costo'];
    $cantidad = $_POST['cantidad'];

    $sql = $database->prepare('INSERT INTO almacen_activos(objeto, almacen, costo_unidad, cantidad) VALUES (?, ?, ?, ?)');
    $sql->bind_param("ssdi", $objeto, $almacen, $costo, $cantidad);
    $sql->execute();
    $sql->close();
};

header("Location: ../sistema/almacen.php");
exit;
