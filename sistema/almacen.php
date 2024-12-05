<!DOCTYPE html>
<html lang="es">

<?php require "./validar_sesion.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Logo -->

    <!-- Estilos -->
    <link rel="stylesheet" href="../css/almacen.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Almacenes</title>
</head>

<body>
    <?php require "./navbar.php"; ?>

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Lista de Sucursales</h5>

        <div class="card-body">
            <select id="sucursal" class="form-select">
                <option value="">Seleccione una Sucursal</option>

                <?php
                require "../php/base_datos.php";

                $sql = $database->prepare("SELECT * FROM sucursales");
                $sql->execute();
                $sucursales = $sql->get_result();
                $sql->close();

                $html = "";
                while ($sucursal = $sucursales->fetch_assoc()) {
                    $html .= '<option value="' . $sucursal['id'] . '">' . $sucursal['direccion'] . '</option>';
                };

                echo $html;
                ?>
            </select>
        </div>
    </div>

    <div id="almacenes">
        <div class="card caja-formulario border-dark">
            <h5 class="card-header bg-dark text-white">Almacenes</h5>

            <div class="card-body">
                <table class="table table-striped table-dark">
                    <thead></thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<!-- Javascripts -->
<script src="../js/almacen.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>