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
    <link rel="stylesheet" href="../../../css/contrato.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Editar Contrato</title>
</head>

<body>
    <?php
    require "../navbar.php";
    require "../../../php/base_datos.php";
    ?>

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white"><?php echo 'Cliente ' . $id; ?></h5>

        <div class="card-body">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Compañia</th>
                        <th scope="col">Inicio del Contrato</th>
                        <th scope="col">Fin del Contrato</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = $database->prepare('SELECT * FROM contratos WHERE id=?');
                    $sql->bind_param("s", $id);
                    $sql->execute();

                    $contrato = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $html = "";
                    $num = 1;
                    $html .= '<tr>';
                    $html .= '<th scope="row">' . $num . '</th>';
                    $html .= '<td>' . $contrato['cliente'] . '</td>';
                    $html .= '<td>' . $contrato['fecha_inicio'] . '</td>';
                    $html .= '<td>' . $contrato['fecha_fin'] . '</td>';
                    $html .= '<td>' . $contrato['estado'] . '</td>';
                    $html .= '</tr>';

                    echo $html;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card caja-formulario border-dark">
        <h5 class="card-header bg-dark text-white">Editar Contrato</h5>

        <div class="card-body">
            <form action="./editar.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-group row caja-input">
                    <label for="vencimiento" class="col-sm-2 col-form-label">Vencimiento</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="vencimiento" name="vencimiento" placeholder="Nombre de la Compañía" required>
                    </div>
                </div>

                <select class="form-select caja-input" name="estado">
                    <option value="">Seleccione el estado</option>
                    <option value="Vigente">Vigente</option>
                    <option value="Deshabilitado">Deshabilitado</option>
                </select>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-outline-success" name="btn" value="Editar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<!-- Javascripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>