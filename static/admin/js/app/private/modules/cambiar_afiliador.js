jQuery( document ).ready( ( $ ) => {
  const misdatos = JSON.parse( $( '#info' ).val() )
  let divi
  misdatos.forEach( ( minidato, i ) => {
    divi = `magic${i}`
    $( `#${divi}` ).load( base_url( `app/perfil/profiles/${minidato.usuario_id}` ) )
  } )
} )

function actualizar( usuario ) {
  const afiliador = document.getElementById( `afiliadores${usuario}` ).value

  document.getElementById( 'actualizar' ).disabled = true
  $.ajax( {
    url: `${base_url()}app/AfiliadorComercioUsuario/updates_afiliador`,
    dataType: 'json',
    type: 'post',
    data: {
      usuario_id: usuario,
      afiliado: afiliador,
    },

    success( json ) {
      toastr.success( json.message )
      document.getElementById( 'actualizar' ).disabled = false
    },
  } )
}
