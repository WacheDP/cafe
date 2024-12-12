<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: ./sistema/inicio.php");
    exit;
}
