jQuery(document).ready(($) => {
  $('#recibo').change(function () {
    $('#btn-sbmt').prop('disabled', this.files.length === 0)
  })
  $('#conercio_id').change((e) => {
    e.preventDefault()
    const select =
      document.getElementById('conercio_id') /* Obtener el SELECT */
    const id = select.options[select.selectedIndex].value /* Obtener el valor */
    $.ajax({
      url: `${base_url()}app/afiliador/detalles_comercio`,
      data: { id },
      type: 'post',
      success(json) {
        const comercio = $.parseJSON(json)
        $('#id_usuario').val(comercio[0].usuario_id)
        $('#nombre_comercio').val(comercio[0].negocio_nombre)
        $('#razon').val(comercio[0].negocio_razon)
        $('#fiscales').val(comercio[0].negocio_persona)
        $('#RFC').val(comercio[0].negocio_rfc)
        $('#RFC_c').val(comercio[0].negocio_rfc)
        $('#calle').val(comercio[0].negocio_calle)
        $('#colonia').val(comercio[0].negocio_colonia)
        $('#exterior').val(comercio[0].negocio_numero_ex)
        $('#interior').val(comercio[0].negocio_numero_int)
        $('#cp').val(comercio[0].negocio_cp)
        $('#nombre').val(comercio[0].nombre)
        $('#apellido1').val(comercio[0].apellido1)
        $('#apellido2').val(comercio[0].apellido2)
        $('#telefono_auth').val(comercio[0].telefono_auth)
        $('#telefono_auth_c').val(comercio[0].telefono_auth)
        $('#email_auth').val(comercio[0].email_auth)
        $('#email_auth2').val(comercio[0].email_auth)
        $('#password').val()
        $('#password_c').val()
        $('#email_compras').val(comercio[0].negocio_comp_correo)
        $('#nombre_compras').val(comercio[0].negocio_comp_nombre)
        $('#numero_compras').val(comercio[0].negocio_comp_numero)
        $('#email_ventas').val(comercio[0].negocio_vent_correo)
        $('#nombre_ventas').val(comercio[0].negocio_vent_nombre)
        $('#numero_ventas').val(comercio[0].negocio_vent_numero)
        $('#whatps_ventas').val(comercio[0].negocio_vent_whatsp)
        $('#id').val(comercio[0].usuario_id)
        $('#id_r').val(comercio[0].usuario_id)
        mago()
        killdone()
      },
    })
    $('#accordion').slideDown(500)
  })

  $('#form-fac-direc').validate({
    submitHandler: (form) => {
      const jQform = $(form)
      const btnSbmt = $('#btn-sbmt-guardar-direc')
      const txtBtn = $.trim(btnSbmt.html())
      goToValidation = true
      if (goToValidation) {
        btnSbmt.html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        )
        btnSbmt
          .html(
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
          )
          .attr('disabled', 'disabled')
        jQform.children('input').attr('disabled', 'disabled')
        jQform.children('input').attr('disabled', 'disabled')

        $.ajax({
          url: jQform.attr('action'),
          type: jQform.attr('method'),
          dataType: jQform.attr('data-type'),
          data: jQform.serialize(),
          success: (response) => {
            document
              .getElementById('subiste_rfc')
              .setAttribute('style', 'display: block')
            document
              .getElementById('sube_rfc')
              .setAttribute('style', 'display: none')

            $('html, body').animate(
              {
                scrollTop: `${$('#afiliacionWizard').offset().top - 95}px`,
              },
              500
            )

            toastr[response.response_type](response.message)
          },
          error: () => {
            toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
          },
          complete() {
            btnSbmt.html(txtBtn)
            btnSbmt.removeAttr('disabled')
          },
        })
      }
    },
  })
})

function regresa() {
  document.getElementById('subiste_rfc').setAttribute('style', 'display: none')
  document.getElementById('sube_rfc').setAttribute('style', 'display: block')
}

function alTituloAfiliacion() {
  console.log('OKAY????/')
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
  const mi_membresia = elegir_membresia()
  id = $('#id_usuario').val()
  $.ajax({
    url: `${base_url()}app/afiliate/solicitar_afiliacion_afil`,
    type: 'post',
    data: {
      id,
      tipo: mi_membresia,
    },
    dataType: 'json',
    success(response) {
      if (response.response_type === 'success') {
        toastr[response.response_type](response.message)
      } else {
        toastr.warning('Ocurrio un error')
      }
    },
  })
}

