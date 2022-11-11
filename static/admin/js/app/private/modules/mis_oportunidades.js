
function divmagico() {
      const misdatos = JSON.parse($('#info').val())
      console.log('MIS DATOS: ', misdatos)
      if (misdatos !== undefined) {
        misdatos.forEach((minidato, i) => {
          try {
            $(`#magic${i}`).load(
              base_url(`app/perfil/profiles/${minidato.usuario_id}`)
            )
          } catch (error) {console.log(error)}
        })
      }
  }
  
  function aplicar(
    cliente_id,
    opnegocio_id,
    controls,
    estatus,
    contacto,
    modal,
    req_id,
    doc,
    coti
  ) {
    
    $.ajax({
      url: `${base_url()}app/requirements/validacion_cuatro`,
      data: { req_id },
      type: 'post',
      success(data) {
        const aplicaron = parseInt(data, 10)
  
        //if (aplicaron < 4) {
          console.log('Bien, han aplicado ', aplicaron)
          $.ajax({
            url: `${base_url()}app/user/aplicar`,
            data: {
              id_cliente: cliente_id,
              opnegocio_id,
              doc,
            },
            type: 'post',
            success() {
              $(estatus).html(
                '	<h5 class="text-center"><i class="fas fa-clock"></i><br>Aplicado, pendiente de respuesta</h5>'
              )
              $(controls).html(
                `<div class="btn-group"> <button  class="btn btn-dark default btn-default" onclick="showcoti(${coti.id})"><i class="fas fa-upload"></i>	<br> Anexar cotizacion </button><button  class="btn btn-primary default btn-default" onclick="contactmodal(${contacto.id})"><i class="fas fa-comment"></i><br> Contactar </button><button onclick="modalcancelar(${modal.id})" class="btn btn-danger default btn-default"><i class="fas fa-times"></i><br>Cancelar solicitud</button></div>`
              )
              toastr.success(
                'Se ha enviado un correo al comercio notificando que te intersa el requerimiento!'
              )
            },
          })
        // } else {
        //   toastr.warning('Este requerimiento no puede aceptar mas aplicaciones')
        // }
      },
    })
  }

  function showcoti(id) {
    document.getElementById(id.id).setAttribute('style', 'display: flex')
  }
  
  function contactmodal(modal) {
    const myModal = new bootstrap.Modal(document.getElementById(modal.id))
    myModal.show()
  }
  function send_whats(telefono, text, opnegocio_id, requerimiento, ventas) {
    if (telefono === '' || telefono == null) {
      toastr.warning(
        'Este comercio no tiene un numero de whatsapp de ventas registrado'
      )
    } else {
      mensaje = `Hola ${ventas}, te contacto desde *_ENLACE-CANACO_* con respecto al requerimiento *${requerimiento}*: `
      mensaje += $(`#${text}`).val()
      console.log('MENSJAE ENVIAR WHATS: ', mensaje)
      const whats = `https://wa.me/+52${telefono}?text=${mensaje}`
      window.open(whats, '_blank')
      $.ajax({
        url: `${base_url()}app/user/mensaje_whats`,
        data: { opnegocio_id, mensaje },
        type: 'post',
        success() {
          toastr.success(
            'Se ha envido un whatsapp a la persona que publicó el requerimiento'
          )
          location.reload()
        },
      })
    }
  }
  function send_email(correo_cliente, text, id_oportunidad_negocio) {

    $.ajax({
      url: `${base_url()}app/myaccount/sendDataMail`,
      type: 'post',
      success(response) {
        const mi_correo = response.slice(1, -1)
        mensaje = $(`#${text}`).val()
        $.ajax({
          url: `${base_url()}app/user/mensaje_correo`,
          data: {
            id_oportunidad_negocio,
            mensaje,
            correo_cliente,
            mi_correo,
          },
          type: 'post',
          success() {
            toastr.success(
              'Se ha enviado mail a la persona que publicó el requerimiento'
            )
            // location.reload()
          },
        })
      },
    })
  }

  function modal_abrir() {
    $('#modal_examen').modal('show'); 
 
  }