
<?php

    include_once './conex.php';
    $response = [];

        
    //comprobar conexión
    if($conn === false){
        echo "entro";
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
        
    //se obtienen los campos necesarios para insertar
    $username =  $_REQUEST['username'] ?? null;
    $nombre =  $_REQUEST['nombre'] ?? null;
    $email = $_REQUEST['email'] ?? null;
    $password =  $_REQUEST['password'] ?? null;

    //antes de insertar compruebo que no existe un usuario con ese username
    $sql = "SELECT * FROM usuarios WHERE usuario = '$username'";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){

        $sql = "INSERT INTO usuarios (usuario,nombre,correo,password) VALUES ('$username',
        '$nombre','$email','$password')";

        if(mysqli_query($conn, $sql)){
            $response['status'] = 'ok';
            
        } else{
            $response['status'] = 'ko';
        }

    }else{
        $response['status'] = 'ko';
        $response['message'] = 'Usuario ya existe';
    }




    mysqli_close($conn);

    echo json_encode($response);
?>
