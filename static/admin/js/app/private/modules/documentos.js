jQuery( document ).ready( ( $ ) => {
  alert( '787878' )

  $( '#form-edit-docs-negocios' ).validate( {
    submitHandler: ( form ) => {
      const jQform = $( form )
      const btnSbmt = $( '#btn-sbmt-create-docs' )
      const txtBtn = $.trim( btnSbmt.html() )

      const goToValidation = true

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
          data: ( s = 's' ),
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
} )
