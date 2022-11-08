jQuery( document ).ready( () => {
  $( '#form-search-genactreport' ).validate( {
    submitHandler: () => {
      $( '#info-loader-report' ).html( `<div class="col-12 mb-4 mt-4">
                <div class="alert alert-primary alert-dismissible fade show mb-4 pt-5 pb-5" role="alert">
                <h4 class="text-center"> 
                Generando reporte, por favor espera....<br><br><i class="fas fa-spinner fa-pulse fa-3x"></i>
                </h4>          
                </div>
                </div>` )
      window.setTimeout( () => {
        window.location.href = `${base_url()}app/reports/gentrafficreport?d_i=${$(
          '#d_i',
        ).val()}&d_f=${$( '#d_f' ).val()}&cid=${$( '#cid' ).val()}&c=${$( '#c' ).val()}`
      }, 250 )
    },
  } )
} )
