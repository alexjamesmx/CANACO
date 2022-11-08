jQuery( document ).ready( ( $ ) => {
  const baseFormAction = $( '#form-edit-carrier' ).attr( 'action' )

  $( '.btn-add-carrier' ).click( () => {
    $( '#modal-create-carrier' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-carrier' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#modal-create-carrier' ).on( 'shown.bs.modal', () => {
    autofocus( '#carrier_name', 250 )
  } )

  $( '#modal-edit-carrier' ).on( 'shown.bs.modal', () => {
    autofocus( '#carrier_name_e', 250 )
  } )

  $( '#filter_carriers' ).change( () => {
    $( '#card-search-carriers' ).slideToggle( 400 )
  } )

  $( '#form-create-carrier' ).validate( {
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

  $( '#modal-edit-carrier' ).on( 'show.bs.modal', () => {
    const jQform = $( '#form-edit-carrier' )
    $(
      '#form-edit-carrier input, #form-edit-carrier select, #form-edit-carrier textarea, #form-edit-carrier button',
    ).attr( 'disabled', 'disabled' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#carrier_name_e' ).val( response.carrier_data.carrier_name )
          $( '#carrier_contact_e' ).val( response.carrier_data.carrier_contact )

          $( '#carrier_rfc_e' ).val( response.carrier_data.carrier_rfc )
          $( '#carrier_tel_e' ).val( response.carrier_data.carrier_tel )
          $( '#carrier_telext_e' ).val( response.carrier_data.carrier_telext )
          $( '#carrier_email_e' ).val( response.carrier_data.carrier_email )
          $( '#estatus_id_e' ).val( response.carrier_data.estatus_id )

          $(
            '#form-edit-carrier input, #form-edit-carrier select, #form-edit-carrier textarea, #form-edit-carrier button',
          ).removeAttr( 'disabled', 'disabled' )

          $( '#form-edit-carrier' ).attr(
            'action',
            base_url( `app/carriers/doupdate/${response.carrier_data.carrier_id}` ),
          )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-carrier' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-carrier' ).on( 'hidden.bs.modal ', () => {
    $( '#form-edit-carrier' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-carrier input, #form-edit-carrier select, #form-edit-carrier textarea, #form-edit-carrier button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-carrier input, #form-edit-carrier textarea' ).val( '' )
  } )

  $( '#form-edit-carrier' ).validate( {
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

function editacarrier( carrierId ) {
  $( '#form-edit-carrier' ).attr( 'action', `${$( '#form-edit-carrier' ).attr( 'action' )}/${carrierId}` )
  $( '#modal-edit-carrier' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function eliminacarrier( carrierId, carrierName ) {
  if ( confirm( `¿Realmente desea eliminar ${carrierName}?\n¡Esta acción no puede deshacerse!` ) ) {
    window.location.href = $( `#link-remove-carrier-${carrierId}` ).attr( 'href' )
  }
}
