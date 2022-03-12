<?php require_once("header.php"); ?>
<?php require_once("conexion.php"); ?>
<?php 
    $objconexion = new Conexion();
    $proyectos = $objconexion->consultar("SELECT * FROM `proyectos`");
?>




<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Bienevenidos</h1>
        <p class="lead">Este es mi portafolio</p>
        <hr class="my-2">
        <p>Más información</p>
    </div>
</div>


    



<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach($proyectos as $proyecto) { ?>
        <div class="col">
            <div class="card">
            <img src="img/<?=$proyecto['imagen'];?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$proyecto['nombre'];?></h5>
                <p class="card-text"><?=$proyecto['descripcion'];?></p>
            </div>
            </div>
        </div>
    <?php } ?>
</div>


<br>

<?php include("footer.php"); ?>