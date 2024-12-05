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

    <title>Editar Almacen</title>
</head>

<body>
    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white"><?php echo 'Almacen ' . $id; ?></h5>

        <div class="card-body">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require "../../../php/base_datos.php";

                    $sql = $database->prepare('SELECT * FROM almacenes WHERE id = ?');
                    $sql->bind_param("s", $id);
                    $sql->execute();

                    $almacen = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $html = "";
                    $num = 1;
                    $html .= '<tr>';
                    $html .= '<th scope="row">' . $num . '</th>';
                    $html .= '<td>' . $almacen['direccion'] . '</td>';
                    $html .= '<td>' . $almacen['estado'] . '</td>';
                    $html .= '</tr>';

                    echo $html;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Editar Almacen</h5>

        <div class="card-body">
            <form action="./editar.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-group caja-input">
                    <label for="dir">Dirección</label>
                    <textarea class="form-control" id="dir" name="dir" rows="3" maxlength="100"></textarea>
                </div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>