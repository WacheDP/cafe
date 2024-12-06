<?php
require "../../../php/base_datos.php";

if (isset($_POST['btn'])) {
    $id = $_POST['id'];
    $direccion = $_POST['dir'];
    $estado = $_POST['estado'];

    if (!empty($direccion)) {
        $sql = $database->prepare('UPDATE almacenes SET direccion = ? WHERE id = ?');
        $sql->bind_param("ss", $direccion, $id);
        $sql->execute();
        $sql->close();
    };

    if (!empty($estado)) {
        $sql = $database->prepare('UPDATE almacenes SET estado = ? WHERE id = ?');
        $sql->bind_param("ss", $estado, $id);
        $sql->execute();
        $sql->close();
    };
};

header("Location: ../../almacen.php");
exit;
