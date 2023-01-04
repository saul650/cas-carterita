<?php
 // get post method refinanciamiento value
  if ( !isset( $_POST[ 'refinanciamiento' ] ) || !isset( $_POST[ 'id' ] ) ) {
    header( 'Location: ../index.php' );
  } 

  $refinanciamiento = $_POST[ 'refinanciamiento' ];

  $host = 'localhost';
  $user = 'root';
  $clave = '';
  $bd = 'xd';
  $conectar = mysqli_connect($host,$user,$clave,$bd);

  // $consulta = 'select * from prestamos';
  // $Rconsulta =  'select * from prestamos';
  // $Resultado = mysqli_query($conectar,$consulta);
  // sql for update
  $sql = "UPDATE prestamos SET refinanciamiento = '$refinanciamiento' WHERE id = '$_POST[id]'";
  // execute query
  if ( mysqli_query( $conectar, $sql ) ) {
    header( 'Location: ../index.php' );
  } else {
    echo "Error updating record: " . mysqli_error( $conectar );
  }
?>
