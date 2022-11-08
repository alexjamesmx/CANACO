// eslint-disable-next-line no-var
// var clave
function get_number() {
  let misreqs
  $.ajax({
    url: `${base_url()}app/requirements/misreqs`,
    success(data) {
      misreqs = parseInt(data, 10)
      $('#requerimientos_mostrados').html(
        `<span class="text-primary float-right"><small>Mostrando ${misreqs} de ${misreqs}</small></span>`
      )
    },
  })
}
function reload_requerimientos() {
  if (document.getElementById('Mis requerimientos')) {
    document.getElementById('todos').checked = true
    $('#tablareq').html(
      "<div id='reload'class='col-12 text-center p-5 m-5'><i class='fas fa-spinner fa-pulse fa-5x'></i></div>"
    )
    $('#tablareq').load(base_url('app/requirements/tablareq_todos'), () => {
      $('#reload').remove()
    })
    get_number()
  }
}

jQuery(document).ready(() => {
  if (document.getElementById('todos')) {
    document.getElementById('todos').checked = true
    reload_requerimientos()
  }
})

function todos() {
  get_number()
  reload_requerimientos()
}
function get_number_activos() {
  let misreqsa
  let misreqs
  $.ajax({
    url: `${base_url()}app/requirements/misreqs`,
    success(data) {
      misreqs = parseInt(data, 10)

      $.ajax({
        url: `${base_url()}app/requirements/misreqs_activos`,
        success(res) {
          misreqsa = parseInt(res, 10)
          $('#requerimientos_mostrados').html(
            `<span class="text-primary float-right"><small>Mostrando ${misreqsa} de ${misreqs}</small></span>`
          )
        },
      })
    },
  })
}

function activos() {
  get_number_activos()
  $('#tablareq').html(
    "<div id='reload'class='col-12 text-center p-5 m-5'><i class='fas fa-spinner fa-pulse fa-5x'></i></div>"
  )
  $('#tablareq').load(base_url('app/requirements/tablareq_activos'), () => {
    $('#reload').remove()
  })
}

function republicar(req_id) {
  $.ajax({
    url: `${base_url()}app/requirements/cancelar_requerimiento`,
    data: { idreq: req_id, estatus: '23', comentario: null },
    type: 'post',
    success() {
      window.location = `${base_url()}app/requirements/new/${req_id}`
    },
  })
}

function encuesta(divencuesta, clave, btn, input) {
  $(`#${divencuesta}`).html('')
  if (clave === '0') {
    $(`#${divencuesta}`).html(
      `<label class="form-label d-block">Cerré mi requerimiento:</label><div class="form-check form-check-inline"><div class="mb-0"><div class="form-check"> <input class="form-check-input" type="radio" name="dentrofuera" value="0" id="dentro" onclick="dentrofuera(0,${btn.id},${input.id})"><label class="form-check-label" for="p-fisica">Dentro de la plataforma</label></div></div></div><div class="form-check form-check-inline"><div class="mb-0"><div class="form-check"><input class="form-check-input"  type="radio"  value="1" name="dentrofuera" id="fuera" onclick="dentrofuera(1,${btn.id},${input.id})"><label class="form-check-label" for="p-moral">Fuera de la plataforma</label></div></div></div>`
    )
  } else if (clave === '1') {
    console.log('AQUI ENTRO')
    $('.btn-subir-detalle').attr('data-clave', clave)

    $(`#${divencuesta}`).html(
      `  <div class="card m-12" id="div_modal"><h5>Agrega un comentario sobre por que deseas eliminar el requerimiento</h5>   </div><div class="card m-12" id="div_modal"> <textarea id="comentario" onkeyup="dentrofuera(3,${btn.id},${input.id})" name="rechaza" class="form-control ps-5"></textarea></div>`
    )
  }
}

function dentrofuera(clave, btn, input) {
  $(btn).prop('disabled', false)
  $(input).val(clave)
}

function seleccionar(id, req_id, opneg_id) {
  $.ajax({
    url: `${base_url()}app/requirements/elegido`,
    data: { id, req_id, opneg_id },
    type: 'post',
    dataType: 'json',
    success(response) {
      toastr[response.response_type](
        'Se ha elegido a este usuario para que se encargue de tu requerimiento'
      )
      document
        .getElementById('deseleccionar')
        .setAttribute('style', 'display: flex')
      document
        .getElementById('seleccionar')
        .setAttribute('style', 'display: none')
    },
  })
}

