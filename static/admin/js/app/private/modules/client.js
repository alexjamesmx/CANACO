jQuery( document ).ready( ( $ ) => {
  $( '#btn-modal-create-cliente' ).click( ( event ) => {
    event.preventDefault()

    $( '#modal-create-cliente' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )
} )
