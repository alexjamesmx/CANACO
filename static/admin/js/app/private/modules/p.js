$( document ).ready( () => {
  getpersent()
  loadtableops()
  getnumb()
  getnumbers()
  todas()
  miinfo()
  getSolventados()
  getcompletados()
  divmagico()
  soyafil()
  $( '#change_cotizacion' ).change( () => {
    $( '.group-cotizacion' ).slideToggle( 400 )
  } )
} )

function getnumber_nr( key ) {
  let misops
  let misopsnr
  $.ajax( {
    url: `${base_url()}app/mis_oportunidades/misops`,
    success( res ) {
      misops = parseInt( res, 10 )
      $.ajax( {
        url: `${base_url()}app/mis_oportunidades/misopsnr/${key}`,
        success( data ) {
          misopsnr = parseInt( data, 10 )
          $( '#oportunidades_mostradas' ).html(
            `<span class="text-primary float-right"><small>Mostrando ${misopsnr} de ${misops}</small></span>`,
          )
        },
      } )
    },
  } )
}
function loadtableops() {
  $( '#tablaoportunidades' ).load( base_url( 'app/Mis_oportunidades/tablaoportunidades' ) )
  $( '#tablaops' ).load( base_url( 'app/Mis_oportunidades/tablaops' ) )
  todas()
}
function todas() {
  getnumb()
  $( '#tablaops' ).html(
    "<div class='col-12 text-center p-5 m-5'><i class='fas fa-spinner fa-pulse fa-5x'></i></div>",
  )
  window.setTimeout( () => {
    $( '#tablaops' ).load( base_url( 'app/mis_oportunidades/tablaops' ) )
  }, 1500 )
}
function noreply() {
  getnumber_nr( '17' )
  $( '#tablaops' ).html(
    "<div class='col-12 text-center p-5 m-5'><i class='fas fa-spinner fa-pulse fa-5x'></i></div>",
  )
  window.setTimeout( () => {
    $( '#tablaops' ).load( base_url( 'app/mis_oportunidades/tablaops_nr/17' ) )
  }, 1500 )
}
function aplicadas() {
  getnumber_nr( '18' )
  $( '#tablaops' ).html(
    "<div class='col-12 text-center p-5 m-5'><i class='fas fa-spinner fa-pulse fa-5x'></i></div>",
  )
  window.setTimeout( () => {
    $( '#tablaops' ).load( base_url( 'app/mis_oportunidades/tablaops_nr/18' ) )
  }, 1500 )
}
function aceptadas() {
  $( '#tablaops' ).html(
    "<div class='col-12 text-center p-5 m-5'><i class='fas fa-spinner fa-pulse fa-5x'></i></div>",
  )
  window.setTimeout( () => {
    $( '#tablaops' ).load( base_url( 'app/mis_oportunidades/tablaops_nr2/18' ) )
  }, 1500 )
}

function canceladas() {
  getnumber_nr( '19' )
  $( '#tablaops' ).html(
    "<div class='col-12 text-center p-5 m-5'><i class='fas fa-spinner fa-pulse fa-5x'></i></div>",
  )
  window.setTimeout( () => {
    $( '#tablaops' ).load( base_url( 'app/mis_oportunidades/tablaops_nr/19' ) )
  }, 1500 )
}

function getnumb() {
  let misops
  $.ajax( {
    url: `${base_url()}app/mis_oportunidades/misops`,
    success( data ) {
      misops = parseInt( data, 10 )
      $( '#oportunidades_mostradas' ).html(
        `<span class="text-primary float-right"><small>Mostrando ${misops} de ${misops}</small></span>`,
      )
    },
  } )
}
function subir_cotizacion() {
  const jQform = $( '#subir_cotizacion' )
  $.ajax( {
    url: jQform.attr( 'action' ),
    type: jQform.attr( 'method' ),
    dataType: jQform.attr( 'data-type' ),
    data: ( s = 's' ),
    success: ( response ) => {
      toastr[response.response_type]( response.message )
    },
    error: () => {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
    },
    complete() {
      btnSbmt.html( txtBtn )
      btnSbmt.removeAttr( 'disabled' )
    },
  } )
}
function getpersent() {
  $.ajax( {
    url: `${base_url()}Validaciones/validacionGrande`,
    success( data ) {
      const porcentajePerfil = parseInt( data.message, 10 )
      $( '#porcentaje' ).html( `<p class="lead text-center text-primary ">${porcentajePerfil}%</p>` )
    },
  } )
}
function getSolventados() {
  $.ajax( {
    url: `${base_url()}app/Perfil/solventados`,
    success( data ) {
      const porcentajePerfil = data
      $( '#solventados' ).html( `<p class="lead text-center text-danger">${porcentajePerfil}</p>` )
    },
  } )
}
function getcompletados() {
  $.ajax( {
    url: `${base_url()}app/Perfil/completados`,
    success( data ) {
      const porcentajePerfil = data
      $( '#completados' ).html( `<p class="lead text-center text-danger">${porcentajePerfil}</p>` )
    },
  } )
}

