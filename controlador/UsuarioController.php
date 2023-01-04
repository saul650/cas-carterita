<?php
require '../modelo/Usuario.php';
class UsuarioController extends Usuario{
public function LoginView(){
    require '../Views/Usuario/login.php';
}

}
if (isset($_GET['action']) && $_GET['action']=='login'){
$instanciacontrolador = new UsuarioController();
$instanciacontrolador->LoginView();

}

?>