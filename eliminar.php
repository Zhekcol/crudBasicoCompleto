<?php 

include('setup.php');

$id = $_GET['id'];

$img = $conex->query("SELECT imagen FROM proyectos WHERE id=$id");
$imagen = $img->fetch_assoc();
unlink("img/".$imagen['imagen']);

$sql = "DELETE FROM proyectos WHERE id=$id";

if ($conex->query($sql) === TRUE) {
    header("Location: portafolio.php");
} else {
    echo "Error al eliminar el usuario: " . $conex->error;
}

?>