function getnumbers() {
  let misops
  let misreqs
  $.ajax( {
    url: `${base_url()}app/mis_oportunidades/misopsnr/17`,
    success( data ) {
      misops = parseInt( data, 10 )
      if ( misops === 0 ) {
        $( '#misoportunidadesgrande' ).html( '' )
      } else if ( misops === 1 ) {
        if ( document.getElementById( 'misoportunidadesgrande' ) != null ) {
          document.getElementById( 'misoportunidadesgrande' ).setAttribute( 'style', 'display: flex' )
          $( '#misoportunidades' ).html(
            `<h4> <i class="fas fa-exclamation-triangle"></i>Tienes <strong><em>${misops} oportunidad de negocio pendientes</em></strong></h4>`,
          )
        }
      } else if ( misops > 1 ) {
        if ( document.getElementById( 'misoportunidadesgrande' ) != null ) {
          document.getElementById( 'misoportunidadesgrande' ).setAttribute( 'style', 'display: flex' )
          $( '#misoportunidades' ).html(
            `<h4> <i class="fas fa-exclamation-triangle"></i>Tienes <strong><em>${misops} oportunidades de negocio pendientes</em></strong></h4>`,
          )
        }
      }
    },
  } )
  $.ajax( {
    url: `${base_url()}app/requirements/misreqs_activos`,
    success( data ) {
      if ( data !== undefined || data != null ) {
        misreqs = parseInt( data, 10 )
        if ( misreqs === 0 ) {
          $( '#misreqsgrande' ).html( '' )
        } else if ( misreqs === 1 ) {
          if ( document.getElementById( 'misreqsgrande' ) !== null ) {
            document.getElementById( 'misreqsgrande' ).setAttribute( 'style', 'display: flex' )

            $( '#misreqs' ).html(
              ` <h4> <i class="fas fa-exclamation-triangle"></i> Tienes <strong><em>${misreqs} requerimiento pendiente</em></strong> </h4>`,
            )
          }
        } else if ( misreqs > 1 ) {
          if ( document.getElementById( 'misreqsgrande' ) !== null ) {
            document.getElementById( 'misreqsgrande' ).setAttribute( 'style', 'display: flex' )
            $( '#misreqs' ).html(
              ` <h4> <i class="fas fa-exclamation-triangle"></i> Tienes <strong><em>${misreqs} requerimientos pendientes</em></strong> </h4>`,
            )
          }
        }
      }
    },
  } )
}

function soyafil() {
  $.ajax( {
    url: `${base_url()}app/mis_oportunidades/soyafiliado`,

    success( data ) {},
  } )
}

