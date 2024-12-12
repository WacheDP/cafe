<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $sucursal = $_POST['sucursal'];
    $direccion = $_POST['dir'];

    $sql = $database->prepare('INSERT INTO almacenes(sucursal, direccion) VALUES (?, ?)');
    $sql->bind_param("ss", $sucursal, $direccion);
    $sql->execute();
    $sql->close();
};

header("Location: ../sistema/almacen.php");
exit;
