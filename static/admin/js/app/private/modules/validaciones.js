function abrimodal() {
  console.log( 'QUEEEEE ALEX SI ABREEE jijija' )
  const myModal = new bootstrap.Modal( document.getElementById( 'porcieto70' ) )
  myModal.show()
}

// jQuery( document ).ready( ( $ ) => {
//   console.log( '4' )
//   $.ajax( {
//     url: `${base_url()}Validaciones/validacionGrande`,
//     success( data ) {
//       // alert(data.message)

//       porcentajePerfil = parseInt( data.message, 10 )
//       bandera_modal = parseInt( data.bandera_modal, 10 )
//       $( '#progreso' ).attr( 'style', `width: ${porcentajePerfil}%` )
//       $( '#progreso' ).text( `${porcentajePerfil}%` )

//       if ( porcentajePerfil < 70 ) {
//         minimo.style.display = 'block'
//       } else {
//         if ( bandera_modal === 0 ) {
//         } else {
//           abrimodal()
//         }

//         if ( porcentajePerfil === 100 ) {
//           medallaPerfil()
//         }
//         minimo.style.display = 'none'
//         // $('#minimo').show();
//       }
//     },
//   } )
// } )
