<?php 

  include_once './conex.php';

  $visitas = 0;

  $sql = "SELECT count(id) AS visitas FROM visitas";

  foreach ($conn->query($sql) as $fila) {
    $visitas = $fila['visitas'];
  }

  

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          
          <li class="nav-item">
            <a class="nav-link" href="perfil.php" tabindex="-1" >Inicio </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="insertartema.php" tabindex="-1" >Insertar tema </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="eliminartema.php" tabindex="-1" >Eliminar tema </a>
          </li>
          <li class="nav-item">
          <div class="dropdown">
          <button class="btn nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Más opciones
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Mi perfil</a></li>
            <li><a class="dropdown-item" href="#">Enviar mensaje a soporte</a></li>
          </ul>
        </div>
          </li>
          <li class="nav-item">
            <a class="nav-link"  tabindex="-1" >Visitas a la web <b><?=$visitas?></b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cierre.php" tabindex="-1" >Cerrar sesión</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>