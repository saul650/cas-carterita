<?php

if(isset($_GET['cerrar'])) {

  //Vaciamos y destruimos las variables de sesión
  $_SESSION['usuario'] = NULL;
  $_SESSION['pass'] = NULL;
  unset($_SESSION['usuario']);
  unset($_SESSION['pass']);

  //Redireccionamos a la pagina index.php
  header('location:../index.php');
}

?>