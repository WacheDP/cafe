<?php
function exportar_usuarios($usuario, $cliente, $correo, $password)
{
    $nombre_archivo = $cliente . '.txt';

    $contenido = '
    Cliente: ' . $cliente . ', Usuario: ' . $usuario . ', Correo: ' . $correo . ', Contraseña: ' . $password . ';
    ';

    file_put_contents($nombre_archivo, $contenido, FILE_APPEND);
};
