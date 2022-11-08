const services = []
let controlAction = 0

jQuery( document ).ready( ( $ ) => {
  defGestValue = $( '#gestor' ).attr( 'data-gid' )

  $( '.money' ).mask( '000,000,000.00', { reverse: true } )
  $( '.exchange' ).mask( '00.0000', { reverse: true } )
  $( '.weight' ).mask( '000,000,000.00', { reverse: true } )
  $( '.numbers' ).mask( '000,000,000', { reverse: true } )

  $( '#btn-add-carrier-cot' ).click( ( event ) => {
    const origen = $.trim( $( '#origen_control' ).val().toUpperCase() )
    let destino = $.trim( $( '#destino_control' ).val().toUpperCase() )
    let consigCot = $.trim( $( '#consig_control' ).val().toUpperCase() )
    const carrierId = $.trim( $( '#carrier_id' ).val() )
    const carrierName = $.trim( $( '#carrier_id option:selected' ).text() )
    const costo = $.trim( $( '#costo' ).val() )
    let tiempo = $.trim( $( '#tiempo' ).val().toUpperCase() )
    const tipoEmbarque = $.trim( $( '#shipment_id' ).val() )
    const tipoEmbarqueName = $.trim( $( '#shipment_id option:selected' ).text().toUpperCase() )
    const moneda = $.trim( $( '#moneda' ).val() )
    const monedaName = $.trim( $( '#moneda option:selected' ).text().toUpperCase() )
    const monedaCode = $.trim( $( '#moneda option:selected' ).attr( 'data-code' ) )
    const exchangeHist = $.trim( $( '#control_exchangehist' ).val() )
    let controlClass = $.trim( $( '#control_class' ).val() )
    let controlItem = $.trim( $( '#control_item' ).val() )
    const precioLosn = $.trim( $( '#control_precio_losn' ).val() )
    const gestor = $.trim( $( '#gestor' ).val().toUpperCase() )
    const cserviceType = $.trim( $( '#cservice_type' ).val() )
    const cserviceTypeName = $.trim( $( '#cservice_type option:selected' ).text().toUpperCase() )
    let profit = 0

    controlClass = controlClass.length === 0 ? 'N/A' : controlClass
    controlItem = controlItem === 0 ? 'N/A' : controlItem
    consigCot = consigCot.length === 0 ? 'N/A' : consigCot
    destino = destino.length === 0 ? 'N/A' : destino
    tiempo = tiempo.length === 0 ? 'N/A' : tiempo

    if (
      origen.length !== 0
      && destino.length !== 0
      && carrierId.length !== 0
      && costo.length !== 0
      && tipoEmbarque.length !== 0
      && carrierName.length !== 0
      && tipoEmbarqueName.length !== 0
      && moneda.length !== 0
      && precioLosn.length !== 0
      && gestor.length !== 0
      && cserviceType.length !== 0
      && ( $( '#mpc_kgs' ).is( ':checked' ) || $( '#mpc_libras' ).is( ':checked' ) )
    ) {
      profit = new Intl.NumberFormat().format(
        parseFloat( costo.replace( ',', '' ) ) - parseFloat( precioLosn.replace( ',', '' ) ),
      )

      services.push( {
        carrierId,
        origen,
        destino,
        consigCot,
        controlClass,
        controlItem,
        precioLosn,
        costo,
        tiempo,
        tipoEmbarque,
        moneda,
        monedaName,
        monedaCode,
        exchangeHist,
        gestor,
        cserviceType,
        profit,
      } )

      const contentHTML = `
		<tr id="tr-data-control-${services.length - 1}">

		<td data-title="Información general">
		Origen: <strong>${origen}</strong>
		<br>
		Destino: <strong>${destino}</strong>
		<br>
		Consignatario: <strong>${consigCot}</strong>
		<br>
		Carrier: <strong>${carrierName}</strong>
		</td>

		<td data-title="Costos">
		Costo LOS'N
		<strong>$${precioLosn} ${monedaCode}</strong>
		<br>
		Precio cliente: <strong>$${costo} ${monedaCode}</strong>
		<h4>Profit <span class="text-primary">$${profit} ${monedaCode}</span></h4>
		</td>

		<td data-title="Embarque y entrega">
		Embarque: <strong>${tipoEmbarqueName}</strong>
		<br>
		Servicio: <strong>${cserviceTypeName}</strong>
		<br>
		Clase: <strong>${controlClass}</strong>
		<br>
		Item: <strong>${controlItem}</strong>
		<br>
		Tiempo de entrega: : <strong>${tiempo}</strong>
		</td>

		<td data-title="Eliminar">
		<button type="button" class="btn btn-primary default btn-xs btn-delete-data-control" data-control="${
      services.length - 1
    }" onclick="deleteControl(this);">
		<i class="simple-icon-trash"></i>
		</button>
		</td>

		</tr>`

      $(
        '#origen_control, #destino_control, #consig_control, #control_item,  #control_precio_losn, #control_exchangehist, #costo, #tiempo, #gestor',
      ).val( '' )
      $( '#control_class, #moneda #cservice_type' ).prop( 'selectedIndex', 0 )
      $( '#carrier_id, #shipment_id' ).val( null ).trigger( 'change' )

      $( '#table-data-control' ).append( contentHTML )

      $( '#fecha_factura' ).focus()
    } else {
      toastr.error(
        'Para agregar un servicio se necesitan todos los datos marcados como obligatorios',
      )
    }
  } )

  $( '#form-create-control' ).validate( {
    submitHandler: ( form ) => {
      if ( $( '#mpc_kgs' ).is( ':checked' ) || $( '#mpc_libras' ).is( ':checked' ) ) {
        if ( services.length > 0 ) {
          $( '#modal-loading-control-message' ).html(
            `Guardando ${
              controlAction === 2 ? 'y enviando por correo electrónico ' : ''
            }la información del control`,
          )

          if (
            confirm(
              `Realmente desea guardar ${
                controlAction === 2 ? 'y enviar por correo electrónico ' : ''
              }la información del control`,
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
              data: `${jQform.serialize()}&type=${controlAction}+&services=${encodeURIComponent(
                JSON.stringify( services ),
              )}`,
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

  $( '#form-create-control :input' ).keypress( ( event ) => {
    const keycode = event.keyCode ? event.keyCode : event.which
    if ( keycode === 13 ) return false
  } )

  $( '#client_id' ).change( () => {
    const clientId = $( '#client_id' ).val()
    $( '#contacto, #tels_control, #emails_control' ).val( '' )
    $( '#contacto, #tels_control, #emails_control' ).attr( 'disabled', 'disabled' )
    $.ajax( {
      url: base_url( 'app/controls/getdataclient' ),
      type: 'post',
      dataType: 'json',
      data: {
        client_id: clientId,
      },
      success( response ) {
        if ( response.response_code === 200 ) {
          $( '#contacto' ).val( response.data_client.contacto )
          $( '#tels_control' ).val( response.data_client.telefonos )
          $( '#emails_control' ).val( response.data_client.correos )
          autofocus( '#contacto', 250 )
        } else {
          toastr[response.response_type]( response.message )
        }
      },
      error() {},
      complete() {
        $( '#contacto, #tels_control, #emails_control' ).removeAttr( 'disabled' )
      },
    } )
  } )

  Mousetrap.bind( ['alt+c'], () => {
    window.location.href = $( '#goto-add-clients' ).attr( 'href' )
  } )

  Mousetrap.bind( ['alt+s'], () => {
    window.location.href = $( '#goto-add-shippers' ).attr( 'href' )
  } )

  Mousetrap.bind( ['alt+r'], () => {
    window.location.href = $( '#goto-add-carrier' ).attr( 'href' )
  } )

  Mousetrap.bind( ['alt+m'], () => {
    $( '#modal-comments-control' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+t'], () => {
    window.location.href = $( '#goto-add-sghipment' ).attr( 'href' )
  } )

  $( '.btn-comment-control' ).click( () => {
    $( '#modal-comments-control' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#btn-sbmt-save-and-send' ).click( () => {
    controlAction = 2
  } )

  $( '#btn-sbmt-save' ).click( () => {
    controlAction = 1
  } )

  $( '#control_date' ).blur( () => {
    /* Act on the event */
    const dateValue = $( '#control_date' ).val()
    if ( dateValue.length === 10 ) {
      $.ajax( {
        url: base_url( 'app/controls/get_historic_exchange/' ),
        type: 'POST',
        dataType: 'json',
        data: {
          exchange_date: dateValue,
        },
        success( json ) {
          if ( json.response_code === 200 ) {
            $( '#control_exchangehist' ).val( json.exchange )
          }
        },
        error() {},
      } )
    }
  } )

  $( '#control_sheet' ).blur( () => {
    const dateValue = $( '#control_sheet' ).val()
    $.ajax( {
      url: base_url( 'app/controls/is_control_already' ),
      type: 'POST',
      dataType: 'json',
      data: {
        control_sheet: dateValue,
      },
      success: ( json ) => {
        if ( json.response_code === 200 ) {
          if ( json.control_value ) {
            toastr.error( `El control <strong>${dateValue}</strong> ya ha sido dao de alta` )
            $( '#control_sheet' ).val( '' )
            $( '#control_sheet' ).focus()
          }
        }
      },
      error: () => {},
    } )
  } )
} )

function deleteControl( thisElem ) {
  const controlPos = $( thisElem ).attr( 'data-control' )
  $( `#tr-data-control-${controlPos}` ).remove()
  services.splice( controlPos, 1 )
}
