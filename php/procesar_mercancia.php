<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $producto = $_POST['producto'];
    $almacen = $_POST['almacen'];

    $sql = $database->prepare('INSERT INTO mercancias(producto) VALUES (?)');
    $sql->bind_param("s", $producto);
    $sql->execute();
    $sql->close();
};

header("Location: ../sistema/crud/Almacen/inventario.php?sebo=1&id=" . $almacen);
exit;
