jQuery( document ).ready( () => {
  const misdatos = JSON.parse( $( '#info' ).val() )
  let divi
  misdatos.forEach( ( minidato, i ) => {
    divi = `magic${i}`
    $( `#${divi}` ).load( base_url( `app/perfil/profiles/${minidato.usuario_id}` ) )
  } )
} )
$( document ).ready( () => {} )
