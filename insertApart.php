
<?php

    include_once './conex.php';
    $response = [];

        
    //se obtienen los campos necesarios para insertar
    $idUser =  $_REQUEST['idUser'] ?? null;
    $titulo =  $_REQUEST['titulo'] ?? null;
    $comentario = $_REQUEST['comentario'] ?? null;
    $fecha = date('Y-m-d H:i:s');


    $sql = "INSERT INTO apartados (creador,rotulo,descripcion,respuestas,fecha) VALUES ($idUser,
        '$titulo','$comentario',0,'$fecha')";

    if(mysqli_query($conn, $sql)){
        $response['status'] = 'ok';
        
    } else{
        $response['status'] = 'ko';
    }
        
    // Close connection
    mysqli_close($conn);

    echo json_encode($response);
?>