function respuesta() {
  toastr.success('Comprobante de pago enviado')
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

function mago() {
  $('#afiliacionWizard').smartWizard('reset')
  id = $('#id_usuario').val()
  $.ajax({
    url: `${base_url()}app/afiliate/conocer_afiliacion_afil`,
    type: 'post',
    data: {
      id,
    },
    dataType: 'json',
    success(data) {
      let actual
      if (data == null) {
        actual = 0
        const strin = window.location.toString()
        document.querySelector('#membresia_1').checked = false
        document.querySelector('#membresia_2').checked = false
        document.querySelector('#membresia_3').checked = false
        document.querySelector('#membresia_4').checked = false
        document.querySelector('#membresia_5').checked = false
        const url = strin.split('#')
        window.open(`${url[0]}#step-0`, '_self')
        $('#r1').removeClass()
        $('#r2').removeClass()
        $('#r3').removeClass()
        $('#r4').removeClass()
      } else if (data[0].estatus === '24') {
        if (document.querySelector(`#membresia_${data[0].importe}`) != null) {
          document.querySelector(`#membresia_${data[0].importe}`).checked = true
        }

        actual = 1
        const strin = window.location.toString()
        const url = strin.split('#')
        window.open(`${url[0]}#step-1`, '_self')
        document
          .getElementById('seSubio')
          .setAttribute('style', 'display: none')
        document
          .getElementById('formRec')
          .setAttribute('style', 'display: block')
        document
          .getElementById('sube_rec')
          .setAttribute('style', 'display: block')
        document
          .getElementById('espera_insignia')
          .setAttribute('style', 'display: none')
        document
          .getElementById('toma_insignia')
          .setAttribute('style', 'display: none')
      } else if (data[0].estatus === '25') {
        if (document.querySelector(`#membresia_${data[0].importe}`) != null) {
          document.querySelector(`#membresia_${data[0].importe}`).checked = true
        }
        actual = 4
        const strin = window.location.toString()
        const url = strin.split('#')
        window.open(`${url[0]}#step-4`, '_self')
        document
          .getElementById('seSubio')
          .setAttribute('style', 'display: block')
        document
          .getElementById('formRec')
          .setAttribute('style', 'display: none')
        document
          .getElementById('sube_rec')
          .setAttribute('style', 'display: none')
        document
          .getElementById('espera_insignia')
          .setAttribute('style', 'display: block')
        document
          .getElementById('toma_insignia')
          .setAttribute('style', 'display: none')
      } else if (data[0].estatus === '26') {
        if (document.querySelector(`#membresia_${data[0].importe}`) != null) {
          document.querySelector(`#membresia_${data[0].importe}`).checked = true
        }
        actual = 4
        const strin = window.location.toString()
        const url = strin.split('#')
        window.open(`${url[0]}#step-4`, '_self')
        document
          .getElementById('seSubio')
          .setAttribute('style', 'display: block')
        document
          .getElementById('formRec')
          .setAttribute('style', 'display: none')
        document
          .getElementById('sube_rec')
          .setAttribute('style', 'display: none')
        document
          .getElementById('espera_insignia')
          .setAttribute('style', 'display: none')
        document
          .getElementById('toma_insignia')
          .setAttribute('style', 'display: block')
      }

      if (data !== null) {
        if (data[0].calle != null) {
          document
            .getElementById('subiste_rfc')
            .setAttribute('style', 'display: block')
          document
            .getElementById('sube_rfc')
            .setAttribute('style', 'display: none')
          $('#estado_fac').val(data[0].estado)
          $('#municipio_fac').val(data[0].municipio)
          $('#calle_fac').val(data[0].calle)
          $('#codigopos_fac').val(data[0].codigo_postal)
          $('#colonia_fac').val(data[0].colonia)
          $('#numinte_fac').val(data[0].num_int)
          $('#numext_fac').val(data[0].num_ext)
        }
      }

      $('#afiliacionWizard').on('showStep', (stepPosition) => {
        if (stepPosition === 'first') {
          $('#afiliacionWizard .finish-btn').hide()
          $('#afiliacionWizard .next-btn').show()
        } else if (stepPosition === 'final') {
          $('#afiliacionWizard .next-btn').hide()
          $('#afiliacionWizard .prev-btn').removeClass('disabled')
        } else {
          $('#afiliacionWizard .finish-btn').hide()
          $('#afiliacionWizard .next-btn').show()
          $('#afiliacionWizard .prev-btn').removeClass('disabled')
        }
      })

      $('#afiliacionWizard').smartWizard({
        selected: actual,
        theme: 'check',
        transitionEffect: 'fade',
        showStepURLhash: false,
        toolbarSettings: {
          toolbarPosition: 'none',
        },
      })
      function checkWizardValidation(form) {
        if ($().validate) {
          if ($(form).valid()) {
            return true
          }
          return false
        }
        return false
      }
      $('#afiliacionWizard').on('leaveStep', (stepNumber, stepDirection) => {
        const elmForm = $(`#form-step-${stepNumber}`)
        if (stepDirection === 'forward' && elmForm)
          return checkWizardValidation(elmForm)
      })

      $('#afiliacionWizard .prev-btn').on('click', () => {
        $('#afiliacionWizard').smartWizard('prev')
        return true
      })
      $('#afiliacionWizard .next-btn').on('click', () => {
        $('#afiliacionWizard').smartWizard('next')
        return true
      })
      $('#afiliacionWizard .finish-btn').on('click', () => {
        if (checkWizardValidation($('#afiliacionWizard #form-step-1')))
          return false

        return true
      })
    },
  })
}

function killdone() {
  id = $('#id_usuario').val()
  $.ajax({
    url: `${base_url()}app/afiliate/conocer_afiliacion_afil`,
    type: 'post',
    data: {
      id,
    },
    dataType: 'json',
    success(data) {
      if (data == null) {
        $('#r1').removeClass()
        $('#r2').removeClass()
        $('#r3').removeClass()
        $('#r4').removeClass()
      } else if (data[0].estatus === '24') {
        $('#r2').removeClass()
        $('#r3').removeClass()
        $('#r4').removeClass()
      } else if (data[0].estatus === '25' || data[0].estatus === '26') {
        $('#r1').addClass('nav-item done')
        $('#r2').addClass('nav-item done')
        $('#r3').addClass('nav-item done')
      }
    },
  })
}
