function validarcode() {
  const code = $.trim( $( '#code' ).val() )
  const email = $.trim( $( '#correo' ).val() )
  const pass = $.trim( $( '#final_password1' ).val() )
  const pass2 = $.trim( $( '#final_password2' ).val() )

  if ( code === '' || code == null || email === '' || email == null ) {
    toastr.warning( 'por favor llena los campos' )
  } else if ( pass === pass2 ) {
    $.ajax( {
      dataType: 'json',
      type: 'post',
      data: {
        code,
        email,
        pass,
      },
      url: `${base_url()}Pass_olv/validar_codigo`,
      success( data ) {
        toastr[data.response_type]( data.message )
        if ( data.response_type === 'success' ) {
          window.location.href = `${base_url()}login`
        }
      },
    } )
  } else {
    toastr.warning( 'Las contraseñas no coinciden' )
  }
}
