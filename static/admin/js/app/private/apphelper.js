function autofocus( element, wait ) {
  window.setTimeout( () => {
    $( element ).focus()
  }, parseInt( wait, 10 ) )
}

function reinitSelect2() {
  $( '.select2-single, .select2-multiple' ).select2( {
    theme: 'bootstrap',
    placeholder: '',
    maximumSelectionSize: 6,
    containerCssClass: ':all:',
  } )
}

function toggle_parent_modal( elemId, action ) {
  $( elemId ).modal( action )
}
