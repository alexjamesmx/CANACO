jQuery( document ).ready( ( $ ) => {
  const misdatos = JSON.parse( $( '#info' ).val() )
  let divi
  misdatos.forEach( ( minidato, i ) => {
    divi = `magic${i}`

    $( `#${divi}` ).load( base_url( `app/perfil/profiles/${minidato.usuario_id}` ) )
  } )
  cargar_notas()
} )

function alta_nota( id ) {
  titulo = $( '#nota_titulo' ).val()
  nota = $( '#nota_cuerpo' ).val()

  if ( nota !== '' || titulo !== '' ) {
    $.ajax( {
      url: `${base_url()}app/afiliador/upNota/`,
      type: 'post',
      data: {
        id,
        titulo,
        cuerpo: nota,
      },
      dataType: 'json',
      success() {
        toastr.success( "<i class='fas fa-spinner fa-pulse'></i> Nota agregada exitosamente" )
        cargar_notas()
      },
    } )
  } else {
    toastr.warning( 'Por favor llena todos los campos' )
  }
}

function cargar_notas() {
  id = $( '#anid' ).val()
  $( '#notas' ).load( base_url( `app/afiliador/lista_notas/${id}` ) )
}
