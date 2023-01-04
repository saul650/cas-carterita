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



<div class="container">
  <form action="../actions/editar_refinanciamiento.php" method="post">
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
          <!-- <td><?php echo $data['refinanciamiento']  ?></td> -->
          <!-- refinanciamiento checkbox -->
          <td>
            <input
              type="checkbox"
              name="refinanciamiento"
              value="<?php echo $data['refinanciamiento'] ?>"
            />
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
          </td>
          </tr>
        <?php }    ?>
      </tbody>
    </table>
  </form>
</div>

