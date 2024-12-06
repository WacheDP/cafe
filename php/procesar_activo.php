<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $objeto = $_POST['objeto'];

    $sql = $database->prepare('INSERT INTO activos(objeto) VALUES (?)');
    $sql->bind_param("s", $objeto);
    $sql->execute();
    $sql->close();
};

header("Location: ../sistema/almacen.php");
exit;
