$( document ).ready( () => {
  cargaMapa()
} )
let mapa
let cont = 0
const armarks = []
const centro = { lat: 20.576, lng: -100.384 }

function cargaMapa() {
  mapa = new google.maps.Map( document.getElementById( 'mapa' ), {
    center: centro,
    zoom: 18,
  } )

  mapa.addListener( 'click', ( evento ) => {
    $( '#marks' ).append( `<OPTION value="${cont}">${evento.latLng}</OPTION>` )
    armarks[cont] = new google.maps.Marker( {
      position: evento.latLng,
      map: mapa,
      draggable: false,
    } )
    cont++
  } )
}
function animar() {
  armarks[$( '#marks' ).val()].setAnimation( google.maps.Animation.DROP )
}
