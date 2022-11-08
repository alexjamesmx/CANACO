$(document).ready(() => {
  marq()
  // ignorados()
})

function marq() {
  $.ajax({
    url: `${base_url()}app/requirements/lista_nomatch`,
    dataType: 'json',
    success(data) {
      if(document.getElementById('marq_style') === null ){      
      var style = document.createElement('style')
      style.setAttribute('id', 'marq_style')
      
      var keyFrames =
        '.custom_marquee {\
          height: 50px;\
          overflow: hidden;\
          position: relative;\
          width: 100%;\
          z-index: 1;\
        }\
        .custom_marquee h4 {\
          white-space: nowrap;\
          position: absolute;\
          width: 100%;\
          height: 100%;\
          margin: 0;\
          line-height: 50px;\
          text-align: left;\
          -moz-transform: translateX(A_DYNAMIC_VALUE);\
          -webkit-transform: translateX(A_DYNAMIC_VALUE);\
          transform: translateX(A_DYNAMIC_VALUE);\
          -moz-animation: custom_marquee 25s linear infinite;\
          -webkit-animation: custom_marquee 25s linear infinite;\
          animation: custom_marquee 25s linear infinite;\
        }\
        @-moz-keyframes custom_marquee {\
          0% {\
            -moz-transform: translateX(A_DYNAMIC_VALUE);\
          }\
          100% {\
            -moz-transform: translateX(A_DYNAMIC_VALUE_NEGATIVE);\
          }\
        }\
        @-webkit-keyframes custom_marquee {\
          0% {\
            -webkit-transform: translateX(A_DYNAMIC_VALUE);\
          }\
          100% {\
            -webkit-transform: translateX(A_DYNAMIC_VALUE_NEGATIVE);\
          }\
        }\
        @keyframes custom_marquee {\
          0% {\
            -moz-transform: translateX(A_DYNAMIC_VALUE);\
            -webkit-transform: translateX(A_DYNAMIC_VALUE);\
            transform: translateX(A_DYNAMIC_VALUE);\
          }\
          100% {\
            -moz-transform: translateX(A_DYNAMIC_VALUE_NEGATIVE);\
            -webkit-transform: translateX(A_DYNAMIC_VALUE_NEGATIVE);\
            transform: translateX(A_DYNAMIC_VALUE_NEGATIVE);\
          }\
        }'

      if (data !== null) {
        let contenido = ''
        data.forEach((minidato, i) => {
          const {
            nomatch_id,
            date_nomatch,
            keyword,
            status,
            usuario_id,
            veces_buscado,
          } = minidato
          contenido +=
            i == 0
              ? `<a href="#"
              onclick="handleModal_nomatch(this)"
              data-toggle="modal"
              data-target="#modal_nomatch"
              data-id="${nomatch_id}"
              data-keyword='${keyword}'
              data-date_nomatch='${date_nomatch}'
              data-status="${status}"
              data-usuario_id="${usuario_id}"
              data-veces_buscado="${veces_buscado}"
              style="color: #0028c6;"
                >
                ${keyword}
                </a>`
              : `<a href="#"
                onclick="handleModal_nomatch(this)"
                data-toggle="modal"
                data-target="#modal_nomatch"
                data-id="${nomatch_id}"
                data-keyword='${keyword}'
                data-date_nomatch='${date_nomatch}'
                data-status="${status}"
                data-usuario_id="${usuario_id}"
                data-veces_buscado="${veces_buscado}"
                style="color: #0028c6;"
                > &nbsp <i style="vertical-align:middle;font-size:3px"class="fas fa-circle"></i> &nbsp ${keyword}
                </a>`
        })
        $('#custom_marquee_parent').append(
          `<div style="align-self: end;position: relative;width: 100%;display: flex;
          justify-content: end;"class='custom_marquee'id="custom_marquee"><h4 id="marquee_h4"style="position:relative;width: fit-content;"><a>${contenido}</a></h4></div>`
        )
          //AJUSTAR EL ANCHO DEL MARQUEE
        let width
        document
          .getElementById('custom_marquee_parent')
          .style.setProperty('display', 'flex', 'important')

        if (
          document.querySelector('#nomatch_title').offsetWidth <
          document.querySelector('#marquee_h4').offsetWidth
        ) {
          console.log('2')
          width =
            document.querySelector('#custom_marquee').offsetWidth +
            document.querySelector('#marquee_h4').offsetWidth -
            document.querySelector('#nomatch_title').offsetWidth
        } else {
          console.log('1')
          width =
            document.querySelector('#custom_marquee').offsetWidth +
            document.querySelector('#marquee_h4').offsetWidth -
            document.querySelector('#nomatch_title').offsetWidth
        }

        style.innerHTML = keyFrames.replace(/A_DYNAMIC_VALUE/g, width + 'px')

        style.innerHTML = keyFrames.replace(
          /A_DYNAMIC_VALUE_NEGATIVE/g,
          '-' + width + 'px'
        )
        document.getElementsByTagName('head')[0].appendChild(style)
        const width_h4 = document.querySelector('#marquee_h4').offsetWidth
        document
          .getElementById('marquee_h4')
          .style.setProperty('left', width_h4 + 'px', 'important')


          src="<?= base_url() . 'static/uploads/perfil/' . $row['negocio_logo'] ?>"

      }
    }
    },
  })
}

