<?php
include('setup.php');

$users = $conex->query("SELECT * FROM usuarios");
session_start();

foreach ($users as $user) {
    if ($_POST) {
        if (($_POST['user'] == $user['nombre']) && ($_POST['password'] == $user['contraseña'])) {
            $_SESSION['usuario'] = $_POST['user'];
            header("Location:index.php");
        } else {
            echo "<script> alert('Usuario o Contraseña incorrecta.') </script>";
        }
    }
}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Iniciar Sesión</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                
            </div>
            <div class="col-md-6">
                <br>
                <div class="card text-bg-dark">
                    <div class="card-header"><strong>Iniciar Sesión</strong></div>
                    <div class="card-body">
                        <form action="" method="post">
                        <div class="form-group row">
                            <label>
                                <div class="col-sm-12">
                                    Usuario:
                                    <input type="text" name="user" class="form-control" required>
                                </div>
                            </label>
                            <br>
                            <label><br>
                                <div class="col-sm-12">
                                    Contraseña:
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </label>
                        </div>
                        <br>
                            <button type="submit" class="btn btn-success">Ingresar</button>
                            <a href="register.php" class="btn btn-danger" style="color: white;">Registrarse</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
    </div>
    </body>
</html>
