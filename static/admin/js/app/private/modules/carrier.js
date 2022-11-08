jQuery( document ).ready( ( $ ) => {
  $( '#btn-modal-create-carrier' ).click( ( event ) => {
    event.preventDefault()

    $( '#modal-create-carrier' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )
} )