function divmagico() {
  let misdatos
  if ( $( '#info' ).val() !== undefined && $( '#info' ).val() !== null ) {
    misdatos = JSON.parse( $( '#info' ).val() )
    let divi
    if ( misdatos !== undefined ) {
      misdatos.forEach( ( minidato, i ) => {
        try {
          divi = `magic${i}`
          $( `#${divi}` ).load( base_url( `app/perfil/profiles/${minidato.usuario_id}` ) )
        } catch ( error ) {}
      } )
    }
  }
}
function aplicar( cliente_id, opnegocio_id, controls, estatus, contacto, modal, req_id, doc ) {
  if ( doc !== null && doc !== undefined && doc !== '' ) {
    let aplicaron
    $.ajax( {
      url: `${base_url()}app/requirements/validacion_cuatro`,
      data: { req_id },
      type: 'post',
      success( data ) {
        aplicaron = parseInt( data, 10 )
        if ( aplicaron < 4 ) {
          $.ajax( {
            url: `${base_url()}app/user/aplicar`,
            data: {
              id_cliente: cliente_id,
              opnegocio_id,
              doc,
            },
            type: 'post',
            success() {
              $( estatus ).html(
                '	<h5 class="text-center"><i class="fas fa-clock"></i><br>Aplicado, pendiente de respuesta</h5>',
              )
              $( controls ).html(
                `<div class="btn-group"> <button  class="btn btn-primary default btn-default" onclick="contactmodal(${contacto.id})">	<i class="fas fa-comment"></i>	<br> Contactar </button><button onclick="modalcancelar(${modal.id})" class="btn btn-danger default btn-default"><i class="fas fa-times"></i>	<br>Cancelar solicitud</button></div>`,
              )
              toastr.success(
                'Se ha enviado un correo al comercio notificando que te intersa el requerimiento!',
              )
            },
          } )
        } else {
          toastr.warning( 'Este requerimiento no puede aceptar mas aplicaciones' )
        }
      },
    } )
  } else {
    toastr.warning( 'Por favor, adjunta una cotizacion para el usuario ' )
  }
}
function deshabilitar() {
  // alert(base_url());
  $.ajax( {
    url: 'https://zavaletazea.dev/canaco/Validaciones/validacionGrande',
    success( data ) {
      const porcentajePerfil = parseInt( data.message, 10 )
      if ( porcentajePerfil >= 70 ) {
        window.location.href = `${base_url()}app/requirements/new`
      } else {
        toastr.warning( 'Completa tu perfil a un 70% para porde continuar con tu navegación!' )
      }
    },
  } )
}
function cancelar( cliente_id, opnegocio_id, controls, estatus, cancelar ) {
  let queja = ''
  queja = $( cancelar ).val()
  $( cancelar ).val( '' )
  $.ajax( {
    url: `${base_url()}app/user/cancelar`,
    data: { id_cliente: cliente_id, opnegocio_id, queja },
    type: 'post',
    success() {
      $( controls ).html( '<h5 class="text-center"><br>Oportunidad rechazada</h5>' )
      $( estatus ).html(
        '<h5 class="text-center"><i class="fas fa-times"></i><br>Oportunidad rechazada</h5>',
      )
      toastr.error( 'Se ha cancelado la solicitud para encargarte del requerimiento' )
    },
  } )
}
function rechazar( cliente_id, opnegocio_id, controls, estatus, rechaza ) {
  let queja = ''
  queja = $( rechaza ).val()
  $( rechaza ).val( '' )
  $.ajax( {
    url: `${base_url()}app/user/rechazar`,
    data: { id_cliente: cliente_id, opnegocio_id, queja },
    type: 'post',
    success() {
      $( controls ).html( '<h5 class="text-center"><br>Oportunidad rechazada</h5>' )
      $( estatus ).html(
        '<h5 class="text-center"><i class="fas fa-times"></i><br>Oportunidad rechazada</h5>',
      )
      toastr.error( 'Se ha rechazado la solicitud para encargarte del requerimiento' )
    },
  } )
}
function modalacepta( modal ) {
  const myModal = new bootstrap.Modal( document.getElementById( modal.id ) )
  myModal.show()
}
function modalbi( modal ) {
  const myModal = new bootstrap.Modal( document.getElementById( modal.id ) )
  myModal.show()
}
function modalrechazar( modal ) {
  const myModal = new bootstrap.Modal( document.getElementById( modal.id ) )
  myModal.show()
}
function contactmodal( modal ) {
  const myModal = new bootstrap.Modal( document.getElementById( modal.id ) )
  myModal.show()
}
function modalcancelar( modal ) {
  const myModal = new bootstrap.Modal( document.getElementById( modal.id ) )
  myModal.show()
}

function send_whats( telefono, text, opnegocio_id, requerimiento ) {
  mensaje = `Hola te contacto desde *_ENLACE-CANACO_* con respecto al requerimiento *${requerimiento}*: `
  mensaje += $( `#${text}` ).val()
  const whats = `https://wa.me/+521${telefono}?text=${mensaje}`
  window.open( whats, '_blank' )
  $.ajax( {
    url: `${base_url()}app/user/mensaje_whats`,
    data: { opnegocio_id, mensaje },
    type: 'post',
    success() {},
  } )
}
function send_email( clientemail, text, opnegocio_id ) {
  let mymail
  $.ajax( {
    url: `${base_url()}app/myaccount/sendDataMail`,
    type: 'post',
    success( response ) {
      mymail = response.slice( 1, -1 )
      mensaje = $( `#${text}` ).val()
      $.ajax( {
        url: `${base_url()}app/user/mensaje_correo`,
        data: {
          opnegocio_id,
          mensaje,
          clientemail,
          mymail,
        },
        type: 'post',
        success() {
          toastr.success( 'Se ha envido mail a la persona que publicó el requerimiento' )
        },
      } )
    },
  } )
}
function detalles() {
  $( '#detalles' ).show()
}
function showcoti( id ) {
  document.getElementById( id.id ).setAttribute( 'style', 'display: flex' )
}
