<?php 
session_start();

//limpio la sesión y lo redirijo al login
$_SESSION = [];
header("Location: login.php");
    
?>