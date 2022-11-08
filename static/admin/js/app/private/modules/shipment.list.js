jQuery( document ).ready( ( $ ) => {
  const baseFormAction = $( '#form-edit-shipment' ).attr( 'action' )

  $( '.btn-add-shipment' ).click( () => {
    $( '#modal-create-shipment' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-shipment' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#modal-create-shipment' ).on( 'shown.bs.modal', () => {
    autofocus( '#ship_name', 250 )
  } )

  $( '#modal-edit-shipment' ).on( 'shown.bs.modal', () => {
    autofocus( '#ship_name_e', 250 )
  } )

  $( '#change_password' ).change( () => {
    $( '.group-password' ).slideToggle( 400 )
  } )

  $( '#form-create-shipment' ).validate( {
    submitHandler: ( form ) => {
      const jQform = $( form )
      const btnSbmt = $( form.children[2].getElementsByTagName( 'button' )[0] )
      const btnCancel = $( form.children[2].getElementsByTagName( 'button' )[1] )
      btnSbmt.html(
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
      )
      btnSbmt
        .html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
        )
        .attr( 'disabled', 'disabled' )
      btnCancel.attr( 'disabled', 'disabled' )
      jQform.children( 'input' ).attr( 'disabled', 'disabled' )

      $.ajax( {
        url: jQform.attr( 'action' ),
        type: jQform.attr( 'method' ),
        dataType: jQform.attr( 'data-type' ),
        data: jQform.serialize(),
        success: ( response ) => {
          toastr[response.response_type]( response.message )
          if ( response.response_code === 200 ) {
            window.setTimeout( () => {
              window.location.reload()
            }, 1500 )
          }
        },
        error: () => {
          toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
          window.setTimeout( () => {
            window.location.reload()
          }, 1500 )
        },
      } )
    },
  } )

  $( '#modal-edit-shipment' ).on( 'shown.bs.modal', () => {
    autofocus( '#nombre_rol_e', 250 )
  } )

  $( '#modal-edit-shipment' ).on( 'show.bs.modal', () => {
    const jQform = $( '#form-edit-shipment' )
    $(
      '#form-edit-shipment input, #form-edit-shipment select, #form-edit-shipment textarea, #form-edit-shipment button',
    ).attr( 'disabled', 'disabled' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#ship_name_e' ).val( response.shipment_data.ship_name )
          $( '#ship_desc_e' ).val( response.shipment_data.ship_desc )
          $( '#ship_terms_e' ).val( response.shipment_data.ship_terms )
          $( '#estatus_id_e' ).val( response.shipment_data.estatus_id )

          $(
            '#form-edit-shipment input, #form-edit-shipment select, #form-edit-shipment textarea, #form-edit-shipment button',
          ).removeAttr( 'disabled', 'disabled' )

          $( '#form-edit-shipment' ).attr(
            'action',
            base_url( `app/shipments/doupdate/${response.shipment_data.shipment_id}` ),
          )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-shipment' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-shipment' ).on( 'hidden.bs.modal ', () => {
    $( '#form-edit-shipment' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-shipment input, #form-edit-shipment select, #form-edit-shipment textarea, #form-edit-shipment button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-shipment input, #form-edit-shipment textarea' ).val( '' )
  } )

  $( '#form-edit-shipment' ).validate( {
    submitHandler: ( form ) => {
      const jQform = $( form )
      const btnSbmt = $( form.children[2].getElementsByTagName( 'button' )[0] )
      const btnCancel = $( form.children[2].getElementsByTagName( 'button' )[1] )

      btnSbmt.html(
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
      )
      btnSbmt
        .html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
        )
        .attr( 'disabled', 'disabled' )
      btnCancel.attr( 'disabled', 'disabled' )
      jQform.children( 'input' ).attr( 'disabled', 'disabled' )
      jQform.children( 'input' ).attr( 'disabled', 'disabled' )

      $.ajax( {
        url: jQform.attr( 'action' ),
        type: jQform.attr( 'method' ),
        dataType: jQform.attr( 'data-type' ),
        data: jQform.serialize(),
        success: ( response ) => {
          toastr[response.response_type]( response.message )
          if ( response.response_code === 200 ) {
            window.setTimeout( () => {
              window.location.reload()
            }, 1500 )
          }
        },
        error: () => {
          toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
          window.setTimeout( () => {
            window.location.reload()
          }, 1500 )
        },
      } )
    },
  } )
} )

function editashipment( shipmentId ) {
  $( '#form-edit-shipment' ).attr(
    'action',
    `${$( '#form-edit-shipment' ).attr( 'action' )}/${shipmentId}`,
  )
  $( '#modal-edit-shipment' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function eliminashipment( shipmentId, shipName ) {
  if ( confirm( `¿Realmente desea eliminar ${shipName}?\n¡Esta acción no puede deshacerse!` ) ) {
    window.location.href = $( `#link-remove-shipment-${shipmentId}` ).attr( 'href' )
  }
}
