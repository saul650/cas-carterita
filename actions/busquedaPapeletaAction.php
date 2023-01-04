<?php
    include '../controlador/busquedaSocios.php';
    include '../vista/tablaSocios.php';
    
    $dato = $_POST[ 'dato' ];
    $busqueda = $_POST[ 'busqueda' ];
   
    $sociosObtenidos = getSocios( $dato ,$busqueda );
    
    tablaSocios( $sociosObtenidos );
?>
