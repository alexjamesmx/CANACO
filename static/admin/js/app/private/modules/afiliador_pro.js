function clear_modal() {
  $( '#modal-addkeywords' ).modal( 'hide' )
  $( '#form-add-keywords' ).trigger( 'reset' )
}

function reload_keywords1() {
  $( '#tbl-tbody-show-act-kw' ).load( base_url( 'app/Keywords_afiliador/showkeywordsproductoservicio' ) )
}

jQuery( document ).ready( ( $ ) => {
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
      // Display the key/value pairs

      $.ajax( {
        url: `${base_url()}app/Keywords_afiliador/addkeywords`,
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success( json ) {
          if ( json.response_code === 200 ) {
            toastr[json.response_type]( json.message )

            reload_keywords1()
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
    }
  } )

  //
  $( document ).on( 'click', '.btn-delkeyword', function ( event ) {
    event.preventDefault()
    $.ajax( {
      url: `${base_url()}app/Keywords_afiliador/deleteonlykeyword`,
      type: 'post',
      data: { id: $( this ).attr( 'data-id' ) },
      cache: false,
      dataType: 'json',
      success( json ) {
        if ( json.response_code === 200 ) {
          toastr[json.response_type]( json.message )

          reload_keywords1()
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
  $( document ).on( 'click', '.btn-delservice', function ( event ) {
    event.preventDefault()
    $.ajax( {
      url: `${base_url()}app/Keywords_afiliador/deleteallkeyword`,
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

          reload_keywords1()
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

  $( '#modal-addkeywords' ).on( 'hidden.bs.modal', () => {
    // do clear_modal
    $( '#form-add-keywords' ).trigger( 'reset' )
    $( '#prodserv' ).val( '' ).change()
    $( '#tactividad' ).val( '' ).change()
    $( '#keywords' ).tagsinput( 'removeAll' )
  } )
} )
