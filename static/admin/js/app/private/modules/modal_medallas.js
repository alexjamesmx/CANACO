jQuery( document ).ready( ( $ ) => {
  $.ajax( {
    dataType: 'json',
    url: `${base_url()}app/Informacion_perfil/recompensas_mostrar`,
    success( data ) {
      if ( !data.respuesta.length == 0 ) {
        abrixr()
        borrar()
      }
    },
  } )
} )
function abrixr() {
  const myModal = new bootstrap.Modal( document.getElementById( 'medalla' ) )
  myModal.show()
}
function borrar() {
  $.ajax( {
    dataType: 'json',
    url: `${base_url()}app/Informacion_perfil/update`,
    success() {},
  } )
}
