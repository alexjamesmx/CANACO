jQuery( document ).ready( () => {
  $( '#form-search-historicinvoices' ).validate( {
    submitHandler: () => {
      $( '#info-loader-report' ).html( `<div class="col-12 mb-4 mt-4">
                <div class="alert alert-primary alert-dismissible fade show mb-4 pt-5 pb-5" role="alert">
                <h4 class="text-center"> 
                Generando reporte, por favor espera....<br><br><i class="fas fa-spinner fa-pulse fa-3x"></i>
                </h4>          
                </div>
                </div>` )
      window.setTimeout( () => {
        window.location.href = `${base_url()}app/histocarrinvoices?d_i=${$( '#d_i' ).val()}&d_f=${$(
          '#d_f',
        ).val()}&cid=${$( '#cid' ).val()}&c=${$( '#c' ).val()}&m=${$( '#m' ).val()}&p=${$( '#p' ).val()}`
      }, 250 )
    },
  } )

  $( document ).on( 'blur', '.update-tc-date', function ( event ) {
    event.preventDefault()
    /* Act on the event */
    const dateValue = $( this ).val()
    const folio = $( this ).attr( 'data-f' )
    if ( dateValue.length === 10 ) {
      $.ajax( {
        url: base_url( 'app/histocarrinvoices/get_historic_exchange/' ),
        type: 'POST',
        dataType: 'json',
        data: {
          exchange_date: dateValue,
        },
        success( json ) {
          if ( json.response_code === 200 ) {
            $( `#TC-${folio}` ).val( json.exchange )
          }
        },
        error() {},
      } )
    }
  } )

  $( document ).on( 'blur', '.update-tc-fcomp-date', function ( event ) {
    event.preventDefault()
    const dateValue = $( this ).val()
    if ( dateValue.length === 10 ) {
      $.ajax( {
        url: base_url( 'app/histocarrinvoices/get_historic_exchange/' ),
        type: 'POST',
        dataType: 'json',
        data: {
          exchange_date: dateValue,
        },
        success( json ) {
          if ( json.response_code === 200 ) {
            $( '#TC-newcomplement' ).val( json.exchange )
          }
        },
        error( a, b, c ) {},
      } )
    }
  } )

  $( document ).on( 'blur', '.update-tc-fnote-date', function ( event ) {
    event.preventDefault()
    const dateValue = $( this ).val()
    if ( dateValue.length === 10 ) {
      $.ajax( {
        url: base_url( 'app/histocarrinvoices/get_historic_exchange/' ),
        type: 'POST',
        dataType: 'json',
        data: {
          exchange_date: dateValue,
        },
        success( json ) {
          if ( json.response_code === 200 ) {
            $( '#TC-newcreditnote' ).val( json.exchange )
          }
        },
        error() {},
      } )
    }
  } )

  $( document ).on( 'click', '.view-invoice-comment', function ( event ) {
    event.preventDefault()
    $( '#commentinvoice-invoice' ).text( $( this ).attr( 'data-f' ) )
    $( '#commentinvoice-note' ).val( $( this ).attr( 'data-n' ) )
    $( '#modal-commentinvoice' ).modal( 'show' )
    $( '#btn-save-modal-commentinvoice' ).attr( 'data-f', $( this ).attr( 'data-f' ) )
  } )

  $( document ).on( 'click', '#btn-save-modal-commentinvoice', function ( event ) {
    event.preventDefault()
    folio = $( this ).attr( 'data-f' )
    nota = $( '#commentinvoice-note' ).val()
    $.ajax( {
      url: base_url( 'app/histocarrinvoices/add_note' ),
      type: 'post',
      dataType: 'json',
      data: {
        folio,
        nota,
      },
      success( response ) {
        toastr[response.response_type]( response.message )
        $( `#btn-show-comment-${folio}` ).attr( 'data-n', nota )
      },
      erorr() {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      },
    } )
  } )

  $( document ).on( 'click', '.view-invoice-file', function ( event ) {
    event.preventDefault()

    folio = $( this ).attr( 'data-f' )
    filePDF = $( this ).attr( 'data-pdf' )
    fileXML = $( this ).attr( 'data-xml' )

    if ( filePDF === '' ) {
      $( '#modal-filesinvoice-pdf-container' ).html( `
                <form id="modal-filesinvoice-form-pdf" action="${base_url(
                  'app/histocarrinvoices/add_file/',
                )}" method="post" target="modal-filesinvoice-iframe" enctype="multipart/form-data">
                <input type="file" id="file_pdf" name="file_invoice" class="d-none" onchange="validate_upload('pdf')">
                <input type="hidden" name="folio" class="value-folio" value="${folio}">
                <input type="hidden" name="file_type" value="pdf">
                <button id="btn-open-file-pdf" type="button" class="btn btn-link text-center btn-block">
                <i class="iconsminds-add-file" style="font-size: 5em"></i>
                <br>
                <strong style="font-size: 1.5em">PDF</strong>
                </button>
                </form>
                <span id="modal-filesinvoice-pdf-loader" class="d-none text-center">
                <i class="fas fa-spinner fa-spin fa-4x"></i>
                <span class="d-block mt-3">Subiendo PDF</span>
                <strong class="d-block mt-1">Por favor espera...</strong>
                </span>
                ` )
    } else {
      $( '#modal-filesinvoice-pdf-container' ).html( `
                <button type="button" class="btn btn-lg btn-primary default btn-block" style="border-radius: 15px;" onclick="view_file(${folio}, 'pdf')">
                <p  class="text-center">
                <i class="fas fa-file-pdf fa-4x"></i>
                <br>
                <br>
                PDF
                </p>
                </button>
                ` )
    }

    if ( fileXML === '' ) {
      $( '#modal-filesinvoice-xml-container' ).html( `
                <form id="modal-filesinvoice-form-xml" action="${base_url(
                  'app/histocarrinvoices/add_file/',
                )}" method="post" target="modal-filesinvoice-iframe" enctype="multipart/form-data">
                <input type="file" id="file_xml" name="file_invoice" class="d-none" onchange="validate_upload('xml')">
                <input type="hidden" name="folio" class="value-folio" value="${folio}">
                <input type="hidden" name="file_type" value="xml">
                <button id="btn-open-file-xml" type="button" class="btn btn-link text-center btn-block">
                <i class="iconsminds-add-file" style="font-size: 5em"></i>
                <br>
                <strong style="font-size: 1.5em">XML</strong>
                </button>
                </form>
                <span id="modal-filesinvoice-xml-loader" class="d-none text-center">
                <i class="fas fa-spinner fa-spin fa-4x"></i>
                <span class="d-block mt-3">Subiendo XML</span>
                <strong class="d-block mt-1">Por favor espera...</strong>
                </span>
                ` )
    } else {
      $( '#modal-filesinvoice-xml-container' ).html( `
                <button type="button" class="btn btn-lg btn-primary default btn-block" style="border-radius: 15px;" onclick="view_file(${folio}, 'xml')">
                <p  class="text-center">
                <i class="fas fa-file-code fa-4x"></i>
                <br>
                <br>
                XML
                </p>
                </button>
                ` )
    }

    $( '#modal-filesinvoice' ).modal( 'show' )
  } )

  $( document ).on( 'click', '#btn-open-file-pdf', ( event ) => {
    event.preventDefault()
    $( '#file_pdf' ).trigger( 'click' )
  } )

  $( document ).on( 'click', '#btn-open-file-xml', ( event ) => {
    event.preventDefault()
    $( '#file_xml' ).trigger( 'click' )
  } )

  $( document ).on( 'change', '.invoice-cancelstate', function ( event ) {
    event.preventDefault()
    elem = $( this )
    fLosn = $( this ).attr( 'data-f' )
    if ( $( this ).is( ':checked' ) ) {
      $( `#tr-flosn-${fLosn}` ).addClass( 'table-danger' )
      $(
        `#IdR-${fLosn},#FFac-${fLosn},#ckpag-${fLosn},#FPag-${fLosn},#TFac-${fLosn},#TC-${fLosn},#btn-save-${fLosn}`,
      ).attr( 'readonly', 'readonly' )
    } else {
      $( `#tr-flosn-${fLosn}` ).removeClass( 'table-danger' )
      $(
        `#IdR-${fLosn},#FFac-${fLosn},#ckpag-${fLosn},#FPag-${fLosn},#TFac-${fLosn},#TC-${fLosn},#btn-save-${fLosn}`,
      ).removeAttr( 'readonly' )
    }

    $.ajax( {
      url: `${base_url()}app/histocarrinvoices/cancelstate/`,
      type: 'post',
      dataType: 'json',
      data: {
        id: elem.attr( 'data-f' ),
        state: elem.is( ':checked' ) ? '1' : '0',
      },
      success( response ) {
        toastr[response.response_type]( response.message )
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      },
    } )
  } )

  $( document ).on( 'click', '.save-invoice', function () {
    idR = $( this ).attr( 'data-f' )

    const IdFac = $( `#IdR-${idR}` ).val()
    const FFac = $( `#FFac-${idR}` ).val()
    const CkPag = $( `#ckpag-${idR}` ).is( ':checked' ) ? 1 : 0
    const FPag = $( `#FPag-${idR}` ).val()
    const TFac = $( `#TFac-${idR}` ).val()
    const TC = $( `#TC-${idR}` ).val()

    $.ajax( {
      url: `${base_url()}app/histocarrinvoices/updateinvoice/`,
      type: 'post',
      dataType: 'json',
      data: {
        Idr: idR,
        IdFac,
        FFac,
        CkPag,
        FPag,
        TFac,
        TC,
      },
      success( response ) {
        toastr[response.response_type]( response.message )
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      },
    } )
  } )

  $( document ).on( 'click', '.btn-add-invoice-complement', function ( event ) {
    event.preventDefault()

    fLosn = $( this ).attr( 'data-f' )

    $( `#tr-add-invoice-complements-${fLosn}` ).toggle( 250 )
  } )

  $( document ).on( 'click', '.btn-add-complement', () => {
    const IdFac = $( '#IdR-newcomplement' ).val()
    const NomCli = $( '#NomCli-newcomplement' ).val()
    const TMon = $( '#TMon-newcomplement' ).val()
    const FFac = $( '#FFac-newcomplement' ).val()
    const CkPag = $( '#ckpag-newcomplement' ).is( ':checked' ) ? 1 : 0
    const CkCan = $( '#CkCan-newcomplement' ).is( ':checked' ) ? 1 : 0
    const FPag = $( '#FPag-newcomplement' ).val()
    const TFac = $( '#TFac-newcomplement' ).val()
    const TC = $( '#TC-newcomplement' ).val()
    const CompNotaIdFac = $( '#CompNotaIdR-newcomplement' ).val()

    $.ajax( {
      url: `${base_url()}app/histocarrinvoices/addcomplement/`,
      type: 'post',
      dataType: 'json',
      data: {
        IdFac,
        NomCli,
        TMon,
        FFac,
        CkPag,
        CkCan,
        FPag,
        TFac,
        TC,
        CompNotaIdFac,
      },
      success( response ) {
        toastr[response.response_type]( response.message )
        window.setTimeout( () => {
          window.location.reload()
        }, 500 )
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      },
    } )
  } )

  $( document ).on( 'click', '.btn-add-invoice-creditnote', function ( event ) {
    event.preventDefault()

    fLosn = $( this ).attr( 'data-f' )
    $( `#tr-add-invoice-creditnotes-${fLosn}` ).toggle( 250 )
  } )

  $( document ).on( 'click', '.btn-add-creditnote', () => {
    const IdFac = $( '#IdR-newcreditnote' ).val()
    const NomCli = $( '#NomCli-newcreditnote' ).val()
    const TMon = $( '#TMon-newcreditnote' ).val()
    const FFac = $( '#FFac-newcreditnote' ).val()
    const CkPag = $( '#ckpag-newcreditnote' ).is( ':checked' ) ? 1 : 0
    const CkCan = $( '#CkCan-newcreditnote' ).is( ':checked' ) ? 1 : 0
    const FPag = $( '#FPag-newcreditnote' ).val()
    const TFac = $( '#TFac-newcreditnote' ).val()
    const TC = $( '#TC-newcreditnote' ).val()
    const CompNotaIdFac = $( '#CompNotaIdFac-newcreditnote' ).val()

    $.ajax( {
      url: `${base_url()}app/histocarrinvoices/addcreditnote/`,
      type: 'post',
      dataType: 'json',
      data: {
        IdFac,
        NomCli,
        TMon,
        FFac,
        CkPag,
        CkCan,
        FPag,
        TFac,
        TC,
        CompNotaIdFac,
      },
      success( response ) {
        toastr[response.response_type]( response.message )
        window.setTimeout( () => {
          window.location.reload()
        }, 500 )
      },
      error: () => {
        toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      },
    } )
  } )
} )

