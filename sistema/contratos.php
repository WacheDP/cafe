<!DOCTYPE html>
<html lang="es">

<?php require "./validar_sesion.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Logo -->

    <!-- Estilos -->
    <link rel="stylesheet" href="../css/contrato.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Clientes</title>
</head>

<body>
    <?php require "./navbar.php"; ?>

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Lista de Clientes</h5>

        <div class="card-body">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Compañia</th>
                        <th scope="col">Inicio del Contrato</th>
                        <th scope="col">Fin del Contrato</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require "../php/base_datos.php";

                    $sql = $database->prepare('SELECT * FROM contratos');
                    $sql->execute();

                    $contratos = $sql->get_result();
                    $sql->close();

                    $html = "";
                    $num = 1;
                    while ($cliente = $contratos->fetch_assoc()) {
                        $html .= '<tr>';
                        $html .= '<th scope="row">' . $num . '</th>';
                        $html .= '<td>' . $cliente['cliente'] . '</td>';
                        $html .= '<td>' . $cliente['fecha_inicio'] . '</td>';
                        $html .= '<td>' . $cliente['fecha_fin'] . '</td>';
                        $html .= '<td>' . $cliente['estado'] . '</td>';
                        $html .= '<td><a href="./crud/Contratos/editar.php?sebo=1&id=' . $cliente['id'] . '">';
                        $html .= '<button type="button" class="btn btn-outline-success">';
                        $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">';
                        $html .= '<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>';
                        $html .= '</svg></button></a></td>';
                        $html .= '<td><a href="./crud/Contratos/borrar.php?id=' . $cliente['id'] . '">';
                        $html .= '<button type="button" class="btn btn-outline-danger">';
                        $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">';
                        $html .= '<path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>';
                        $html .= '</svg></button></a></td></tr>';

                        $num++;
                    };

                    echo $html;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Crear Nuevo Contrato</h5>

        <div class="card-body">
            <form action="../php/procesar_contrato.php" method="post">
                <div class="form-group row caja-input">
                    <label for="cliente" class="col-sm-2 col-form-label">Cliente</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Nombre de la Compañía" required>
                    </div>
                </div>

                <div class="form-group row caja-input">
                    <label for="vencimiento" class="col-sm-2 col-form-label">Vencimiento</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="vencimiento" name="vencimiento" placeholder="Nombre de la Compañía" required>
                    </div>
                </div>

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

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-outline-success" name="btn" value="Crear">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<!-- Javascripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>