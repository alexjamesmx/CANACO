var servicios,
  todos,
  productos,
  modal_link,
  modal_script,
  no_afiliados_collapse,
  list,
  requerimientos_card
const recargar_elementos = (response) => {
  list = document.getElementsByClassName('checkservice_tick')
  requerimientos_card = document.getElementsByClassName('requerimientos-card')
  $('#modal-list-result').html('')
  $('#modal-list-result').html(response)
  no_afiliados_collapse = document.getElementById('no_afiliados_collapse')
  scrolled_div = document.getElementById('collapseExample')
  no_afiliados_collapse.addEventListener('click', () => {
    setTimeout(() => {
      scrolled_div.scrollIntoView({
        behavior: 'smooth',
        block: 'end',
      })
    }, 500)
  })
}
function reload_modal(que_necesita, tipo_transaccion) {
  $('#modal-list-result').html('')
  //TIPO DE TRANSACCIONES
  //1 TODOS
  //2 PRODUCTOS
  //3 SERVICIOS
  const formData = new FormData($('#form-create-control')[0])
  $.ajax({
    url: `${base_url()}app/requirements/showmatchlistrequiremnt`,
    type: 'post',
    processData: false,
    contentType: false,
    data: formData,
    success(response) {
      $('#modal-list-result').html('')
      $('#modal-list-result').append(response)
      //ESTO AYUDA IDENTIFICAR QUE TIPO DE RESPUESTA RECIBIMOS YA QUE NO SE PUEDE MANDAR
      if (document.getElementById('message_error') !== null) {
        console.log('No existen busquedas...')
      } else {
        requerimientos_card = document.getElementsByClassName(
          'requerimientos-card'
        )
        list = document.getElementsByClassName('checkservice_tick')

        toastr.remove()
        toastr.options.closeButton = false
        toastr.options.closeDuration = 10000
        toastr.options.extendedTimeOut = 5000
        toastr.options.onHidden = function () {
          toastr.options.closeButton = true
          toastr.options.extendedTimeOut = 1e3
        }
        const no_requerimientos = document.getElementById('no-requerimientos')
        let string = 'resultados'
        if (no_requerimientos.textContent === '1') {
          string = 'resultado'
        }
        if (no_requerimientos.textContent !== '0') {
          toastr.success(
            'Hemos encontrado <strong>' +
              no_requerimientos.textContent +
              ' ' +
              string +
              '</strong > con tus parámetros de búsqueda',
            'ENLACE CANACO',
            {
              timeOut: 10000,
            }
          )
        }
        todos = document.getElementById('nav_todos')
        servicios = document.getElementById('nav_servicios')
        productos = document.getElementById('nav_productos')
        todos.addEventListener('click', () => {
          todos.classList.add('active')
          servicios.classList.remove('active')
          productos.classList.remove('active')

          const tipo_transaccion = ''
          $.ajax({
            url: `${base_url()}app/requirements/showmatchlistrequiremnt`,
            type: 'post',
            data: {
              que_necesita: $.trim($('#que_necesita').val()),
              tipo_transaccion,
            },
            success(response) {
              recargar_elementos(response)
            },
            error() {
              toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
            },
          })
        })
        servicios.addEventListener('click', () => {
          servicios.classList.add('active')
          todos.classList.remove('active')
          productos.classList.remove('active')
          $.ajax({
            url: `${base_url()}app/requirements/showmatchlistrequiremnt`,
            type: 'post',
            data: {
              que_necesita: $.trim($('#que_necesita').val()),
              tipo_transaccion: '2',
            },
            success(response) {
              recargar_elementos(response)
            },
            error() {
              toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
            },
          })
        })
        productos.addEventListener('click', () => {
          productos.classList.add('active')
          todos.classList.remove('active')
          servicios.classList.remove('active')
          $.ajax({
            url: `${base_url()}app/requirements/showmatchlistrequiremnt`,
            type: 'post',
            data: {
              que_necesita: $.trim($('#que_necesita').val()),
              tipo_transaccion: '1',
            },
            cache: false,
            success(response) {
              recargar_elementos(response)
            },
            error() {
              toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
            },
          })
          todos.classList.remove('active')
        })
        recargar_elementos(response)
      }
    },
    error() {
      toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
    },
  })
}

