jQuery( document ).ready( () => {
  const baseFormAction = $( '#form-edit-account' ).attr( 'action' )

  $( '.local-phone' ).mask( '(000) 000-0000' )

  $( '.btn-add-account' ).click( () => {
    $( '#modal-create-account' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-account' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
    window.setTimeout( () => {
      $( '#nombre_rol' ).focus()
    }, 350 )
  } )

  $( '#modal-create-account' ).on( 'shown.bs.modal', () => {
    autofocus( '#nombre', 250 )
  } )

  $( '#modal-edit-account' ).on( 'shown.bs.modal', () => {
    autofocus( '#nombre_e', 250 )
  } )

  $( '#change_password' ).change( () => {
    $( '.group-password' ).slideToggle( 400 )
  } )

  $( '#form-create-account' ).validate( {
    submitHandler: ( form ) => {
      const telefonoAuth = $.trim( $( '#telefono_auth' ).val() )
      const telefonoAuthC = $.trim( $( '#telefono_auth_c' ).val() )

      const emailAuth = $.trim( $( '#email_auth' ).val() )
      const emailAuthC = $.trim( $( '#email_auth_c' ).val() )

      const password = $.trim( $( '#password' ).val() )
      const passwordC = $.trim( $( '#password_c' ).val() )

      if ( telefonoAuth !== telefonoAuthC ) {
        toastr.warning( 'Los teléfonos no coinciden' )
        $( '#telefono_auth' ).focus()
      } else if ( emailAuth !== emailAuthC ) {
        toastr.warning( 'Los e-mail no coinciden' )
        $( '#email_auth' ).focus()
      } else if ( password.length < 8 ) {
        toastr.error( 'Contraseña no valida' )
        $( '#password' ).val( '' )
        $( '#password_c' ).val( '' )
        $( '#password' ).focus()
      } else if ( password !== passwordC ) {
        toastr.warning( 'Las contraseñas no coinciden' )
      } else {
        const jQform = $( form )
        const btnSbmt = $( form.children[2].getElementsByTagName( 'button' )[0] )
        const btnCancel = $( form.children[2].getElementsByTagName( 'button' )[1] )
        btnSbmt.html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
        )
        btnSbmt
          .html(
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
          )
          .attr( 'disabled', 'disabled' )
        btnCancel.attr( 'disabled', 'disabled' )
        jQform.children( 'input' ).attr( 'disabled', 'disabled' )

        $.ajax( {
          url: jQform.attr( 'action' ),
          type: jQform.attr( 'method' ),
          dataType: jQform.attr( 'data-type' ),
          data: jQform.serialize(),
          success: ( response ) => {
            toastr[response.response_type]( response.message )
            if ( response.response_code === 200 ) {
              window.setTimeout( () => {
                window.location.reload()
              }, 1500 )
            }
          },
          error: () => {
            toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
            window.setTimeout( () => {
              window.location.reload()
            }, 1500 )
          },
        } )
      }
    },
  } )

  $( '#modal-edit-account' ).on( 'shown.bs.modal', () => {
    autofocus( '#nombre_rol_e', 250 )
  } )

  $( '#modal-edit-account' ).on( 'show.bs.modal', () => {
    const jQform = $( '#form-edit-account' )
    $(
      '#form-edit-account input, #form-edit-account select, #form-edit-account textarea, #form-edit-account button',
    ).attr( 'disabled', 'disabled' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#nombre_e' ).val( response.account_data.nombre )
          $( '#apellido1_e' ).val( response.account_data.apellido1 )
          $( '#apellido2_e' ).val( response.account_data.apellido2 )
          $( '#email_auth_e, #email_auth_c_e' ).val( response.account_data.email_auth )
          $( '#telefono_auth_e, #telefono_auth_c_e' ).val( response.fancy_phone )
          $( '#estatus_id_e' ).val( response.account_data.estatus_id )
          $( '#rol_id_e' ).val( response.account_data.rol_id )

          $(
            '#form-edit-account input, #form-edit-account select, #form-edit-account textarea, #form-edit-account button',
          ).removeAttr( 'disabled', 'disabled' )

          $( '#form-edit-account' ).attr(
            'action',
            base_url( `app/accounts/doupdate/${response.account_data.usuario_id}` ),
          )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-account' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-account' ).on( 'hidden.bs.modal ', () => {
    $( '#form-edit-account' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-account input, #form-edit-account select, #form-edit-account textarea, #form-edit-account button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-account input, #form-edit-account textarea' ).val( '' )
  } )

  $( '#form-edit-account' ).validate( {
    submitHandler: ( form ) => {
      const jQform = $( form )
      const btnSbmt = $( form.children[2].getElementsByTagName( 'button' )[0] )
      const btnCancel = $( form.children[2].getElementsByTagName( 'button' )[1] )

      const telefonoAuth = $.trim( $( '#telefono_auth_e' ).val() )
      const telefonoAuthC = $.trim( $( '#telefono_auth_c_e' ).val() )

      const emailAuth = $.trim( $( '#email_auth_e' ).val() )
      const emailAuthC = $.trim( $( '#email_auth_c_e' ).val() )

      const password = $.trim( $( '#password_e' ).val() )
      const passwordC = $.trim( $( '#password_c_e' ).val() )

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

      if ( $( '.group-password' ).is( ':visible' ) ) {
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
        btnCancel.attr( 'disabled', 'disabled' )
        jQform.children( 'input' ).attr( 'disabled', 'disabled' )
        jQform.children( 'input' ).attr( 'disabled', 'disabled' )

        $.ajax( {
          url: jQform.attr( 'action' ),
          type: jQform.attr( 'method' ),
          dataType: jQform.attr( 'data-type' ),
          data: jQform.serialize(),
          success: ( response ) => {
            toastr[response.response_type]( response.message )
            if ( response.response_code === 200 ) {
              window.setTimeout( () => {
                window.location.reload()
              }, 1500 )
            }
          },
          error: () => {
            toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
            window.setTimeout( () => {
              window.location.reload()
            }, 1500 )
          },
        } )
      }
    },
  } )
} )

// function editacuenta( usuarioId ) {
//   $( '#form-edit-account' ).attr( 'action', `${$( '#form-edit-account' ).attr( 'action' )}/${usuarioId}` )
//   $( '#modal-edit-account' ).modal( {
//     backdrop: 'static',
//     keyboard: true,
//     show: true,
//   } )
// }

// function eliminacuenta( usuarioId, nombreRol ) {
//   if (
//     // eslint-disable-next-line no-restricted-globals
//     confirm( `¿Realmente desea eleminiar la cuenta de ${nombreRol}?\n¡EL USUARIO PERDERA SU ACCESO!` )
//   ) {
//     window.location.href = $( `#link-remove-account-${usuarioId}` ).attr( 'href' )
//   }
// }
