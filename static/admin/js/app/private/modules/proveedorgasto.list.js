jQuery( document ).ready( ( $ ) => {
  const baseFormAction = $( '#form-edit-proveedorgasto' ).attr( 'action' )

  $( '.btn-add-proveedorgasto' ).click( () => {
    $( '#modal-create-proveedorgasto' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-proveedorgasto' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#modal-create-proveedorgasto' ).on( 'shown.bs.modal', () => {
    autofocus( '#prov_nombre', 250 )
  } )

  $( '#modal-edit-proveedorgasto' ).on( 'shown.bs.modal', () => {
    autofocus( '#prov_nombre_e', 250 )
  } )

  $( '#filter_proveedorgasto' ).change( () => {
    $( '#card-search-proveedorgasto' ).slideToggle( 400 )
  } )

  $( '#form-create-proveedorgasto' ).validate( {
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

  $( '#modal-edit-proveedorgasto' ).on( 'show.bs.modal', () => {
    const jQform = $( '#form-edit-proveedorgasto' )
    $(
      '#form-edit-proveedorgasto input, #form-edit-proveedorgasto select, #form-edit-proveedorgasto textarea, #form-edit-proveedorgasto button',
    ).attr( 'disabled', 'disabled' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#prov_nombre_e' ).val( response.proveedorgasto_data.prov_nombre )
          $( '#prov_rfc_e' ).val( response.proveedorgasto_data.prov_rfc )
          $( '#prov_domicilio_e' ).val( response.proveedorgasto_data.prov_domicilio )
          $( '#prov_ciudad_e' ).val( response.proveedorgasto_data.prov_ciudad )
          $( '#prov_cp_e' ).val( response.proveedorgasto_data.prov_cp )
          $( '#prov_plazo_pago_e' ).val( response.proveedorgasto_data.prov_plazo_pago )
          $( '#prov_telefono_e' ).val( response.proveedorgasto_data.prov_telefono )
          $( '#estatus_id_e' ).val( response.proveedorgasto_data.estatus_id )

          $(
            '#form-edit-proveedorgasto input, #form-edit-proveedorgasto select, #form-edit-proveedorgasto textarea, #form-edit-proveedorgasto button',
          ).removeAttr( 'disabled', 'disabled' )
          $( '#form-edit-proveedorgasto' ).attr(
            'action',
            base_url( `app/provexpenses/doupdate/${response.proveedorgasto_data.gasto_proveedor_id}` ),
          )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-proveedorgasto' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-proveedorgasto' ).on( 'hidden.bs.modal ', () => {
    $( '#form-edit-proveedorgasto' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-proveedorgasto input, #form-edit-proveedorgasto select, #form-edit-proveedorgasto textarea, #form-edit-proveedorgasto button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-proveedorgasto input, #form-edit-proveedorgasto textarea' ).val( '' )
  } )

  $( '#form-edit-proveedorgasto' ).validate( {
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

function editaproveedorgasto( gasto_proveedor_id ) {
  $( '#form-edit-proveedorgasto' ).attr(
    'action',
    `${$( '#form-edit-proveedorgasto' ).attr( 'action' )}/${gasto_proveedor_id}`,
  )
  $( '#modal-edit-proveedorgasto' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function eliminaproveedorgasto( gasto_proveedor_id, prov_nombre ) {
  if ( confirm( `¿Realmente desea eliminar ${prov_nombre}?\n¡Esta acción no puede deshacerse!` ) ) {
    window.location.href = $( `#link-remove-proveedorgasto-${gasto_proveedor_id}` ).attr( 'href' )
  }
}
