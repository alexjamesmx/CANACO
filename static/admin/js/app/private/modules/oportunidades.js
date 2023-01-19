// eslint-disable-next-line no-var
var publi = 0
$( document ).ready( () =>
{
  getpersent()
  loadtableops()
  getnumbers()
  getSolventados()
  getcompletados()
  divmagico()
  soyafil()

  $( '#change_cotizacion' ).change( ( event ) =>
  {
    alert( 'probandoo probando' )
    $( '.group-cotizacion' ).slideToggle( 400 )
  } )
} )

// ALEX_NOTa
function loadtableops()
{
  // $('#tablaoportunidades').load(
  //   base_url('app/Mis_oportunidades/tablaoportunidades')
  // )
  // $('#tablaops').load(base_url('app/Mis_oportunidades/tablaops/1'))
}

function search_keyword()
{
  console.log( 'JIJIJA MODAL P453ERRO' )
  $( '#id_logo' ).removeClass( 'fas fa-search' )

  $( '#id_logo' ).addClass( 'fas fa-spinner fa-pulse' )
  $.ajax( {
    url: `${base_url()}app/user/search_keyword_home`,
    type: 'post',
    data: { que_necesita: $( '#keyword' ).val() },
    success( response )
    {
      $( '#modal-list-result' ).html( response )

      $( '#id_logo' ).removeClass( 'fas fa-spinner fa-pulse' )

      $( '#id_logo' ).addClass( 'fas fa-search' )

      const myModal = new bootstrap.Modal(
        document.getElementById( 'modal_search' )
      )
      myModal.show()
    },
    error()
    {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
    },
  } )
}

function subir_cotizacion()
{
  const jQform = $( '#subir_cotizacion' )
  $.ajax( {
    url: jQform.attr( 'action' ),
    type: jQform.attr( 'method' ),
    dataType: jQform.attr( 'data-type' ),
    data: ( s = 's' ),
    success: ( response ) =>
    {
      toastr[ response.response_type ]( response.message )
    },
    error: () =>
    {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
    },
    complete()
    {
      btnSbmt.html( txtBtn )
      btnSbmt.removeAttr( 'disabled' )
      //   btnCancel.removeAttr('disabled');
    },
  } )
}
function getpersent()
{
  $.ajax( {
    url: `${base_url()}Validaciones/validacionGrande`,
    dataType: 'json',
    success( data )
    {
      console.log( data )
      console.log( data.message )
      const porcentajePerfil = parseInt( data.message, 10 )
      console.log( porcentajePerfil )
      document.getElementById( 'porcentaje' ).textContent = porcentajePerfil + '%'
    },
  } )
}
function getSolventados()
{
  $.ajax( {
    url: `${base_url()}app/Perfil/solventados`,
    success( data )
    {
      const porcentajePerfil = data
      document.getElementById( 'solventados' ).innerHTML = porcentajePerfil

    },
  } )
}
function getcompletados()
{
  $.ajax( {
    url: `${base_url()}app/Perfil/completados`,
    success( data )
    {
      const porcentajePerfil = data
      document.getElementById( 'completados' ).innerHTML = porcentajePerfil
    },
  } )
}

