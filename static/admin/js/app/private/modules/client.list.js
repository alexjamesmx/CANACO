jQuery( document ).ready( ( $ ) => {
  $( '.percent' ).mask( '00.00%', { reverse: true } )

  const baseFormAction = $( '#form-edit-client' ).attr( 'action' )
  const baseFormActionEditFiles = $( '#form-create-filesclient' ).attr( 'action' )
  const baseFormEditFilesContent = $( '#form-create-filesclient-modal-body' ).html()

  $( '.btn-add-client' ).click( () => {
    $( '#modal-create-client' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    $( '#modal-create-client' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } )

  $( '#modal-create-client' ).on( 'shown.bs.modal', () => {
    autofocus( '#empresa', 250 )
  } )

  $( '#modal-edit-client' ).on( 'shown.bs.modal', () => {
    autofocus( '#empresa_e', 250 )
  } )

  $( '#filter_clients' ).change( () => {
    $( '#card-search-clients' ).slideToggle( 400 )
  } )

  $( '#form-create-client' ).validate( {
    submitHandler: ( form ) => {
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
    },
  } )

  $( '#modal-edit-client' ).on( 'show.bs.modal', () => {
    const jQform = $( '#form-edit-client' )
    $(
      '#form-edit-client input, #form-edit-client select, #form-edit-client textarea, #form-edit-client button',
    ).attr( 'disabled', 'disabled' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#empresa_e' ).val( response.client_data.empresa )
          $( '#contacto_e' ).val( response.client_data.contacto )
          $( '#rfc_e' ).val( response.client_data.rfc )
          $( '#telefonos_e' ).val( response.client_data.telefonos )
          $( '#correos_e' ).val( response.client_data.correos )
          $( '#estatus_id_e' ).val( response.client_data.estatus_id )
          $( '#comision_e' ).val(
            response.client_data.comision == null ? null : `${response.client_data.comision}%`,
          )
          $( '#agente_id_e' ).val(
            response.client_data.agente_id == null ? null : response.client_data.agente_id,
          )
          $( '#email_auth' ).val(
            response.client_data.email_auth == null ? null : response.client_data.email_auth,
          )
          $( '#password' ).val(
            response.client_data.password == null ? 'losn2020' : response.client_data.password,
          )
          $( '#usuario_id' ).val(
            response.client_data.usuario_id == null ? null : response.client_data.usuario_id,
          )

          $(
            '#form-edit-client input, #form-edit-client select, #form-edit-client textarea, #form-edit-client button',
          ).removeAttr( 'disabled', 'disabled' )
          $( '#form-edit-client' ).attr(
            'action',
            base_url( `app/clients/doupdate/${response.client_data.client_id}` ),
          )
          $( '.percent' ).mask( '00.00%', { reverse: true } )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-client' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-edit-client' ).on( 'hidden.bs.modal ', ( e ) => {
    $( '#form-edit-client' ).attr( 'action', baseFormAction )
    $(
      '#form-edit-client input, #form-edit-client select, #form-edit-client textarea, #form-edit-client button',
    ).removeAttr( 'disabled', 'disabled' )
    $( '#form-edit-client input, #form-edit-client textarea' ).val( '' )
  } )

  $( '#form-edit-client' ).validate( {
    submitHandler: ( form ) => {
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
        error: ( a, b, c ) => {
          toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
          window.setTimeout( () => {
            window.location.reload()
          }, 1500 )
        },
      } )
    },
  } )

  $( '#modal-create-filesclient' ).on( 'show.bs.modal', ( e ) => {
    const jQform = $( '#form-create-filesclient' )

    $.ajax( {
      url: jQform.attr( 'action' ),
      type: jQform.attr( 'method' ),
      dataType: jQform.attr( 'data-type' ),
      data: jQform.serialize(),
      success: ( response ) => {
        if ( response.response_code === 200 ) {
          $( '#form-create-filesclient-modal-body' ).html( response.clientefiles_content )
        } else {
          toastr[response.response_type]( response.message )
          window.setTimeout( () => {
            $( '#modal-edit-client' ).modal( 'hide' )
          }, 1500 )
        }
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        window.setTimeout( () => {}, 1500 )
      },
    } )
  } )

  $( '#modal-create-filesclient' ).on( 'hidden.bs.modal ', ( e ) => {
    $( '#form-create-filesclient' ).attr( 'action', baseFormActionEditFiles )
    $( '#form-create-filesclient-modal-body' ).html( baseFormEditFilesContent )
  } )
} )

function editaclient( clientId ) {
  $( '#form-edit-client' ).attr( 'action', `${$( '#form-edit-client' ).attr( 'action' )}/${clientId}` )
  $( '#modal-edit-client' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function eliminaclient( clientId, clientName ) {
  if ( confirm( `¿Realmente desea eliminar ${clientName}?\n¡Esta acción no puede deshacerse!` ) ) {
    window.location.href = $( `#link-remove-client-${clientId}` ).attr( 'href' )
  }
}

function client_files( clientId, clientName ) {
  $( '#form-create-filesclient' ).attr(
    'action',
    `${$( '#form-create-filesclient' ).attr( 'action' )}/${clientId}`,
  )
  $( '#modal-title-client-name' ).html( `<i class="iconsminds-business-man"></i> ${clientName}` )
  $( '#modal-create-filesclient' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function load_file( id ) {
  $( `#${id}` ).trigger( 'click' )
}

function process_upload( clientFile ) {
  $( `#form-upload-${clientFile}` ).hide( 0, () => {
    $( `#container-loader-${clientFile}` ).show( 0, () => {
      window.setTimeout( () => {
        $( `#progress-bar-${clientFile}` ).css( 'width', `${25}%` )
        $( `#form-upload-${clientFile}` ).submit()
      }, 750 )
    } )
  } )
}

function validate_upload( clientFile ) {
  const fileFieldName = $( `#${clientFile}` ).attr( 'data-filefiled-name' )
  const uploadFileRoute = $( `#${clientFile}` ).val()
  const uploadFile = uploadFileRoute.replace( 'C:\\fakepath\\', '' )
  const extension = uploadFile
    .substring( uploadFile.lastIndexOf( '.' ), uploadFile.length )
    .toLowerCase()
  if ( extension === '.pdf' ) {
    if ( confirm( `¿Adjuntar el archivo <${uploadFile}>\ncomo\n<${fileFieldName}>?` ) ) {
      process_upload( clientFile )
    }
  } else {
    toastr.warning( 'Solo se adminten archivos en formato PDF' )
  }
}

function view_file( clientId, fileField ) {
  const windowHeight = $( window ).height()
  $( '#iframe-modal-view-file-client' ).attr(
    'src',
    base_url( `app/clients/viewfile/${clientId}/${fileField}` ),
  )
  $( '#iframe-modal-view-file-client' ).css( 'height', `${windowHeight - 200}px` )
  $( '#modal-view-file-client' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}
