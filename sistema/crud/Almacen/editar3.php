<?php
require "../../../php/base_datos.php";

if (isset($_POST['btn'])) {
    $id = $_POST['id'];

    if (!empty($_POST['almacen'])) {
        $sql = $database->prepare('UPDATE almacen_mercancia SET almacen = ? WHERE id = ?');
        $sql->bind_param("ss", $_POST['almacen'], $id);
        $sql->execute();
        $sql->close();
    };

    if (!empty($_POST['cantidad'])) {
        $sql = $database->prepare('UPDATE almacen_mercancia SET cantidad = ? WHERE id = ?');
        $sql->bind_param("is", $_POST['cantidad'], $id);
        $sql->execute();
        $sql->close();
    };

    if (!empty($_POST['costo'])) {
        $sql = $database->prepare('UPDATE almacen_mercancia SET precio_unidad = ? WHERE id = ?');
        $sql->bind_param("ds", $_POST['costo'], $id);
        $sql->execute();
        $sql->close();
    };

    if (!empty($_POST['estado'])) {
        $sql = $database->prepare('UPDATE almacen_mercancia SET estado = ? WHERE id = ?');
        $sql->bind_param("ss", $_POST['estado'], $id);
        $sql->execute();
        $sql->close();
    };
};

header("Location: ../../almacen.php");
exit;
