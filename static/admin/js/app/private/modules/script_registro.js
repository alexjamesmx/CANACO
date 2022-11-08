$(document).ready(() => {
  $('#change_factura').change(() => {
    $('.group-subir-rfc').slideToggle(400)
  })

  $('#change_factura_modal').change(() => {
    $('.group-subir-rfc-m').slideToggle(400)
  })

  $('#con').hide()
  $('#prog').hide()
  $('#prog_modal').hide()
  $('#titulo2').hide()
  $('#idRed').val('0')
})
function toat() {
  toastr.error('Se ha cancelado la solicitud para encargarte del requerimiento')
}
function check(e) {
  // evitar la entrada de caracteres especiales
  tecla = document.all ? e.keyCode : e.which
  // Tecla de retroceso para borrar, siempre la permite
  if (tecla === 8) {
    return true
  }
  // Patron de entrada, en este caso solo acepta numeros y letras
  patron = /[A-Za-z0-9]/
  tecla_final = String.fromCharCode(tecla)
  return patron.test(tecla_final)
}
function radio_comercio() {
  // Tomar valor de radio button  de tipo de persona
  let radio
  const regimen = document.getElementsByName('regimen')
  for (let i = 0; i < regimen.length; i++) {
    if (regimen[i].checked) {
      radio = regimen[i].value
    }
  }
  return radio
}
function radio_comercio_modal() {
  // Tomar valor de radio button  de tipo de persona
  let radio
  const regimen = document.getElementsByName('regimen_modal')
  for (let i = 0; i < regimen.length; i++) {
    if (regimen[i].checked) {
      radio = regimen[i].value
    }
  }
  return radio
}
// ALEX_NOTA
function registro_comercio(valor) {
  let rfc
  const user = $('#user').val()
  const email = $('#email').val()
  const password = $('#password').val()
  const rfc_field = document.getElementById('rfc_field').style.display
  if (rfc_field !== 'none') {
    rfc = $('#rfc').val()
  }
  if (
    (rfc_field === 'none' &&
      $('#terminos').prop('checked') &&
      ($('#change_factura_no').prop('checked') ||
        $('#change_factura').prop('checked'))) ||
    (rfc_field !== 'none' &&
      $('#rfc').val().length >= 12 &&
      $('#terminos').prop('checked') &&
      ($('#change_factura_no').prop('checked') ||
        $('#change_factura').prop('checked')))
  ) {
    console.log('RARO ', user, email, password, rfc)
    $.ajax({
      url: `${base_url()}app/User/registro`,
      type: 'post',
      dataType: 'json',
      data: {
        user,
        email,
        password,
        rfc,
      },
      success(response) {
        toastr[response.response_type](response.message)
        if (response.response_type === 'success') {
          setTimeout(() => {
            alert(
              `Se te ha enviado un correo a ${email}.\nConfirmalo para terminar tu registro.`
            )
          }, 3000)
        }
      },
    })
  } else if (
    !$('#change_factura_no').prop('checked') &&
    !$('#change_factura').prop('checked')
  ) {
    toastr.warning('¿Facturas?')
  } else if (!$('#terminos').prop('checked')) {
    toastr.warning('Por favor, acepta los terminos de uso')
  } else if ($('#rfc').val() === '') {
    toastr.warning('¿Cuál es tu RFC ')
  } else if ($('#rfc').val() !== '' && $('#rfc').val().length < 12) {
    toastr.warning('El RFC debe contar con 12 o 13 caracteres')
  }
}

