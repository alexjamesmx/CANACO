jQuery( document ).ready( ( $ ) => {
  const baseFormAction = $( '#form-edit-rol' ).attr( 'action' )

  $( '.btn-add-rol' ).click( () => {
    $( '#modal-create-rol' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-rol' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
    window.setTimeout( () => {
      $( '#nombre_rol' ).focus()
    }, 350 )
  } )

  $( '#modal-create-rol' ).on( 'shown.bs.modal', () => {
    autofocus( '#nombre_rol', 250 )
  } )

  $( '#modal-edit-rol' ).on( 'shown.bs.modal', () => {
    autofocus( '#nombre_rol_e', 250 )
  } )

  $( '#form-create-rol' ).validate( {
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

  $( '#modal-edit-rol' ).on( 'shown.bs.modal', () => {
    autofocus( '#nombre_rol_e', 250 )
  } )

  $( '#modal-edit-rol' ).on( 'show.bs.modal', () => {
    const jQform = $( '#form-edit-rol' )
    $(
      '#form-edit-rol input, #form-edit-rol select, #form-edit-rol textarea, #form-edit-rol button',
    ).attr( 'disabled', 'disabled' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#nombre_rol_e' ).val( response.role_data.nombre_rol )
          $( '#desc_rol_e' ).val( response.role_data.desc_rol )
          $( '#estatus_id_e' ).val( response.role_data.estatus_id )

          $(
            '#form-edit-rol input, #form-edit-rol select, #form-edit-rol textarea, #form-edit-rol button',
          ).removeAttr( 'disabled', 'disabled' )

          $( '#form-edit-rol' ).attr(
            'action',
            base_url( `app/roles/doupdate/${response.role_data.rol_id}` ),
          )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-rol' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-rol' ).on( 'hidden.bs.modal ', () => {
    $( '#form-edit-rol' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-rol input, #form-edit-rol select, #form-edit-rol textarea, #form-edit-rol button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-rol input, #form-edit-rol textarea' ).val( '' )
  } )

  $( '#form-edit-rol' ).validate( {
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

function editarol( rolId ) {
  $( '#form-edit-rol' ).attr( 'action', `${$( '#form-edit-rol' ).attr( 'action' )}/${rolId}` )
  $( '#modal-edit-rol' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function editpermis( rolId ) {
  $( '#form-edit-perms' ).attr( 'action', `${$( '#form-edit-perms' ).attr( 'action' )}/${rolId}` )
  $( '#modal-edit-perms' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function eliminarol( rolId, nombreRol ) {
  if (
    confirm(
      `¿Realmente desea eleminiar el rol ${nombreRol}?\n¡TODOS LOS USUARIOS DEPENDIENTES PERDERAN SU ACCESO!`,
    )
  ) {
    window.location.href = $( `#link-remove-rol-${rolId}` ).attr( 'href' )
  }
}
