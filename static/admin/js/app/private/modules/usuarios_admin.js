function abrimodal(clave) {
  const myModal = new bootstrap.Modal(document.getElementById(clave.id))
  myModal.show()
}
function desactivar_afiliador(id) {
  const desactivar = $.trim($(`#desactivar${id}`).val())
  if (desactivar === 'DESACTIVAR') {
    document.getElementById('deactivar').disabled = true
    $.ajax({
      url: `${base_url()}app/AfiliadorComercioUsuario/baja_afiliador/`,
      dataType: 'json',
      type: 'post',
      data: {
        afiliador: id,
      },
      success(json) {
        toastr.success(json.message)
        document.getElementById('deactivar').disabled = false
        window.setTimeout(() => {
          window.location.reload()
        }, 1500)
      },
    })
  } else {
    toastr.warning('Por favor ingrese lo solicitado')
  }
}

function activar_afiliador(id) {
  const activar = $.trim($(`#activar${id}`).val())
  if (activar === 'ACTIVAR') {
    document.getElementById('bt-activar').disabled = true
    $.ajax({
      url: `${base_url()}app/AfiliadorComercioUsuario/alta_afiliador/`,
      dataType: 'json',
      type: 'post',
      data: {
        afiliador: id,
      },

      success(json) {
        toastr.success(json.message)

        document.getElementById('bt-activar').disabled = false
        window.setTimeout(() => {
          window.location.reload()
        }, 1500)
      },
    })
  } else {
    toastr.warning('Por favor ingrese lo solicitado')
  }
}

function actualizar_tractora(id) {
  const nombre = $.trim($(`#nombre${id}`).val())
  const razon = $.trim($(`#razon${id}`).val())
  const rfc = $.trim($(`#rfc${id}`).val())
  const goToValidation = true
  if (goToValidation) {
    $.ajax({
      url: `${base_url()}app/AfiliadorComercioUsuario/actualizar_tractora`,
      dataType: 'json',
      type: 'post',
      data: {
        usuario_id: id,
        nombre,
        razon,
        rfc,
      },
      success(json) {
        toastr.success(json.message)
        window.setTimeout(() => {
          window.location.reload()
        }, 1500)
      },
      error(json) {
        toastr.error(json.message)
      },
    })
  }
}
