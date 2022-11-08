const services = []
let controlAction = 0
let initCservicesData
let cservicesData = {}

jQuery( document ).ready( ( $ ) => {
  initCservicesData = $.trim( $( '#init_cservices_data' ).val() )

  if ( initCservicesData.length > 0 ) {
    cservicesData = JSON.parse( initCservicesData )

    cservicesData.foreach( ( csd ) => {
      services.push( {
        carrierId: csd.carrier_id,
        origen: csd.cservice_origen,
        destino: csd.cservice_destino,
        consigCot: csd.cservice_consignatario,
        controlClass: csd.cservice_class,
        controlItem: csd.cservice_item,
        precioLosn: csd.cservice_precio_losn,
        costo: csd.cservice_precio_costo,
        tiempo: csd.cservice_delivery_time,
        tipoEmbarque: csd.shipment_id,
        moneda: csd.cservice_currency_value,
        monedaName: csd.cservice_currency_type,
        monedaCode: csd.cservice_currency_type,
        gestor: null,
        cserviceType: csd.cservice_type,
        profit: csd.cservice_precio_profit,
      } )
    } )
  }

  defGestValue = $( '#gestor' ).attr( 'data-gid' )

  $( '.money' ).mask( '000,000,000.00', { reverse: true } )
  $( '.exchange' ).mask( '00.0000', { reverse: true } )
  $( '.weight' ).mask( '000,000,000.00', { reverse: true } )
  $( '.numbers' ).mask( '000,000,000', { reverse: true } )

  $( '#btn-add-carrier-cot' ).click( () => {
    const controlId = $.trim( $( '#cid' ).val() )
    const origen = $.trim( $( '#origen_control' ).val().toUpperCase() )
    let destino = $.trim( $( '#destino_control' ).val().toUpperCase() )
    let consigCot = $.trim( $( '#consig_control' ).val().toUpperCase() )
    const carrierId = $.trim( $( '#carrier_id' ).val() )
    const carrierName = $.trim( $( '#carrier_id option:selected' ).text() )
    const costo = $.trim( $( '#costo' ).val() )
    let tiempo = $.trim( $( '#tiempo' ).val().toUpperCase() )
    const tipoEmbarque = $.trim( $( '#shipment_id' ).val() )
    const tipoEmbarqueName = $.trim( $( '#shipment_id option:selected' ).text().toUpperCase() )
    const moneda = $.trim( $( '#control_exchangehist' ).val() )
    const monedaName = $.trim( $( '#moneda option:selected' ).text().toUpperCase() )
    const monedaCode = $.trim( $( '#moneda option:selected' ).attr( 'data-code' ) )
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
      && monedaCode.length !== 0
      && precioLosn.length !== 0
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
        gestor,
        cserviceType,
        profit,
      } )

      $.ajax( {
        url: `${base_url()}app/controls/create_cservice/${controlId}`,
        type: 'post',
        dataType: 'json',
        data: {
          control_id: controlId,
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
          gestor,
          cserviceType,
          profit,
        },
        success( response ) {
          toastr[response.response_type]( response.message )

          let contentHTML = `
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
                <h4>Profit <span class="text-primary">$${profit} ${monedaCode}</span></h4>`

          if ( monedaCode === 'USD' ) {
            contentHTML += `
                    Tipo de cambio <strong>(${$( '#control_date' ).val()})</strong>
                    <br>
                    <strong>$${moneda}</strong>
                    `
          }
          contentHTML += `</td>

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
                <button type="button" class="btn btn-primary btn-xs btn-delete-data-control" data-control="${
                  services.length - 1
                }" onclick="editControl(this, ${response.returned_id});">
                <i class="simple-icon-pencil"></i>
                </button>
                <button type="button" class="btn btn-danger btn-xs btn-delete-data-control" data-control="${
                  services.length - 1
                }" onclick="deleteControl(this, ${response.returned_id});">
                <i class="simple-icon-trash"></i>
                </button>
                </td>
                </tr>`

          $(
            '#origen_control, #destino_control, #consig_control, #control_item,  #control_precio_losn, #control_exchangehist, #costo, #tiempo, #gestor',
          ).val( '' )
          $( '#control_class, #moneda #cservice_type' ).prop( 'selectedIndex', 0 )
          $( '#carrier_id, #shipment_id' ).val( null ).trigger( 'change' )

          $( '#table-data-control' ).prepend( contentHTML )

          // $("#fecha_factura").focus();
        },
        error() {
          toastr.error( 'Ocurrió un error, por favor intenta nuevamente' )
        },
      } )
    } else {
      toastr.error(
        'Para agregar un servicio se necesitan todos los datos marcados como obligatorios',
      )
    }
  } )

  $( '#form-update-control' ).validate( {
    submitHandler: ( form ) => {
      if ( $( '#mpc_kgs' ).is( ':checked' ) || $( '#mpc_libras' ).is( ':checked' ) ) {
        if ( services.length > 0 ) {
          $( '#modal-loading-control-message' ).html(
            `Guardando ${
              controlAction == 2 ? 'y enviando por correo electrónico ' : ''
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

  $( '#form-update-control :input' ).keypress( ( event ) => {
    const keycode = event.keyCode ? event.keyCode : event.which
    if ( keycode === 13 ) return false
  } )

  $( '#client_id' ).change( ( event ) => {
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
            $( '#control_exchangehist, #control_exchangehist_e' ).val( json.exchange )
          }
        },
        error() {},
      } )
    }
  } )

  window.setTimeout( () => {
    $( '#control_date' ).trigger( 'blur' )
  }, 350 )

  $( '#modal-edit-cservice' ).on( 'hide.bs.modal', () => {
    $( '#modal-edit-cservice' ).trigger( 'reset' )
  } )

  $( '#form-edit-cservice' ).validate( {
    submitHandler: () => {
      const controlId = $.trim( $( '#cid' ).val().toUpperCase() )
      const cserviceId = $.trim( $( '#csid' ).val().toUpperCase() )
      const origen = $.trim( $( '#origen_control_e' ).val().toUpperCase() )
      let destino = $.trim( $( '#destino_control_e' ).val().toUpperCase() )
      let consigCot = $.trim( $( '#consig_control_e' ).val().toUpperCase() )
      const carrierId = $.trim( $( '#carrier_id_e' ).val() )
      const carrierName = $.trim( $( '#carrier_id_e option:selected' ).text() )
      const costo = $.trim( $( '#costo_e' ).val() )
      let tiempo = $.trim( $( '#tiempo_e' ).val().toUpperCase() )
      const tipoEmbarque = $.trim( $( '#shipment_id_e' ).val() )
      const tipoEmbarqueName = $.trim( $( '#shipment_id_e option:selected' ).text().toUpperCase() )
      const moneda = $.trim( $( '#control_exchangehist_e' ).val() )
      const monedaName = $.trim( $( '#moneda_e option:selected' ).text().toUpperCase() )
      const monedaCode = $.trim( $( '#moneda_e option:selected' ).attr( 'data-code' ) )
      let controlClass = $.trim( $( '#control_class_e' ).val() )
      let controlItem = $.trim( $( '#control_item_e' ).val() )
      const precioLosn = $.trim( $( '#control_precio_losn_e' ).val() )
      const gestor = ''
      const cserviceType = $.trim( $( '#cservice_type_e' ).val() )
      const cserviceTypeName = $.trim( $( '#cservice_type_e option:selected' ).text().toUpperCase() )
      let profit = 0
      const controlPos = parseInt( $( '#control_pos' ).val() )

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
        && cserviceType.length !== 0
        && ( $( '#mpc_kgs' ).is( ':checked' ) || $( '#mpc_libras' ).is( ':checked' ) )
      ) {
        profit = new Intl.NumberFormat().format(
          parseFloat( costo.replace( ',', '' ) ) - parseFloat( precioLosn.replace( ',', '' ) ),
        )

        services[controlPos].controlId = controlId
        services[controlPos].cserviceId = cserviceId
        services[controlPos].carrierId = carrierId
        services[controlPos].origen = origen
        services[controlPos].destino = destino
        services[controlPos].consigCot = consigCot
        services[controlPos].controlClass = controlClass
        services[controlPos].controlItem = controlItem
        services[controlPos].precioLosn = precioLosn
        services[controlPos].costo = costo
        services[controlPos].tiempo = tiempo
        services[controlPos].tipoEmbarque = tipoEmbarque
        services[controlPos].moneda = moneda
        services[controlPos].monedaName = monedaName
        services[controlPos].monedaCode = monedaCode
        services[controlPos].gestor = gestor
        services[controlPos].cserviceType = cserviceType
        services[controlPos].profit = profit

        $.ajax( {
          url: `${base_url()}app/controls/doupdate_cservice/${controlId}`,
          type: 'post',
          dataType: 'json',
          data: {
            cserviceId: services[controlPos].cserviceId,
            controlId: services[controlPos].controlId,
            carrierId: services[controlPos].carrierId,
            origen: services[controlPos].origen,
            destino: services[controlPos].destino,
            consigCot: services[controlPos].consigCot,
            controlClass: services[controlPos].controlClass,
            controlItem: services[controlPos].controlItem,
            precioLosn: services[controlPos].precioLosn,
            costo: services[controlPos].costo,
            tiempo: services[controlPos].tiempo,
            tipoEmbarque: services[controlPos].tipoEmbarque,
            moneda: services[controlPos].moneda,
            monedaName: services[controlPos].monedaName,
            monedaCode: services[controlPos].monedaCode,
            gestor: services[controlPos].gestor,
            cserviceType: services[controlPos].cserviceType,
            profit: services[controlPos].profit,
          },
          success( response ) {
            toastr[response.response_type]( response.message )
          },
          error() {
            toastr.error( 'Ocurrió un error, por favor intenta nuevamente' )
          },
        } )

        let contentHTML = `
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
        <h4>Profit <span class="text-primary">$${profit} ${monedaCode}</span></h4>`

        if ( monedaCode === 'USD' ) {
          contentHTML += `
            Tipo de cambio <strong>(${$( '#control_date' ).val()})</strong>
            <br>
            <strong>$${moneda}</strong>
            `
        }

        contentHTML += `
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
        <button type="button" class="btn btn-primary btn-xs btn-delete-data-control" data-control="${controlPos}" onclick="editControl(this, ${cserviceId});">
        <i class="simple-icon-pencil"></i>
        </button>
        <!--<button type="button" class="btn btn-danger btn-xs btn-delete-data-control" data-control="${controlPos}" onclick="deleteControl(this, ${cserviceId});">
        <i class="simple-icon-trash"></i>
        </button>-->
        </td>`

        $( `#tr-data-control-${controlPos}` ).html( contentHTML )

        $( '#modal-edit-cservice' ).modal( 'hide' )

        $(
          '#origen_control, #destino_control, #consig_control, #control_item,  #control_precio_losn, #control_exchangehist, #costo, #tiempo, #gestor',
        ).val( '' )
        $( '#control_class, #moneda #cservice_type' ).prop( 'selectedIndex', 0 )
        $( '#carrier_id, #shipment_id' ).val( null ).trigger( 'change' )
      }
    },
  } )
} )

