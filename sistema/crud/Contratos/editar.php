<?php
require "../../../php/base_datos.php";

if (isset($_POST['btn'])) {
    $id = $_POST['id'];

    if (!empty($_POST['estado'])) {
        $sql = $database->prepare('UPDATE contratos SET estado = ? WHERE id = ?');
        $sql->bind_param("ss", $_POST['estado'], $id);
        $sql->execute();
        $sql->close();
    };

    if (!empty($_POST['vencimiento'])) {
        $sql = $database->prepare('UPDATE contratos SET fecha_fin = ? WHERE id = ?');
        $sql->bind_param("ss", $_POST['vencimiento'], $id);
        $sql->execute();
        $sql->close();
    };
};

header("Location: ../../contratos.php");
exit;
