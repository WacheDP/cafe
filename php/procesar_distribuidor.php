<?php
require "./base_datos.php";
require "./crear_contrase%C3%B1as.php";
require "./exportar_usuarios.php";

if (isset($_POST['btn'])) {
    $persona = $_POST['empleado'];
    $usuario = $_POST['user'];
    $comision = $_POST['comision'];
    $correo = $_POST['email'];
    $rol = "92b84cff-b254-11ef-96b5-84a93ea1a4c5";
    $contraseña = random_text();
    $password = password_hash($contraseña, PASSWORD_DEFAULT);

    $sql = $database->prepare('INSERT INTO usuarios(rol, nombre, contraseña, correo) VALUES (?, ?, ?, ?)');
    $sql->bind_param("ssss", $rol, $usuario, $password, $correo);
    $sql->execute();
    $sql->close();

    $sql = $database->prepare('SELECT u.id FROM usuarios AS u WHERE u.nombre = ? AND u.correo = ?');
    $sql->bind_param("ss", $usuario, $correo);
    $sql->execute();
    $iduser = $sql->get_result()->fetch_assoc();
    $sql->close();

    $sql = $database->prepare('INSERT INTO distribuidores(empleado, usuario, comision) VALUES (?, ?, ?)');
    $sql->bind_param("ssd", $persona, $iduser, $comision);
    $sql->execute();
    $sql->close();
};

header("Location: ../sistema/empleados.php");
exit;
