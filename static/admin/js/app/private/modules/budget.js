const services = []
let budgetAction = 0

jQuery( document ).ready( ( $ ) => {
  $( '.money' ).mask( '000,000,000.00', { reverse: true } )
  $( '.weight' ).mask( '000,000,000.00', { reverse: true } )
  $( '.numbers' ).mask( '000,000,000', { reverse: true } )

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
			<button type="button" class="btn btn-primary btn-xs btn-delete-data-budget" data-budget="${
        services.length - 1
      }" onclick="editBudget(this);">
			<i class="simple-icon-pencil"></i>
			</button>
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

  $( '#form-create-budget' ).validate( {
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
                if ( response.response_code === 200 ) {
                  window.setTimeout( () => {
                    window.location.href = base_url( 'app/budgets' )
                  }, 1500 )
                }
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

  $( '#form-create-budget :input' ).keypress( ( event ) => {
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

  $( '#form-edit-bservice' ).validate( {
    submitHandler: ( form ) => {
      const origen = $.trim( $( '#origen_cot_e' ).val().toUpperCase() )
      let destino = $.trim( $( '#destino_cot_e' ).val().toUpperCase() )
      const carrierId = $.trim( $( '#carrier_id_e' ).val() )
      const carrierName = $.trim( $( '#carrier_id_e option:selected' ).text() )
      const costo = $.trim( $( '#costo_e' ).val() )
      let tiempo = $.trim( $( '#tiempo_e' ).val().toUpperCase() )
      const tipoEmbarque = $.trim( $( '#shipment_id_e' ).val() )
      const tipoEmbarqueName = $.trim( $( '#shipment_id_e option:selected' ).text().toUpperCase() )
      const moneda = $.trim( $( '#moneda_e' ).val() )
      const monedaName = $.trim( $( '#moneda_e option:selected' ).text().toUpperCase() )
      const monedaCode = $.trim( $( '#moneda_e option:selected' ).attr( 'data-code' ) )
      const cserviceType = $.trim( $( '#cservice_type_e' ).val() )
      const cserviceTypeName = $.trim( $( '#cservice_type_e option:selected' ).text().toUpperCase() )
      let controlClass = $.trim( $( '#control_class_e' ).val() )
      let controlItem = $.trim( $( '#control_item_e' ).val() )
      const budgetPos = $( '#budget_pos' ).val()

      controlClass = controlClass.length == 0 ? 'N/A' : controlClass
      controlItem = controlItem == 0 ? 'N/A' : controlItem
      destino = destino.length == 0 ? 'N/A' : destino
      tiempo = tiempo.length == 0 ? 'N/A' : tiempo

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
        services[budgetPos].carrierId = carrierId
        services[budgetPos].origen = origen
        services[budgetPos].destino = destino
        services[budgetPos].costo = costo
        services[budgetPos].tiempo = tiempo
        services[budgetPos].tipoEmbarque = tipoEmbarque
        services[budgetPos].moneda = moneda
        services[budgetPos].monedaName = monedaName
        services[budgetPos].monedaCode = monedaCode
        services[budgetPos].cserviceType = cserviceType
        services[budgetPos].controlClass = controlClass
        services[budgetPos].controlItem = controlItem

        const contentHTML = `
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
				<button type="button" class="btn btn-primary btn-xs btn-delete-data-budget" data-budget="${budgetPos}" onclick="editBudget(this);">
				<i class="simple-icon-pencil"></i>
				</button>
				<button type="button" class="btn btn-danger btn-xs btn-delete-data-budget" data-budget="${budgetPos}" onclick="deleteBudget(this);">
				<i class="simple-icon-trash"></i>
				</button>
				</td>
				`

        $( '#costo, #tiempo, #origen_cot, #destino_cot, #moneda' ).val( '' )
        $( '#carrier_id, #shipment_id' ).val( null ).trigger( 'change' )

        $( `#tr-data-budget-${budgetPos}` ).html( contentHTML )

        $( '#modal-edit-bservice' ).modal( 'hide' )
      }
    },
  } )
} )

function deleteBudget( thisElem ) {
  const budgetPos = $( thisElem ).attr( 'data-budget' )
  if ( confirm( '¿Realmente deseas eliminar este servicio d ela cotización?' ) ) {
    $( `#tr-data-budget-${budgetPos}` ).remove()
    services.splice( budgetPos, 1 )
  }
}

function initEditbserbiceModal( bserviceData ) {
  $( '#budget_pos' ).val( bserviceData.budgetPos )
  $( '#origen_cot_e ' ).val( bserviceData.origen )
  $( '#destino_cot_e' ).val( bserviceData.destino )
  $( '#control_class_e' ).val( bserviceData.controlClass )
  $( '#control_item_e' ).val( bserviceData.controlItem )
  $( '#cservice_type_e' ).val( bserviceData.cserviceType )
  $( '#moneda_e option' )[bserviceData.monedaCode === 'USD' ? 1 : 2].selected = true
  $( '#control_precio_losn_e' ).val( bserviceData.precioLosn )
  $( '#costo_e' ).val( bserviceData.costo )
  $( '#tiempo_e' ).val( bserviceData.tiempo )

  $( '#shipment_id_e' ).select2( {
    theme: 'bootstrap',
    placeholder: '',
    maximumSelectionSize: 6,
    containerCssClass: ':all:',
    dropdownParent: $( '#modal-edit-bservice' ),
  } )
  $( '#shipment_id_e' ).val( bserviceData.tipoEmbarque )
  $( '#shipment_id_e' ).trigger( 'change' )

  $( '#carrier_id_e' ).select2( {
    theme: 'bootstrap',
    placeholder: '',
    maximumSelectionSize: 6,
    containerCssClass: ':all:',
    dropdownParent: $( '#modal-edit-bservice' ),
  } )
  $( '#carrier_id_e' ).val( bserviceData.carrierId )
  $( '#carrier_id_e' ).trigger( 'change' )

  $( '#modal-edit-bservice' ).modal( {
    backdrop: 'static',
    keyboard: false,
    show: true,
  } )
}
function editBudget( thisElem ) {
  const budgetPos = $( thisElem ).attr( 'data-budget' )
  const bserviceData = services[budgetPos]
  bserviceData.budgetPos = budgetPos
  initEditbserbiceModal( bserviceData )
}
