<?php
function Cargar_Opciones()
{
    require "../php/base_datos.php";

    $html = '<li class="nav-item"><a class="nav-link" href="./inicio.php">Home</a></li>';
    $html .= '<li class="nav-item"><a class="nav-link" href="./sucursal.php">Sucursales</a></li>';

    $sql = $database->prepare('SELECT r.permisos FROM roles AS r, usuarios AS u WHERE u.rol = r.id AND u.nombre = ?');
    $sql->bind_param("s", $_SESSION['usuario']);
    $sql->execute();

    $datos = $sql->get_result()->fetch_assoc();
    $sql->close();
    $json = json_decode($datos['permisos'], true);
    $_SESSION['nivelseguridad'] = $json;

    if (json_last_error() == JSON_ERROR_NONE) {
        if ($json['almacen'] == "si") {
            $html .= '<li class="nav-item"><a class="nav-link" href="./almacen.php">Almacen</a></li>';
        }

        if ($json['contratos'] == "si") {
            $html .= '<li class="nav-item"><a class="nav-link" href="./contratos.php">Contratos</a></li>';
        };

        if ($json['personal'] == "si") {
            $html .= '<li class="nav-item"><a class="nav-link" href="./empleados.php">Empleados</a></li>';
        };

        if ($json['server'] == "si") {
            $html .= '<li class="nav-item"><a class="nav-link" href="./usuarios.php">Usuarios</a></li>';
        };

        $html .= '<li class="nav-item"><a class="nav-link" href="./pedidos.php">Pedidos</a></li>';

        if ($json['ventas'] == "si") {
            $html .= '<li class="nav-item"><a class="nav-link" href="./ventas.php">Ventas</a></li>';
        }

        if ($json['admin'] == "si") {
            $html .= '<li class="nav-item"><a class="nav-link" href="./registro_admin.php">Registro Admin</a></li>';
        };
    } else {
        echo "Revisar los permisos";
    };

    $html .= '<li class="nav-item"><a class="nav-link" href="../php/cerrar_session.php">Cerrar Sesión</a></li>';

    return $html;
};
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"><?php echo Cargar_Opciones(); ?></ul>
    </div>
</nav>