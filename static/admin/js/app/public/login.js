jQuery(document).ready(($) => {
  $('#username').focus()

  $('#form-login').submit((event) => {
    event.preventDefault()

    const btnSbmt = $('#form-login-btn-sbmt')
    const txtBtn = btnSbmt.html()

    btnSbmt.html(
      '<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;Autenticando...'
    )
    $('#form-login-btn-sbmt, #username, #password').attr('disabled', 'disabled')
    console.log('que')
    $.ajax({
      url: `${base_url()}login/auth`,
      type: 'post',
      dataType: 'json',
      data: {
        username: $('#username').val(),
        password: $('#password').val(),
      },
    })
      .done((response) => {
        if (response.response_code === 200) {
          if (response.estatus_id === 3) {
            toastr.success(
              `Hola ${response.nombre}, bienvenido de nuevo <br> <i class='fas fa-spinner fa-pulse'></i> Ingresando al panel de control...`
            )
            window.setTimeout(() => {
              if (response.rol_id === 2) {
                $.ajax({
                  url: `${base_url()}Validaciones/validacionGrande`,
                  dataType: 'json',
                  success(data) {
                    if (data.message >= 70) {
                      window.location.href = `${base_url()}app/home/`
                    } else {
                      window.location.href = `${base_url()}app/myaccount/`
                    }
                  },
                })
              } else {
                window.location.href = `${base_url()}app/home/`
              }
            }, 2000)
          } else {
            toastr.error(
              `Hola ${response.nombre}, tu cuenta se encuentra bloqueada, por favor contacta con un administrador`
            )
            $('#form-login-btn-sbmt, #username, #password').removeAttr(
              'disabled'
            )
            $('#form-login-btn-sbmt').html(txtBtn)
          }
        } else if (response.response_code === 404) {
          toastr.error('Usuario / Contraseña incorrectos')
          $('#form-login-btn-sbmt, #username, #password').removeAttr('disabled')
          $('#form-login-btn-sbmt').html(txtBtn)
        } else if (response.response_code === 777) {
          $('#form-login-btn-sbmt, #username, #password').removeAttr('disabled')
          $('#form-login-btn-sbmt').html(txtBtn)
          toastr.error(
            'Por favor, valida el mensaje enviado a tu correo para terminar el registro'
          )
          $.ajax({
            type: 'post',
            url: `${base_url()}signup/reenviarCorreo`,
            data: { email_auth: $('#username').val() },
            dataType: 'json',
          })
        }
      })
      .fail(() => {
        toastr.error('Ocurrió un error, por favor vuelve a intentarlo')
        $('#form-login-btn-sbmt, #username, #password').removeAttr('disabled')
        $('#form-login-btn-sbmt').html(txtBtn)
      })
      .always(() => {
        $('#username, #password').val('')
        $('#username').focus()
      })
  })
})

function getpersent() {
  $.ajax({
    url: `${base_url()}Validaciones/validacionGrande`,
    dataType: 'json',
    success(data) {
      const porcentajePerfil = data.message
    },
  })
  return porcentajePerfil
}