function deseleccionar(id, req_id, opneg_id) {
  $.ajax({
    url: `${base_url()}app/requirements/noelegido`,
    data: { id, req_id, opneg_id },
    type: 'post',
    dataType: 'json',
    success(response) {
      toastr[response.response_type](
        'Se ha elegido a este usuario para que se encargue de tu requerimmiento'
      )
      document
        .getElementById('deseleccionar')
        .setAttribute('style', 'display: none')
      document
        .getElementById('seleccionar')
        .setAttribute('style', 'display: flex')
    },
  })
}

function subirdetalle(req_id, divencuesta, controles, modal, div) {
  let estatus
  const comentario = $('#comentario').val().trim()
  const clave = $('.btn-subir-detalle').attr('data-clave')
  // console.log( comentario )

  // console.log( 'clave secreta ', $( '.btn-subir-detalle' ).attr( 'data-clave' ) )

  // if ( clave === 0 ) {
  //   $( selector ).attr( attributeName )
  //   estatus = '21'
  // } else if ( clave === 1 ) {
  //   estatus = '22'
  // } else if ( clave === 3 ) {
  //   estatus = '23'
  //   comentario = $( '#txt' ).val()

  // }
  if (clave === '1') estatus = '8'

  fetch(`${base_url()}app/requirements/eselegido`, {
    method: 'post',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ req_id, estatus, comentario }),
  })
    .then((res) => res.json())
    .then((res) => {
      console.log('si llego')
      console.log(res)
      if (res.res) {
        toastr[res.response_type](res.message)
      }
    })
  // $.ajax( {
  //   url: `${base_url()}app/requirements/eselegido`,
  //   type: 'post',
  //   dataType: 'json',
  //   data: {
  //     req_id,
  //     estatus,
  //     comentario,
  //   },

  //   success( response ) {
  //     if ( response && estatus === '21' ) {
  //       $( divencuesta ).html( '' )
  //       $( controles ).html(
  //         ' <h5 class="text-center"><i class="fas fa-check"></i><br>Requerimiento concluido</h5><button class="btn btn-primary default btn-default" onclick="opencalif(calif0)"><i class="fas fa-check"></i>Califica </button>',
  //       )
  //       $.ajax( {
  //         url: `${base_url()}app/requirements/cancelar_requerimiento`,
  //         data: { idreq, estatus, comentario },
  //         type: 'post',
  //         success() {
  //           toastr.success( 'Se ha concluido el requerimiento' )
  //         },
  //       } )
  //     } else if ( estatus === '21' ) {
  //       toastr.warning( 'Por favor, selecciona quien es la persona que resolvió tu requerimiento' )
  //       modalinteres( modal, div, idreq )
  //     } else if ( estatus === '22' || estatus === '23' ) {
  //       $( divencuesta ).html( '' )
  //       $( controles ).html(
  //         ' <h5 class="text-center"><i class="fas fa-check"></i><br>Requerimiento concluido</h5>',
  //       )
  //       $.ajax( {
  //         url: `${base_url()}app/requirements/cancelar_requerimiento`,
  //         data: { idreq, estatus },
  //         type: 'post',
  //         success() {
  //           toastr.success( 'Se ha retirado el requerimiento' )
  //         },
  //       } )
  //     }
  //   },
  // } )
}

function openmodal(modal, btn) {
  const myModal = new bootstrap.Modal(document.getElementById(modal.id))
  $(btn).prop('disabled', true)
  myModal.show()
}

function opencalif(modal) {
  const myModal = new bootstrap.Modal(document.getElementById(modal.id))
  myModal.show()
}

function openseguimiento(modal, req_id, div) {
  $(div).load(base_url(`app/requirements/lista_detalles/${req_id}`))
  const myModal = new bootstrap.Modal(document.getElementById(modal.id))
  myModal.show()
}

function modalinteres(modal, div, req_id) {
  $(div).load(base_url(`app/requirements/lista_interesados/${req_id}`))

  const myModal = new bootstrap.Modal(document.getElementById(modal.id))
  myModal.show()
}

