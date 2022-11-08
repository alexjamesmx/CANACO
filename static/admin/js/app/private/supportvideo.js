jQuery( document ).ready( ( $ ) => {
  $( '#link-modal-video-support' ).click( () => {
    $( '#modal-video-support' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )
} )
