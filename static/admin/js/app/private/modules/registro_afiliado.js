jQuery( document ).ready( () => {
  $( '#form_registro_usuario_afiliador' ).validate( {
    submitHandler: ( form ) => {
      const jQform = $( form )
      const btnSbmt = $( '#btn_registar' )
      const txtBtn = $.trim( btnSbmt.html() )

      const goToValidation = true
      const email = document.getElementById( 'email' ).value
      const nombre = document.getElementById( 'user' ).value
      const rfc = document.getElementById( 'rfc' ).value

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
            if ( repuesta.toString() === 'warning' ) {
            } else if ( repuesta.toString() === 'error' ) {
            } else {
              form_registro_usuario_afiliador.style.display = 'none'
              accordion.style.display = 'block'
              $( '#nombre' ).val( String( nombre ) )
              $( '#email_auth' ).val( String( email ) )
              $( '#email_auth_c' ).val( String( email ) )
              $( '#RFC' ).val( String( rfc ) )
              $( '#CRFC' ).val( String( rfc ) )
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

$( '#yes_compras' ).on( 'change', function () {
  if ( $( this ).is( ':checked' ) ) {
    switchStatus = $( this ).is( ':checked' )

    const email = document.getElementById( 'email' ).value
    const nombre = document.getElementById( 'user' ).value

    const tel_personal = document.getElementById( 'telefono_auth' ).value
    $( '#email_compras' ).val( String( email ) )
    $( '#nombre_compras' ).val( String( nombre ) )
    $( '#numero_compras' ).val( String( tel_personal ) )
  } else {
    switchStatus = $( this ).is( ':checked' )
  }
} )

$( '#yes_ventas' ).on( 'change', function () {
  if ( $( this ).is( ':checked' ) ) {
    switchStatus = $( this ).is( ':checked' )

    const email = document.getElementById( 'email' ).value
    const nombre = document.getElementById( 'user' ).value
    const tel_personal = document.getElementById( 'telefono_auth' ).value

    $( '#email_ventas' ).val( String( email ) )
    $( '#nombre_ventas' ).val( String( nombre ) )
    $( '#numero_ventas' ).val( String( tel_personal ) )
    $( '#whatps_ventas' ).val( String( tel_personal ) )
  } else {
    switchStatus = $( this ).is( ':checked' )
  }
} )
