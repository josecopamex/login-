<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "biblioteca";

// Crear conexión
$cont = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($cont->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}



?>