function process_upload( fileType ) {
  $( `#modal-filesinvoice-form-${fileType}` ).hide( 0 )
  $( `#modal-filesinvoice-${fileType}-loader` ).removeClass( 'd-none' ).addClass( 'd-block' )
  $( `#modal-filesinvoice-form-${fileType}` ).submit()
}

function validate_upload( fileType ) {
  const uploadFileRoute = $( `#file_${fileType}` ).val()
  const uploadFile = uploadFileRoute.replace( 'C:\\fakepath\\', '' )
  const extension = uploadFile
    .substring( uploadFile.lastIndexOf( '.' ), uploadFile.length )
    .toLowerCase()
  if ( extension === `.${fileType}` ) {
    if ( confirm( `¿Adjuntar el archiv\n"${uploadFile}"\ncomo ${fileType.toUpperCase()}?` ) ) {
      process_upload( fileType )
    }
  } else {
    toastr.warning( `Solo se adminten archivos en formato ${fileType.toUpperCase()}` )
  }
}

function view_file( folio, type ) {
  const windowHeight = $( window ).height()
  $( '#iframe-modal-view-file-invoice' ).attr(
    'src',
    base_url( `app/histocarrinvoices/viewfile/${folio}/${type}` ),
  )
  $( '#iframe-modal-view-file-invoice' ).css( 'height', `${windowHeight - 200}px` )
  if ( type === 'pdf' ) {
    $( '#modal-view-file-invoice' ).modal( {
      backdrop: 'static',
      keyboard: true,
      show: true,
    } )
  } else if ( type === 'xml' ) {
    toastr.success( 'Archivo descargado para su visualización' )
  }
}
