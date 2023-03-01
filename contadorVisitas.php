<?php 

    include_once './conex.php';

    $date = date("Y-m-d H:i:s");
    $ip = $_SERVER['HTTP_CLIENT_IP'];

    $sql = "INSERT INTO 
                visitas 
            (fecha) 
            VALUES ('$date')";


    if(mysqli_query($conn, $sql)){
        $response['status'] = 'ok';
        
    } else{
        $response['status'] = 'ko';
    }


?>