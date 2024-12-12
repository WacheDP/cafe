<!DOCTYPE html>
<html lang="es">

<?php require "./validar_sesion.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Logo -->

    <!-- Estilos -->
    <link rel="stylesheet" href="../css/registeradmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Registrar Nuevo Admin</title>
</head>

<body>
    <?php require "./navbar.php"; ?>

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Registro de Administradores</h5>

        <div class="card-body">
            <form action="../php/procesar_registroadmin.php" method="post">
                <div class="form-group row caja-input">
                    <label for="user" class="col-sm-2 col-form-label">Nombre de Usuario</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="user" name="user" placeholder="user21" required maxlength="20">
                    </div>
                </div>

                <div class="form-group row caja-input">
                    <label for="email" class="col-sm-2 col-form-label">Correo Electrónico</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@gmail.com" required maxlength="100">
                    </div>
                </div>

                <div class="form-group row caja-input">
                    <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-outline-success" name="btn" value="Registrar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<!-- Javascripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>