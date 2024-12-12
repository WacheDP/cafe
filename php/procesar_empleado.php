<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $CI = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nacimiento = $_POST['nacimiento'];
    $sexo = $_POST['sexo'];

    $sql = $database->prepare('INSERT INTO empleados(cedula, fecha_nacimiento, sexo, nombre, apellido) VALUES (?, ?, ?, ?, ?)');
    $sql->bind_param("sssss", $CI, $nacimiento, $sexo, $nombre, $apellido);
    $sql->execute();
    $sql->close();
};

header("Location: ../sistema/empleados.php");
exit;
