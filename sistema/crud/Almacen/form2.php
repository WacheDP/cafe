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
        <h5 class="card-header bg-dark text-white"><?php echo 'Registro ' . $id; ?></h5>

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
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = $database->prepare('SELECT a.objeto AS objeto, aa.costo_unidad, aa.cantidad, aa.fecha_adquisicion, aa.estado FROM almacen_activos AS aa, activos AS a WHERE aa.id = ? AND a.id = aa.objeto');
                    $sql->bind_param("s", $id);
                    $sql->execute();

                    $activo = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $html = "";
                    $num = 1;
                    $html .= '<tr><th scope="row">' . $num . '</th>';
                    $html .= '<td>' . $activo['objeto'] . '</td>';
                    $html .= '<td>' . $activo['costo_unidad'] . '$</td>';
                    $html .= '<td>' . $activo['cantidad'] . '</td>';
                    $html .= '<td>' . $activo['fecha_adquisicion'] . '</td>';
                    $html .= '<td>' . $activo['estado'] . '</td></tr>';

                    echo $html;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Editar Almacen</h5>

        <div class="card-body">
            <form action="./editar2.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-group row caja-input">
                    <label for="costo" class="col-sm-2 col-form-label">Costo por Unidad</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" id="costo" name="costo" placeholder="20.50">
                    </div>
                </div>

                <div class="form-group row caja-input">
                    <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="10">
                    </div>
                </div>

                <select class="form-select caja-input" name="almacen">
                    <option value="">Seleccione el nuevo almacen</option>

                    <?php
                    $sql = $database->prepare('SELECT * FROM almacenes AS a WHERE a.estado = "En buen estado"');
                    $sql->execute();
                    $almacenes = $sql->get_result();
                    $sql->close();

                    $html = "";
                    while ($almacen = $almacenes->fetch_assoc()) {
                        $html .= '<option value="' . $almacen['id'] . '">' . $almacen['direccion'] . '</option>';
                    };

                    echo $html;
                    ?>
                </select>

                <select class="form-select caja-input" name="estado">
                    <option value="">Seleccione el estado</option>
                    <option value="En buen estado">En buen estado</option>
                    <option value="Deshabilitado">Deshabilitado</option>
                    <option value="En reparación">En reparación</option>
                </select>

                <div class="form-group row caja-input">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-outline-success" name="btn" value="Editar">
                    </div>
                </div>

                <div class="form-group row caja-input">
                    <div class="col-sm-10">
                        <a href="../../almacen.php"><button type="button" class="btn btn-outline-danger">Cancelar</button></a>
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