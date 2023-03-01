<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foro";

// crear conexion con la base de datos
$conn = new mysqli($servername, $username, $password,$dbname);

// comprobar conexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>