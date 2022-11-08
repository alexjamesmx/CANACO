function olv_passw() {
  const correo = $.trim( $( '#correo' ).val() )

  if ( correo === '' || correo == null ) {
    toastr.warning( 'por favor coloca el correo' )
  } else {
    $.ajax( {
      dataType: 'json',
      type: 'post',
      data: { correo },
      url: `${base_url()}Pass_olv/recuperar_pass/`,

      success( data ) {
        toastr[data.response_type]( data.message )
      },
      error() {
        toastr.error( 'data.message' )
      },
    } )
  }
}
function validarcode() {
  const code = $.trim( $( '#code' ).val() )
  alert( code )
}
function enviar() {
  window.location.href = `${base_url()}Pass_olv/recuperar/`
}
