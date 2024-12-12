<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
	$nombreusuario = $_POST['user'];
	$correo = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$rol = "b7ce58d1-b19c-11ef-96b5-84a93ea1a4c5";

	$sql = $database->prepare('INSERT INTO usuarios(rol, nombre, contraseña, correo) VALUES (?, ?, ?, ?)');
	$sql->bind_param("ssss", $rol, $nombreusuario, $password, $correo);
	$sql->execute();
	$sql->close();
};

header("Location: ../sistema/registro_admin.php");
exit;
