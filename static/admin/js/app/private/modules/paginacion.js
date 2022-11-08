$( document ).ready( () => {
  paginacion_op()
  paginacion_op()
  cargap1()
} )

function paginacion_op() {
  $( '#pagination1' ).html( '' )
  $.ajax( {
    url: `${base_url()}app/Mis_oportunidades/misops`,
    dataType: 'json',
    success( data ) {
      $( '#pagination1' ).html( '' )
      let repeticion = Math.floor( data / 5 )
      const residuo = data % 5
      if ( residuo > 0 ) {
        repeticion += 1
      }
      let contenido = ''
      if ( data > 0 ) {
        contenido = '<li class="list-inline-item px-2 mb-0"><h3><strong>Selecciona una pagina</strong></h3>  </li>'
      }
      for ( let i = 1; i <= repeticion; i++ ) {
        contenido += `<button onclick="cambiapagina(${i},${repeticion})" style=" background: #ededed; box-sizing: border-box; display: inline-block; min-width: 1.5em; padding: 0.5em 1em; margin-left: 2px; text-align: center; text-decoration: none !important; cursor: pointer; *cursor: hand; color: #333 !important; border: 1px solid;  border-radius: 2px;" aria-controls="lista_tbody" data-dt-idx="2" tabindex="0">${i}</button>`
        $( '#pagination1' ).append( contenido )

        contenido = ''
      }

      $( '#oportunidades_mostradas' ).html(
        `<span class="text-primary float-right"><small>Pagina 1 de ${repeticion}</small></span>`,
      )
    },
    error() {},
  } )
}

function cambiapagina( i, j ) {
  $( '#tabla_oportunidades' ).html(
    "<div class='col-12 text-center p-5 m-5'><i class='fas fa-spinner fa-pulse fa-5x'></i></div>",
  )
  $( '#oportunidades_mostradas' ).html(
    `<span class="text-primary float-right"><small>Pagina ${i} de ${j}</small></span>`,
  )
  window.setTimeout( () => {
    $( '#tabla_oportunidades' ).load( base_url( `app/Mis_oportunidades/tabla_oportunidades/${i}` ) )
  }, 1500 )
}

function cargap1() {
  console.log('Mis oportunidades: Carga pagina 1')
  $( '#tabla_oportunidades' ).html(
    "<div id='loading_spinner'class='col-12 text-center p-5 m-5'><i class='fas fa-spinner fa-pulse fa-5x'></i></div>",
  )
    $( '#tabla_oportunidades' ).load( base_url( 'app/Mis_oportunidades/tabla_oportunidades/' ),()=>{
    $('#loading_spinner').remove()
    } )

}
