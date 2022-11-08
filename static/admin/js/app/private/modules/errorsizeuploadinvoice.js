jQuery( document ).ready( () => {
  const fileType = $( '#file_type' ).val().toLowerCase()
  $( `#progress-bar-${cserviceId}`, window.parent.document ).css( 'width', `${0}%` )
  window.parent.toastr.error( 'Error, el archivo excede los 3 Megabytes.' )
  window.setTimeout( () => {
    $( `#modal-filesinvoice-${fileType}-loader`, window.parent.document )
      .removeClass( 'd-block' )
      .addClass( 'd-none' )
    $( `#modal-filesinvoice-form-${fileType}`, window.parent.document ).show( 0 )
  }, 1000 )
} )
