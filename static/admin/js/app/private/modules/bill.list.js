jQuery( document ).ready( () => {
  const baseFormAction = $( '#form-edit-bill' ).attr( 'action' )

  $( '.btn-add-bill' ).click( () => {
    $( '#modal-create-bill' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-bill' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#modal-create-bill' ).on( 'shown.bs.modal', () => {
    autofocus( '#bill_banco', 250 )
  } )

  $( '#modal-edit-bill' ).on( 'shown.bs.modal', () => {
    autofocus( '#bill_banco_e', 250 )
  } )

  $( '#filter_bills' ).change( () => {
    $( '#card-search-bills' ).slideToggle( 400 )
  } )

  $( '#form-create-bill' ).validate( {
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

  $( '#modal-edit-bill' ).on( 'show.bs.modal', ( e ) => {
    const jQform = $( '#form-edit-bill' )
    $(
      '#form-edit-bill input, #form-edit-bill select, #form-edit-bill textarea, #form-edit-bill button',
    ).attr( 'disabled', 'disabled' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#bill_banco_e' ).val( response.bill_data.bill_banco )
          $( '#bill_titular_e' ).val( response.bill_data.bill_titular )
          $( '#bill_numero_e' ).val( response.bill_data.bill_numero )
          $( '#bill_numero_e' ).val( response.bill_data.bill_numero )
          $( '#bill_alias_e' ).val( response.bill_data.bill_alias )

          $( '#estatus_id_e' ).val( response.bill_data.estatus_id )

          $(
            '#form-edit-bill input, #form-edit-bill select, #form-edit-bill textarea, #form-edit-bill button',
          ).removeAttr( 'disabled', 'disabled' )

          $( '#form-edit-bill' ).attr(
            'action',
            base_url( `app/bills/doupdate/${response.bill_data.bill_id}` ),
          )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-bill' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-bill' ).on( 'hidden.bs.modal ', () => {
    $( '#form-edit-bill' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-bill input, #form-edit-bill select, #form-edit-bill textarea, #form-edit-bill button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-bill input, #form-edit-bill textarea' ).val( '' )
  } )

  $( '#form-edit-bill' ).validate( {
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

function editabill( billId ) {
  $( '#form-edit-bill' ).attr( 'action', `${$( '#form-edit-bill' ).attr( 'action' )}/${billId}` )
  $( '#modal-edit-bill' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function eliminabill( billId, billName ) {
  if ( confirm( `¿Realmente desea eliminar ${billName}?\n¡Esta acción no puede deshacerse!` ) ) {
    window.location.href = $( `#link-remove-bill-${billId}` ).attr( 'href' )
  }
}
