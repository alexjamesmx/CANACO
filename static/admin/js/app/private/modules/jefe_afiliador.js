jQuery( document ).ready( () => {
  $( '#switch_rfc' ).change( () => {
    $( '.group-subir-rfc' ).slideToggle( 400 )
  } )

  $( '#form_registro_afiliador' ).validate( {
    submitHandler: ( form ) => {
      const jQform = $( form )
      const btnSbmt = $( '#btn_registar' )
      const txtBtn = $.trim( btnSbmt.html() )

      let goToValidation = true

      const password = document.getElementById( 'password' ).value
      const passwordC = document.getElementById( 'password_c' ).value

      if ( password.length < 8 ) {
        toastr.error( 'Contraseña no valida' )
        $( '#password' ).val( '' )
        $( '#password_c' ).val( '' )
        $( '#password' ).focus()
        goToValidation = false
      } else if ( password !== passwordC ) {
        toastr.warning( 'Las contraseñas no coinciden' )
        goToValidation = false
      }

      if ( goToValidation ) {
        btnSbmt.html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
        )
        btnSbmt
          .html(
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
          )
          .attr( 'disabled', 'disabled' )
        jQform.children( 'input' ).attr( 'disabled', 'disabled' )
        jQform.children( 'input' ).attr( 'disabled', 'disabled' )

        $.ajax( {
          url: jQform.attr( 'action' ),
          type: jQform.attr( 'method' ),
          dataType: jQform.attr( 'data-type' ),
          data: jQform.serialize(),
          success: ( response ) => {
            toastr[response.response_type]( response.message )
            const repuesta = String( response.response_type )
            if ( repuesta.toString() === 'success' ) {
              window.location.href = `${base_url()}app/jefeafilcomercios/listafiliados`
            }
          },
          error: () => {
            toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
          },
          complete() {
            btnSbmt.html( txtBtn )
            btnSbmt.removeAttr( 'disabled' )
          },
        } )
      }
    },
  } )
} )
