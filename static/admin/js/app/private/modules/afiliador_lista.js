const select_fecha = document.getElementById( 'select_fecha' ).value
let selet_data_afiliados = document.getElementById( 'selet_data_afiliados' ).value
let select_servicio = document.getElementById( 'select_servicio' ).value

let fecha_init_1 = document.getElementById( 'fecha_init_1' ).value
let fecha_end_1 = document.getElementById( 'fecha_end_1' ).value

const fecha_init_2 = document.getElementById( 'fecha_init_2' ).value
const fecha_end_2 = document.getElementById( 'fecha_end_2' ).value

const fecha_init_3 = document.getElementById( 'fecha_init_3' ).value
const fecha_end_3 = document.getElementById( 'fecha_end_3' ).value

const fecha_init_4 = document.getElementById( 'fecha_init_4' ).value
const fecha_end_4 = document.getElementById( 'fecha_end_4' ).value

const tbodyContent = document.getElementById( 'tbodyContent' )
let valueRowContent = ''
let fecha
const date = new Date()
$( document ).ready( () => {
  $( '#lista_tbody' ).DataTable( {
    responsive: true,
    language: {
      url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
    },
    dom: 'bfrtip',
    buttons: ['copy,csv,excel,pdf,print'],
  } )
  $( '#selet_data_afiliados' ).change( function () {
    selet_data_afiliados = $( this ).val()
    // filter()
  } )

  $( '#select_servicio' ).change( function () {
    select_servicio = $( this ).val()
    // filter()
  } )
  $( '#fecha_init_1' ).change( function () {
    fecha_init_1 = $( this ).val()
    // filter()
  } )
  $( '#fecha_end_1' ).change( function () {
    fecha_end_1 = $( this ).val()
    // filter()
  } )
} )
$( '#select_fecha' ).change( () => {
  valueSelect = $( '#select_fecha' ).val()
  if ( valueSelect === 0 ) {
    $( '#form-date-1' ).toggle()

    $( '#form-date-2' ).hide()
    $( '#form-date-3' ).hide()
    $( '#form-date-4' ).hide()
  }
  if ( valueSelect === 1 ) {
    $( '#form-date-2' ).toggle()

    $( '#form-date-1' ).hide()
    $( '#form-date-3' ).hide()
    $( '#form-date-4' ).hide()
  }
  if ( valueSelect === 2 ) {
    $( '#form-date-3' ).toggle()

    $( '#form-date-2' ).hide()
    $( '#form-date-1' ).hide()
    $( '#form-date-4' ).hide()
  }
  if ( valueSelect === 3 ) {
    $( '#form-date-4' ).toggle()

    $( '#form-date-2' ).hide()
    $( '#form-date-3' ).hide()
    $( '#form-date-1' ).hide()
  }
} )
function filter() {
  document.getElementById( 'content_search' ).setAttribute( 'style', 'display:block' )
  valueRowContent = ''

  $.ajax( {
    url: base_url( 'app/afiliador/lista_comercios' ),
    type: 'post',
    dataType: 'json',
    data: {
      select_fecha,
      selet_data_afiliados,
      select_servicio,
      fecha_init_1,
      fecha_end_1,
      fecha_init_2,
      fecha_end_2,
      fecha_init_3,
      fecha_end_3,
      fecha_init_4,
      fecha_end_4,
    },
    success( response ) {
      // if (response.comercios >= 0) {
      if ( response.comercios != null ) {
        for ( let index = 0; index < response.comercios.length; index++ ) {
          let afiliado_comercio = null
          let fecha_inicio_afiliacion = null
          let fecha_fin_afiliacion = null
          let fecha_creacion = null
          let tipo_transaccion = null
          if ( response.comercios[index].fecha_creacion != null ) {
            fecha_creacion = response.comercios[index].fecha_creacion
            fecha = `${date.getFullYear( fecha_creacion )}-${
              date.getMonth( fecha_creacion ) + 1
            }-${date.getDate( fecha_creacion )}`
          }
          if ( response.comercios[index].afiliado_canaco != null ) {
            if ( response.comercios[index].afiliado_canaco === 1 ) {
              afiliado_comercio = 'Afiliado'
              fecha_inicio_afiliacion = response.comercios[index].fecha_inicio_afiliacion
              fecha_fin_afiliacion = response.comercios[index].fecha_fin_afiliacion
            }
            if ( response.comercios[index].afiliado_canaco === 0 ) {
              afiliado_comercio = 'No afiliado'
            }
          }
          if ( response.comercios[index].tipo_transaccion != null ) {
            if ( response.comercios[index].tipo_transaccion === 1 ) {
              tipo_transaccion = 'Solo productos'
            }
            if ( response.comercios[index].tipo_transaccion === 2 ) {
              tipo_transaccion = 'Solo servicios'
            }
            if ( response.comercios[index].tipo_transaccion === 3 ) {
              tipo_transaccion = 'Productos y servicios'
            }
          }
          valueRowContent += '<tr>'
          valueRowContent += '<td><h2>'
          valueRowContent += response.comercios[index].negocio_id
            ? response.comercios[index].negocio_id
            : ''
          valueRowContent += '</h2></td>'
          valueRowContent += '<td><h2>'
          valueRowContent += response.comercios[index].negocio_nombre
            ? response.comercios[index].negocio_nombre
            : ''
          valueRowContent += '</h2></td>'
          valueRowContent += '<td>'
          valueRowContent += fecha || ''
          valueRowContent += '</td>'

          valueRowContent += '<td>'
          valueRowContent += fecha_inicio_afiliacion || ''
          valueRowContent += '</td>'
          valueRowContent += '<td>'
          valueRowContent += fecha_fin_afiliacion || ''
          valueRowContent += '</td>'
          valueRowContent += '<td>'
          valueRowContent += afiliado_comercio || ''
          valueRowContent += '</td>'
          valueRowContent += '<td>'
          valueRowContent += tipo_transaccion || ''
          valueRowContent += '</td>'
          valueRowContent += '<td>'
          valueRowContent += '</td>'
          valueRowContent += '</tr>'
        }
      }
      // } else {
      //
      // valueRowContent = ''
      // }
      //
      // let datos = $.parseJSON(response)
      //
      tbodyContent.innerHTML = valueRowContent
    },
  } )
}

$( '#search' ).keyup( function () {
  const rex = new RegExp( $( this ).val(), 'i' )

  $( '#tbodyContent tr' ).hide()
  $( '#tbodyContent tr' )
    .filter( function () {
      return rex.test( $( this ).text() )
    } )
    .show()
} )
