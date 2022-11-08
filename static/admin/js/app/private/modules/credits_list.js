jQuery( document ).ready( ( $ ) => {
  const baseFormAction = $( '#form-edit-credit' ).attr( 'action' )

  $( '.btn-add-credit' ).click( () => {
    $( '#modal-create-credit' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-credit' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#modal-create-credit' ).on( 'shown.bs.modal', () => {
    autofocus( '#credit', 250 )
  } )

  $( '#modal-edit-credit' ).on( 'shown.bs.modal', () => {
    autofocus( '#credit_e', 250 )
  } )

  $( '#filter_credits' ).change( () => {
    $( '#card-search-credits' ).slideToggle( 400 )
  } )

  $( '#form-create-credit' ).validate( {
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

  $( '#modal-edit-credit' ).on( 'show.bs.modal', () => {
    const jQform = $( '#form-edit-credit' )
    $(
      '#form-edit-credit input, #form-edit-credit select, #form-edit-credit textarea, #form-edit-credit button',
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
            '#form-edit-credit input, #form-edit-credit select, #form-edit-credit textarea, #form-edit-credit button',
          ).removeAttr( 'disabled', 'disabled' )

          $( '#form-edit-credit' ).attr(
            'action',
            base_url( `app/invoices/doupdatecredit/${response.bill_data.bill_id}` ),
          )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-credit' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-credit' ).on( 'hidden.bs.modal ', () => {
    $( '#form-edit-credit' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-credit input, #form-edit-credit select, #form-edit-credit textarea, #form-edit-credit button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-credit input, #form-edit-credit textarea' ).val( '' )
  } )

  $( '#form-edit-credit' ).validate( {
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

function editacredit( credit_id ) {
  $( '#form-edit-credit' ).attr( 'action', `${$( '#form-edit-credit' ).attr( 'action' )}/${credit_id}` )
  $( '#modal-edit-credit' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}
function editacreditfinish( credit_id ) {
  if (
    confirm(
      `¿Realmente desea eliminar la nota de crédito ${credit_id}?\n¡Esta acción no puede deshacerse!`,
    )
  ) {
    window.location.href = $( `#link-remove-credit-${credit_id}` ).attr( 'href' )
  }
}

function eliminacredit( credit_id, invoiceName ) {
  if (
    confirm(
      `¿Realmente desea eliminar la nota de crédito ${invoiceName}?\n¡Esta acción no puede deshacerse!`,
    )
  ) {
    window.location.href = $( `#link-remove-credit-${credit_id}` ).attr( 'href' )
  }
}
