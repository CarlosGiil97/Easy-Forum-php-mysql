
<?php

    include_once './conex.php';
    $response = [];

    
    //se obtienen los campos necesarios para insertar
    $idUser = $_REQUEST['idUser'] ?? null;
    $idApartado = $_REQUEST['idApartado']?? null;
    $comentario = $_REQUEST['comentario']?? null;
    $img = $_REQUEST['img'] ?? null;
    $date = date('Y-m-d H:i:s');

    

     $sql = "INSERT INTO respuestas (apartados,usuario,respuesta,fecha,imagen) VALUES ($idApartado,
        $idUser,'$comentario','$date','$img')";

    if(mysqli_query($conn, $sql)){
        $response['status'] = 'ok';
        
    } else{
        $response['status'] = 'ko';
    }

    //una vez se inserta la respuesta hay que actualizar el numero de comentarios en los apartados
    $numR = null;
    $sql = "SELECT respuestas FROM apartados WHERE id= $idApartado";

    foreach ($conn->query($sql) as $fila) {
        $numR = $fila['respuestas'];
    }
    $numR = $numR + 1;

    $sql = "UPDATE apartados SET respuestas=$numR WHERE id= $idApartado";
    if(mysqli_query($conn, $sql)){
        $response['status'] = 'ok';
        
    }
        
    // Close connection
    mysqli_close($conn);

    echo json_encode($response);
?>
