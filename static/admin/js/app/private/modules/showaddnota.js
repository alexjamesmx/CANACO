jQuery( document ).ready( () => {
  $( document ).on( 'click', '.btn-showmodaladdnota', ( event ) => {
    event.preventDefault()

    $( '#modal-addnotaafilporvalidar' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )
} )
