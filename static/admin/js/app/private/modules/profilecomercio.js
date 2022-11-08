jQuery( document ).ready( ( $ ) => {
  reload_keywords()
  $( '#indicador-1,#indicador-2,#indicador-3,#indicador-4' ).percircle()

  $( document ).on( 'click', '.addkeyword', ( event ) => {
    event.preventDefault()
    $( '#tactividad' ).removeAttr( 'disabled' )
    $( '#prodserv' ).removeAttr( 'disabled' )

    $( '#modal-addkeywords' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  //
  $( document ).on( 'click', '.btn-sbmt-addkeyword', ( event ) => {
    event.preventDefault()
    $( '#tactividad' ).removeAttr( 'disabled' )
    $( '#prodserv' ).removeAttr( 'disabled' )

    const transaccion = $.trim( $( '#prodserv' ).val() )
    const tact = $.trim( $( '#tactividad' ).val() )
    const kw = $.trim( $( '#keywords' ).val() )

    let goToValidation = true

    if ( transaccion.length < 1 ) {
      toastr.warning( 'Seleccione que tipo de producto o servicios ofrece' )
      $( '#prodserv' ).focus()
      goToValidation = false
    }

    if ( tact.length < 1 ) {
      toastr.warning( 'Seleccione una actividad que describa sus servicios' )
      $( '#tactividad' ).focus()
      goToValidation = false
    }

    if ( kw.length < 1 ) {
      toastr.warning( 'Ingrese al menos una palabra clave' )
      $( '#tactividad' ).focus()
      goToValidation = false
    }

    if ( goToValidation ) {
      const formData = new FormData( $( '#form-add-keywords' )[0] )

      $.ajax( {
        url: `${base_url()}/app/myaccount/addkeywords`,
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success( json ) {
          if ( json.response_code === 200 ) {
            toastr[json.response_type]( json.message )
            $.ajax( {
              url: `${base_url()}/Validaciones/validacionGrande`,
              success( data ) {
                const porcentajePerfil = parseInt( data.message, 10 )
                // $( '#progreso' ).attr( 'style', `width: ${porcentajePerfil}%` )
                // $( '#progreso' ).text( `${porcentajePerfil}%` )
              },
            } )
            reload_keywords()
          } else {
            toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
          }

          clear_modal()
        },
        error() {
          toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
          clear_modal()
        },
      } )
    }
  } )

  //
  $( document ).on( 'click', '.btn-delkeyword', function ( event ) {
    event.preventDefault()
    if ( confirm( '¿Realmente desea eleminiar esta keyword?\n\nEsta acción no puede deshacerse' ) ) {
      $.ajax( {
        url: `${base_url()}/app/myaccount/deleteonlykeyword`,
        type: 'post',
        data: { id: $( this ).attr( 'data-id' ) },
        cache: false,
        dataType: 'json',
        success( json ) {
          if ( json.response_code === 200 ) {
            toastr[json.response_type]( json.message )
            reload_keywords()
          } else {
            toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
          }
          clear_modal()
        },
        error() {
          toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
          clear_modal()
        },
      } )
    }
  } )

  $( document ).on( 'click', '.btn-editkeyword', function ( event ) {
    event.preventDefault()
    /* Act on the event */

    const keyword = $( this ).attr( 'data-kw' )
    const idkw = $( this ).attr( 'data-id' )

    const newKeyword = window.prompt( 'Actulizar palabra clave', keyword )

    if ( newKeyword.length > 0 ) {
      $.ajax( {
        url: `${base_url()}app/myaccount/update_keyword`,
        type: 'post',
        dataType: 'json',
        data: {
          kwus_id: idkw,
          keyword: newKeyword,
        },
        success( json ) {
          if ( json.response_code === 200 ) {
            toastr.success( 'Keyword actualizada correctamente' )
            reload_keywords()
          }
        },
        error() {},
      } )
    }
  } )

  //
  $( document ).on( 'click', '.btn-delservice', function ( event ) {
    event.preventDefault()
    $.ajax( {
      url: `${base_url()}/app/myaccount/deleteallkeyword`,
      type: 'post',
      data: {
        tactividad: $( this ).attr( 'data-act' ),
        tipo_transaccion: $( this ).attr( 'data-trans' ),
      },
      cache: false,
      dataType: 'json',
      success( json ) {
        if ( json.response_code === 200 ) {
          toastr[json.response_type]( json.message )

          reload_keywords()
        } else {
          toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        }

        clear_modal()
      },
      error( ts ) {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        clear_modal()
      },
    } )
  } )
  //

  //
  $( document ).on( 'click', '.btn-editservice', function ( event ) {
    event.preventDefault()
    clear_modal()
    $( '#tactividad' ).removeAttr( 'disabled' )
    $( '#prodserv' ).removeAttr( 'disabled' )

    $( '#tactividad' ).val( $( this ).attr( 'data-act' ) ).change().attr( 'disabled', 'disabled' )
    $( '#prodserv' ).val( $( this ).attr( 'data-trans' ) ).change().attr( 'disabled', 'disabled' )
    $( '#modal-addkeywords' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )
  //

  function clear_modal() {
    $( '#modal-addkeywords' ).modal( 'hide' )
    $( '#form-add-keywords' ).trigger( 'reset' )
  }

  $( '#modal-addkeywords' ).on( 'hidden.bs.modal', () => {
    // do clear_modal
    $( '#form-add-keywords' ).trigger( 'reset' )
    $( '#prodserv' ).val( '' ).change()
    $( '#tactividad' ).val( '' ).change()
    $( '#keywords' ).tagsinput( 'removeAll' )
  } )
} )
