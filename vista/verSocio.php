<link rel="stylesheet" href="../css/bootstrap.min.css">

   

<?php
  require_once( '../modelo/Socios.php' );
  require_once( '../layout/layout.php' );
  function verSocio( $socio ) {
    $socioCard = '
      <div>
        <div>
          <span> ' . $socio[ 'nro_doc' ] . ' </span>
        </div>
        <p> ' . $socio[ 'paterno' ] . ' ' . $socio[ 'materno' ] . ' ' . $socio[ 'nombres' ] . ' </p>

        <h2> Selecciona Prestamo </h2>
        <br>
        <form action="../actions/createPrestamo.php" method="post">
          <input type="hidden" name="socio" value="' . $socio[ 'id' ] . '">
          <div>
            <label for="tasa"> Tipo de Prestamo </label>
            <select id="tasa" name="tasa" id="prestamo">
              <option value="1"> Regular </option>
              <option value="2"> Auxilio </option>
              <option value="3"> Consumo </option>
              <option value="4"> Emergencia </option>
              <option value="5"> Educaional </option>
              <option value="6"> intereses CAI </option>
            </select>
          </div>
         
          <div>
            <label for="monto"> Monto </label>
            <input class="input input-bordered input-sm w-full max-w-xs" id="monto" type="text" name="monto" />
          </div>
          <div>
            <label for="plazo"> Plazo </label>
            <input class="input input-bordered input-sm w-full max-w-xs" id="plazo" type="number" name="plazo" placeholder="Nro de Meses" />
          </div>
          <div>
            <label for="fecha_inicio"> Fecha de Inicio </label>
            <input id="fecha_inicio" type="date" name="fecha" />
          </div>
          <div>
            <label for="observaciones"> observaciones </label>
            <input  class="input input-bordered input-sm w-full max-w-xs" id="observaciones" type="text" name="observaciones" />
          </div>
          <div>
            <label for="tipo_transaccion"> Tipo de transaccion </label>
            <select id="tipo_transaccion" name="tipo_transaccion" id=value>
              <option value="deposito"> deposito </option>
              <option value="refinanciamiento"> refinanciamiento </option>
            </select>
        </div>
          <button class="btn btn-primary"> Realizar Prestamo </button>
          </form>
        

      </div>
    ';
    echo ( layout( 'Ver Socio', $socioCard ) );
  }
  $id = $_GET[ 'id' ];
  $socio = new Socios();
  $socios = $socio->getSocioById( $id );
  if ( count($socios) > 0 )
    verSocio( $socios[ 0 ] );
  else
    echo ( layout( 'Ver Socio', '<h1> Socio no encontrado </h1>' ) );
?> 