function search_keyword() {
  $('#prog').show()
  $('#modal_size').addClass('modal-xl').removeClass('modal-lg')
  $('#div_modal')
    .addClass('card m-12')
    .removeClass('col-lg-5 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0')
  $.ajax({
    url: `${base_url()}app/user/search_keyword`,
    type: 'post',
    data: { que_necesita: $('#keyword').val() },
    success(response) {
      $('#modal-list-result').html(response)
      $('#con').show()
      $('#prog').hide()
      const myModal = new bootstrap.Modal(
        document.getElementById('modal_search')
      )
      myModal.show()
    },
    error() {
      toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
    },
  })
}
function clean() {
  $('#idRed').val('1')
  $('#prog_modal').show()
  toastr.warning('Por favor, crea una cuenta para publicar tu requerimiento')
  $('#modal-list-result').html('')
  window.setTimeout(() => {
    $('#prog_modal').hide()
    $.ajax({
      url: `${base_url()}app/user/getForm`,
      type: 'post',
      success(response) {
        $('#modal_size').removeClass('modal-xl').addClass('modal-lg')
        $('#div_modal')
          .removeClass('card m-12')
          .addClass('col-lg-12 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0')
        $('#modal-list-result').html(response)
        $('#con').show()
        $('#prog').hide()
        $('#titulo1').text(`${'Registrate'}`)
      },
    })
  }, 1000)
}
function openmodal() {
  const myModal = new bootstrap.Modal(document.getElementById('modal_search'))
  myModal.show()
  $.ajax({
    url: `${base_url()}app/user/getForm`,
    type: 'post',
    success(response) {
      $('#modal_size').removeClass('modal-xl').addClass('modal-lg')
      $('#div_modal')
        .removeClass('card m-12')
        .addClass('col-lg-12 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0')
      $('#modal-list-result').html(response)
      $('#con').show()
      $('#prog').hide()
      $('#titulo1').text(`${'Registrate'}`)
    },
  })
}
function modal() {
  const myModal = new bootstrap.Modal(document.getElementById('modal_search'))
  myModal.show()
}
function scaner() {
  const contendorfiltro = document.getElementById('contendorfiltro')
  let htmlcontendorfiltro = ''
  const requerimientoscard = document.getElementById('requerimientoscard')
  const seachscaner = document.getElementById('seachscaner').value

  if (seachscaner !== '') {
    requerimientoscard.setAttribute('style', 'display:none')
    $.ajax({
      url: `${base_url()}/landing/get_comerce`,
      type: 'post',
      dataType: 'json',
      data: {
        busqueda: seachscaner,
      },
      success(response) {
        if (response.filtro_req != null) {
          for (let index = 0; index < response.filtro_req.length; index++) {
            htmlcontendorfiltro +=
              "<div onclick='openmodal()' style = 'height:250px' class='col-lg-3 col-md-6 col-sm-12 mt-4 pt-2'>"
            htmlcontendorfiltro +=
              "<div class='card blog rounded border-0 shadow overflow-hidden'>"
            htmlcontendorfiltro += "<div class='position-relative'>"
            htmlcontendorfiltro +=
              "<div class='overlay rounded-top bg-dark'></div>"
            htmlcontendorfiltro += '</div>'
            htmlcontendorfiltro += "<div class='card-body content'>"
            htmlcontendorfiltro += `<h4><a class='card-title title text-dark'><i class='uil uil-user'></i>${response.filtro_req[index].negocio_nombre}</a></h4>`
            htmlcontendorfiltro += `<h6><a class='card-title title text-dark'><strong>Requiere: </strong> ${response.filtro_req[index].busq_nec} </a></h6>`
            htmlcontendorfiltro += `<h6><a class='card-title title text-dark'><strong>En cantidad:  </strong>${response.filtro_req[index].qty}</a></h6>`
            htmlcontendorfiltro += `<h6><a class='card-title title text-dark'><strong>Especificaciones: </strong>${response.filtro_req[index].especificaciones}</a></h6>`
            htmlcontendorfiltro += `<h6><a class='card-title title text-dark'><strong>Fecha de solicitud:  </strong> <?=fancy_date(${response.filtro_req[index].fecha_req}`
            htmlcontendorfiltro += ",'d-m-y'"
            htmlcontendorfiltro += ')?> </a></h6>'
            htmlcontendorfiltro +=
              "<div class='post-meta d-flex justify-content-between mt-3'>"
            htmlcontendorfiltro +=
              "<a class='text-muted readmore'>Ver mas<i class='uil uil-angle-right-b align-middle'></i></a>"
            htmlcontendorfiltro += '</div>'
            htmlcontendorfiltro += '</div>'
            htmlcontendorfiltro += "<div class='author'>"
            htmlcontendorfiltro += `<small class='text-light user d-block'><i class='uil uil-user'></i> ${response.filtro_req[index].negocio_nombre}</small>`
            htmlcontendorfiltro += '</div>'
            htmlcontendorfiltro += '</div>'
            htmlcontendorfiltro += '</div>'
          }
        }
        contendorfiltro.innerHTML = htmlcontendorfiltro
      },
    })
  } else {
    requerimientoscard.setAttribute('style', 'display:flex')
  }
}

function handleFactura_no(e) {
  if (e.checked) document.getElementById('change_factura').checked = false
  if (document.getElementById('rfc_field').style.display !== 'none') {
    $('.group-subir-rfc').slideToggle(400)
    $('#rfc').val('')
  }
}
function handleFactura_si(e) {
  if (e.checked) document.getElementById('change_factura_no').checked = false
}
