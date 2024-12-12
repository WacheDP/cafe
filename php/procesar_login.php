<?php
require "./base_datos.php";

if (isset($_POST['btn'])) {
    $ID = $_POST['ID'];
    $password = $_POST['password'];

    $sql = $database->prepare('SELECT u.contraseña, u.nombre FROM usuarios AS u WHERE u.nombre = ? OR u.correo = ?');
    $sql->bind_param("ss", $ID, $ID);
    $sql->execute();

    $res = $sql->get_result()->fetch_assoc();
    $sql->close();
    if (password_verify($password, $res['contraseña'])) {
        session_start();
        $_SESSION['usuario'] = $res['nombre'];
        header("Location: ../sistema/inicio.php");
        exit;
    } else {
        $alerta = '
        <script>
            alert("Contraseña Incorrecta");
            window.location.href = "../login.php";
        </script>
        ';

        echo $alerta;
        exit;
    };
} else {
    header("Location: ../login.php");
    exit;
};
