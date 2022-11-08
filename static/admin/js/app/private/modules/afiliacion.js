jQuery(document).ready(() => {
  $.ajax({
    url: `${base_url()}app/afiliate/conocer_afiliacion`,
    type: 'post',
    dataType: 'json',
    success(data) {
      let actual
      if (data == null) actual = 0
      else if (data[0].estatus === '24') {
        document.querySelector(`#membresia_${data[0].importe}`).checked = true
        actual = 1
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
        document.querySelector(`#membresia_${data[0].importe}`).checked = true
        actual = 4
        document
          .getElementById('formRec')
          .setAttribute('style', 'display: none')
        document
          .getElementById('sube_rec')
          .setAttribute('style', 'display: none')
        document
          .getElementById('seSubio')
          .setAttribute('style', 'display: block')
        document
          .getElementById('espera_insignia')
          .setAttribute('style', 'display: block')
        document
          .getElementById('toma_insignia')
          .setAttribute('style', 'display: none')
      } else if (data[0].estatus === '26') {
        document.querySelector(`#membresia_${data[0].importe}`).checked = true
        actual = 5
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
        if (data[0].calle !== null) {
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
          $('#afiliacionWizard .prev-btn').addClass('disabled')
          $('#afiliacionWizard .finish-btn').hide()
          $('#afiliacionWizard .next-btn').show()
        } else if (stepPosition === 'final') {
          $('#afiliacionWizard .finish-btn').hide()
          $('#afiliacionWizard .next-btn').hide()
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
          if ($(form).valid()) return true
          return false
        }
        return false
      }
      $('#afiliacionWizard').on(
        'leaveStep',
        (e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) => {
          const elmForm = $(`#form-step-${currentStepIndex - 1}`)
          if (stepDirection === 'forward' && elmForm)
            return checkWizardValidation(elmForm)
        }
      )

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
})

$('#form-up-recibo').on('submit', function (e) {
  console.log('no funciona')
  e.preventDefault()

  const body = new FormData()
  const $pdfs = $('#r')

  const archivos = $pdfs[0].files
  if (archivos.length > 0) {
    const pdf = archivos[0]
    body.append('r', pdf)
    fetch('https://enlacecanaco.org/app/files/subirRecibo/', {
      method: 'post',
      body,
    })
      .then((response) => response.json())
      .then((response) => {
        toastr[response.response_type](response.message)
      })
  }
})
