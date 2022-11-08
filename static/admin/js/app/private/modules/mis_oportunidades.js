
function divmagico() {
    let misdatos
    if ($('#info').val() !== undefined && $('#info').val() !== null) {
      misdatos = JSON.parse($('#info').val())
      let divi
      if (misdatos !== undefined) {
        misdatos.forEach((minidato, i) => {
          try {
            divi = `magic${i}`
            $(`#${divi}`).load(
              base_url(`app/perfil/profiles/${minidato.usuario_id}`)
            )
          } catch (error) {}
        })
      }
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