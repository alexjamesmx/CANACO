jQuery( document ).ready( ( $ ) => {
  const misdatos = JSON.parse( $( '#info' ).val() )

  let divi
  misdatos.forEach( ( minidato, i ) => {
    divi = `magic${i}`
    $( `#${divi}` ).load( base_url( `app/perfil/profiles/${minidato.usuario_id}` ) )
  } )
} )
function abrixr( clave, pago ) {
  const myModal = new bootstrap.Modal( document.getElementById( clave.id ) )
  myModal.show()
}

function cambiar_estatus( modal, id ) {
  const validado = document.getElementById( `validados${id}` ).value
  const engomado = document.getElementById( `engomado${id}` ).value
  if ( engomado !== '' && engomado !== undefined && engomado.length > 1 ) {
    alert( engomado )
    if ( validado === 'validado' || validado === 'VALIDADO' || validado === 'Validado' ) {
      $.ajax( {
        url: `${base_url()}app/Afiliacion/afiliacion_complet/${id}`,
        method: 'POST',
        data: {
          a: engomado,
        },
        success() {
          toastr.success( 'Usuario listo' )
          window.location.href = `${base_url()}/app/contaduria/acumulados`
        },
      } )
    } else if ( validado === 'rechazado' || validado === 'RECHAZADO' || validado === 'Rechazado' ) {
      $.ajax( {
        url: `${base_url()}app/Afiliacion/afiliacion_negada/${id}`,
        success() {
          window.setTimeout( () => {
            toastr.warning( 'Se ha rechazado la afiliación' )
            window.location.href = `${base_url()}/app/contaduria/acumulados`
          }, 2000 )
        },
      } )
    } else {
      toastr.warning( 'Por favor escribe lo solicitado' )
    }
  } else {
    toastr.warning( 'Por favor ingresa tu numero de engomado' )
  }
}

function nopegar() {
  toastr.warning( 'Por favor escribe manualmente en este campo' )
  return false
}

function cambiar_estatus_negativos( modal, id ) {
  const validado = $.trim( $( `#validado${id}` ).val() )
  const myModal = new bootstrap.Modal( document.getElementById( modal.id ) )
  if ( validado === 'rechazado' || validado === 'RECHAZADO' || validado === 'Rechazado' ) {
  } else {
    toastr.warning( 'Por favor escribe lo solicitado' )
  }
}

function respuestas( id ) {
  document.getElementById( `spiner_${id}` ).setAttribute( 'style', 'display:block' )
  document.getElementById( `carga_${id}` ).setAttribute( 'style', 'display:block' )
  document.getElementById( `subir_doc_${id}` ).setAttribute( 'style', 'display: none' )
  $.ajax( {
    url: `${base_url()}app/Conta/se_subio_facturas/${id}`,
    dataType: 'json',
    success( data ) {
      if ( data.status === 2 ) {
        toastr[data.response_type]( data.message )
        document.getElementById( `spiner_${id}` ).setAttribute( 'style', 'display:none' )
        document.getElementById( `carga_${id}` ).setAttribute( 'style', 'display:none' )
        document.getElementById( `validadosf${id}` ).setAttribute( 'style', 'display: block' )
        document.getElementById( `botones_${id}` ).setAttribute( 'style', 'display: block' )
      } else if ( data.status === 0 ) {
        toastr[data.response_type]( data.message )
        document.getElementById( `spiner_${id}` ).setAttribute( 'style', 'display:none' )
        document.getElementById( `carga_${id}` ).setAttribute( 'style', 'display:none' )
        document.getElementById( `subir_doc_${id}` ).setAttribute( 'style', 'display: block' )
      }
    },
  } )
}
