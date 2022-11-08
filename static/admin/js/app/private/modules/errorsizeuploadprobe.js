jQuery( document ).ready( () => {
  const cserviceId = $( '#cservice_id' ).val()
  $( `#progress-bar-${cserviceId}`, window.parent.document ).css( 'width', `${0}%` )
  window.parent.toastr.error( 'Error, el archivo excede los 3 Megabytes.' )
  window.setTimeout( () => {
    $( `#progress-${cserviceId}`, window.parent.document ).hide( 0 )
    window.parent.toggle_parent_modal( '#modal-detail-control', 'hide' )
    $( `#progress-${cserviceId}, #progress-${cserviceId}-legend`, window.parent.document ).hide( 0 )
  }, 1000 )
} )
