jQuery( document ).ready( ( $ ) => {
  $( '#form-edit-myaccount' ).validate( {
    submitHandler: ( form ) => {
      const jQform = $( form )
      const btnSbmt = $( '#btn-sbmt-update-account' )

      const txtBtn = $.trim( btnSbmt.html() )

      const telefonoAuth = $.trim( $( '#telefono_auth' ).val() )
      const telefonoAuthC = $.trim( $( '#telefono_auth_c' ).val() )

      const emailAuth = $.trim( $( '#email_auth' ).val() )
      const emailAuthC = $.trim( $( '#email_auth_c' ).val() )

      let goToValidation = true

      if ( telefonoAuth !== telefonoAuthC ) {
        toastr.warning( 'Los teléfonos no coinciden' )
        $( '#telefono_auth' ).focus()
        goToValidation = false
      }

      if ( emailAuth !== emailAuthC ) {
        toastr.warning( 'Los e-mail no coinciden' )
        $( '#email_auth' ).focus()
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
  $( '#form-update-comercio' ).validate( {
    submitHandler: ( form ) => {
      const jQform = $( form )
      const btnSbmt = $( '#btn-sbmt-create-comercio' )
      const txtBtn = $.trim( btnSbmt.html() )
      const RFC = $.trim( $( '#RFC' ).val() )
      const CRFC = $.trim( $( '#CRFC' ).val() )

      let goToValidation = true

      if ( RFC !== CRFC ) {
        toastr.warning( 'RFC no coinciden' )
        $( '#telefono_auth' ).focus()
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

  $( '#form_registro_tractora_afiliador' ).validate( {
    submitHandler: ( form ) => {
      const jQform = $( form )
      const btnSbmt = $( '#btn_registar' )
      const txtBtn = $.trim( btnSbmt.html() )
      const goToValidation = true
      const email = document.getElementById( 'email' ).value
      const nombre = document.getElementById( 'user' ).value

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
            if ( repuesta.toString() !== 'warning' && respuesta.toString() !== 'error' ) {
              form_registro_tractora_afiliador.style.display = 'none'
              accordion.style.display = 'block'
              $( '#nombre' ).val( String( nombre ) )
              $( '#email_auth' ).val( String( email ) )
              $( '#email_auth_c' ).val( String( email ) )
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
