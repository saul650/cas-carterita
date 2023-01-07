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
    <button id="btn-approved" class="btn btn-primary">Aprobar</button>
    <button id="btn-disapproved" class="btn btn-danger">Desaprobar</button>
</div>
<!-- modal with button confirm -->
<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="modal-confirm-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-confirm-label">Confirmar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Está seguro de realizar esta acción?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-confirm">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<script>
  const btnApproved    = document.getElementById( 'btn-approved' );
  const btnDisapproved = document.getElementById( 'btn-disapproved' );

  const data = [];

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
    if ( data.length > 0 ) {
      const modal = document.getElementById( 'modal-confirm' );
      modal.style.display = 'block';
    };
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
    if ( data.length > 0 ) {
      const modal = document.getElementById( 'modal-confirm' );
      modal.style.display = 'block';
    };
  });

  const btnConfirm = document.getElementById( 'btn-confirm' );
  btnConfirm.addEventListener( 'click', () => {
    const url = 'update_refinanciamiento.php';
    const params = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify( data )
    };
    fetch( url, params )
      .then( response => response.json() )
      .then( data => {
        if ( data.status === 'success' ) {
          location.reload();
        }
      });
  });
</script>
