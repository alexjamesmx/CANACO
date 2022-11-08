jQuery(document).ready(() => {
  $('.local-phone').mask('(000) 000-0000')

  $('#form-update-comercio').validate({
    submitHandler: (form) => {
      const jQform = $(form)
      const btnSbmt = $('#btn-sbmt-create-comercio')
      const txtBtn = $.trim(btnSbmt.html())
      const RFC = $.trim($('#RFC').val())
      const CRFC = $.trim($('#CRFC').val())

      let goToValidation = true

      if (RFC !== CRFC) {
        toastr.warning('RFC no coinciden')
        $('#telefono_auth').focus()
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
        //   btnCancel.attr('disabled', 'disabled');
        jQform.children('input').attr('disabled', 'disabled')
        jQform.children('input').attr('disabled', 'disabled')

        $.ajax({
          url: jQform.attr('action'),
          type: jQform.attr('method'),
          dataType: jQform.attr('data-type'),
          data: jQform.serialize(),
          success: (response) => {
            toastr[response.response_type](response.message)
          },
          error: () => {
            toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
          },
          complete() {
            btnSbmt.html(txtBtn)
            btnSbmt.removeAttr('disabled')
            //   btnCancel.removeAttr('disabled');
          },
        })
      }
    },
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
})

function afiliarpri() {
  window.location.href = `${base_url()}app/afilcomercios/seguimiento`
}
