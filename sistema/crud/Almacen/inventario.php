<!DOCTYPE html>
<html lang="es">

<?php
require "../../validar_sesion.php";
require "../validar_crud.php";
$id = $_GET['id'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Logo -->

    <!-- Estilos -->
    <link rel="stylesheet" href="../../../css/almacen.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Inventario</title>
</head>

<body>
    <?php
    require "../../../php/base_datos.php";
    require "../navbar.php";
    ?>

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white"><?php echo 'Inventario Almacen ' . $id; ?></h5>

        <div class="card-body">
            <h3 class="card-title">ACTIVOS</h3>

            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Objeto</th>
                        <th scope="col">Costo por Unidad</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Fecha de Adquisición</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $sql = $database->prepare('SELECT a.objeto, aa.id, aa.costo_unidad, aa.cantidad, aa.fecha_adquisicion, aa.estado FROM activos AS a, almacen_activos AS aa WHERE a.id = aa.objeto AND aa.almacen = ?');
                    $sql->bind_param("s", $id);
                    $sql->execute();

                    $activos = $sql->get_result();
                    $sql->close();

                    $html = "";
                    $num = 1;
                    while ($objeto = $activos->fetch_assoc()) {
                        $html .= '<tr><th scope="row">' . $num . '</th>';
                        $html .= '<td>' . $objeto['objeto'] . '</td>';
                        $html .= '<td>' . $objeto['costo_unidad'] . '$</td>';
                        $html .= '<td>' . $objeto['cantidad'] . '</td>';
                        $html .= '<td>' . $objeto['fecha_adquisicion'] . '</td>';
                        $html .= '<td>' . $objeto['estado'] . '</td>';
                        $html .= '<td><a href="./form2.php?sebo=1&id=' . $objeto['id'] . '">';
                        $html .= '<button type="button" class="btn btn-outline-success">';
                        $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">';
                        $html .= '<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>';
                        $html .= '</svg></button></a></td>';
                        $html .= '<td><a href="./borrar2.php?id=' . $objeto['id'] . '">';
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

            <h3 class="card-title">MERCANCÍAS</h3>

            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Costo por Unidad</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Condición</th>
                        <th scope="col">Fecha de Adquisición</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = $database->prepare('SELECT m.producto, am.id, am.cantidad, am.precio_unidad, am.condicion, am.estado, am.fecha_adquisicion FROM mercancias AS m, almacen_mercancia AS am WHERE m.id = am.mercancia AND am.almacen = ?');
                    $sql->bind_param("s", $id);
                    $sql->execute();

                    $mercancia = $sql->get_result();
                    $sql->close();

                    $html = "";
                    $num = 1;
                    while ($producto = $mercancia->fetch_assoc()) {
                        $html .= '<tr><th scope="row">' . $num . '</th>';
                        $html .= '<td>' . $producto['producto'] . '</td>';
                        $html .= '<td>' . $producto['precio_unidad'] . '$</td>';
                        $html .= '<td>' . $producto['cantidad'] . '</td>';
                        $html .= '<td>' . $producto['condicion'] . '</td>';
                        $html .= '<td>' . $producto['fecha_adquisicion'] . '</td>';
                        $html .= '<td>' . $producto['estado'] . '</td>';
                        $html .= '<td><a href="./form3.php?sebo=1&id=' . $producto['id'] . '">';
                        $html .= '<button type="button" class="btn btn-outline-success">';
                        $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">';
                        $html .= '<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>';
                        $html .= '</svg></button></a></td>';
                        $html .= '<td><a href="./borrar3.php?id=' . $producto['id'] . '">';
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
        <h5 class="card-header bg-dark text-white">Agregar Nuevo Activo</h5>

        <div class="card-body">
            <form action="../../../php/procesar_activo.php" method="post">
                <input type="hidden" name="almacen" value="<?php echo $id; ?>">

                <div class="form-group row caja-input">
                    <label for="objeto" class="col-sm-2 col-form-label">Objeto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="objeto" name="objeto" placeholder="Herramienta o Maquinaría" maxlength="30" required>
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

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Agregar Nuevo Producto</h5>

        <div class="card-body">
            <form action="../../../php/procesar_mercancia.php" method="post">
                <input type="hidden" name="almacen" value="<?php echo $id; ?>">

                <div class="form-group row caja-input">
                    <label for="producto" class="col-sm-2 col-form-label">Producto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="producto" name="producto" placeholder="Frutas, Cultivos, Plantaciones, etc" maxlength="30" required>
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

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Almacenar Activos</h5>

        <div class="card-body">
            <form action="../../../php/almacenar_activos.php" method="post">
                <input type="hidden" name="almacen" value="<?php echo $id; ?>">

                <select id="obj" name="obj" class="form-select caja-input" required>
                    <option value="">Seleccione el activo</option>

                    <?php
                    $sql = $database->prepare('SELECT * FROM activos');
                    $sql->execute();
                    $activos = $sql->get_result();
                    $sql->close();

                    $html = "";
                    while ($objeto = $activos->fetch_assoc()) {
                        $html .= '<option value="' . $objeto['id'] . '">' . $objeto['objeto'] . '</option>';
                    };

                    echo $html;
                    ?>
                </select>

                <div class="form-group row caja-input">
                    <label for="costo" class="col-sm-2 col-form-label">Costo por Unidad</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" id="costo" name="costo" placeholder="20.50" required>
                    </div>
                </div>

                <div class="form-group row caja-input">
                    <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="10" required>
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

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Almacenar Mercancia</h5>

        <div class="card-body">
            <form action="../../../php/almacenar_mercancia.php" method="post">
                <input type="hidden" name="almacen" value="<?php echo $id; ?>">

                <select id="mercancia" name="mercancia" class="form-select caja-input" required>
                    <option value="">Seleccione el producto</option>

                    <?php
                    $sql = $database->prepare('SELECT * FROM mercancias');
                    $sql->execute();
                    $mercancias = $sql->get_result();
                    $sql->close();

                    $html = "";
                    while ($mercancia = $mercancias->fetch_assoc()) {
                        $html .= '<option value="' . $mercancia['id'] . '">' . $mercancia['producto'] . '</option>';
                    };

                    echo $html;
                    ?>
                </select>

                <div class="form-group row caja-input">
                    <label for="condicion" class="col-sm-2 col-form-label">Condición</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="condicion" name="condicion" maxlength="30">
                    </div>
                </div>

                <div class="form-group row caja-input">
                    <label for="costo2" class="col-sm-2 col-form-label">Costo por Unidad</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" id="costo2" name="costo2" placeholder="20.50" required>
                    </div>
                </div>

                <div class="form-group row caja-input">
                    <label for="cantidad2" class="col-sm-2 col-form-label">Cantidad</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cantidad2" name="cantidad2" placeholder="10" required>
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
<script src="../../../js/inventario.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>