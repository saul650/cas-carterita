<?php

 $host = 'localhost';
 $user = 'root';
 $clave = '';
 $bd = 'xd';
 $conectar = mysqli_connect($host,$user,$clave,$bd);
 $consulta = 'select * from prestamos';
 $Rconsulta =  'select * from prestamos';
 $Resultado = mysqli_query($conectar,$consulta);
use function PHPSTORM_META\type;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hollla</h1>
    <div class="container">

<table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">id_socio</th>
      <th scope="col">observaciones</th>
      <th scope="col">plazo</th>
      <th scope="col">tipo de transaccion</th>
      <th scope="col">monto</th>
      <th scope="col">fecha</th>
      <th scope="col">refinanciamiento</th>
      <th scope="col">editar</th>
    </tr>
  </thead>
  <tbody>

<?php while($data = mysqli_fetch_array($Resultado))   {     ?>

    <tr>
      
    <td><?php echo $data['id_socio']  ?></td>
    <td><?php echo $data['observaciones']  ?></td> 
    <td><?php echo $data['plazo']  ?></td>
    <td><?php echo $data['tipo_transaccion']  ?></td> 
    <td><?php echo $data['monto']  ?></td>
    <td><?php echo $data['fecha']  ?></td>
    <td><?php echo $data['refinanciamiento']  ?></td>
    
    </tr>

    <?php }    ?>
</tbody>
</div>

</table>
</body>
</html>