function clear_form() {
  $('#form-create-control').trigger('reset')
  $('#que_necesita').val('').change()
  $('#cantidad').val('').change()
  $('#tiempo_entrega').val('').change()
  $('#especificaciones').val('').change()
  $('#modal-newrequirement').modal('hide')
}

function block_btn_submit() {
  $('#btn-seleccionados-req').attr('disabled', 'disabled')
  $('#btn-afiliados-req').attr('disabled', 'disabled')
  $('#btn-public-req').attr('disabled', 'disabled')
}

function unblock_btn_submit() {
  $('#btn-seleccionados-req').removeAttr('disabled')
  $('#btn-afiliados-req').removeAttr('disabled')
  $('#btn-public-req').removeAttr('disabled')
}

function get_chkbox_checked(notificacion, rep) {
  const arr_results = []

  $('[id*=modal-list-result] input[type=checkbox]:checked').each(function () {
    arr_results.push($(this).attr('data-user'))
  })

  if (typeof arr_results !== 'undefined' && arr_results.length > 0) {
    block_btn_submit()
    const formData = new FormData($('#form-create-control')[0])
    formData.append('tipo_notificacion', notificacion)
    formData.append('comercios', arr_results)
    let url
    if (rep != null && rep !== '' && rep !== 'null') {
      url = `${base_url()}app/requirements/addrequirement/${rep}`
    } else {
      url = `${base_url()}app/requirements/addrequirement/`
    }
    $.ajax({
      url,
      type: 'post',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
    })
      .done((json) => {
        if (json.response_code === 200) {
          toastr[json.response_type](json.message)
          is_req_register = true
          clear_form()
          unblock_btn_submit()
          setTimeout(() => {
            window.location.href = `${base_url()}app/requirements/mis_requerimientos`
          }, 1000)
        } else {
          toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
          unblock_btn_submit()
        }
      })
      .fail(() => {
        toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
        unblock_btn_submit()
      })
  } else {
    toastr.warning('Selecciona al menos un comercio o prueba con otra búsqueda')
  }
}

