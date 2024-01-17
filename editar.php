<?php include('header.php') ?>

<?php include('setup.php');

if ($_POST ) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $fecha = new DateTime();

    $imagen = $fecha->getTimestamp()."_".$_FILES['imagen']['name'];

    $imagen_temporal = $_FILES['imagen']['tmp_name'];

    move_uploaded_file($imagen_temporal, "img/".$imagen);

    //Elimina imagen que existia en el servidor con ese registro y la reemplaza por la nueva seleccionada
    $img = $conex->query("SELECT imagen FROM proyectos WHERE id=$id");
    $imagen_anterior = $img->fetch_assoc();
    unlink("img/".$imagen_anterior['imagen']);

    $sql = "UPDATE proyectos SET nombre='$nombre', imagen='$imagen', descripcion='$descripcion' WHERE id=$id";

    if ($conex->query($sql) === TRUE) {
        header('Location: portafolio.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conex->error;
    }
} else {
    $id = $_GET['id'];
    $result = $conex->query("SELECT * FROM proyectos WHERE id=$id");
    $row = $result->fetch_assoc();
}

?>

<br>
<div class="container">
    <div class="row">
            <div class="card">
                <div class="card-header">Editar proyecto</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <label>
                                Nombre del proyecto:
                                <input type="text" name="nombre" class="form-control" value="<?= $row['nombre'] ?>">
                                <br>
                            </label>
                            <br>
                            <label>
                                Imágen del proyecto:
                                <?php if (!empty($row['imagen'])) { ?>
                                    <img src="img/<?= $row['imagen'] ?>" alt="" width="200">
                                <?php } ?>
                                <input type="file" name="imagen" class="form-control">
                            </label>
                            <br>
                            <br>
                            <label>
                                Descripción del proyecto:
                                <textarea name="descripcion" cols="40" rows="5" class="form-control"><?= $row['descripcion'] ?></textarea>
                            </label>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a class="btn btn-primary" href="portafolio.php">Volver</a>
                        </form>
                    </div>
            </div>
    </div>
</div>
