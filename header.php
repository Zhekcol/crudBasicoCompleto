<?php 
include('setup.php');
$users = $conex->query("SELECT nombre FROM usuarios");

session_start();
foreach ($users as $user) {
    if (isset($_SESSION['usuario']) != $user['nombre']) {
    header('location:login.php');
}}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<br>

<div class="container">

    <nav class="navbar navbar-expand-md bg-primary rounded-3">
    <div class="container-fluid">
            <a href="index.php" class="navbar-brand" style="color: #e3f2fd;">Inicio</a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbar-toggler">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
            <a class="navbar-brand" aria-current="page" href="portafolio.php" style="color: #e3f2fd;">Portafolio</a>
            </li>
        </ul>
        <span class="navbar-text">
            <a href="signout.php" class="navbar-brand" style="color: #e3f2fd;">Cerrar sesión</a> 
        </span>
        </div>
    </div>
    </nav>
