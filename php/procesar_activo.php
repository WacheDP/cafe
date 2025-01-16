<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $objeto = $_POST['objeto'];
    $almacen = $_POST['almacen'];

    $sql = $database->prepare('INSERT INTO activos(objeto) VALUES (?)');
    $sql->bind_param("s", $objeto);
    $sql->execute();
    $sql->close();
};

header("Location: ../sistema/crud/Almacen/inventario.php?sebo=1&id=" . $almacen);
exit;
