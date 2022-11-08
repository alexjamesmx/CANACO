jQuery( document ).ready( ( $ ) => {
  const misdatos = JSON.parse( $( '#info' ).val() )

  let divi
  misdatos.forEach( ( minidato, i ) => {
    divi = `magic${i}`

    $( `#${divi}` ).load( base_url( `app/perfil/profiles/${minidato.usuario_id}` ) )
  } )
  $( '#data_seguimiento' ).DataTable( {
    language: {
      url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
    },
  } )
} )
