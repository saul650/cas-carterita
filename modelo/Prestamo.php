<?php

use LDAP\Result;

  require_once 'Connection.php';
  class Prestamo {
    public $id;
    public $socio;
    public $tasa;
    public $observaciones;
    public $plazo;
    public $tipo_transaccion;
    public $monto;
    public $fecha;
    public $refinanciamiento;

    public function __construct( ) {
      $this->connection = new Connection();
    }

    public function setPrestamo( $id, $socio, $tasa, $observaciones, $plazo, $tipo_transaccion , $monto ,$fecha ,$refinanciamiento ) {
      $this->id = $id;
      $this->socio = $socio;
      $this->tasa = $tasa;
      $this->observaciones = $observaciones;
      $this->plazo = $plazo;
      $this->tipo_transaccion = $tipo_transaccion;
      $this->monto = $monto; 
      $this->fecha = $fecha;
      $this->refinanciamiento = $refinanciamiento;
    }

    public function getAllPrestamos () {
      $sql = "SELECT * FROM prestamos";
      $result = $this->connection->getConnection()->query( $sql );
      $prestamos = array();
      while ( $row = $result->fetch_assoc() ) {
        $prestamo = new Prestamo();
        $prestamo->id = $row[ 'id' ];
        $prestamo->socio = $row[ 'id_socio' ];
        $prestamo->tasa = $row[ 'id_tasa' ];
        $prestamo->observaciones = $row[ 'observaciones' ];
        $prestamo->plazo = $row[ 'plazo' ];
        $prestamo->tipo_transaccion = $row[ 'tipo_transaccion' ];
        $prestamo->monto = $row[ 'monto '];
        $prestamo->fecha = $row[ 'fecha' ];
        $prestamo->refinanciamiento = $row[ 'refinanciamiento' ];
        $prestamos[] = $prestamo;
      }
      return $result;
    }

    public function getPrestamoById ( $id ) {
      $sql = "SELECT * FROM prestamos WHERE id = $id";
      $result = $this->connection->getConnection()->query( $sql );
      $row = $result->fetch_assoc();
      $prestamo = new Prestamo();
      $prestamo->id = $row[ 'id' ];
      $prestamo->socio = $row[ 'id_socio' ];
      $prestamo->tasa = $row[ 'id_tasa' ];
      $prestamo->observaciones = $row[ 'observaciones' ];
      $prestamo->plazo = $row[ 'plazo' ];
      $prestamo->tipo_transaccion = $row[ 'tipo_transaccion' ];
      $prestamo->monto = $row[ 'monto' ];
      $prestamo->fecha = $row[ 'fecha' ];
      $prestamo->refinanciamiento = $row[ 'refinanciamiento' ];
      return $prestamo;
    }

    public function insertPrestamo ( $prestamo ) {
      $sql = "INSERT INTO prestamos ( id_socio, id_tasa, observaciones, plazo, tipo_transaccion,monto , fecha  , refinanciamiento) VALUES (  $prestamo->socio ,  $prestamo->tasa , ' $prestamo->observaciones ',  $prestamo->plazo , ' $prestamo->tipo_transaccion' , $prestamo->monto, '$prestamo->fecha ',$prestamo->refinanciamiento )";
      $result = $this->connection->getConnection()->query( $sql );
      if ( $result ) {
        $prestamo->id = $this->connection->getConnection()->insert_id;
        return $prestamo;
      }
      // echo(json_encode($result));
      echo $sql;
      return false;
    }



    public function deletePrestamo ( $id ) {
      $sql = "DELETE FROM prestamos WHERE id = $id";
      $result = $this->connection->getConnection()->query( $sql );
      return $result;
    }

    public function getAllPrestamosBySocio ( $socioId ) {
      $sql = "SELECT * FROM prestamos WHERE id_socio = $socioId";
      $result = $this->connection->getConnection()->query( $sql );
      $prestamos = array();
      while ( $row = $result->fetch_assoc() ) {
        $prestamo = new Prestamo();
        $prestamo->id = $row[ 'id' ];
        $prestamo->socio = $row[ 'id_socio' ];
        $prestamo->tasa = $row[ 'id_tasa' ];
        $prestamo->observaciones = $row[ 'observaciones' ];
        $prestamo->plazo = $row[ 'plazo' ];
        $prestamo->tipo_transaccion = $row[ 'tipo_transaccion' ];
        $prestamo->monto = $row[ 'monto' ];
        $prestamo->fecha = $row[ 'fecha' ];
        $prestamo->refinanciamiento = $row[ 'refinanciamiento' ];
        $prestamos[] = $prestamo;
      }
      return $result;
    }
  }
?>
