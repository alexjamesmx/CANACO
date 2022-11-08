const services = []
let budgetAction = 0
let initBservicesData
let bservicesData = {}

jQuery( document ).ready( ( $ ) => {
  initBservicesData = $.trim( $( '#init_bservices_data' ).val() )

  if ( initBservicesData.length > 0 ) {
    bservicesData = JSON.parse( initBservicesData )

    bservicesData.map( ( bsd ) => {
      console.log( bsd )

      services.push( {
        carrierId: bsd.carrier_id,
        origen: bsd.origin,
        destino: bsd.destination,
        costo: bsd.cost,
        tiempo: bsd.delivery_time,
        tipoEmbarque: bsd.shipment_id,
        moneda: bsd.currency_value,
        monedaName: null,
        monedaCode: bsd.currency_type,
        cserviceType: bsd.bservice_type,
        controlClass: bsd.control_class,
        controlItem: bsd.control_item,
      } )
    } )
  }

  $( '.money' ).mask( '000,000,000.00', { reverse: true } )

  $( '#btn-add-carrier-cot' ).click( () => {
    const origen = $.trim( $( '#origen_cot' ).val().toUpperCase() )
    let destino = $.trim( $( '#destino_cot' ).val().toUpperCase() )
    const carrierId = $.trim( $( '#carrier_id' ).val() )
    const carrierName = $.trim( $( '#carrier_id option:selected' ).text() )
    const costo = $.trim( $( '#costo' ).val() )
    let tiempo = $.trim( $( '#tiempo' ).val().toUpperCase() )
    const tipoEmbarque = $.trim( $( '#shipment_id' ).val() )
    const tipoEmbarqueName = $.trim( $( '#shipment_id option:selected' ).text().toUpperCase() )
    const moneda = $.trim( $( '#moneda' ).val() )
    const monedaName = $.trim( $( '#moneda option:selected' ).text().toUpperCase() )
    const monedaCode = $.trim( $( '#moneda option:selected' ).attr( 'data-code' ) )
    const cserviceType = $.trim( $( '#cservice_type' ).val() )
    const cserviceTypeName = $.trim( $( '#cservice_type option:selected' ).text().toUpperCase() )
    let controlClass = $.trim( $( '#control_class' ).val() )
    let controlItem = $.trim( $( '#control_item' ).val() )

    controlClass = controlClass.length === 0 ? 'N/A' : controlClass
    controlItem = controlItem === 0 ? 'N/A' : controlItem
    destino = destino.length === 0 ? 'N/A' : destino
    tiempo = tiempo.length === 0 ? 'N/A' : tiempo

    if (
      origen.length !== 0
      && destino.length !== 0
      && carrierId.length !== 0
      && costo.length !== 0
      && tiempo.length !== 0
      && tipoEmbarque.length !== 0
      && carrierName.length !== 0
      && tipoEmbarqueName.length !== 0
      && moneda.length !== 0
    ) {
      services.push( {
        carrierId,
        origen,
        destino,
        costo,
        tiempo,
        tipoEmbarque,
        moneda,
        monedaName,
        monedaCode,
        cserviceType,
        controlClass,
        controlItem,
      } )

      const contentHTML = `
			<tr id="tr-data-budget-${services.length - 1}">
			<td data-title="Información general">
			Origen: <strong>${origen}</strong>
			<br>
			Destino: <strong>${destino}</strong>
			<br>
			Carrier: <strong>${carrierName}</strong>
			</td>

			<td data-title="Costos">
			Precio cliente: <strong>$${costo} ${monedaCode}</strong>
			<br>
			Tiempo de entrega: : <strong>${tiempo}</strong>
			</td>

			<td data-title="Embarque y entrega">
			Embarque: <strong>${tipoEmbarqueName}</strong>
			<br>
			Servicio: <strong>${cserviceTypeName}</strong>
			<br>
			Clase: <strong>${controlClass}</strong>
			<br>
			Item: <strong>${controlItem}</strong>
			</td>

			<td data-title="Eliminar">
			<!--<button type="button" class="btn btn-primary btn-xs btn-delete-data-budget" data-budget="${
        services.length - 1
      }" onclick="editBudget(this);">
			<i class="simple-icon-pencil"></i>
			</button>-->
			<button type="button" class="btn btn-danger btn-xs btn-delete-data-budget" data-budget="${
        services.length - 1
      }" onclick="deleteBudget(this);">
			<i class="simple-icon-trash"></i>
			</button>
			</td>
			</tr>
			`

      $( '#costo, #tiempo, #origen_cot, #destino_cot, #moneda' ).val( '' )
      $( '#carrier_id, #shipment_id' ).val( null ).trigger( 'change' )

      $( '#table-data-budget' ).append( contentHTML )

      $( '#origen_cot' ).focus()
    } else {
      toastr.error( 'Para agregar un servicio se necesitan todos los datos' )
    }
  } )

  $( '#form-edit-budget' ).validate( {
    submitHandler: ( form ) => {
      if ( $( '#mpc_kgs' ).is( ':checked' ) || $( '#mpc_libras' ).is( ':checked' ) ) {
        if ( services.length > 0 ) {
          $( '#modal-loading-budget-message' ).html(
            `Guardando ${
              budgetAction === 2 ? 'y enviando por correo electrónico ' : ''
            }la información de la cotización`,
          )

          if (
            confirm(
              `Realmente desea guardar ${
                budgetAction === 2 ? 'y enviar por correo electrónico ' : ''
              }la información de la cotización`,
            )
          ) {
            $( '#modal-loading-budget' ).modal( {
              backdrop: 'static',
              keyboard: false,
              show: true,
            } )

            const jQform = $( form )

            $.ajax( {
              url: jQform.attr( 'action' ),
              type: jQform.attr( 'method' ),
              dataType: jQform.attr( 'data-type' ),
              data: `${jQform.serialize()}&type=${budgetAction}+&services=${JSON.stringify(
                services,
              )}`,
              success: ( response ) => {
                toastr[response.response_type]( response.message )
                window.setTimeout( () => {
                  window.location.href = base_url( 'app/budgets' )
                }, 1500 )
              },
              error: () => {
                toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
                window.setTimeout( () => {
                  $( '#modal-loading-budget' ).modal( 'hide' )
                }, 1500 )
              },
            } )
          }
        } else {
          toastr.error( 'Agregue mínimo un servicio a la cotización' )
        }
      } else {
        toastr.error( 'Seleccion la unidad de peso de la mercancía' )
      }
    },
  } )

  $( '#mostrar_terminos' ).change( () => {
    $( '#terminos-block' ).slideToggle( 400 )
  } )

  $( '#requiere_validacion' ).change( () => {
    $( '#info-validacion-block' ).slideToggle( 400, () => {
      if ( $( '#info-validacion-block' ).is( ':visible' ) ) {
        $( '#btn-sbmt-save-and-send' ).attr( 'disabled', 'disabled' )
      } else {
        $( '#btn-sbmt-save-and-send' ).removeAttr( 'disabled' )
        $( '#info_validacion' ).val( '' )
      }
    } )
  } )

  $( '#form-edit-budget :input' ).keypress( ( event ) => {
    const keycode = event.keyCode ? event.keyCode : event.which
    if ( keycode === 13 ) return false
  } )

  $( '#client_id' ).change( () => {
    const clientId = $( '#client_id' ).val()
    $( '#contacto, #tels_cot, #emails_cot' ).val( '' )
    $( '#contacto, #tels_cot, #emails_cot' ).attr( 'disabled', 'disabled' )
    $.ajax( {
      url: base_url( 'app/budgets/getdataclient' ),
      type: 'post',
      dataType: 'json',
      data: {
        client_id: clientId,
      },
      success( response ) {
        if ( response.response_code === 200 ) {
          $( '#contacto' ).val( response.data_client.contacto )
          $( '#tels_cot' ).val( response.data_client.telefonos )
          $( '#emails_cot' ).val( response.data_client.correos )
          autofocus( '#contacto', 250 )
        } else {
          toastr[response.response_type]( response.message )
        }
      },
      error() {},
      complete() {
        $( '#contacto, #tels_cot, #emails_cot' ).removeAttr( 'disabled' )
      },
    } )
  } )

  Mousetrap.bind( ['alt+c'], () => {
    window.location.href = $( '#goto-add-clients' ).attr( 'href' )
  } )

  Mousetrap.bind( ['alt+r'], () => {
    window.location.href = $( '#goto-add-carrier' ).attr( 'href' )
  } )

  Mousetrap.bind( ['alt+m'], () => {
    $( '#modal-comments-budget' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+t'], () => {
    window.location.href = $( '#goto-add-sghipment' ).attr( 'href' )
  } )

  $( '.btn-comment-budget' ).click( () => {
    $( '#modal-comments-budget' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#btn-sbmt-save-and-send' ).click( () => {
    budgetAction = 2
  } )

  $( '#btn-sbmt-save' ).click( () => {
    budgetAction = 1
  } )
} )

function deleteBudget( thisElem ) {
  const budgetPos = $( thisElem ).attr( 'data-budget' )
  if ( confirm( '¿Realmente deseas eliminar este servicio d ela cotización?' ) ) {
    $( `#tr-data-budget-${budgetPos}` ).remove()
    services.splice( budgetPos, 1 )
  }
}
