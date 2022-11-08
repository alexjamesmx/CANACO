$( document ).ready( () => {
  tablareasignaciones()
} )
function tablareasignaciones() {
  $.ajax( {
    url: base_url( 'app/jefeafilcomercios/reasignaciones' ),
    type: 'post',
    dataType: 'json',
    success( response ) {
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

      tbodyContent.innerHTML = valueRowContent
    },
  } )
}
