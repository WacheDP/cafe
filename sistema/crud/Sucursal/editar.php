<?php
require "../../../php/base_datos.php";

if (isset($_POST['btn'])) {
    $direccion = $_POST['dir'];
    $id = $_POST['id'];

    $sql = $database->prepare('UPDATE sucursales SET direccion = ? WHERE id = ?');
    $sql->bind_param("ss", $direccion, $id);
    $sql->execute();
    $sql->close();
};

header("Location: ../../sucursal.php");
exit;
