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
    <button id="btn-approved" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">Aprobar</button>
    <button id="btn-disapproved" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">Desaprobar</button>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmar desicion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        desea usted que los siguientes usuarios sean aprobados o desaprobados?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn-confirm">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<script>
  const btnApproved    = document.getElementById( 'btn-approved' );
  const btnDisapproved = document.getElementById( 'btn-disapproved' );
  const btnConfirm = document.getElementById( 'btn-confirm' );
  let data = [];

  btnApproved.addEventListener( 'click', () => {
    const refinanciamientoCheckboxes = document.querySelectorAll( '.refinanciamiento-checkbox' );
    refinanciamientoCheckboxes.forEach( checkbox => {
      if ( checkbox.checked ) {
        data.push({
          id: checkbox.parentElement.querySelector( 'input[ name = "id" ]' ).value,
          refinanciamiento: 1
        });
      }
    });
    if ( data.length <= 0 )
      btnConfirm.disabled = true;
    else
      btnConfirm.disabled = false;
  });

  btnDisapproved.addEventListener( 'click', () => {
    const refinanciamientoCheckboxes = document.querySelectorAll( '.refinanciamiento-checkbox' );
    refinanciamientoCheckboxes.forEach( checkbox => {
      if ( checkbox.checked ) {
        data.push({
          id: checkbox.parentElement.querySelector( 'input[ name = "id" ]' ).value,
          refinanciamiento: 0
        });
      }
    });
    if ( data.length <= 0 )
      btnConfirm.disabled = true;
    else
      btnConfirm.disabled = false;
  });


  btnConfirm.addEventListener( 'click', () => {
    console.log( data );
    const url = 'update_refinanciamiento.php';
    const params = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify( data )
    };
    try {
      fetch( url, params )
        .then( response => response.json() )
        .then( data => {
          if ( data.status === 'success' ) {
            location.reload();
          }
        });
    } catch ( err ) {
      console.log( err );
    } finally {
      data = [];
    }
  });
</script>
