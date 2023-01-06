<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="inn.css">
</head>
<body>
<div id="viewport">
  <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <a href="principal.php">CAS</a>
    </header>
    <ul class="nav">
    
      <li>
        <a href="#">
          <i class="zmdi zmdi-info-outline"></i> lista de prestamos
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-settings"></i> creacion de prestamos
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-comment-more"></i> activos
                  </a>
      </li>
    </ul>
  </div>
  <!-- Content -->
  <div id="content">
    <nav class="navbar navbar-default">
     
    </nav>
    <div class="container-fluid">
      <h1>Cooperativa</h1>
   
      <center> <?php include 'vista/formula_busq.php'?></center>

<div>
        <button class="btn btn-secondary"><a href="vista/edicion.php">editar </a></button>
<br>
  <br>
  <button class="btn btn-secondary"><a href="excel.php">Crear excel </a></button>
</div>
<br>
<?php include 'vista/busq_formula.php' ?>
<br>
<a href="controlador/CtrlSalir.php">Salir</a>
    </div>
  </div>
</div>

</body>
</html>
   