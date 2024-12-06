<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $producto = $_POST['producto'];

    $sql = $database->prepare('INSERT INTO mercancias(producto) VALUES (?)');
    $sql->bind_param("s", $producto);
    $sql->execute();
    $sql->close();
};

header("Location: ../sistema/almacen.php");
exit;
