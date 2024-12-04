<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $direccion = $_POST['dir'];

    $sql = $database->prepare('INSERT INTO sucursales(direccion) VALUES (?)');
    $sql->bind_param("s", $direccion);
    $sql->execute();
    $sql->close();
};

header("Location: ../sistema/sucursal.php");
exit;