function getnumbers()
{
  alert( 'aqui 2' )
  let misops
  let misreqs
  let ban = 0

  $.ajax( {
    url: `${base_url()}app/mis_oportunidades/misopsnr/17`,
    success( data )
    {
      misops = parseInt( data, 10 )
      misops = 10
      if ( misops === 0 )
      {
        document
          .getElementById( 'misoportunidadesgrande' )
          .setAttribute( 'style', 'display: none' )
        //  publi++;
      } else if ( misops === 1 )
      {
        if ( document.getElementById( 'misoportunidadesgrande' ) !== null )
        {
          document
            .getElementById( 'misoportunidadesgrande' )
            .setAttribute( 'style', 'display: flex' )
          document
            .getElementById( 'publicidad2' )
            .setAttribute( 'style', 'display: none' )

          if ( ban <= 1 )
          {
            document
              .getElementById( 'publicidad1' )
              .setAttribute( 'style', 'display: flex' )
            ban++
          }

          $( '#misoportunidades' ).html(
            `<h4> <i class="fas fa-exclamation-triangle"></i>Tienes <strong><em>10 oportunidad de	negocio pendientes</em></strong></h4>`
          )
        }
      } else if ( misops > 1 )
      {
        ban++
        if ( document.getElementById( 'misoportunidadesgrande' ) !== null )
        {
          document
            .getElementById( 'misoportunidadesgrande' )
            .setAttribute( 'style', 'display: flex' )
          document
            .getElementById( 'publicidad2' )
            .setAttribute( 'style', 'display: none' )

          if ( ban <= 1 )
          {
            document
              .getElementById( 'publicidad1' )
              .setAttribute( 'style', 'display: flex' )
          }

          $( '#misoportunidades' ).html(
            `<h4> <i class="fas fa-exclamation-triangle"></i>Tienes <strong><em>${misops} oportunidades de	negocio pendientes</em></strong></h4>`
          )
        }
      }
    },
  } )

  $.ajax( {
    url: `${base_url()}app/requirements/misreqs_activos`,
    success( data )
    {
      if ( data !== undefined || data != null )
      {
        misreqs = parseInt( data, 10 )
        if ( misreqs === 0 )
        {
          document
            .getElementById( 'misreqsgrande' )
            .setAttribute( 'style', 'display: none' )

          publi++
        } else if ( misreqs == 1 )
        {
          ban++
          if ( document.getElementById( 'misreqsgrande' ) !== null )
          {
            document
              .getElementById( 'misreqsgrande' )
              .setAttribute( 'style', 'display: flex' )
            if ( ban <= 1 )
            {
              document
                .getElementById( 'publicidad1' )
                .setAttribute( 'style', 'display: flex' )
            }

            document
              .getElementById( 'publicidad2' )
              .setAttribute( 'style', 'display: none' )

            $( '#misreqs' ).html(
              ` <h4> <i class="fas fa-exclamation-triangle"></i> Tienes <strong><em>${misreqs} requerimiento pendiente</em></strong> </h4>`
            )
          }
        } else if ( misreqs > 1 )
        {
          ban++
          if ( document.getElementById( 'misreqsgrande' ) !== null )
          {
            document
              .getElementById( 'misreqsgrande' )
              .setAttribute( 'style', 'display: flex' )
            document
              .getElementById( 'publicidad2' )
              .setAttribute( 'style', 'display: none' )
            document
              .getElementById( 'publicidad1' )
              .setAttribute( 'style', 'display: flex' )

            $( '#misreqs' ).html(
              ` <h4> <i class="fas fa-exclamation-triangle"></i> Tienes <strong><em>${misreqs} requerimientos pendientes</em></strong> </h4>`
            )
          }
        }
        // alert(ban);

        window.setTimeout( () =>
        {
          if ( ban >= 2 )
          {
            document
              .getElementById( 'publicidad2' )
              .setAttribute( 'style', 'display: none' )
            document
              .getElementById( 'publicidad1' )
              .setAttribute( 'style', 'display: none' )
          }

          if ( misreqs > 0 && misops > 0 )
          {
            document
              .getElementById( 'publicidad2' )
              .setAttribute( 'style', 'display: none' )
            document
              .getElementById( 'publicidad1' )
              .setAttribute( 'style', 'display: none' )
          }
        }, 700 )
      }
    },
  } )
}

function soyafil()
{
  $.ajax( {
    url: `${base_url()}app/mis_oportunidades/soyafiliado`,
    dataType: 'json',
    success( data )
    {
      console.log( 'soy afiliado' )
      console.log( data )
      console.log( data[ 0 ].afiliado_canaco )
      const afiliado = parseInt( data[ 0 ].afiliado_canaco, 10 )

      if (
        afiliado === 0
      )
      {
        console.log( 'soy afiliado2' )
        document
          .getElementById( 'noafiliado' )
          .setAttribute( 'style', 'display: inline' )
        document
          .getElementById( 'afiliado' )
          .setAttribute( 'style', 'display: none' )
      } else if (
        afiliado === 1
      )
      {
        console.log( 'soy afiliado3' )
        document
          .getElementById( 'noafiliado' )
          .setAttribute( 'style', 'display: none' )
        document
          .getElementById( 'afiliado' )
          .setAttribute( 'style', 'display: inline' )
      }
    },
  } )
}

