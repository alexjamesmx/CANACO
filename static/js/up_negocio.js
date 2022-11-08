function upnegocio() {
  alert( getElementById( 'cuenta' ).value )
  $.ajax( {
    url: `${base_url()}app/Prueba_d/upnegocio`,
    dataType: 'json',
    type: 'post',
    data: {
      cuenta: getElementById( 'cuenta' ).value,
      nombre_comercio: getElementById( 'nombre_comercio' ).value,
      email_auth: getElementById( 'email_auth' ).value,
      fiscales: getElementById( 'fiscales' ).value,
      social: getElementById( 'social' ).value,
      representante: getElementById( 'representante' ).value,
      oficinas: getElementById( 'oficinas' ).value,
    },
    success( json ) {
      console.log( json )
    },
  } )
}
