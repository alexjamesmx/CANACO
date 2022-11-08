jQuery( document ).ready( ( $ ) => {
  const baseFormAction = $( '#form-edit-gastos' ).attr( 'action' )

  $( '.btn-add-gastos' ).click( () => {
    $( '#modal-create-gastos' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-gastos' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#modal-create-gastos' ).on( 'shown.bs.modal', () => {
    autofocus( '#prov_nombre', 250 )
  } )

  $( '#modal-edit-gastos' ).on( 'shown.bs.modal', () => {
    autofocus( '#prov_nombre_e', 250 )
  } )

  $( '#filter_gastos' ).change( () => {
    $( '#card-search-gastos' ).slideToggle( 400 )
  } )

  $( '#form-create-gastos' ).validate( {
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

  $( '#modal-edit-gastos' ).on( 'show.bs.modal', () => {
    const jQform = $( '#form-edit-gastos' )
    $(
      '#form-edit-gastos input, #form-edit-gastos select, #form-edit-gastos textarea, #form-edit-gastos button',
    ).attr( 'disabled', 'disabled' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#gasto_nombre_e' ).val( response.gastos_data.gasto_nombre )
          $( '#gasto_rfc_e' ).val( response.gastos_data.gasto_rfc )
          $( '#gasto_domicilio_e' ).val( response.gastos_data.gasto_domicilio )
          $( '#gasto_ciudad_e' ).val( response.gastos_data.gasto_ciudad )
          $( '#gasto_cp_e' ).val( response.gastos_data.gasto_cp )
          $( '#gasto_plazo_pago_e' ).val( response.gastos_data.gasto_plazo_pago )
          $( '#gasto_telefono_e' ).val( response.gastos_data.gasto_telefono )
          $( '#estatus_id_e' ).val( response.gastos_data.estatus_id )

          $(
            '#form-edit-gastos input, #form-edit-gastos select, #form-edit-gastos textarea, #form-edit-gastos button',
          ).removeAttr( 'disabled', 'disabled' )
          $( '#form-edit-gastos' ).attr(
            'action',
            base_url( `app/provexpenses/doupdate/${response.gastos_data.gasto_id}` ),
          )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-gastos' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-gastos' ).on( 'hidden.bs.modal ', () => {
    $( '#form-edit-gastos' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-gastos input, #form-edit-gastos select, #form-edit-gastos textarea, #form-edit-gastos button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-gastos input, #form-edit-gastos textarea' ).val( '' )
  } )

  $( '#form-edit-gastos' ).validate( {
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

function editagastos( gasto_id ) {
  $( '#form-edit-gastos' ).attr( 'action', `${$( '#form-edit-gastos' ).attr( 'action' )}/${gasto_id}` )
  $( '#modal-edit-gastos' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function eliminagastos( gasto_id, gasto_nombre ) {
  if ( confirm( `¿Realmente desea eliminar ${gasto_nombre}?\n¡Esta acción no puede deshacerse!` ) ) {
    window.location.href = $( `#link-remove-gastos-${gasto_id}` ).attr( 'href' )
  }
}
