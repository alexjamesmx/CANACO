jQuery( document ).ready( ( $ ) => {
  const baseFormAction = $( '#form-edit-exchange' ).attr( 'action' )

  $( '.local-phone' ).mask( '(000) 000-0000' )
  $( '.exchange' ).mask( '00.0000', { reverse: true } )

  $( '.btn-add-exchange' ).click( () => {
    $( '#modal-create-exchange' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-exchange' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#modal-create-exchange' ).on( 'shown.bs.modal', () => {
    autofocus( '#exchange', 250 )
  } )

  $( '#modal-edit-exchange' ).on( 'shown.bs.modal', () => {
    autofocus( '#exchange_e', 250 )
  } )

  $( '#form-create-exchange' ).validate( {
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
          } else {
            toastr[response.response_type]( response.message )
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

  $( '#modal-edit-exchange' ).on( 'shown.bs.modal', () => {
    autofocus( '#nombre_rol_e', 250 )
  } )

  $( '#modal-edit-exchange' ).on( 'show.bs.modal', () => {
    const jQform = $( '#form-edit-exchange' )
    $(
      '#form-edit-exchange input, #form-edit-exchange select, #form-edit-exchange textarea, #form-edit-exchange button',
    ).attr( 'disabled', 'disabled' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#exchange_e' ).val( response.exchange_data.exchange )
          $(
            '#form-edit-exchange input, #form-edit-exchange select, #form-edit-exchange textarea, #form-edit-exchange button',
          ).removeAttr( 'disabled', 'disabled' )
          $( '#form-edit-exchange' ).attr(
            'action',
            base_url( `app/exchange/doupdate/${response.exchange_data.exchange_id}` ),
          )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-exchange' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-exchange' ).on( 'hidden.bs.modal ', () => {
    $( '#form-edit-exchange' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-exchange input, #form-edit-exchange select, #form-edit-exchange textarea, #form-edit-exchange button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-exchange input, #form-edit-exchange textarea' ).val( '' )
  } )

  $( '#form-edit-exchange' ).validate( {
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

function editatipocambio( exchangeId ) {
  $( '#form-edit-exchange' ).attr(
    'action',
    `${$( '#form-edit-exchange' ).attr( 'action' )}/${exchangeId}`,
  )
  $( '#modal-edit-exchange' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}
