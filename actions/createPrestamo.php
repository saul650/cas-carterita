
<?php
  require_once '../modelo/Prestamo.php';

  $socio = $_POST[ 'socio' ];
  $tasa = $_POST[ 'tasa' ];
  $observaciones = $_POST[ 'observaciones' ];
  $plazo = $_POST[ 'plazo' ];
  $tipo_transaccion = $_POST[ 'tipo_transaccion' ];
  $monto = $_POST[ 'monto' ];
  $fecha = $_POST[ 'fecha' ];
  $refinanciamiento = 0;
  if ( strlen( $socio ) > 0 && strlen( $tasa ) > 0 && strlen( $observaciones ) > 0 && strlen( $plazo ) > 0 && strlen( $fecha ) > 0 && strlen( $refinanciamiento ) > 0 ) {
    $prestamo = new Prestamo();
    $prestamo -> setPrestamo(null, $socio, $tasa, $observaciones, $plazo, $tipo_transaccion, $monto, $fecha ,$refinanciamiento);
    $result = $prestamo->insertPrestamo( $prestamo );
    if ( $result ) {
      echo"registrado";
      header( 'refresh:5;url=../index.php');
    } else {
      echo 'Error al insertar el prestamo';
    }
  } else {
    echo 'Debe llenar todos los campos';
  }
?>
