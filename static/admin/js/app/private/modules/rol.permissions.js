jQuery( document ).ready( ( $ ) => {
  const modalLoadingData = $( '#modal-edit-perms-loading' ).html()
  const baseFormAction = $( '#form-edit-perms' ).attr( 'action' )

  $( '#modal-edit-perms' ).on( 'show.bs.modal', ( e ) => {
    const jQform = $( '#form-edit-perms' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#modal-edit-perms-loading' ).html( response.permissions_list )
          $( '#form-edit-perms' ).attr( 'action', base_url( 'app/roles/permissionsupdate' ) )
        } else {
          toastr[response.response_type]( response.message )
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
  } )

  $( '#modal-edit-perms' ).on( 'hidden.bs.modal ', () => {
    $( '#modal-edit-perms-loading' ).html( modalLoadingData )
    $( '#form-edit-perms' ).attr( 'action', baseFormAction )
  } )

  $( '#form-edit-perms' ).validate( {
    submitHandler: ( form ) => {
      const jQform = $( form )
      const btnSbmt = $( form.children[2].getElementsByTagName( 'button' )[0] )
      const btnCancel = $( form.children[2].getElementsByTagName( 'button' )[1] )
      const txtBtn = $.trim( btnSbmt.html() )
      btnSbmt.html(
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
      )
      btnSbmt
        .html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
        )
        .attr( 'disabled', 'disabled' )
      btnCancel.attr( 'disabled', 'disabled' )
      jQform.children( 'input, select' ).attr( 'disabled', 'disabled' )

      $.ajax( {
        url: jQform.attr( 'action' ),
        type: jQform.attr( 'method' ),
        dataType: jQform.attr( 'data-type' ),
        data: jQform.serialize(),
        success: ( response ) => {
          btnCancel.removeAttr( 'disabled' )
          jQform.children( 'input, select' ).removeAttr( 'disabled' )
          btnSbmt.removeAttr( 'disabled' )
          btnSbmt.html( txtBtn )

          toastr[response.response_type]( response.message )
          if ( response.response_code === 200 ) {
            window.setTimeout( () => {}, 1500 )
          }
        },
        error: () => {
          toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
          window.setTimeout( () => {}, 1500 )
        },
      } )
    },
  } )
} )
