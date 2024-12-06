<?php
require "./base_datos.php";
require "./crear_contrasenas.php";
require "./exportar_usuarios.php";

if (isset($_POST['btn'])) {
    $cliente = $_POST['cliente'];
    $vencimiento = $_POST['vencimiento'];
    $nombre = $_POST['user'];
    $correo = $_POST['email'];
    $rol = "b7d0736c-b19c-11ef-96b5-84a93ea1a4c5";
    $contraseña = random_text();
    $password = password_hash($contraseña, PASSWORD_DEFAULT);

    $sql = $database->prepare('INSERT INTO contratos(cliente, fecha_fin) VALUES (?, ?)');
    $sql->bind_param("ss", $cliente, $vencimiento);
    $sql->execute();
    $sql->close();

    $sql = $database->prepare('INSERT INTO usuarios(rol, nombre, contraseña, correo) VALUES (?, ?, ?, ?)');
    $sql->bind_param("ssss", $rol, $nombre, $password, $correo);
    $sql->execute();
    $sql->close();

    $sql = $database->prepare('SELECT u.id FROM usuarios AS u WHERE u.nombre = ? AND u.correo = ?');
    $sql->bind_param("ss", $nombre, $correo);
    $sql->execute();
    $usuario = $sql->get_result()->fetch_assoc();
    $sql->close();

    $sql = $database->prepare('SELECT c.id FROM contratos AS c WHERE c.cliente = ?');
    $sql->bind_param("s", $cliente);
    $sql->execute();
    $contrato = $sql->get_result()->fetch_assoc();
    $sql->close();

    $sql = $database->prepare('INSERT INTO compañias(usuario, contrato) VALUES (?, ?)');
    $sql->bind_param("ss", $usuario['id'], $contrato['id']);
    $sql->execute();
    $sql->close();

    exportar_usuarios($nombre, $cliente, $correo, $contraseña);
};

header("Location: ../sistema/contratos.php");
exit;
