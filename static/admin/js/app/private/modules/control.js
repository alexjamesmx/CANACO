let services = []
let selectedServices = []
const controlAction = 1

jQuery( document ).ready( ( $ ) => {
  $( '.money' ).mask( '000,000,000.00', { reverse: true } )
  $( '.exchange' ).mask( '00.0000', { reverse: true } )
  $( '.weight' ).mask( '000,000,000.00', { reverse: true } )
  $( '.numbers' ).mask( '000,000,000', { reverse: true } )
  $( '.percent' ).mask( '00.00%', { reverse: true } )

  $( '#filter_search' ).change( () => {
    $( '#card-search-control' ).slideToggle( 400 )
  } )

  $( '#form-create-control :input' ).keypress( ( event ) => {
    const keycode = event.keyCode ? event.keyCode : event.which
    if ( keycode === 13 ) return false
  } )

  $( '#form-create-control' ).validate( {
    submitHandler: ( form ) => {
      if ( $( '#mpc_kgs' ).is( ':checked' ) || $( '#mpc_libras' ).is( ':checked' ) ) {
        if ( services.length > 0 ) {
          $( '#modal-loading-control-message' ).html(
            `Guardando ${
              controlAction === 2 ? 'y enviando por correo electrónico ' : ''
            }la información de la cotización`,
          )
          if (
            confirm(
              `Realmente desea guardar ${
                controlAction === 2 ? 'y enviar por correo electrónico ' : ''
              }la información de la cotización`,
            )
          ) {
            $( '#modal-loading-control' ).modal( {
              backdrop: 'static',
              keyboard: true,
              show: true,
            } )

            const jQform = $( form )

            $.ajax( {
              url: jQform.attr( 'action' ),
              type: jQform.attr( 'method' ),
              dataType: jQform.attr( 'data-type' ),
              data: `${jQform.serialize()}&type=${controlAction}&services=${encodeURIComponent(
                JSON.stringify( services ),
              )}&selected_services=${encodeURIComponent( JSON.stringify( selectedServices ) )}`,
              success: ( response ) => {
                toastr[response.response_type]( response.message )
                if ( response.response_code === 200 ) {
                  window.setTimeout( () => {
                    window.location.href = base_url( 'app/controls' )
                  }, 1500 )
                }
              },
              error: () => {
                toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
                window.setTimeout( () => {
                  $( '#modal-loading-control' ).modal( 'hide' )
                }, 1500 )
              },
            } )
          }
        } else {
          toastr.error( 'Agregue mínimo un servicio al control' )
        }
      } else {
        toastr.error( 'Seleccion la unidad de peso de la mercancía' )
      }
    },
  } )

  $( '#budget_id' ).change( () => {
    const budgetId = $( '#budget_id' ).val()
    $( '#modal-loading-control-message' ).html( 'Cargando información' )
    $( '#modal-loading-control' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )

    $.ajax( {
      url: base_url( 'app/controls/getdatabudget' ),
      type: 'post',
      dataType: 'json',
      data: {
        budget_id: budgetId,
      },
      success( response ) {
        if ( response.response_code === 200 ) {
          $( '#table-data-control' ).html( '' )
          services = []
          selectedServices = []

          $( '#client_id' ).val( response.data_budget.client_id )
          $( '#cliente' ).val( response.data_budget.empresa )
          $( '#contacto' ).val( response.data_budget.contacts )
          $( '#tels_cot' ).val( response.data_budget.tels )
          $( '#emails_cot' ).val( response.data_budget.mails )
          $( '#desc_merca' ).val( response.data_budget.commodity_desc )
          $( '#peso_merca_cot' ).val( response.data_budget.weight )
          $( '#comision' ).val(
            response.data_budget.comision != null ? `${response.data_budget.comision}%` : null,
          )

          if ( response.data_budget.weight_type === 'Kg' ) {
            $( '#mpc_kgs' ).attr( 'checked', 'checked' )
          }
          if ( response.data_budget.weight_type === 'Lb' ) {
            $( '#mpc_libras' ).attr( 'checked', 'checked' )
          }
          $( '#piezas_cot' ).val( response.data_budget.pieces )

          response.data_bservices.foreach( ( bservice ) => {
            services.push( bservice )
            const contentHTML = `
						<tr id="tr-data-control-${services.length - 1}">

						<td data-title="Agregar al control">
						<div class="custom-control custom-checkbox mb-3">
						<input type="checkbox" class="custom-control-input" id="check-bservice-${
              bservice.baservices_id
            }" name="baservices_id[]" value="${
              bservice.baservices_id
            }" onchange="update_service_data(${bservice.baservices_id})">
						<label class="custom-control-label" for="check-bservice-${bservice.baservices_id}"></label>
						</div>
						</td>

						<td data-title="Información general">
						Origen: <strong>${bservice.origin}</strong>
						<br>
						Destino: <strong>${bservice.destination}</strong>
						<br>
						Carrier: <strong>${bservice.carrier_name}</strong>
						<br />
						<input type="text" name="consignatario[${bservice.baservices_id}]" id="consignatario-${
              bservice.baservices_id
            }" class="form-control elem-${
              bservice.baservices_id
            }" maxlength="75" disabled="disabled" placeholder='Consignatario *'>
						</td>

						<td data-title="Costos">
						Precio cliente : <strong>$<span id="precio-cliente-${bservice.baservices_id}">${
              bservice.cost
            }</span> <span id="currency-type-${bservice.baservices_id}">${
              bservice.currency_type
            }</span></strong>
						<br>

						<input type="tel" name="precio_losn[${bservice.baservices_id}]" id="precio_losn-${
              bservice.baservices_id
            }" class="form-control money elem-${
              bservice.baservices_id
            } required" maxlength="14" disabled="disabled" placeholder="Costo LOS'N *" onkeyup="calcula_profit(${
              bservice.baservices_id
            })">
						<br>

						<h4>Profit <span class="text-primary" id="label-profit-${bservice.baservices_id}">$0</span></h4>
						<br>
						</td>

						<td data-title="Embarque y entrega">
						Embarque: <strong>${bservice.ship_name}</strong>
						<br>
						Servicio: <strong>SERV</strong>
						<br>
						Clase: <strong>CLASS</strong>
						<br>
						Item: <strong>ITEM</strong>
						<br>
						Tiempo de entrega: : <strong>${bservice.delivery_time}</strong>
						</td>
						</tr>
						`

            $( '#costo, #tiempo, #origen_cot, #destino_cot, #moneda' ).val( '' )
            $( '#carrier_id, #shipment_id' ).val( null ).trigger( 'change' )

            $( '#table-data-control' ).append( contentHTML )

            $( '.money' ).mask( '000,000,000.00', { reverse: true } )
            $( '.exchange' ).mask( '00.0000', { reverse: true } )
            $( '.weight' ).mask( '000,000,000.00', { reverse: true } )
            $( '.numbers' ).mask( '000,000,000', { reverse: true } )
          } )
        } else {
          toastr[response.response_type]( response.message )
        }
      },
      error() {
        toastr[response.response_type]( response.message )
      },
      complete() {
        window.setTimeout( () => {
          $( '#modal-loading-control' ).modal( 'hide' )
        }, 350 )
      },
    } )
  } )

  Mousetrap.bind( ['alt+t'], () => {
    window.location.href = $( '#goto-add-budgets' ).attr( 'href' )
  } )

  Mousetrap.bind( ['alt+s'], () => {
    window.location.href = $( '#goto-add-shippers' ).attr( 'href' )
  } )
} )

function update_service_data( baservicesId ) {
  // Saca de qui el ID compa, ya se, de nada (>'')>
  if ( $( `#check-bservice-${baservicesId}` ).is( ':checked' ) ) {
    selectedServices.push( baservicesId )
    $( `.elem-${baservicesId}` ).removeAttr( 'disabled' )
  } else {
    $( `.elem-${baservicesId}` ).attr( 'disabled', 'disabled' )
    selectedServices.splice( selectedServices.indexOf( baservicesId ), 1 )
  }
}

function calcula_profit( baservicesId ) {
  const precioCliente = $( `#precio-cliente-${baservicesId}` ).html()
  const costoLosn = $( `#precio_losn-${baservicesId}` ).val()

  const profit = new Intl.NumberFormat().format(
    parseFloat( precioCliente.replace( ',', '' ) ) - parseFloat( costoLosn.replace( ',', '' ) ),
  )

  if ( !Number.isNaN( profit ) ) {
    $( `#label-profit-${baservicesId}` ).html(
      `$${profit} ${$( `#currency-type-${baservicesId}` ).html()}`,
    )
  } else {
    $( `#label-profit-${baservicesId}` ).html( '' )
  }
}
