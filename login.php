<?php
    session_start();
    if ($_POST) {
        if($_POST['usuario'] == "sharko" && $_POST['contraseña'] == "1234") {
            $_SESSION['usuario'] = $_POST['usuario'];
            header("Location: index.php");
        }
        else{
            echo "<script>alert('Usuario y/o contraseña incorrectos');</script>";
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header">
                        Log In
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            Usuario:
                            <input type="text" class="form-control" name="usuario" value="">
                            <br>
                            Contraseña:
                            <input type="password" class="form-control" name="contraseña" value="">
                            <br>
                            <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                        </form>     
                    </div>
                </div> 
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>

    

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>