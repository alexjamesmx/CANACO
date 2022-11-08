jQuery( document ).ready( () => {
  $( '#filter_appterms' ).change( () => {
    $( '#card-search-appterms' ).slideToggle( 400 )
  } )

  $( '.btn-edit-appterm' ).click( () => {
    $( '#modal-edit-termino' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )
} )
