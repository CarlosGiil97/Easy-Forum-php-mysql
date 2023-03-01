<?php 
    session_start();
    include_once './conex.php';
    $idUser = $_SESSION['id'] ?? null;

    $apartadosRemove = [];

    $sql = "SELECT * FROM apartados WHERE creador = $idUser";
   
    foreach ($conn->query($sql) as $fila) {  
        $apartadosRemove[] = $fila;
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
    <?php include __DIR__. '/header.php'?>

  </head>
  <?php include 'header.php'?>
  <?php include './components/navbar.php'?>
  <body>
    <main>
    <section class="vh-100" style="background-color: antiquewhite;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Eliminar tema</p>
                    <?php if(!empty($apartadosRemove)){ ?>
                        <form class="mx-1 mx-md-4">

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                
                                <label class="form-label" for="form3Example1c">Tema</label>
                                    <select id="apartRemove" class="form-select" name="apartRemove">
                                        <option value="">Selecione tema</option>
                                        <?php foreach ($apartadosRemove as $apart) {?>
                                            <option value="<?php echo $apart["id"]?>"><?php echo $apart["rotulo"]?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                        
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="button" class="btn btn-danger btn-lg" onclick="removeApart()">Eliminar tema</button>
                            </div>

                        </form>

                    <?php }else { ?>
                        <h5>Actualmente no puedes borrar ningún tema porque no has creado ninguno</h5>
                    <?php }?>
                    
                </div>
                
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    </main>
    <?php 
      include_once './cookie.php';
    ?>
  </body>
</html>

