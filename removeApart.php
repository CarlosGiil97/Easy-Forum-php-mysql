
<?php

    include_once './conex.php';
    $response = [];

    $idApart = $_REQUEST['idApart'] ?? null;


     $sql = "DELETE FROM apartados WHERE id = $idApart";

    if(mysqli_query($conn, $sql)){
        $response['status'] = 'ok';
        
    } else{
        $response['status'] = 'ko';
    }

    

    mysqli_close($conn);

    echo json_encode($response);
