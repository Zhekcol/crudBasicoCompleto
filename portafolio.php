<?php include('header.php') ?>
<?php include('setup.php');

$proyectos = $conex->query("SELECT * FROM proyectos");

if ($_POST) {
    $nombre = $_POST['nombre'];
    if (empty($nombre)) {
        $errores['nombre'] = "<p style='color: #E21818;'>Campo <strong>Nombre del proyecto</strong> es obligatorio.</p>";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nombre)) {
        $errores['nombre'] = "Solo se permiten letras y espacios en el campo Nombre del proyecto.";
    }

    $descripcion = $_POST['descripcion'];
    if (empty($descripcion)) {
        $errores['descripcion'] = "<p style='color: #E21818;'>Campo <strong>Descripción del proyecto</strong> es obligatorio.</p>";
    }

    $fecha = new DateTime();
    $imagen = "";
    
    if (empty($_FILES['imagen']['name'])) {
        $errores['imagen'] = "<p style='color: #E21818;'>Campo <strong>Imágen del proyecto</strong> es obligatorio.</p>";
    }else {
        $imagen = $fecha->getTimestamp()."_".$_FILES['imagen']['name'];
        $imagen_temporal = $_FILES['imagen']['tmp_name'];
    
        move_uploaded_file($imagen_temporal, "img/".$imagen);
    }


    if (empty($errores)) {
        print_r($errores);
        $sql = "INSERT INTO proyectos (nombre, imagen, descripcion) 
    VALUES ('$nombre', '$imagen', '$descripcion')";

    if ($conex->query($sql) == TRUE) {
        header("Location:portafolio.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conex->error;
    }
    }
    
}
?>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card border border-primary rounded-0">
                <div class="card-header border border-primary rounded-0"><strong>Datos del Proyecto</strong></div>
                    <div class="card-body border border-primary">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                            <label>
                                Nombre del proyecto:
                                <input type="text" name="nombre" class="form-control" value="<?= isset($nombre) ? $nombre : "" ?>">
                                <?= !isset($errores['nombre']) ? "" : $errores['nombre'] ?>
                            </label>
                            <br>
                            <label>
                                Imágen del proyecto:
                                <input type="file" name="imagen" class="form-control">
                                <?= !isset($errores['imagen']) ? "" : $errores['imagen'] ?>
                            </label>
                            <br>
                            <label>
                                Descripción del proyecto:
                                <textarea name="descripcion" cols="10" rows="5" class="form-control" ><?= isset($descripcion) ? $descripcion : "" ?></textarea>
                                <?= !isset($errores['descripcion']) ? "" : $errores['descripcion'] ?>
                            </label>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Envíar proyecto</button>
                        </form>
                    </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="table-responsive">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">IMÁGEN</th>
                            <th scope="col">DESCRIPCIÓN</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($proyectos as $proyecto) { ?>
                        <tr>
                            <td><?= $proyecto['id'] ?></td>
                            <td><?= $proyecto['nombre'] ?></td>
                            <td>
                                <img width="100" src="img/<?= $proyecto['imagen'] ?>" alt="">
                            </td>

                            <td><?= $proyecto['descripcion'] ?></td>
                            <td>
                                <a class="btn btn-danger" href="eliminar.php?id=<?= $proyecto['id'] ?>">Eliminar</a>
                                <a class="btn btn-warning" href="editar.php?id=<?= $proyecto['id'] ?>">Editar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php') ?>