function leido(id) {
  $.ajax({
    url: `${base_url()}app/mensaje/leido`,
    data: { id },
    type: 'post',
    dataType: 'json',
    success(response) {
      if (response) {
        document
          .getElementById(`${id}noleido`)
          .setAttribute('style', 'display: flex')
        document
          .getElementById(`${id}leido`)
          .setAttribute('style', 'display: none')
      } else {
        toastr.danger('No se pudo actualizar el estado')
      }
    },
  })
}

function noleido(id) {
  $.ajax({
    url: `${base_url()}app/mensaje/noleido`,
    data: { id },
    type: 'post',
    dataType: 'json',
    success(response) {
      if (response) {
        document
          .getElementById(`${id}noleido`)
          .setAttribute('style', 'display: none')
        document
          .getElementById(`${id}leido`)
          .setAttribute('style', 'display: flex')
      } else {
        toastr.danger('No se pudo actualizar el estado')
      }
    },
  })
}

function contacto(div) {
  $(div).css({ display: '' })
}

function contactwhats(telefono, text, opnegocio_id, requerimiento) {
  if (telefono === '' || telefono == null) {
    toastr.warning(
      'Este comercio no tiene un numero de whatsapp de ventas registrado'
    )
  } else {
    mensaje = `Hola te contacto desde *_ENLACE-CANACO_* con respecto al requerimiento *${requerimiento}*: `
    mensaje += $(`#${text.id}`).val()

    const whats = `https://wa.me/+521${telefono}?text=${mensaje}`
    window.open(whats, '_blank')
    $.ajax({
      url: `${base_url()}app/user/respuesta_whats`,
      data: { opnegocio_id, mensaje },
      type: 'post',
      success() {
        toastr.success('Te haz puesto en contacto con la persona interesada')
      },
    })
  }
}

function tm(clientemail, text, opnegocio_id) {
  let mymail

  $.ajax({
    url: `${base_url()}app/myaccount/sendDataMail`,
    type: 'post',
    success(response) {
      mymail = response.slice(1, -1)

      mensaje = $(text).val()

      $.ajax({
        url: `${base_url()}app/user/respuesta_correo`,
        data: {
          opnegocio_id,
          mensaje,
          clientemail,
          mymail,
        },
        type: 'post',
        success() {
          toastr.success(
            'Se ha envido un email a la persona que publicó el requerimiento'
          )
        },
      })
    },
  })
}
let inputavalue = 0
let inputa
let inputbvalue = 0
let inputb
let inputcvalue = 0
let inputc
let inputdvalue = 0
let inputd

function validarencuestaA() {
  inputa = document.getElementsByName('a')
  for (let index = 0; index < inputa.length; index++) {
    if (inputa[index].checked) {
      inputavalue = inputa[index].value
    }
  }
}

function validarencuestaB() {
  inputb = document.getElementsByName('b')
  for (let index = 0; index < inputb.length; index++) {
    if (inputb[index].checked) {
      inputbvalue = inputb[index].value
    }
  }
}

function validarencuestaC() {
  inputc = document.getElementsByName('c')
  for (let index = 0; index < inputc.length; index++) {
    if (inputc[index].checked) {
      inputcvalue = inputc[index].value
    }
  }
}
function validarencuestaD() {
  inputd = document.getElementsByName('d')
  for (let index = 0; index < inputd.length; index++) {
    if (inputd[index].checked) {
      inputdvalue = inputd[index].value
    }
  }
}
function validarencuesta(id_req) {
  const nota = document.getElementById('f1').value
  if (
    inputavalue === 0 ||
    inputbvalue === 0 ||
    inputcvalue === 0 ||
    inputdvalue === 0
  ) {
    toastr.warning('Por favor llena todos los campos')
  } else {
    // alert('subir')
    $.ajax({
      url: `${base_url()}app/requirements/subir_encuestas`,
      type: 'post',
      data: {
        id_req,
        p1: inputavalue,
        p2: inputbvalue,
        p3: inputcvalue,
        p4: inputdvalue,
        nota,
      },
      success() {
        toastr.success('Requerimiento evaluado con exito')
        window.location.reload()
      },
    })
  }
}
