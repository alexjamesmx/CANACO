jQuery( document ).ready( ( $ ) => {
  const baseFormAction = $( '#form-edit-invoice' ).attr( 'action' )

  $( '.btn-add-invoice' ).click( () => {
    $( '#modal-create-invoice' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-invoice' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#modal-create-invoice' ).on( 'shown.bs.modal', () => {
    autofocus( '#invoice', 250 )
  } )

  $( '#modal-edit-invoice' ).on( 'shown.bs.modal', () => {
    autofocus( '#invoice_e', 250 )
  } )

  $( '#filter_invoices' ).change( () => {
    $( '#card-search-invoices' ).slideToggle( 400 )
  } )

  $( '#form-create-invoice' ).validate( {
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

  $( '#modal-edit-invoice' ).on( 'show.bs.modal', () => {
    const jQform = $( '#form-edit-invoice' )
    $(
      '#form-edit-invoice input, #form-edit-invoice select, #form-edit-invoice textarea, #form-edit-invoice button',
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
            '#form-edit-invoice input, #form-edit-invoice select, #form-edit-invoice textarea, #form-edit-invoice button',
          ).removeAttr( 'disabled', 'disabled' )

          $( '#form-edit-invoice' ).attr(
            'action',
            base_url( `app/invoices/doupdate/${response.bill_data.bill_id}` ),
          )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-invoice' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-invoice' ).on( 'hidden.bs.modal ', () => {
    $( '#form-edit-invoice' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-invoice input, #form-edit-invoice select, #form-edit-invoice textarea, #form-edit-invoice button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-invoice input, #form-edit-invoice textarea' ).val( '' )
  } )

  $( '#form-edit-invoice' ).validate( {
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

function editainovice( invoice_id ) {
  $( '#form-edit-inovice' ).attr( 'action', `${$( '#form-edit-inovice' ).attr( 'action' )}/${invoice_id}` )
  $( '#modal-edit-inovice' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function eliminainovice( invoice_id, invoiceName ) {
  if (
    confirm(
      `¿Realmente desea eliminar la factura ${invoiceName}?\n¡Esta acción no puede deshacerse!`,
    )
  ) {
    window.location.href = $( `#link-remove-invoice-${invoice_id}` ).attr( 'href' )
  }
}