function divmagico()
{
  let misdatos
  if ( $( '#info' ).val() !== undefined && $( '#info' ).val() !== null )
  {
    misdatos = JSON.parse( $( '#info' ).val() )
    let divi
    if ( misdatos !== undefined )
    {
      misdatos.forEach( ( minidato, i ) =>
      {
        try
        {
          divi = `magic${i}`
          $( `#${divi}` ).load(
            base_url( `app/perfil/profiles/${minidato.usuario_id}` )
          )
        } catch ( error ) { }
      } )
    }
  }
}
function aplicar(
  cliente_id,
  opnegocio_id,
  controls,
  estatus,
  contacto,
  modal,
  req_id,
  doc,
  coti
)
{
  let aplicaron
  $.ajax( {
    url: `${base_url()}app/requirements/validacion_cuatro`,
    data: { req_id },
    type: 'post',
    success( data )
    {
      aplicaron = parseInt( data, 10 )

      //if (aplicaron < 4) {
      console.log( 'Bien, han aplicado menos de 4' )
      $.ajax( {
        url: `${base_url()}app/user/aplicar`,
        data: {
          id_cliente: cliente_id,
          opnegocio_id,
          doc,
        },
        type: 'post',
        success()
        {
          $( estatus ).html(
            '	<h5 class="text-center"><i class="fas fa-clock"></i><br>Aplicado, pendiente de respuesta</h5>'
          )
          $( controls ).html(
            `<div class="btn-group"> <button  class="btn btn-dark default btn-default" onclick="showcoti(${coti.id})"><i class="fas fa-upload"></i>	<br> Anexar cotizacion </button><button  class="btn btn-primary default btn-default" onclick="contactmodal(${contacto.id})"><i class="fas fa-comment"></i><br> Contactar </button><button onclick="modalcancelar(${modal.id})" class="btn btn-danger default btn-default"><i class="fas fa-times"></i><br>Cancelar solicitud</button></div>`
          )
          toastr.success(
            'Se ha enviado un correo al comercio notificando que te intersa el requerimiento!'
          )
        },
      } )
      // } else {
      //   toastr.warning('Este requerimiento no puede aceptar mas aplicaciones')
      // }
    },
  } )
}
function deshabilitar()
{
  $.ajax( {
    url: `${base_url()}/Validaciones/validacionGrande`,
    dataType: 'json',
    success( data )
    {
      const porcentajePerfil = parseInt( data.message, 10 )

      if ( porcentajePerfil >= 70 )
      {
        window.location.href = `${base_url()}app/requirements/new`
      } else
      {
        toastr.warning(
          'Hola kekeCompleta tu perfil a un 70% para porde continuar con tu navegación!'
        )
      }
    },
  } )
}
function cancelar( cliente_id, opnegocio_id, controls, estatus, cancelar )
{
  let queja = ''
  queja = $( cancelar ).val()
  $( cancelar ).val( '' )
  $.ajax( {
    url: `${base_url()}app/user/cancelar`,
    data: { id_cliente: cliente_id, opnegocio_id, queja },
    type: 'post',
    success()
    {
      $( controls ).html( '<h5 class="text-center"><br>Oportunidad rechazada</h5>' )
      $( estatus ).html(
        '<h5 class="text-center"><i class="fas fa-times"></i><br>Oportunidad rechazada</h5>'
      )
      toastr.error(
        'Se ha cancelado la solicitud para encargarte del requerimiento'
      )
    },
  } )
}
function rechazar( cliente_id, opnegocio_id, controls, estatus, rechaza )
{
  let queja = ''
  queja = $( rechaza ).val()
  $( rechaza ).val( '' )
  $.ajax( {
    url: `${base_url()}app/user/rechazar`,
    data: { id_cliente: cliente_id, opnegocio_id, queja },
    type: 'post',
    success()
    {
      $( controls ).html( '<h5 class="text-center"><br>Oportunidad rechazada</h5>' )
      $( estatus ).html(
        '<h5 class="text-center"><i class="fas fa-times"></i><br>Oportunidad rechazada</h5>'
      )
      toastr.error(
        'Se ha rechazado la solicitud para encargarte del requerimiento'
      )
    },
  } )
}
function modalacepta( modal )
{
  const myModal = new bootstrap.Modal( document.getElementById( modal.id ) )
  myModal.show()
}
function modalbi( modal )
{
  myModal.show()
}
function modalrechazar( modal )
{
  // alert('aaaaaaaaaaa');
  const myModal = new bootstrap.Modal( document.getElementById( modal.id ) )
  myModal.show()
}
// function contactmodal(modal) {
//   const myModal = new bootstrap.Modal(document.getElementById(modal.id))
//   myModal.show()
// }

