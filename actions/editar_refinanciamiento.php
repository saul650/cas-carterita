<?php
 // get post method refinanciamiento value
  if ( !isset( $_POST[ 'refinanciamiento' ] ) ) {
    header( 'Location: ../index.php' );
  } 
  $refinanciamiento = $_POST[ 'refinanciamiento' ];
  echo $refinanciamiento;
?>
