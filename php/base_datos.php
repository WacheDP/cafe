<?php
$database = new mysqli("localhost", "root", "", "cafedonbelen");
$database->set_charset("utf8");

if ($database->connect_errno) {
    $error = '<script>alert("Error ';
    $error .= $database->connect_error;
    $error .= '");</script>';

    echo $error;
};
