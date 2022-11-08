jQuery( document ).ready( ( $ ) => {
  $( '#filter_search' ).change( () => {
    $( '#card-search-control' ).slideToggle( 400 )
  } )
} )

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
    url: base_url( 'app/my_controls/getdatacontrolreview' ),
    type: 'post',
    dataType: 'json',
    data: {
      control_id: controlId,
    },
    success: ( response ) => {
      if ( response.response_code === 200 ) {
        $( '#container-modal-review-control' ).html( response.content_HTML )

        $( '.smartWizardCheck' ).smartWizard( {
          selected: 0,
          theme: 'check',
          transitionEffect: 'fade',
          showStepURLhash: false,
        } )

        for ( let i = 0; i < response.data_last_estatus.length; i++ ) {
          $(
            `.smartWizardCheck-${response.data_last_estatus[i].cservice_id} .card-header li`,
          ).removeClass( 'active' )
          $(
            `.smartWizardCheck-${response.data_last_estatus[i].cservice_id} .card-header li.step-${
              response.data_last_estatus[i].last_step == null
                ? 1
                : response.data_last_estatus[i].last_step
            }`,
          ).addClass( 'active' )
        }
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
    base_url( `app/my_controls/viewfile/${cserviceFileId}` ),
  )
  $( '#iframe-modal-detail-file-control' ).css( 'height', `${windowHeight - 200}px` )
  $( '#modal-detail-file-control' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )
}
