<?php include('setup.php');

if ($_POST) {

    $user = validarCampo($_POST['user']);
    if (empty($user)) {
        $errores['user'] = "<p style='color: #E21818;'>El campo <strong>Usuario</strong> es obligatorio.</p>";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $user)) {
        $errores['user'] = "Solo se permiten letras y espacios en el campo Usuario.";
    }

    $email = validarCampo($_POST['email']);
    if (empty($email)) {
        $errores['email'] = "<p style='color: #E21818;'>El campo <strong>Correo eletrónico</strong> es obligatorio.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "Formato de correo electrónico inválido.";
    }

    $password = validarCampo($_POST['password']);
    if (empty($password)) {
        $errores['password'] = "<p style='color: #E21818;'>El campo <strong>Contraseña</strong> es obligatorio.</p>";
    } elseif (strlen($password) < 6) {
        $errores['password'] = "La contraseña debe tener al menos 6 caracteres.";
    }

    if (empty($errores)) {    
        $sql = "INSERT INTO usuarios (nombre, correo, contraseña) 
        VALUES ('$user', '$email', '$password')";

        if ($conex->query($sql) === TRUE) {
            header('Location: login.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conex->error;
        }
    }

}

function validarCampo($campo) {
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Crear nuevo Usuario</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
        <script defer src="register.js"></script>
    </head>
    <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                
            </div>
            <div class="col-md-6">
                <br>
                <div class="card text-bg-dark">
                    <div class="card-header"><strong>Registrar Usuario</strong></div>
                    <div class="card-body">
                        <form action="" method="post" id="registro">
                        <div class="form-group row">
                            <label>
                                <div class="col-sm-12">
                                    Usuario:
                                    <input type="text" name="user" class="form-control" id="user" required>
                                    <?= !isset($errores) ? "" : $errores['user'] ?>
                                    <div id="errorUser"></div>
                                </div>
                            </label>
                            <br>
                            <label><br>
                                <div class="col-sm-12">
                                    Correo electrónico:
                                    <input type="email" name="email" class="form-control" id="email" required>
                                    <?= !isset($errores) ? "" : $errores['email'] ?>
                                    <div id="errorEmail"></div>
                                </div>
                            </label>
                            <label><br>
                                <div class="col-sm-12">
                                    Contraseña:
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    <?= !isset($errores) ? "" : $errores['password'] ?>
                                    <div id="errorPassword"></div>
                                </div>
                            </label>
                        </div>
                        <br>
                            <button type="submit" class="btn btn-success">Crear Usuario</button>
                            <a href="login.php" class="btn btn-primary" style="color: white;">Cancelar</a>
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