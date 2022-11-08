jQuery(document).ready(($) => {
  $.ajax({
    dataType: 'json',
    url: `${base_url()}app/myaccount/contacto`,
    success(data) {
      if (
        data.message[0].telefono_auth === data.message[0].negocio_comp_numero &&
        data.message[0].email_auth === data.message[0].negocio_comp_correo
      ) {
        yes_compras.checked = true
      }
      if (
        data.message[0].telefono_auth === data.message[0].negocio_vent_numero &&
        data.message[0].email_auth === data.message[0].negocio_vent_correo
      ) {
        yes_ventas.checked = true
      }
    },
  })

  $('.local-phone').mask('(000) 000-0000')

  $('#change_password').change(() => {
    $('.group-password').slideToggle(400)
  })

  $('#yes_compras').on('change', function () {
    if ($(this).is(':checked')) {
      switchStatus = $(this).is(':checked')

      const email = document.getElementById('email_auth').value
      const nombre = document.getElementById('nombre').value
      const tel_personal = document.getElementById('telefono_auth').value
      $('#email_compras').val(String(email))
      $('#nombre_compras').val(String(nombre))
      $('#numero_compras').val(String(tel_personal))
    } else {
      switchStatus = $(this).is(':checked')
      $('#email_compras').val('')
      $('#nombre_compras').val('')
      $('#numero_compras').val('')
    }
  })

  $('#yes_ventas').on('change', function () {
    if ($(this).is(':checked')) {
      switchStatus = $(this).is(':checked')

      const email = document.getElementById('email_auth').value
      const nombre = document.getElementById('nombre').value
      const tel_personal = document.getElementById('telefono_auth').value

      $('#email_ventas').val(String(email))
      $('#nombre_ventas').val(String(nombre))
      $('#numero_ventas').val(String(tel_personal))
      $('#whatps_ventas').val(String(tel_personal))
    } else {
      switchStatus = $(this).is(':checked')

      $('#email_ventas').val('')
      $('#nombre_ventas').val('')
      $('#numero_ventas').val('')
      $('#whatps_ventas').val('')
    }
  })

  $('#form-edit-myaccount').validate({
    submitHandler: (form) => {
      const jQform = $(form)
      const btnSbmt = $('#btn-sbmt-update-account')
      const btnCancel = $('#btn-cancel-update-account')
      const txtBtn = $.trim(btnSbmt.html())

      const telefonoAuth = $.trim($('#telefono_auth').val())
      const telefonoAuthC = $.trim($('#telefono_auth_c').val())

      const emailAuth = $.trim($('#email_auth').val())
      const emailAuthC = $.trim($('#email_auth_c').val())

      let goToValidation = true

      if (telefonoAuth !== telefonoAuthC) {
        toastr.warning('Los teléfonos no coinciden')
        $('#telefono_auth').focus()
        goToValidation = false
      }

      if (emailAuth !== emailAuthC) {
        toastr.warning('Los e-mail no coinciden')
        $('#email_auth').focus()
        goToValidation = false
      }

      if (goToValidation) {
        btnSbmt.html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        )
        btnSbmt
          .html(
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
          )
          .attr('disabled', 'disabled')
        btnCancel.attr('disabled', 'disabled')
        jQform.children('input').attr('disabled', 'disabled')
        jQform.children('input').attr('disabled', 'disabled')

        $.ajax({
          url: jQform.attr('action'),
          type: jQform.attr('method'),
          dataType: jQform.attr('data-type'),
          data: jQform.serialize(),
          success: (response) => {
            toastr[response.response_type](response.message)

            reload_keywords()
          },
          error: () => {
            toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
          },
          complete() {
            btnSbmt.html(txtBtn)
            btnSbmt.removeAttr('disabled')
            btnCancel.removeAttr('disabled')
          },
        })
      }
    },
  })

  $('#form-edit-myaccount-pass').validate({
    submitHandler: (form) => {
      const jQform = $(form)
      const btnSbmt = $('#btn-sbmt-update-account-pass')
      const btnCancel = $('#btn-cancel-update-account-pass')
      const txtBtn = $.trim(btnSbmt.html())

      const password = $.trim($('#password').val())

      let goToValidation = true

      if (password.length < 8) {
        toastr.error('Contraseña no valida')
        $('#password').val('')
        $('#password_c').val('')
        $('#password').focus()
        goToValidation = false
      }

      if (goToValidation) {
        btnSbmt.html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        )
        btnSbmt
          .html(
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
          )
          .attr('disabled', 'disabled')
        btnCancel.attr('disabled', 'disabled')
        jQform.children('input').attr('disabled', 'disabled')
        jQform.children('input').attr('disabled', 'disabled')

        $.ajax({
          url: jQform.attr('action'),
          type: jQform.attr('method'),
          dataType: jQform.attr('data-type'),
          data: jQform.serialize(),
          success: (response) => {
            toastr[response.response_type](response.message)
            $.ajax({
              url: `${base_url()}/Validaciones/validacionGrande`,
              success(data) {
                const porcentajePerfil = parseInt(data.message, 10)
                if (porcentajePerfil <= 70) {
                  minimo.style.display = 'block'
                } else {
                  minimo.style.display = 'none'
                }
              },
            })
          },
          error: () => {
            toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
          },
          complete() {
            btnSbmt.html(txtBtn)
            btnSbmt.removeAttr('disabled')
            btnCancel.removeAttr('disabled')
          },
        })
      }
    },
  })

  $(document).on('click', '.click-title', function (event) {
    event.preventDefault()

    const elemId = $(this).attr('id')
    window.setTimeout(() => {
      $('html, body').animate(
        {
          scrollTop: `${$(`#${elemId}`).offset().top - 95}px`,
        },
        500
      )
    }, 500)
  })
})

function alTituloAfiliacion() {
  window.setTimeout(() => {
    $('html, body').animate(
      {
        scrollTop: `${$('#afiliacionWizard').offset().top - 95}px`,
      },
      500
    )
  }, 500)
}

function elegir_membresia() {
  let radio
  const membresia = document.getElementsByName('membresia')
  for (let i = 0; i < membresia.length; i++) {
    if (membresia[i].checked) {
      radio = membresia[i].value
    }
  }
  return radio
}

function afiliacion_step1() {
  console.log('ALEX_AFILIACION')
  const mi_membresia = elegir_membresia()
  $.ajax({
    url: `${base_url()}app/afiliate/solicitar_afiliacion`,
    type: 'post',
    data: {
      tipo: mi_membresia,
    },
    dataType: 'json',
    success(response) {
      if (response.response_type === 'success')
        toastr[response.response_type](response.message)
    },
  })
}

function respuesta() {
  toastr.success('Documento subido con exito')
  document.getElementById('seSubio').setAttribute('style', 'display: block')
  document.getElementById('formRec').setAttribute('style', 'display: none')
  document.getElementById('sube_rec').setAttribute('style', 'display: none')
  document
    .getElementById('espera_insignia')
    .setAttribute('style', 'display: block')
  document
    .getElementById('toma_insignia')
    .setAttribute('style', 'display: none')
}

function ask_for_help() {
  mensaje =
    'Hola, te contacto desde *_ENLACE-CANACO_* para solicitar informacion sobre la funcionalidad de la pagina '
  const whats = `https://wa.me/+5214422198567?text=${mensaje}`
  window.open(whats, '_blank')
}
