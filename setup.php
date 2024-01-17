<?php 

$host = "localhost";
$user = "root";
$password = "";
$database = "crudmiocompleto";

$conex = new mysqli($host, $user, $password, $database);

if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

// $conex->close();

?>