<?php include('header.php') ?>

<?php include('setup.php');

$proyectos = $conex->query("SELECT * FROM proyectos");

?>

    <div class="row align-items-md-stretch">
        <div class="col-md">
            <br>
            <div class="h-100 p-5 text-white bg-primary border rounded-3">
                <h1>Bienvenid@ <?= $_SESSION['usuario'] ?></h1>
                <p>
                    <strong>
                        Esta es la sección o página donde se muestran
                        los diferentes proyectos que se crean en la sección de
                        portafolios.
                        <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi excepturi dolorum alias iusto, laudantium ex reprehenderit odio provident beatae dolores voluptate laborum architecto temporibus illum tempore non porro. Commodi, praesentium.
                    </strong>
                </p>
            </div>
        </div>
    </div>
<br><br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($proyectos as $proyecto) { ?>
            <div class="col">
                <div class="card">
                <img src="img/<?= $proyecto['imagen'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $proyecto['nombre'] ?></h5>
                    <p class="card-text"><?= $proyecto['descripcion'] ?></p>
                </div>
                </div>
            </div>
        <?php } ?>
    </div>
    
<?php include('footer.php') ?>