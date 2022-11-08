function abrimodal( clave ) {
  const myModal = new bootstrap.Modal( document.getElementById( clave.id ) )
  myModal.show()
}
function desactivar_afiliador( id ) {
  const desactivar = $.trim( $( `#desactivar${id}` ).val() )

  if ( desactivar === 'DESACTIVAR' ) {
    document.getElementById( 'deactivar' ).disabled = true
    $.ajax( {
      url: `${base_url()}app/AfiliadorComercioUsuario/baja_afiliador/`,
      dataType: 'json',
      type: 'post',
      data: {
        afiliador: id,
      },
      success( json ) {
        toastr.success( json.message )
        document.getElementById( 'deactivar' ).disabled = false
        window.setTimeout( () => {
          window.location.reload()
        }, 1500 )
      },
    } )
  } else {
    toastr.warning( 'Por favor ingrese lo solicitado' )
  }
}

function actualizar( id ) {
  const nombre = $.trim( $( `#nombre${id}` ).val() )
  const apellido1 = $.trim( $( `#apellido1${id}` ).val() )
  const apellido2 = $.trim( $( `#apellido2${id}` ).val() )
  const telefono_auth = $.trim( $( `#telefono_auth${id}` ).val() )
  const telefono_auth_c = $.trim( $( `#telefono_auth_c${id}` ).val() )
  const email_auth = $.trim( $( `#email_auth${id}` ).val() )
  const email_auth_c = $.trim( $( `#email_auth_c${id}` ).val() )

  let goToValidation = true
  if ( telefono_auth !== telefono_auth_c ) {
    toastr.warning( 'Los teléfonos no coinciden' )
    $( `#telefono_auth${id}` ).focus()
    goToValidation = false
  }

  if ( email_auth !== email_auth_c ) {
    toastr.warning( 'Los e-mail no coinciden' )
    $( `#email_auth${id}` ).focus()
    goToValidation = false
  }
  if ( goToValidation ) {
    $.ajax( {
      url: `${base_url()}app/AfiliadorComercioUsuario/actualizar_afiliador/`,
      dataType: 'json',
      type: 'post',
      data: {
        usuario_id: id,
        nombre,
        apellido1,
        apellido2,
        telefono_auth,
        email_auth,
      },
      success( json ) {
        toastr.success( json.message )
        document.getElementById( 'deactivar' ).disabled = false
      },
      error( json ) {
        toastr.error( json.message )
        document.getElementById( 'deactivar' ).disabled = false
      },
    } )
  }
}
function activar_afiliador( id ) {
  const activar = $.trim( $( `#activar${id}` ).val() )

  if ( activar === 'ACTIVAR' ) {
    document.getElementById( 'bt-activar' ).disabled = true
    $.ajax( {
      url: `${base_url()}app/AfiliadorComercioUsuario/alta_afiliador/`,
      dataType: 'json',
      type: 'post',
      data: {
        afiliador: id,
      },

      success( json ) {
        toastr.success( json.message )

        document.getElementById( 'bt-activar' ).disabled = false
        window.setTimeout( () => {
          window.location.reload()
        }, 1500 )
      },
    } )
  } else {
    toastr.warning( 'Por favor ingrese lo solicitado' )
  }
}

function actualizar_tractora( id ) {
  const nombre = $.trim( $( `#nombre${id}` ).val() )
  const razon = $.trim( $( `#razon${id}` ).val() )
  const rfc = $.trim( $( `#rfc${id}` ).val() )
  const goToValidation = true

  if ( goToValidation ) {
    $.ajax( {
      url: `${base_url()}app/AfiliadorComercioUsuario/actualizar_tractora`,
      dataType: 'json',
      type: 'post',
      data: {
        usuario_id: id,
        nombre,
        razon,
        rfc,
      },
      success( json ) {
        toastr.success( json.message )
        window.setTimeout( () => {
          window.location.reload()
        }, 1500 )
      },
      error( json ) {
        toastr.error( json.message )
      },
    } )
  }
}
