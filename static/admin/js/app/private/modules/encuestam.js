function like( id, nombre ) {
  $.ajax( {
    url: `${base_url()}app/Morty/add_reaccion`,
    dataType: 'json',
    type: 'post',
    data: {
      id_personaje: id,
      nombre_personaje: nombre,
      reaccion: 1,
    },
    success( data ) {
      $( `#dislikes${id}` ).text( `${data.dislikes} Dislikes` )
      $( `#likes${id}` ).text( `${data.likes} like` )
    },
    error: () => {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
    },
    complete() {
      //   btnCancel.removeAttr('disabled');
    },
  } )
}
function dislike( id, nombre ) {
  $.ajax( {
    url: `${base_url()}app/Morty/add_reaccion`,
    dataType: 'json',
    type: 'post',
    data: {
      id_personaje: id,
      nombre_personaje: nombre,
      reaccion: 0,
    },
    success( data ) {
      $( `#dislikes${id}` ).text( `${data.dislikes} Dislikes` )
      $( `#likes${id}` ).text( `${data.likes} like` )
    },
    error: () => {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
    },
    complete() {
      //   btnCancel.removeAttr('disabled');
    },
  } )
}
