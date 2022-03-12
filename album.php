<?php require_once("header.php"); ?>
<?php require_once("conexion.php"); ?>
<?php 

    if($_POST) {
        // print_r($_POST);
        // Nombre
        $nombre = $_POST['nombre'];
        // Descripcion
        $descripcion = $_POST['descripcion'];
        // Imagen
        $fecha = new DateTime();
        $imagen = $fecha->getTimestamp()."_".$_FILES['archivo']['name'];
        $imagen_temp = $_FILES['archivo']['tmp_name'];
        move_uploaded_file($imagen_temp, "img/$imagen");

        $objconexion = new Conexion();
        $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
        $objconexion->ejecutar($sql);
        header("location: album.php");
    }
    if($_GET) {
        $id = $_GET['borrar'];
        $objconexion = new Conexion();
        $imagen = $objconexion->consultar("SELECT imagen FROM `proyectos` WHERE id = $id");
        unlink("img/".$imagen[0]['imagen']);
        $sql = "DELETE FROM `proyectos` WHERE `proyectos`.`id` = $id";
        $objconexion->ejecutar($sql);
        header("location: album.php");
    }
    
    $objconexion = new Conexion();
    $proyectos = $objconexion->consultar("SELECT * FROM `proyectos`");

    // print_r($resultado);
?>



<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    Datos del proyecto
                </div>
                <div class="card-body">
                    <form action="album.php" method="post" enctype="multipart/form-data">
                        Nombre del proyecto: <input class="form-control" type="text" name="nombre" value="" required>
                        <br>
                        Imagen del proyecto: <input class="form-control" type="file" name="archivo" value="" required>
                        <br>
                        Descripcion del proyecto: <textarea class="form-control" name="descripcion" rows="3" required></textarea>
                        <br>
                        <input type="submit" class="btn btn-success" value="Enviar Proyecto">
                    </form>

                </div>
            </div>

        </div>

        <div class="col-md-7">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($proyectos as $proyecto) { ?>
                        <tr>
                            <td><?=$proyecto['id'];?></td>
                            <td><?=$proyecto['nombre'];?></td>
                            <td>
                                <img src="img/<?=$proyecto['imagen'];?>" width="100">
                            </td>
                            <td><?=$proyecto['descripcion'];?></td>
                            <td> <a name="" id="" class="btn btn-danger" href="?borrar=<?=$proyecto['id'];?>" role="button">Eliminar</a> </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        
        </div>

    </div>
</div>






<?php include("footer.php"); ?>