function deleteControl( thisElem, cserviceId ) {
  const controlPos = $( thisElem ).attr( 'data-control' )
  if ( confirm( '¿Realmente deseas eliminar este servició?' ) ) {
    $( `#tr-data-control-${controlPos}` ).remove()
    services.splice( controlPos, 1 )

    $.ajax( {
      url: `${base_url()}app/controls/delete_cservice/${$( thisElem ).attr( 'data-cid' )}`,
      type: 'post',
      dataType: 'json',
      data: {
        cserviceId,
      },
      success( response ) {
        toastr[response.response_type]( response.message )
      },
      error( a, b, c ) {
        toastr.error( 'Ocurrió un error, por favor intenta nuevamente' )
      },
    } )
  }
}

function initEditcserbiceModal( cserviceData ) {
  $( '#csid' ).val( cserviceData.cserviceId )
  $( '#control_pos' ).val( cserviceData.controlPos )
  $( '#origen_control_e' ).val( cserviceData.origen )
  $( '#destino_control_e' ).val( cserviceData.destino )
  $( '#consig_control_e' ).val( cserviceData.consigCot )
  $( '#control_class_e' ).val( cserviceData.controlClass )
  $( '#control_item_e' ).val( cserviceData.controlItem )
  $( '#cservice_type_e' ).val( cserviceData.cserviceType )
  $( '#moneda_e option' )[cserviceData.monedaCode === 'USD' ? 1 : 2].selected = true
  $( '#control_precio_losn_e' ).val( cserviceData.precioLosn )
  $( '#costo_e' ).val( cserviceData.costo )
  $( '#control_exchangehist_e' ).val( cserviceData.moneda )
  $( '#tiempo_e' ).val( cserviceData.tiempo )

  $( '#shipment_id_e' ).select2( {
    theme: 'bootstrap',
    placeholder: '',
    maximumSelectionSize: 6,
    containerCssClass: ':all:',
    dropdownParent: $( '#modal-edit-cservice' ),
  } )
  $( '#shipment_id_e' ).val( cserviceData.tipoEmbarque )
  $( '#shipment_id_e' ).trigger( 'change' )

  $( '#carrier_id_e' ).select2( {
    theme: 'bootstrap',
    placeholder: '',
    maximumSelectionSize: 6,
    containerCssClass: ':all:',
    dropdownParent: $( '#modal-edit-cservice' ),
  } )
  $( '#carrier_id_e' ).val( cserviceData.carrierId )
  $( '#carrier_id_e' ).trigger( 'change' )

  $( '#control_date' ).trigger( 'blur' )

  $( '#modal-edit-cservice' ).modal( {
    backdrop: 'static',
    keyboard: false,
    show: true,
  } )
}
function editControl( thisElem, cserviceId ) {
  const controlPos = $( thisElem ).attr( 'data-control' )
  const cserviceData = services[controlPos]
  cserviceData.cserviceId = cserviceId
  cserviceData.controlPos = controlPos
  initEditcserbiceModal( cserviceData )
}