function modalcancelar( modal )
{
  // alert('aaaaaaaaaaa');
  const myModal = new bootstrap.Modal( document.getElementById( modal.id ) )
  myModal.show()
}

// function send_whats(telefono, text, opnegocio_id, requerimiento, ventas) {
//   if (telefono === '' || telefono == null) {
//     toastr.warning(
//       'Este comercio no tiene un numero de whatsapp de ventas registrado'
//     )
//   } else {
//     mensaje = `Hola ${ventas}, te contacto desde *_ENLACE-CANACO_* con respecto al requerimiento *${requerimiento}*: `
//     mensaje += $(`#${text}`).val()
//     const whats = `https://wa.me/+521${telefono}?text=${mensaje}`
//     window.open(whats, '_blank')
//     $.ajax({
//       url: `${base_url()}app/user/mensaje_whats`,
//       data: { opnegocio_id, mensaje },
//       type: 'post',
//       success() {
//         toastr.success(
//           'Se ha envido un whatsapp a la persona que publicó el requerimiento'
//         )
//         location.reload()
//       },
//     })
//   }
// }
// function send_email(clientemail, text, opnegocio_id) {
//   let mymail
//   $.ajax({
//     url: `${base_url()}app/myaccount/sendDataMail`,
//     type: 'post',
//     success(response) {
//       mymail = response.slice(1, -1)
//       mensaje = $(`#${text}`).val()
//       $.ajax({
//         url: `${base_url()}app/user/mensaje_correo`,
//         data: {
//           opnegocio_id,
//           mensaje,
//           clientemail,
//           mymail,
//         },
//         type: 'post',
//         success() {
//           toastr.success(
//             'Se ha enviado mail a la persona que publicó el requerimiento'
//           )
//           location.reload()
//         },
//       })
//     },
//   })
// }
function detalles()
{
  $( '#detalles' ).show()
}
function showcoti( id )
{
  document.getElementById( id.id ).setAttribute( 'style', 'display: flex' )
}

var inputavalue2 = 0
var inputa2 = 0
var inputbvalue2 = 0
var inputb2 = 0
var inputcvalue2 = 0
var inputc2 = 0
var inputdvalue2 = 0
var inputd2 = 0

function validarencuestaAa()
{
  inputa2 = document.getElementsByName( 'aa' )
  for ( let index = 0; index < inputa2.length; index++ )
  {
    if ( inputa2[ index ].checked )
    {
      inputavalue2 = inputa2[ index ].value
    }
  }
  console.log( 'inputavalue2 :', inputavalue2 )
}

function validarencuestaBb()
{
  inputb2 = document.getElementsByName( 'bb' )
  for ( let index = 0; index < inputb2.length; index++ )
  {
    if ( inputb2[ index ].checked )
    {
      inputbvalue2 = inputb2[ index ].value
    }
  }
  console.log( 'inputbvalue2 :', inputbvalue2 )
}

function validarencuestaCc()
{
  inputc2 = document.getElementsByName( 'cc' )
  for ( let index = 0; index < inputc2.length; index++ )
  {
    if ( inputc2[ index ].checked )
    {
      inputcvalue2 = inputc2[ index ].value
    }
  }
  console.log( 'inputcvalue2 :', inputcvalue2 )
}
function validarencuestaDd()
{
  inputd2 = document.getElementsByName( 'dd' )
  for ( let index = 0; index < inputd2.length; index++ )
  {
    if ( inputd2[ index ].checked )
    {
      inputdvalue2 = inputd2[ index ].value
    }
  }
  console.log( 'inputdvalue :', inputdvalue2 )
}

function validarencuesta2( id_req, id_op )
{
  const nota = document.getElementById( 'ff1' ).value
  console.log(
    'console ',
    inputavalue2,
    ' ',
    inputbvalue2,
    ' ',
    inputcvalue2,
    ' ',
    inputdvalue2
  )
  if (
    inputavalue2 === 0 ||
    inputbvalue2 === 0 ||
    inputcvalue2 === 0 ||
    inputdvalue2 === 0
  )
  {
  } else
  {
    $.ajax( {
      url: `${base_url()}app/requirements/subir_encuestas_op`,
      type: 'post',
      data: {
        id_req,
        id_op,
        p1: inputavalue2,
        p2: inputbvalue2,
        p3: inputcvalue2,
        p4: inputdvalue2,
        nota,
      },
      success()
      {
        toastr.success( 'Gracias por evaluar esta oportunidad' )
        window.location.reload()
      },
    } )
  }
}
