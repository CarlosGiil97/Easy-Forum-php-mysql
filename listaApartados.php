<?php 

    include_once './conex.php';
    $apartados = [];

   $sql = "SELECT 
            * ,u.nombre AS autor,a.id AS apart_id 
          FROM 
              apartados a 
          INNER JOIN 
            usuarios u ON u.id = a.creador 
          ORDER BY a.fecha DESC";
    
    foreach ($conn->query($sql) as $fila) {
        $apartados[] = $fila;
    }


?>
<div class="table-wrapper-scroll-y my-custom-scrollbar mb-3 ps ps--active-y">

  <table class="table table-bordered table-striped mb-0">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Autor</th>
        <th scope="col">Titulo</th>
        <th scope="col">Fecha</th>
        <th scope="col">Respuestas</th>
      </tr>
    </thead>
    <tbody>
        <?php if(!empty($apartados)) {?>
            
            <?php foreach($apartados as $ap) {?>
              
                <tr>
                    <th scope="row"><a href="respuesta.php?id=<?=$ap['apart_id']?>">Ver</a></th>
                    <th scope="row"><?php echo $ap['autor'];?></th>
                    <th scope="row"><?php echo $ap['rotulo'];?></th>
                    <th scope="row"><?php echo $ap['fecha'];?></th>
                    <th scope="row"><?php echo $ap['respuestas'];?></th>
                </tr>
            <?php }?>
       
        
        <?php } else { ?>
            <tr>
                <td colspan="5">No existen apartados creados</td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
  <?php 
      include_once './cookie.php';
    ?>
</div>