jQuery( document ).ready( ( $ ) => {
  $( '#filter_search' ).change( () => {
    $( '#card-search-control' ).slideToggle( 400 )
  } )

  $( document ).on( 'submit', '.validate-review-control', function ( event ) {
    event.preventDefault()
    jQform = $( this )

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
        window.setTimeout( () => {
          $( '#modal-review-control' ).modal( 'hide' )
        }, 150 )
      },
    } )
  } )
} )

function info_control( controlId ) {
  $( '#container-modal-detail-control' ).html( `<div class="form-row">
        <div class="form-group col-12">
        <p class="text-center">
        <i class="fas fa-spinner fa-pulse fa-5x "></i>
        </p>
        <h3 id="modal-loading-control-message" class="text-center">Cargando información</h3>
        <h4 class="text-center">Por favor espere...</h4>
        </div>
        </div>` )

  $( '#modal-detail-control' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )

  $.ajax( {
    url: base_url( 'app/controls/getdatacontrol' ),
    type: 'post',
    dataType: 'json',
    data: {
      control_id: controlId,
    },
    success: ( response ) => {
      if ( response.response_code === 200 ) {
        $( '#pdf-control' ).attr( 'href', `${base_url()}app/budgets/pdf_control/${controlId}` )
        $( '#print-control' ).attr( 'href', `${base_url()}app/budgets/print_control/${controlId}` )

        $( '#container-modal-detail-control' ).html( response.content_HTML )
      } else {
        toastr[response.response_type]( response.message )
        window.setTimeout( () => {
          $( '#modal-detail-control' ).modal( 'hide' )
        }, 350 )
      }
    },
    error: () => {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      window.setTimeout( () => {
        $( '#modal-detail-control' ).modal( 'hide' )
      }, 350 )
    },
  } )
}

function add_nnumber_guide( cserviceId ) {
  const guia = prompt( 'Ingesa el número de guía:' )

  if ( guia === null || guia.length === 0 ) {
    toastr.warning( 'Ingresa un número de guía válido' )
    return
  }

  $( `#guias-stack-${cserviceId}` )
    .append( `<li id="li-guide-${cserviceId}-${guia}" class="list-group-item">
        ${guia}
        <a href="javascript:delete_guia(${cserviceId}, '${guia}')" class="text-danger float-right">
        <i class="fas fa-trash"></i>
        </a>
        </li>` )

  $.ajax( {
    url: base_url( 'app/controls/update_guides' ),
    type: 'post',
    dataType: 'json',
    data: {
      cservice_id: cserviceId,
      cservice_guia: guia,
    },
    success: ( response ) => {
      if ( response.response_code === 200 ) toastr[response.response_type]( response.message )
      toastr[response.response_type]( response.message )
    },
    error: ( a, b, c ) => {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
    },
  } )
}

function delete_guia( cserviceId, guia ) {
  if ( confirm( `¿Realmente desea eliminar el número de guía ${guia}?` ) ) {
    $( `#li-guide-${cserviceId}-${guia}` ).remove()

    $.ajax( {
      url: base_url( 'app/controls/delete_guides' ),
      type: 'post',
      dataType: 'json',
      data: {
        cservice_id: cserviceId,
        cservice_guia: guia,
      },
      success: ( response ) => {
        if ( response.response_code === 200 ) toastr[response.response_type]( response.message )
        toastr[response.response_type]( response.message )
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      },
    } )
  }
}

function init_upload_file( cserviceId ) {
  $( `#prueba_entrega-${cserviceId}` ).trigger( 'click' )
}

function validate_upload( cserviceId ) {
  const uploadFileRoute = $( `#prueba_entrega-${cserviceId}` ).val()
  const uploadFile = uploadFileRoute.replace( 'C:\\fakepath\\', '' )
  const extension = uploadFile
    .substring( uploadFile.lastIndexOf( '.' ), uploadFile.length )
    .toLowerCase()
  if ( extension === '.pdf' ) {
    if ( confirm( `¿Adjuntar el archivo <${uploadFile}> para este servicio?` ) ) {
      process_upload( cserviceId )
    }
  } else {
    toastr.warning( 'Solo se adminten archivos en formato PDF' )
  }
}

