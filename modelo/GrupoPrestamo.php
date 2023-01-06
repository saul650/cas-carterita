<?php

use LDAP\Result;

  require_once 'Connection.php';
  class Grupoprestamos {
    public $id;
    public $aprobados;
    public $fecha;

    public function __construct( ) {
      $this->connection = new Connection();
    }

    public function setPrestamo( $id, $aprobados, $fecha) {
      $this->id = $id;
      $this->socio = $aprobados;
      $this->tasa = $fecha;
     
    }

    public function getAllPrestamos () {
      $sql = "SELECT * FROM prestamos";
      $result = $this->connection->getConnection()->query( $sql );
      $grupo_prestamos = array();
      while ( $row = $result->fetch_assoc() ) {
        $grupo_prestamos = new Grupoprestamos();
        $grupo_prestamos->id = $row[ 'id' ];
        $grupo_prestamos->aprobados = $row[ 'aprobados' ];
        $grupo_prestamos->fecha = $row[ 'fecha' ];
        $grupo_prestamos[] = $grupo_prestamos;
      }
      return $result;
    }


  


  }
?>
