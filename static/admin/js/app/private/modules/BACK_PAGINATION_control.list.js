jQuery( document ).ready( () => {
  let urlParams;
( window.onpopstate = function () {
    let match
    const pl = /\+/g // Regex for replacing addition symbol with a space
    const search = /([^&=]+)=?([^&]*)/g
    const decode = function ( s ) {
      return decodeURIComponent( s.replace( pl, ' ' ) )
    }
    const query = window.location.search.substring( 1 )

    urlParams = {}
    while ( ( match = search.exec( query ) ) ) urlParams[decode( match[1] )] = decode( match[2] )
  } )()

  $( '#controls-data-tables-pagination' ).DataTable( {
    bLengthChange: false,
    searching: false,
    destroy: true,
    info: false,
    sDom: '<"row view-filter"<"col-sm-12"<"float-left"l><"float-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
    pageLength: 10,
    language: {
      paginate: {
        previous: "<i class='simple-icon-arrow-left'></i>",
        next: "<i class='simple-icon-arrow-right'></i>",
      },
    },
    drawCallback() {
      $( $( '.dataTables_wrapper .pagination li:first-of-type' ) ).find( 'a' ).addClass( 'prev' )
      $( $( '.dataTables_wrapper .pagination li:last-of-type' ) ).find( 'a' ).addClass( 'next' )

      $( '.dataTables_wrapper .pagination' ).addClass( 'pagination-sm' )
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: base_url( 'app/controls/pagination' ),
      type: 'post',
      data: {
        custom_search: urlParams,
      },
    },
  } )

  $( '#filter_search' ).change( () => {
    $( '#card-search-control' ).slideToggle( 400 )
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
  const guia = prompt( 'Ingresa el número de guía:' )

  $( `#guias-stack-${cserviceId}` ).append( `<li class="list-group-item">
        ${guia}
        <a href="javascript:delete_guia(${cserviceId}, '${guia}')" class="text-danger float-right">
        <i class="fas fa-trash"></i>
        </a>
        </li> ` )

  $.ajax( {
    url: base_url( 'app/controls/update_guides' ),
    type: 'post',
    dataType: 'json',
    data: {
      cservice_id: cserviceId,
      cservice_guia: guia,
    },
    success: ( response ) => {
      if ( response.response_code === 200 ) {
        toastr[response.response_type]( response.message )
      } else {
        toastr[response.response_type]( response.message )
      }
    },
    error: () => {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
    },
  } )
}