async function handleModal_nomatch(e) {
  $('#modal_nomatch').modal('show')
  //NOMATCH BASIC DATA
  const nomatch_id = e.getAttribute('data-id').trim()
  const keyword = e.getAttribute('data-keyword').trim()
  const date_nomatch = e.getAttribute('data-date_nomatch').trim()
  const status = e.getAttribute('data-status').trim()
  const usuario_id = e.getAttribute('data-usuario_id').trim()
  const veces_buscado = e.getAttribute('data-veces_buscado').trim()

  const modal_text_id = document.getElementById('modal_text_id')
  modal_text_id.textContent = nomatch_id
  const modal_text_status = document.getElementById('modal_text_status')
  modal_text_status.textContent = status
  const modal_text_usuario_id = document.getElementById('modal_text_usuario_id')
  modal_text_usuario_id.textContent = usuario_id
  const modal_text_date_nomatch = document.getElementById(
    'modal_text_date_nomatch'
  )
  modal_text_date_nomatch.textContent = date_nomatch

  const modal_nomatch_title = document.getElementById('modal_nomatch_title')
  modal_nomatch_title.innerHTML =
    '<h1>!Se busca(n) <strong>' + keyword + '</strong>!</h1>'

  //NOMATCH DETAIL DATA
  let url =
    base_url() +
    'app/requirements/get_nomatch_detalle/' +
    usuario_id +
    '/' +
    nomatch_id
  let data = await fetch_detail_nomatch(url)
  let { cantidad, entrega, especificaciones } = data

  const modal_text_cantidad = document.getElementById('modal_text_cantidad')
  modal_text_cantidad.textContent = cantidad

  const modal_text_especificaciones = document.getElementById(
    'modal_text_especificaciones'
  )

  modal_text_especificaciones.textContent = especificaciones

  entrega = entrega == 1 ? 'Urgente' : entrega == 2 ? 'Prioritario' : 'Regular'
  const modal_text_entrega = document.getElementById('modal_text_entrega')
  modal_text_entrega.textContent = entrega

  //NOMATCH_PROFILE DETAIL DATA
  url = base_url() + 'app/requirements/get_nomatch_profile/' + usuario_id
  data = await fetch_nomatch_profile(url)
  console.log('DATA',data)
  let { negocio_logo, negocio_nombre } = data
  document.getElementById('modal_perfil_logo').src =
    base_url() + '/static/uploads/perfil/' + negocio_logo
//DATA USER IMG PROFILE
    document.getElementById('modal_perfil_logo').setAttribute('data-user',usuario_id)

  document.getElementById('modal_text_negocio_nombre').textContent =
    negocio_nombre

  // '! Si su negocio puede proveerlo, por favor contacte y satisfaga la demanda.'
  //AL CERRAR MODAL
  $('#modal_nomatch').on('hidden.bs.modal', function () {
    modal_text_id.textContent = ''
    modal_text_status.textContent = ''
    modal_text_usuario_id.textContent = ''
    modal_text_date_nomatch.textContent = ''
    modal_text_cantidad.textContent = ''
    modal_text_especificaciones.textContent = ''
    modal_text_entrega.textContent = ''
  })
}

async function fetch_detail_nomatch(url) {
  try {
    let res = await fetch(url)
    res = await res.json()
    return res
  } catch (err) {
    console.error(err)
  }
}

async function fetch_nomatch_profile(url) {
  try {
    let res = await fetch(url)
    res = await res.json()
    return res
  } catch (err) {
    console.error(err)
  }
}

// function ignorados() {
//   $.ajax({
//     url: `${base_url()}app/requirements/ignorados`,
//     dataType: 'json',
//     success(data) {
//       if (data) {
//         if (data !== undefined) {
//           data.forEach((minidato) => {
//             // console.log(indice, minidato.keyword);
//             let contenido = ''
//             contenido +=
//               '<div class="col-md-6 col-lg-6 col-sm-6 mb-2 container-md">'
//             contenido += '<div class="card ">'
//             contenido += '<div class="card-body">'
//             contenido += '<div>'
//             contenido += '<div class="container">'
//             contenido +=
//               '<h4><strong>Últimos requerimientos ignorados</strong></h4>'
//             contenido += '<div class="row">'
//             contenido += `<div class='col-6'><strong>Comercio que solicita: </strong>${minidato.negocio_nombre}</div>`
//             contenido += '</div>'
//             contenido += '<div class="row">'
//             contenido += `<div class="col-6"><strong>Busca: </strong>${minidato.busq_nec} </div>`
//             contenido += '</div>'
//             contenido += '</div>'
//             contenido += '<div class="container">'
//             contenido += '<div class="row">'
//             contenido += ' <div class="col-12">'
//             contenido += `<strong>Especificaciones: </strong>${minidato.especificaciones}`
//             contenido += '</div>'
//             contenido += '</div>'
//             contenido += '</div>'
//             contenido += '<div class="container">'
//             contenido += '<div class="row">'
//             contenido += '<div class="col-12">'
//             contenido += `<strong>Cantidad: </strong>${minidato.qty}`
//             contenido += '</div>'
//             contenido += '</div>'
//             contenido += '</div>'
//             contenido += '</div>'
//             contenido += '</div>'
//             contenido += '</div>'
//             contenido += '</div>'

//             $('#barraIgnorados').append(contenido)
//           })
//         }
//       }
//       console.log('respuesta', data)
//     },
//   })
// }


function requerimiento_imagen(e) {
  const usuario_id = e.getAttribute('data-user')
    window.open(`${base_url()}/app/perfil/perfil_publico/${usuario_id}`)
}


function profileHover() {
  const eye = document.getElementById('profile_eye' )
  let opacity = 0.0
  const callback = () => {
    eye.style.opacity = opacity
    if (opacity == 1) {
      clearInterval(interval)
    }
    opacity++
  }
  const interval = setInterval(callback, 100) 
}

function profileHoverHide() {
  const eye = document.getElementById('profile_eye')
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