jQuery(document).ready(($) => {
  if ($('#republicar').val() != null) {
    globalThis.rep = $('#republicar').val()
  } else {
    globalThis.rep = null
  }

  $(document).on('click', '#btn-newreq-next-step', (event) => {
    event.preventDefault()

    // Validamos
    const que_necesita = $.trim($('#que_necesita').val())
    const cantidad = $.trim($('#cantidad').val())
    const tiempo_entrega = $.trim($('#tiempo_entrega').val())
    const especificaciones = $.trim($('#especificaciones').val())
    let goToValidation = true

    if (que_necesita.length < 1) {
      toastr.warning('Ingrese la información del requerimiento que necesita')
      $('#que_necesita').focus()
      goToValidation = false
    }

    if (cantidad.length < 1) {
      toastr.warning(
        'Ingrese la cantidad que requiere para cubrir su requerimiento'
      )
      $('#cantidad').focus()
      goToValidation = false
    }

    if (tiempo_entrega.length < 1) {
      toastr.warning('Seleccione el estimado de tiempo de entrega que requiere')
      $('#tiempo_entrega').focus()
      goToValidation = false
    }

    if (especificaciones.length < 1) {
      toastr.warning(
        'Ingrese las especificaciones técnicas para su requerimiento'
      )
      $('#especificaciones').focus()
      goToValidation = false
    }
    if (goToValidation) {
      // toastr.success( 'Mostrando resultados' )
      reload_modal(que_necesita, '')

      $('#modal-newrequirement').modal({
        backdrop: 'static',
        keyboard: true,
        show: true,
      })
    }
  })
  /* clicks enviar y publicar */
  $(document).on('click', '#btn-seleccionados-req', (event) => {
    event.preventDefault()
    get_chkbox_checked(1, rep)
  })
  $(document).on('click', '#btn-afiliados-req', (event) => {
    event.preventDefault()

    $('input:checkbox').each(function () {
      if ($(this).is(':checked')) {
        if (
          $(this).attr('data-afiliado') === 1 ||
          $(this).attr('data-afiliado') === '1'
        ) {
        } else {
          $(this).prop('checked', true)
        }
      } else if (
        $(this).attr('data-afiliado') === 1 ||
        $(this).attr('data-afiliado') === '1'
      ) {



        $(this).prop('checked', true)
      } else {
        $(this).prop('checked', false)
      }
    })

    get_chkbox_checked(2, rep)
  })
  $(document).on('click', '#btn-public-req', (event) => {
    event.preventDefault()
    $('input:checkbox').each(function () {
      if ($(this).is(':checked')) {
      } else {
        $(this).prop('checked', true)
      }
    })

    get_chkbox_checked(3, rep)
  })

  // $(document).on('click', '.toggleview-no-canaco', (event) => {
  //   event.preventDefault()
  //   $('#container-no-canaco-users').stop(true, false).slideToggle(500)
  // })

  // let is_showing = false

  // $(document).on('click', '.no-afiliados', (event) => {
  //   event.preventDefault()
  //   if (!is_showing) {
  //     document
  //       .getElementById('cont-no-afiliados')
  //       .setAttribute('style', 'display: flex')
  //     is_showing = true
  //   } else {
  //     document
  //       .getElementById('cont-no-afiliados')
  //       .setAttribute('style', 'display: none')
  //     is_showing = false
  //   }
  // })

  $(document).on('click', '.btn-select-all-ckbx', function (event) {
    event.preventDefault()
    const boton_seleccionar_todos = document.getElementById(
      'boton_seleccionar_todos'
    )

    //SI NO ESTAN SELECCINADOS ENTONCES  SELECCIONALOS
    if (boton_seleccionar_todos.textContent === 'Seleccionar todos') {
      $('.checkservice_afiliados').prop('checked', true)
      for (let i = 0; i < list.length; ++i) {
        //SI YA TIENE ESTA INSIGNIA ENTONCES YA ESTA SELECCIONADO Y NO DEBEMOS EJECUTAR LA FUNCION
        if (
          list[i].getAttribute('src') !==
            'https://enlacecanaco.org/static/images/green_tick_removebg2.png' &&
          requerimientos_card[i].getAttribute('data-afiliado') === '1'
        ) {
          list[i].setAttribute(
            'src',
            'https://enlacecanaco.org/static/images/green_tick_removebg2.png'
          )
          requerimientos_select(requerimientos_card[i])
        }
      }
      // boton_seleccionar_todos.classList.add(')
      boton_seleccionar_todos.textContent = 'Cancelar seleccion'
    }
    //SI ESTAN SELECCIONADOS ENTONCES CANCELALOS
    else {
      $('.checkservice_afiliados').prop('checked', false)
      boton_seleccionar_todos.textContent = 'Seleccionar todos'
      for (let i = 0; i < list.length; ++i) {
        //SI YA TIENE ESTA INSIGNIA ENTONCES YA ESTA CANCELADO Y NO DEBEMOS EJECUTAR LA FUNCION
        if (
          list[i].getAttribute('src') !==
            'https://enlacecanaco.org/static/recompensas/insignias/ins_canaco_premium.png' &&
          requerimientos_card[i].getAttribute('data-afiliado') === '1'
        ) {
          list[i].setAttribute(
            'src',
            'https://enlacecanaco.org/static/recompensas/insignias/ins_canaco_premium.png'
          )
          requerimientos_select(requerimientos_card[i])
        }
      }
    }
  })
  $(document).on('click', '.btn-select-all-ckbx_noafiliados', function (event) {
    event.preventDefault()
    const boton_seleccionar_todos_no_afilados = document.getElementById(
      'boton_seleccionar_todos_no_afiliados'
    )
    //SI NO ESTAN SELECCINADOS ENTONCES  SELECCIONALOS
    if (
      boton_seleccionar_todos_no_afilados.textContent === 'Seleccionar todos'
    ) {
      $('.checkservice_no_afiliados').prop('checked', true)
      for (let i = 0; i < list.length; ++i) {
        //SI YA TIENE ESTA INSIGNIA ENTONCES YA ESTA SELECCIONADO Y NO DEBEMOS EJECUTAR LA FUNCION
        if (
          list[i].getAttribute('src') !==
            'https://enlacecanaco.org/static/images/green_tick_removebg2.png' &&
          requerimientos_card[i].getAttribute('data-afiliado') === '0'
        ) {
          list[i].setAttribute(
            'src',
            'https://enlacecanaco.org/static/images/green_tick_removebg2.png'
          )
          requerimientos_select(requerimientos_card[i])
        }
      }
      boton_seleccionar_todos_no_afilados.textContent = 'Cancelar seleccion'
    }
    //SI ESTAN SELECCIONADOS ENTONCES CANCELALOS
    else {
      $('.checkservice_no_afiliados').prop('checked', false)
      boton_seleccionar_todos.textContent = 'Seleccionar todos'
      for (let i = 0; i < list.length; ++i) {
        //SI YA TIENE ESTA INSIGNIA ENTONCES YA ESTA CANCELADO Y NO DEBEMOS EJECUTAR LA FUNCION
        if (
          list[i].getAttribute('src') !==
            'https://enlacecanaco.org/static/recompensas/insignias/ins_canaco_premium.png' &&
          requerimientos_card[i].getAttribute('data-afiliado') === '0'
        ) {
          list[i].setAttribute(
            'src',
            'https://enlacecanaco.org/static/recompensas/insignias/ins_canaco_premium.png'
          )
          requerimientos_select(requerimientos_card[i])
        }
      }
      boton_seleccionar_todos_no_afilados.textContent = 'Seleccionar todos'
    }
  })
})

