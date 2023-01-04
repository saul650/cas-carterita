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
  // sql for instert in table grupo_prestamo id = autoincrement, aprobados = $_post[ 'id' ], fecha = fecha actual
  $sql = "INSERT INTO grupo_prestamo (aprobados, fecha) VALUES ('$_POST[id]', NOW())";
  // sql2 for update in table prestamos where id = $_post[ 'id' ] and refinanciamiento = $_post[ 'refinanciamiento' ]
  $sql2 = "UPDATE prestamos SET refinanciamiento = '$_POST[refinanciamiento]' WHERE id = '$_POST[id]'";

  // execute query
  if (mysqli_query($conectar, $sql) && mysqli_query($conectar, $sql2)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conectar);
  }
?>
