<?php
require "../../../php/base_datos.php";

$id = $_GET['id'];

$sql = $database->prepare('DELETE FROM empleados WHERE id = ?');
$sql->bind_param("s", $id);
$sql->execute();
$sql->close();

header("Location: ../../empleados.php");
exit;
