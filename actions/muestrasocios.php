<?php
    include '../controlador/busquedaSocios.php';
    include '../vista/papeleta_socios.php';
    $dato = $_POST[ 'dato' ];
    $sociosObtenidos = getSociosByPaternoOrNroDoc( $dato );
    tablaSocios( $sociosObtenidos );
?>