function process_upload( cserviceId ) {
  $( `#add-file-cservice-${cserviceId}` ).hide( 0, () => {
    $( `#progress-${cserviceId}, #progress-${cserviceId}-legend` ).show( 0, () => {
      window.setTimeout( () => {
        $( `#progress-bar-${cserviceId}` ).css( 'width', `${25}%` )
        $( `#add-file-cservice-${cserviceId}` ).submit()
      }, 750 )
    } )
  } )
}

function control_review( controlId ) {
  $( '#container-modal-review-control' ).html( `<div class="form-row">
        <div class="form-group col-12">
        <p class="text-center">
        <i class="fas fa-spinner fa-pulse fa-5x "></i>
        </p>
        <h3 id="modal-loading-control-message" class="text-center">Cargando información</h3>
        <h4 class="text-center">Por favor espere...</h4>
        </div>
        </div>` )

  $( '#modal-review-control' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )

  $.ajax( {
    url: base_url( 'app/controls/getdatacontrolreview' ),
    type: 'post',
    dataType: 'json',
    data: {
      control_id: controlId,
    },
    success: ( response ) => {
      if ( response.response_code === 200 ) {
        $( '#pdf-control' ).attr( 'href', `${base_url()}app/budgets/pdf_control/${controlId}` )
        $( '#print-control' ).attr( 'href', `${base_url()}app/budgets/print_control/${controlId}` )

        $( '#container-modal-review-control' ).html( response.content_HTML )
      } else {
        toastr[response.response_type]( response.message )
        window.setTimeout( () => {
          $( '#modal-detail-control' ).modal( 'hide' )
        }, 350 )
      }
    },
    error: () => {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      window.setTimeout( () => {
        $( '#modal-detail-control' ).modal( 'hide' )
      }, 350 )
    },
  } )
}

function view_file( cserviceFileId ) {
  const windowHeight = $( window ).height()
  $( '#iframe-modal-detail-file-control' ).attr(
    'src',
    base_url( `app/controls/viewfile/${cserviceFileId}` ),
  )
  $( '#iframe-modal-detail-file-control' ).css( 'height', `${windowHeight - 200}px` )
  $( '#modal-detail-file-control' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}

function delete_file( cserviceFileId ) {
  if ( confirm( '¿Realmente desea eliminar este archivo?\nEsta opción no puede deshacerse' ) ) {
    $( `#lifile-${cserviceFileId}` ).html( '<i class="fas fa-spinner fa-spin"></i>' )

    $.ajax( {
      url: base_url( `app/controls/deletefile/${cserviceFileId}` ),
      type: 'post',
      dataType: 'json',
      data: {
        cservice_file_id: cserviceFileId,
      },
      success( response ) {
        toastr[response.response_type]( response.message )
        $( `#lifile-${cserviceFileId}` ).remove()
      },
      error() {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      },
    } )
  }
}

function delete_estatus( cserviceEstatusId ) {
  if (
    confirm( '¿Realmente desea eliminar este paso del embarque?\nEsta opción no puede deshacerse' )
  ) {
    $( `#estatus-item-${cserviceEstatusId}` ).html( '<i class="fas fa-spinner fa-spin"></i>' )

    $.ajax( {
      url: base_url( `app/controls/deleteestatus/${cserviceEstatusId}` ),
      type: 'post',
      dataType: 'json',
      data: {
        cserviceEstatusId,
      },
      success( response ) {
        toastr[response.response_type]( response.message )
        $( `#estatus-item-${cserviceEstatusId}` ).remove()
      },
      error( a, b, c ) {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      },
    } )
  }
}

function cancel_control( controlId, contorlSheet ) {
  if (
    confirm(
      `¿Realmente desea cancelar el control con folio <${contorlSheet}>?\nEsta opción no puede deshacerse`,
    )
  ) {
    const url = $( `#cancel-btn-${controlId}` ).attr( 'href' )
    $.ajax( {
      url,
      type: 'post',
      dataType: 'json',
      data: {
        control_id: controlId,
      },
      success( response ) {
        toastr[response.response_type]( response.message )
        if ( response.response_code === 200 ) {
          $( `#tr-control-${controlId}` ).attr( 'style', 'background-color: #eed3d5 !important' )
          $( `#link-edit-control-${controlId}` ).remove()
          $( `#cancel-btn-${controlId}` ).remove()
        }
      },
      error() {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      },
    } )
  }
}