const que_necesita = document.getElementById('que_necesita')
que_necesita.addEventListener('input', (event) => {
  toastr.remove()

  if (que_necesita.value.length === 300) {
    toastr.warning('Requerimiento: 300 caracteres máximo')
    $('#que_necesita').focus()
  }
})

const cantidad = document.getElementById('cantidad')
cantidad.addEventListener('input', (event) => {
  toastr.remove()

  if (cantidad.value.length === 50) {
    toastr.warning('Cantidad:  50 caracteres máximo')
    $('#cantidad').focus()
  }
})

const especificaciones = document.getElementById('especificaciones')
especificaciones.addEventListener('input', (event) => {
  toastr.remove()

  if (especificaciones.value.length === 300) {
    toastr.warning('Especificaciones:  300 caracteres máximo')
    $('#especificaciones').focus()
  }
})

//CAMBIO DE ESTILOS PARA NO MOSTRAR LOGO DE CANACO EN EL NAV COLLAPSED
// Y ALINEAR LOS ELEMENTOS CUANDO LA PANTALLA TIENE MEDIA QUERIES
var buscador = document.getElementById('buscador'),
  li = document.getElementById('li-buscador')
$('#navbarTogglerDemo01').on('show.bs.collapse', function () {
  const e = document.getElementById('canaco-logo')
  e.style.setProperty('display', 'none', 'important')

  li.style.marginLeft = '0'
  buscador.style.justifyContent = 'initial'
})

const mediaQuery = window.matchMedia('(min-width: 992px)')
const mediaQuery2 = window.matchMedia('(max-width: 992px)')

