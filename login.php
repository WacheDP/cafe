<!DOCTYPE html>
<html lang="es">

<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: ./sistema/inicio.php");
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Logo -->

    <!-- Estilos -->
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Inicio de Sesión</title>
</head>

<body>
    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Inicio de Sesión</h5>

        <div class="card-body">
            <form action="./php/procesar_login.php" method="post">
                <div class="form-group row caja-input">
                    <label for="ID" class="col-sm-2 col-form-label">Identificación</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ID" name="ID" placeholder="user21 - ejemplo@gmail.com">
                        <small id="help" class="form-text text-muted">* para la identificación puedes utilizar tu nombre de usuario o tu correo electrónico *</small>
                    </div>
                </div>

                <div class="form-group row caja-input">
                    <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="********">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-outline-success" name="btn" value="Ingresar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<!-- Javascripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>