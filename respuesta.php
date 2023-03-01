<?php 
    session_start();
    include_once './conex.php';
    $respuestas = [];
    $idApartado = $_GET["id"];
    $idUser = $_SESSION['id'];

    $sql = "SELECT *,u.nombre AS user_creador,u.id AS user_id  FROM apartados a  INNER JOIN usuarios u ON u.id = a.creador WHERE a.id = ". $idApartado;

    foreach ($conn->query($sql) as $fila) {
        $user = $fila['usuario'];
       
        $rotulo = $fila['rotulo'];
    }

    //compruebo cuantas respuestas tiene
    $sql = "SELECT r.*, u.usuario AS usuarioNombre FROM respuestas r  INNER JOIN usuarios u ON U.id = r.usuario WHERE r.apartados = ". $idApartado . " ORDER BY r.fecha DESC";
    foreach ($conn->query($sql) as $fila) {
        $respuestas[] = $fila;
    }



    

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foro</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    
  </head>
  <?php include './header.php'?>
  <?php include './components/navbar.php'?>
  <body>
    <main>
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <center>
            <h5 class="mt-5"><u>Leyendo tema :</u> <?=$rotulo?> | <u>Autor :</u> <?=$user?> | <u>Respuestas:</u> <?=count($respuestas)?></h5>
            <div class="table-wrapper-scroll-y my-custom-scrollbar">

            <table class="table table-bordered table-striped mb-0">
                <thead>
                <tr>
                    
                    <th scope="col">Autor</th>
                    <th scope="col">Respuesta</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Fecha</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($respuestas)) {?>
                        
                        <?php foreach($respuestas as $rep) {?>
                            <tr>
                          
                                <th scope="row"><?php echo $rep['usuarioNombre'];?></th>
                                <th scope="row"><?php echo $rep['respuesta'];?></th>
                                <th scope="row">
                                    <?php if(!empty($rep['imagen']) && $rep['imagen'] != ''){?>
                                        <img class="image-preview" width="250" height="250" src="imagenes/<?=$rep['imagen']?>.png">
                                    <?php } ?>
                                </th>
                                <th scope="row"><?php echo $rep['fecha'];?></th>

                            </tr>
                        <?php }?>
                
                    
                    <?php } else { ?>
                        <tr>
                            <td colspan="5">No existen respuestas para este apartado</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            </div>
          </center>

          
        </div>
        <hr class="m-5"/>
        <div class="col-lg-12 col-xl-11 bg-gray">
            <center>
                <h6>Nueva respuesta</h6>
            </center>

            <div class="container">
                <div class="row align-items-start">
                    <div class="col">
                        <label class="font-weight-bold">Id usuario:</label>
                        <input type="number" id="idUser" class="form-control" disabled value="<?=$idUser?>">
                    </div>
                    <div class="col" >
                    <label class="font-weight-bold">Comentario</label>
                        <textarea id="comentario" class="form-control" ></textarea>
                    </div>
                    <div class="col" >
                        <center>
                        <form id="image-upload-form" action="subirimagen.php" method="post">
                            <div id="targetLayer">Vista Previa</div>
                            <div>
                                <input name="userImage" type="file" class="inputFile" />
                            </div>
                            <div>
                                <input type="submit" value="Subir" class="btn-upload" />
                            </div>
	                    </form>
                        </center>
                       
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary" onclick="saveComment(<?=$idApartado?>)">Comentar</button>
                    </div>
                </div>
            </div>
        </div>   

      </div>
        
    </main>
    <?php 
      include_once './cookie.php';
    ?>
  </body>
</html>