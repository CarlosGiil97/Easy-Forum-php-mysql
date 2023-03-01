
<?php
    session_start();
     include_once './conex.php';
     $response = [];

     //se obtienen los campos necesarios para insertar
     $username =  $_REQUEST['nombre'] ?? null;
     
     $password =  $_REQUEST['password']  ?? null;
    
     
    $sql = "SELECT id,usuario, password,nombre,correo FROM usuarios WHERE usuario = '$username'";
    foreach ($conn->query($sql) as $fila) {
       
            if($fila['password'] == $password){
                $response['status'] = 'ok';
                $_SESSION['username'] = $fila['usuario'];
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['correo'] = $fila['correo'];
                $_SESSION['id'] = $fila['id'];

            }
    }

    //creo la cookie con los datos del usuario
    setcookie("CookieUser", $_SESSION['username'], time()+60*60*24*365 );

    //inserto info de la sesión en el fichero accesos.txt
    fopen('accesos.txt', 'r+');
    $infoToSave = '';
    foreach ($_SESSION as $key => $value){
        $infoToSave.= $key. ' = '. $value. " | ";
    }
    $infoToSave.=  'Fecha de inicio sesión = '. date('Y-m-d H:i:s'). " | \n";
    file_put_contents('accesos.txt',$infoToSave ,FILE_APPEND);


    
    $conn->close();

    echo json_encode($response);
 
?>