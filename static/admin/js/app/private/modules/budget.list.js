let baseFormAction
jQuery( document ).ready( () => {
  baseFormAction = $( '#form-create-bcomment' ).attr( 'action' )

  window.setTimeout( () => {
    $( '#budget-validation-ok' ).slideUp( 500 )
  }, 3000 )

  $( '#filter_budgets' ).change( () => {
    $( '#card-search-cotizacion' ).slideToggle( 400 )
  } )

  Mousetrap.bind( ['alt+n'], () => {
    window.location.href = `${base_url()}app/budgets/new`
  } )

  $( '#form-create-bcomment' ).validate( {
    submitHandler: ( form ) => {
      const jQform = $( form )
      const btnSbmt = $( form.children[2].getElementsByTagName( 'button' )[1] )
      const btnCancel = $( form.children[2].getElementsByTagName( 'button' )[0] )
      const txtBtn = $.trim( btnSbmt.html() )

      btnSbmt
        .html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
        )
        .attr( 'disabled', 'disabled' )
      btnCancel.attr( 'disabled', 'disabled' )
      $( '#b_comment' ).attr( 'readonly', 'readonly' )

      $.ajax( {
        url: jQform.attr( 'action' ),
        type: jQform.attr( 'method' ),
        dataType: jQform.attr( 'data-type' ),
        data: jQform.serialize(),
        success: ( response ) => {
          $( '#b_comment' ).val( '' )
          toastr[response.response_type]( response.message )
          if ( response.response_code === 200 ) {
            $( '#modal-comments-budget-data-list' )
              .append( `<div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="javascript:void(0);">
                            <img alt="Profile Picture" src="https://res.cloudinary.com/losnmx/image/upload/v1582929680/webapp/userpic_v9gzfc.png" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                            </a>
                            <div class="pl-3">
                            <a href="javascript:void(0);">
                            <p class="font-weight-medium mb-0">${response.data_bcomment.comment}</p>
                            <p class="text-muted mb-0 text-small"> ${response.data_bcomment.user_add} | ${response.data_bcomment.date_add}</p>
                            </a>
                            </div>
                            </div>` )
            const counterComment = parseInt(
              $( `#counter-comments-${response.data_bcomment.budget_id}` ).text(),
            )
            $( `#counter-comments-${response.data_bcomment.budget_id}` ).text(
              parseInt( counterComment + 1 ),
            )
          }
        },
        error: () => {
          toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
        },
        complete: () => {
          btnCancel.removeAttr( 'disabled' )
          $( '#b_comment' ).removeAttr( 'readonly', 'readonly' )
          btnSbmt.html( txtBtn ).removeAttr( 'disabled' )
        },
      } )
    },
  } )
} )

function info_budget( budgetId ) {
  $( '#container-modal-detail-budget' ).html( `<div class="form-row" >
        <div class="form-group col-12">
        <p class="text-center">
        <i class="fas fa-spinner fa-pulse fa-5x "></i>
        </p>
        <h3 id="modal-loading-budget-message" class="text-center">Cargando información</h3>
        <h4 class="text-center">Por favor espere...</h4>
        </div>
        </div>` )

  $( '#modal-detail-budget' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )

  $.ajax( {
    url: base_url( 'app/budgets/getdatabudget' ),
    type: 'post',
    dataType: 'json',
    data: {
      budget_id: budgetId,
    },
    success: ( response ) => {
      if ( response.response_code === 200 ) {
        $( '#pdf-budget' ).attr( 'href', `${base_url()}app/budgets/pdf_budget/${budgetId}` )
        $( '#print-budget' ).attr( 'href', `${base_url()}app/budgets/print_budget/${budgetId}` )
        const contentHTML = `
                <div class="form-row" >                
                <div class="form-group col-sm-4">
                Folio
                <br>
                <strong>${response.data_budget.sheet}</strong>
                </div>

                <div class="form-group col-sm-4">
                Cliente
                <br>
                <strong>${response.data_budget.empresa}</strong>
                </div>

                <div class="form-group col-sm-4">
                Contacto
                <br>
                <strong>${response.data_budget.contacts}</strong>
                </div>
                </div> <!--#form-row--> 

                <div class="form-row">
                <div class="form-group col-lg-4">
                Teléfonos
                <br>
                <strong>${response.data_budget.tels}</strong>
                </div>

                <div class="form-group col-lg-4">
                Correo(s) electrónico(s)
                <br>
                <strong>${response.data_budget.mails}</strong>
                </div>

                <div class="form-group col-lg-4">
                Mercancía
                <br>
                <strong>${response.data_budget.commodity_desc}</strong>
                <br>
                <strong>
                ${response.data_budget.pieces} pzas, ${response.data_budget.weight} ${response.data_budget.weight_type}
                </strong>
                </div>
                </div> <!--#form-row--> 

                <div class="form-row">
                <div class="form-group col-md-12">
                <h5 class="mb-4">
                <i class="simple-icon-list"></i> Servicios agregados a la cotización
                </h5>
                </div>

                <div class="form-group col-md-12">
                <div class="no-more-tables">
                <table class="table table-bordered">
                <tbody id="table-data-budget"> </tbody>
                </table>
                </div>
                </div>
                </div> <!--#form-row--> 
                `
        $( '#container-modal-detail-budget' ).html( contentHTML )

        response.data_bservices.foreach( ( bservice ) => {
          $( '#table-data-budget' ).append( `
                        <tr>
                        <td data-title="Info">
                        Origen: <strong>${bservice.origin}</strong>
                        <br>
                        Destino: <strong>${bservice.destination}</strong>
                        <br>
                        Carrier: <strong>${bservice.carrier_name}</strong>
                        <td data-title="Costo">$${bservice.cost} ${bservice.currency_type}</td>
                        <td data-title="Tiempo">${bservice.delivery_time}</td>
                        <td data-title="Tipo de embarquee">${bservice.ship_name}</td>
                        </tr>
                        ` )
        } )
      } else {
        toastr[response.response_type]( response.message )
        window.setTimeout( () => {
          $( '#modal-detail-budget' ).modal( 'hide' )
        }, 350 )
      }
    },
    error: () => {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      window.setTimeout( () => {
        $( '#modal-detail-budget' ).modal( 'hide' )
      }, 350 )
    },
  } )
}

