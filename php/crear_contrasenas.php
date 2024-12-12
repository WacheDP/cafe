<?php
function random_text()
{
    $caracteres_permitidos = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longitud = 10;

    $cadena_aleatoria = substr(str_shuffle(str_repeat($caracteres_permitidos, ceil($longitud / strlen($caracteres_permitidos)))), 0, $longitud);

    return $cadena_aleatoria;
};
