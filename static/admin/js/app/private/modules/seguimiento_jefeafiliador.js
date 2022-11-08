jQuery( document ).ready( ( $ ) => {
  const cuantos = $( '#info' ).val()
  for ( let i = 0; i <= cuantos; i++ ) {
    const divi = `magic${i}`
    const ini = $( `#im${i}` ).val()
    $( `#${divi}` ).load( base_url( `app/perfil/profiles/${ini}` ) )
  }
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