function show_messagescot( budgetId, budgetSheet ) {
  $( '#form-create-bcomment' ).attr( 'action', baseFormAction )
  $( '#b_comment' ).val( '' )

  const winHeight = $( window ).height()
  const commentsHeight = winHeight <= 800 ? 250 : winHeight - 400
  $( '#modal-comments-budget-data-list' ).css( 'height', `${commentsHeight}px` )

  $( '#modal-comments-budget-sheet' ).html( budgetSheet )

  $( '#b_comment, #btn-sbmt-add-comment' ).attr( 'disabled', 'disabled' )

  $( '#modal-comments-budget-data-list' ).html( `<div class="d-flex flex-row mb-3 pb-3 border-bottom">
        <div class="col-sm-12">
        <p class="text-center">
        <i class="fas fa-spinner fa-pulse fa-5x "></i>
        </p>
        <h3 id="modal-loading-budget-message" class="text-center">Cargando información</h3>
        <h4 class="text-center">Por favor espere...</h4>
        </div>
        </div>` )

  $( '#modal-comments-budget' ).modal( {
    backdrop: 'static',
    keyboard: true,
    show: true,
  } )

  $.ajax( {
    url: base_url( 'app/budgets/comments' ),
    type: 'post',
    dataType: 'json',
    data: {
      budget_id: budgetId,
    },
    success: ( response ) => {
      if ( response.response_code === 200 ) {
        $( '#modal-comments-budget-data-list' ).html( '' )
        response.data_bcomments.foreach( ( comment ) => {
          $( '#modal-comments-budget-data-list' )
            .append( `<div class="d-flex flex-row mb-3 pb-3 border-bottom">
                        <a href="javascript:void(0);">
                        <img alt="Profile Picture" src="https://res.cloudinary.com/losnmx/image/upload/v1582929680/webapp/userpic_v9gzfc.png" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                        </a>
                        <div class="pl-3">
                        <a href="javascript:void(0);">
                        <p class="font-weight-medium mb-0">${comment.comment}</p>
                        <p class="text-muted mb-0 text-small"> ${comment.nombre} ${comment.apellido1} ${comment.apellido2} | ${comment.date_add}</p>
                        </a>
                        </div>
                        </div>` )
        } )
        $( '#form-create-bcomment' ).attr( 'action', `${baseFormAction}/${budgetId}` )
        $( '#b_comment, #btn-sbmt-add-comment' ).removeAttr( 'disabled' )
      } else {
        toastr[response.response_type]( response.message )
        window.setTimeout( () => {
          $( '#modal-comments-budget' ).modal( 'hide' )
        }, 350 )
      }
    },
    error: () => {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
      window.setTimeout( () => {
        $( '#modal-detail-budget' ).modal( 'hide' )
      }, 350 )
    },
    complete: () => {},
  } )
}

function validate_budget( sheet, href ) {
  if (
    confirm( `¿Realmente desea validar la cotización <${sheet}>?\n\nESTA ACCIÓN NO PUEDE CANCELARSE` )
  ) {
    window.location.href = href
  }
}
