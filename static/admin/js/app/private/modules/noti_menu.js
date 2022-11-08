jQuery( document ).ready( ( $ ) => {
  let misops
  let misreqs
  $.ajax( {
    url: `${base_url()}app/mis_oportunidades/misopsnr/17`,
    success( res ) {
      misops = parseInt( res )
      $.ajax( {
        url: `${base_url()}app/requirements/misreqs_activos`,
        success( data ) {
          misreqs = parseInt( data )
          const notis = parseInt( misops ) + parseInt( misreqs )
          if ( parseInt( misops ) > 0 ) {
            $( '#oportunidadesat' ).text( parseInt( misops ) )
            const te = `${parseInt( misops )} Oportunidades sin atender`
            $( '#oportunidadesat1' ).text( te )
            $( '#oportunidadesat2' ).text( te )
            $( '#oportunidadesat3' ).text( parseInt( misops ) )
          } else {
            $( 'notificationDropdown2' ).html( '' )
            $( 'notificationDropdown1' ).html( '' )
            $( '#oportunidadesat' ).text( '' )
            $( '#oportunidadesat3' ).text( '' )
            $( '#oportunidadesat1' ).text( '' )
            $( '#oportunidadesat2' ).text( '' )
            $( '#oportunidadesat' ).removeClass()
            $( '#oportunidadesat3' ).removeClass()
          }
          if ( !Number.isNaN( notis ) ) {
            if ( notis > 0 ) {
              $( '#trans-noty-container' ).html(
                `
                          <span class="badge badge-pill badge-danger mb-1">&nbsp;${notis}&nbsp;</span>
                          `,
              )
            } else {
              $( '#trans-noty-container' ).html( '' )
            }
          }
        },
      } )
    },
  } )
  profile_pic()
} )
function profile_pic() {
  $.ajax( {
    url: `${base_url()}app/mis_oportunidades/soyafiliado`,
    datatype: 'json',
    success( data ) {
      const comercio = $.parseJSON( data )
      if ( comercio[0].negocio_logo != null ) {
        const img = `${base_url()}static/uploads/perfil/${comercio[0].negocio_logo}`
        $( '#profile_pic' ).attr( 'src', img )
      }
    },
  } )
}
function getnumbers() {
  $.ajax( {
    url: `${base_url()}app/mis_oportunidades/misopsnr/17`,
    success( data ) {
      misops = parseInt( data )
    },
  } )
  $.ajax( {
    url: `${base_url()}app/requirements/misreqs_activos`,
    success( data ) {
      misreqs = parseInt( data )
    },
  } )
}
