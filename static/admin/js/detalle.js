$( () => {
  $( document ).on( 'click', '#d1', ( e ) => {
    e.preventDefault()
    if ( $( '#detalle' ).css( 'display' ) == 'none' ) {
      $( '#desc' ).text( 'Se necesitan 10 metros de cuerda de manera urgente.' )
      $( '#fecha' ).text( '21 de Julio 2021' )
      $( '#pago' ).text( '$5,000 - $7,000' )
      $( '#tag1' ).text( 'Cuerda' )
      $( '#tag2' ).text( 'Ferreteria' )
      $( '#tag3' ).text( 'Amarre' )
      $( '#empresa' ).text( 'Aficionados de las Cuerdas S.A' )
      $( '#calif' ).html( `
            <div>
            <i class="simple-icon-star"></i>
            </div>
            ` )
      $( '#detalle' ).css( 'display', 'block' )
    } else {
      $( '#desc' ).text( 'Se necesitan 10 metros de cuerda de manera urgente.' )
      $( '#fecha' ).text( '21 de Julio 2021' )
      $( '#pago' ).text( '$5,000 - $7,000' )
      $( '#tag1' ).text( 'Cuerda' )
      $( '#tag2' ).text( 'Ferreteria' )
      $( '#tag3' ).text( 'Amarre' )
      $( '#empresa' ).text( 'Aficionados de las Cuerdas S.A' )
      $( '#calif' ).html( `
            <div>
            <i class="simple-icon-star"></i>
            </div>
            ` )
    }
  } )

  $( document ).on( 'click', '#d2', ( e ) => {
    e.preventDefault()
    if ( $( '#detalle' ).css( 'display' ) === 'none' ) {
      $( '#desc' ).text( 'Se necesitan 200 martillos.' )
      $( '#fecha' ).text( '21 de Agosto 2021' )
      $( '#pago' ).text( '$15,000 - $20,000' )
      $( '#tag1' ).text( 'Martillos' )
      $( '#tag2' ).text( 'Ferreteria' )
      $( '#tag3' ).text( 'Forjar' )
      $( '#empresa' ).text( 'Martillos S.A de C.V' )
      $( '#calif' ).html( `
        <div>
            <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
        </div>
        ` )
      $( '#detalle' ).css( 'display', 'block' )
    } else {
      $( '#desc' ).text( 'Se necesitan 200 martillos.' )
      $( '#fecha' ).text( '21 de Agosto 2021' )
      $( '#pago' ).text( '$15,000 - $20,000' )
      $( '#tag1' ).text( 'Martillos' )
      $( '#tag2' ).text( 'Ferreteria' )
      $( '#tag3' ).text( 'Forjar' )
      $( '#empresa' ).text( 'Martillos S.A de C.V' )
      $( '#calif' ).html( `
        <div>
            <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
        </div>
        ` )
    }
  } )

  $( document ).on( 'click', '#d3', ( e ) => {
    e.preventDefault()
    if ( $( '#detalle' ).css( 'display' ) === 'none' ) {
      $( '#desc' ).text( 'Se necesitan 10 metros de listón' )
      $( '#fecha' ).text( '10 de Agosto 2021' )
      $( '#pago' ).text( '$500 - $1,000' )
      $( '#tag1' ).text( 'Listón' )
      $( '#tag2' ).text( 'Color' )
      $( '#tag3' ).text( 'Doña' )
      $( '#empresa' ).text( 'Doña Blanca CF' )
      $( '#calif' ).html( `
        <div>
            <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
        </div>
        ` )
      $( '#detalle' ).css( 'display', 'block' )
    } else {
      $( '#desc' ).text( 'Se necesitan 10 metros de listón' )
      $( '#fecha' ).text( '10 de Agosto 2021' )
      $( '#pago' ).text( '$500 - $1,000' )
      $( '#tag1' ).text( 'Listón' )
      $( '#tag2' ).text( 'Color' )
      $( '#tag3' ).text( 'Doña' )
      $( '#empresa' ).text( 'Doña Blanca CF' )
      $( '#calif' ).html( `
        <div>
            <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
        </div>
        ` )
    }
  } )

  $( document ).on( 'click', '#posBot1', ( e ) => {
    e.preventDefault()
    $( '#modalContent' ).html( `
        <div class="card">
            <div class="card-body">
            <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Distribuidora de Cuerda "Romero"</a>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-phone"></i>&nbsp;442-000-123</a>
            <div>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-envelope"></i>&nbsp;romero@impactos.com.mx</a>
            <div>
                <div>
                    <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-small ">10 - Agosto - 2020</p>
            </div>
            <div class="align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Insignias</a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Gran vendedor</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Excelente servicio</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Amabilidad</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Puntualidad en la entrega</span></a>
                </div>
            </div>
            </div>
        </div>   
        <div class="card">
            <div class="card-body">
            <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Distribuidora de Cuerda "Ramírez"</a>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-phone"></i>&nbsp;442-000-123</a>
            <div>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-envelope"></i>&nbsp;ramirez@impactos.com.mx</a>
            <div>
                <div>
                    <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-small ">10 - Agosto - 2020</p>
            </div>
            <div class="align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Insignias</a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Gran vendedor</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Excelente servicio</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Amabilidad</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Puntualidad en la entrega</span></a>
                </div>
            </div>
            </div>
        </div>  
            ` )
  } )

  $( document ).on( 'click', '#posBot2', ( e ) => {
    e.preventDefault()
    $( '#modalContent' ).html( `
        <div class="card">
            <div class="card-body">
            <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Distribuidora de Cuerda "Robles"</a>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-phone"></i>&nbsp;442-000-123</a>
            <div>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-envelope"></i>&nbsp;robles@impactos.com.mx</a>
            <div>
                <div>
                    <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-small ">10 - Agosto - 2020</p>
            </div>
            <div class="align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Insignias</a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Gran vendedor</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Excelente servicio</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Amabilidad</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Puntualidad en la entrega</span></a>
                </div>
            </div>
            </div>
        </div>  
        <div class="card">
            <div class="card-body">
            <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Distribuidora de Cuerda "Razo"</a>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-phone"></i>&nbsp;442-000-123</a>
            <div>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-envelope"></i>&nbsp;razo@impactos.com.mx</a>
            <div>
                <div>
                    <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-small ">10 - Agosto - 2020</p>
            </div>
            <div class="align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Insignias</a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Gran vendedor</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Excelente servicio</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Amabilidad</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Puntualidad en la entrega</span></a>
                </div>
            </div>
            </div>
        </div>  
        <div class="card">
            <div class="card-body">
            <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Distribuidora de Cuerda "Ramones"</a>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-phone"></i>&nbsp;442-000-123</a>
            <div>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-envelope"></i>&nbsp;ramones@impactos.com.mx</a>
            <div>
                <div>
                    <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-small ">10 - Agosto - 2020</p>
            </div>
            <div class="align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Insignias</a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Gran vendedor</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Excelente servicio</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Amabilidad</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Puntualidad en la entrega</span></a>
                </div>
            </div>
            </div>
        </div>  
        ` )
  } )

  $( document ).on( 'click', '#posBot3', ( e ) => {
    e.preventDefault()
    $( '#modalContent' ).html( `
        <div class="card">
            <div class="card-body">
            <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Distribuidora de Cuerda "Rueda"</a>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-phone"></i>&nbsp;442-000-123</a>
            <div>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-envelope"></i>&nbsp;rueda@impactos.com.mx</a>
            <div>
                <div>
                    <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-small ">10 - Agosto - 2020</p>
            </div>
            <div class="align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Insignias</a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Gran vendedor</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Excelente servicio</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Amabilidad</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Puntualidad en la entrega</span></a>
                </div>
            </div>
            </div>
        </div>  
        ` )
  } )

  $( document ).on( 'click', '#canBot1', ( e ) => {
    e.preventDefault()
    $( '#modalContent' ).html( `
        <div class="card">
            <div class="card-body">
            <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Distribuidora de Cuerda "Rodríguez"</a>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-phone"></i>&nbsp;442-000-123</a>
            <div>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-envelope"></i>&nbsp;rodrigez@impactos.com.mx</a>
            <div>
                <div>
                    <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-small ">10 - Agosto - 2020</p>
            </div>
            <div class="align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Insignias</a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Gran vendedor</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Excelente servicio</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Amabilidad</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Puntualidad en la entrega</span></a>
                </div>
            </div>
            </div>
        </div>  
        ` )
  } )

  $( document ).on( 'click', '#canBot2', ( e ) => {
    e.preventDefault()
    $( '#modalContent' ).html( `
        <div class="card">
            <div class="card-body">
            <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Distribuidora de Cuerda "Romo"</a>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-phone"></i>&nbsp;442-000-123</a>
            <div>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-envelope"></i>&nbsp;romo@impactos.com.mx</a>
            <div>
                <div>
                    <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-small ">10 - Agosto - 2020</p>
            </div>
            <div class="align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Insignias</a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Gran vendedor</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Excelente servicio</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Amabilidad</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Puntualidad en la entrega</span></a>
                </div>
            </div>
            </div>
        </div>  
        ` )
  } )

  $( document ).on( 'click', '#canBot3', ( e ) => {
    e.preventDefault()
    $( '#modalContent' ).html( `
        <div class="card">
            <div class="card-body">
            <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Distribuidora de Cuerda "Roma"</a>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-phone"></i>&nbsp;442-000-123</a>
            <div>
            </div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100"><i class="simple-icon-envelope"></i>&nbsp;Roma@impactos.com.mx</a>
            <div>
                <div>
                    <i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i><i class="simple-icon-star"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-small ">10 - Agosto - 2020</p>
            </div>
            <div class="align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div>
                <a class="lass="list-item-heading mb-0 truncate w-40 w-xs-100">Insignias</a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Gran vendedor</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Excelente servicio</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Amabilidad</span></a>
                <a href="#"><span id="tag1" class="badge badge-pill badge-primary mb-1">Puntualidad en la entrega</span></a>
                </div>
            </div>
            </div>
        </div>  
        ` )
  } )

  $( document ).on( 'click', '#close', ( e ) => {
    e.preventDefault()
    $( '#detalle' ).css( 'display', 'none' )
  } )
} )
