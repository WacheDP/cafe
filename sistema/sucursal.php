<!DOCTYPE html>
<html lang="es">

<?php require "./validar_sesion.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Logo -->

    <!-- Estilos -->
    <link rel="stylesheet" href="../css/sucursal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Sucursales</title>
</head>

<body>
    <?php require "./navbar.php"; ?>

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Inicio de Sesión</h5>

        <div class="card-body">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Dirección</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require "../php/base_datos.php";

                    $sql = $database->prepare('SELECT * FROM sucursales');
                    $sql->execute();

                    $sucursales = $sql->get_result();
                    $sql->close();

                    $html = "";
                    $num = 1;
                    while ($sucursal = $sucursales->fetch_assoc()) {
                        $html .= '<tr>';
                        $html .= '<th scope="row">' . $num . '</th>';
                        $html .= '<td>' . $sucursal['direccion'] . '</td>';
                        $html .= '</tr>';

                        $num++;
                    };

                    echo $html;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    $json = $_SESSION['nivelseguridad'];

    if ($json['sucursal'] == 'si'): ?>
        <div class="card caja-formulario border-dark">
            <h5 class="card-header bg-dark text-white">Incorporar Nueva Sucursal</h5>

            <div class="card-body">
                <form action="../php/procesar_sucursal.php" method="post">
                    <div class="form-group caja-input">
                        <label for="dir">Dirección</label>
                        <textarea class="form-control" id="dir" name="dir" rows="3"></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-outline-success" name="btn" value="Ingresar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
</body>

<!-- Javascripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>