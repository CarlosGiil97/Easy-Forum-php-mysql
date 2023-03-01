<?php 
  ob_start();
  session_start();

  if(empty($_SESSION)){
     //redirijo a login
     header("Location: login.php");
     die();
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foro</title>

    <link rel="icon" href="./favicon.ico" type="image/x-icon">    
  </head>
  <?php include './header.php'?>
  <?php include './components/navbar.php'?>
  <body>
    <main>
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <center>
            <h1 class="mt-5">Bienvenid@ <?=$_SESSION['nombre']?></h1>
            <hr>
            <h5>Foro de coches : Tecnomanía</h5>
            <?php include_once './listaApartados.php';?>
            <a class="btn btn-success mt-5" href="insertartema.php">Añadir nuevo tema</a>
          </center>

          
        </div>
      </div>
        
    </main>
    <?php 
      include_once './cookie.php';
    ?>
  </body>
</html>