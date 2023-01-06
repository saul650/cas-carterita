<?php
 $host = 'localhost';
 $user = 'root';
 $clave = '';
 $bd = 'xd';
 $conectar = mysqli_connect($host,$user,$clave,$bd);
 $consulta = 'select * from prestamos';
 $Resultado = mysqli_query($conectar,$consulta);
?>
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
          <th scope="col">verificar</th>
        </tr>
      </thead>
      <tbody>
        <?php while($data = mysqli_fetch_array($Resultado))   {     ?>
          <?php if( $data[ 'refinanciamiento' ] == 0 ) { ?>
            <tr>
            <td><?php echo $data['id_socio']  ?></td>
            <td><?php echo $data['observaciones']  ?></td> 
            <td><?php echo $data['plazo']  ?></td>
            <td><?php echo $data['tipo_transaccion']  ?></td> 
            <td><?php echo $data['monto']  ?></td>
            <td><?php echo $data['fecha']  ?></td>
            <td>

              <form>
                <input type="checkbox" name="refinanciamiento" value="1" class="refinanciamiento-checkbox">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
              </form>
            </td>
          <?php } ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <button id="save-changes" class="btn btn-primary">Guardar cambios</button>
</div>

<script>
  const saveChangesButton = document.getElementById('save-changes');

  saveChangesButton.addEventListener( 'click', () => {
    const refinanciamientoCheckboxes = document.querySelectorAll('.refinanciamiento-checkbox');
    const data = [];

    refinanciamientoCheckboxes.forEach( checkbox => {
      data.push({
        id: checkbox.name,
        refinanciamiento: checkbox.checked ? 1 : 0
      });
    } );

    fetch( 'actions/editar_refinanciamiento.php', {
      method: 'POST',
      body: JSON.stringify( data ),
      headers: {
        'Content-Type': 'application/json'
      }
    } );
  } );
</script>
