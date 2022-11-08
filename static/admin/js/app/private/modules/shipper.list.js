jQuery( document ).ready( () => {
  const baseFormAction = $( '#form-edit-shipper' ).attr( 'action' )

  $( '.btn-add-shipper' ).click( () => {
    $( '#modal-create-shipper' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-shipper' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#modal-create-shipper' ).on( 'shown.bs.modal', () => {
    autofocus( '#shipper_name', 250 )
  } )

  $( '#modal-edit-shipper' ).on( 'shown.bs.modal', () => {
    autofocus( '#shipper_name_e', 250 )
  } )

  $( '#filter_shippers' ).change( () => {
    $( '#card-search-shippers' ).slideToggle( 400 )
  } )

  $( '#form-create-shipper' ).validate( {
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

  $( '#modal-edit-shipper' ).on( 'show.bs.modal', () => {
    const jQform = $( '#form-edit-shipper' )
    $(
      '#form-edit-shipper input, #form-edit-shipper select, #form-edit-shipper textarea, #form-edit-shipper button',
    ).attr( 'disabled', 'disabled' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#shipper_name_e' ).val( response.shipper_data.shipper_name )
          $( '#shipper_contact_e' ).val( response.shipper_data.shipper_contact )

          $( '#shipper_rfc_e' ).val( response.shipper_data.shipper_rfc )
          $( '#shipper_tel_e' ).val( response.shipper_data.shipper_tel )
          $( '#shipper_telext_e' ).val( response.shipper_data.shipper_telext )
          $( '#shipper_email_e' ).val( response.shipper_data.shipper_email )
          $( '#estatus_id_e' ).val( response.shipper_data.estatus_id )

          $(
            '#form-edit-shipper input, #form-edit-shipper select, #form-edit-shipper textarea, #form-edit-shipper button',
          ).removeAttr( 'disabled', 'disabled' )

          $( '#form-edit-shipper' ).attr(
            'action',
            base_url( `app/shippers/doupdate/${response.shipper_data.shipper_id}` ),
          )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-shipper' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-shipper' ).on( 'hidden.bs.modal ', () => {
    $( '#form-edit-shipper' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-shipper input, #form-edit-shipper select, #form-edit-shipper textarea, #form-edit-shipper button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-shipper input, #form-edit-shipper textarea' ).val( '' )
  } )

  $( '#form-edit-shipper' ).validate( {
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
          window.setTimeout( () => {}, 1500 )
        },
      } )
    },
  } )
} )

function editashipper( shipperId ) {
  $( '#form-edit-shipper' ).attr( 'action', `${$( '#form-edit-shipper' ).attr( 'action' )}/${shipperId}` )
  $( '#modal-edit-shipper' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function eliminashipper( shipperId, shipperName ) {
  if ( confirm( `¿Realmente desea eliminar ${shipperName}?\n¡Esta acción no puede deshacerse!` ) ) {
    window.location.href = $( `#link-remove-shipper-${shipperId}` ).attr( 'href' )
  }
}