function handleTabletChange(e) {
  if (e.matches) {
    li.style.marginLeft = 'auto'
    buscador.style.justifyContent = 'end'
    const e = document.getElementById('canaco-logo')
    if (e.style.display === 'none') {
      e.style.setProperty('display', 'block', 'important')
    }
  }
}
function handleTabletChange2(e) {
  if (e.matches) {
    li.style.marginLeft = '0'
    buscador.style.justifyContent = 'initial'
    const e = document.getElementById('canaco-logo')
    e.style.setProperty('display', 'none', 'important')
  }
}
mediaQuery.addListener(handleTabletChange)
mediaQuery2.addListener(handleTabletChange2)

handleTabletChange(mediaQuery)

function profileHover(id, id_negocio) {
  const requerimiento_imagen = document.getElementById(
    'requerimiento_imagen_' + id_negocio
  )
  const eye = document.getElementById('profile_eye_' + id)
  let opacity = 0.0
  const callback = () => {
    eye.style.opacity = opacity
    if (opacity == 1) {
      clearInterval(interval)
    }
    opacity++
  }
  const interval = setInterval(callback, 100)
  const background = document.getElementById(
    'requerimiento_background_' + id_negocio
  )
  if (background.style.background === 'rgb(247, 247, 247)') {
    requerimiento_imagen.classList.add('perfil-img')
  }
}

function profileHoverHide(id) {
  const eye = document.getElementById('profile_eye_' + id)
  let opacity = 1
  const callback = () => {
    eye.style.opacity = opacity
    if (opacity == 0) {
      clearInterval(interval)
    }
    opacity--
  }
  const interval = setInterval(callback, 100)
}

function requerimientos_select(e) {
  const id_negocio = e.getAttribute('data-user')
  const requerimiento = document.getElementById(`requerimiento_${id_negocio}`)
  const background = document.getElementById(
    'requerimiento_background_' + id_negocio
  )
  const requerimiento_contenido = document.getElementById(
    'requerimiento_contenido_' + id_negocio
  )
  const requerimiento_badge = document.getElementById(
    'requerimiento_badge_' + id_negocio
  )
  const requerimiento_imagen = document.getElementById(
    'requerimiento_imagen_' + id_negocio
  )
  const requerimiento_input = document.getElementById(
    'requerimiento_input_' + id_negocio
  )
  if (background.style.background === 'rgb(247, 247, 247)') {
    background.style.background = '#d9d9d9'
    requerimiento.style.background = '#d9d9d9'
    requerimiento_imagen.classList.remove('perfil-img')
    requerimiento.style.boxShadow = '0px 0px 10px #202020'
    requerimiento_contenido.style.opacity = 0.9
    requerimiento_badge.setAttribute(
      'src',
      'https://enlacecanaco.org/static/images/green_tick_removebg2.png'
    )
    requerimiento_imagen.classList.remove('perfil-img')
    //ACTIVAR CHECKBOX
    requerimiento_input.checked = true
  } else {
    requerimiento_imagen.classList.add('perfil-img')
    background.style.background = 'rgb(247, 247, 247)'
    requerimiento.style.background = 'rgb(247, 247, 247)'
    requerimiento.style.boxShadow = '1px 1px 5px #aeaeae'
    requerimiento_contenido.style.opacity = 1
    requerimiento_badge.setAttribute(
      'src',
      'https://enlacecanaco.org/static/recompensas/insignias/ins_canaco_premium.png'
    )
    requerimiento_imagen.classList.add('perfil-img')
    //DESACTIVAR CHECKBOX
    requerimiento_input.checked = false
  }
}

function requerimiento_imagen(e) {
  const id_negocio = e.getAttribute('data-negocio')
  const background = document.getElementById(
    'requerimiento_background_' + id_negocio
  )
  if (background.style.background === 'rgb(247, 247, 247)') {
    const id_usuario = e.getAttribute('data-user')
    window.open(`${base_url()}/app/perfil/perfil_publico/${id_usuario}`)
  }
}
