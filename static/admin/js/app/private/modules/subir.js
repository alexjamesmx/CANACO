jQuery( document ).ready( ( $ ) =>
{
  $.ajax( {
    dataType: 'json',
    url: `${base_url()}app/myaccount/comercio`,
    success( data )
    {
      if (
        data.message[ 0 ].negocio_calle == null &&
        data.message[ 0 ].municipio == null &&
        data.message[ 0 ].negocio_colonia == null &&
        data.message[ 0 ].negocio_numero_ex == null &&
        data.message[ 0 ].negocio_numero_int == null &&
        data.message[ 0 ].negocio_cp == null
      )
      {
      } else
      {
        show_direc.checked = true

        $( '.group-direc' ).slideToggle( 400 )
      }
    },
  } )

  $( '#recibo' ).change( function ()
  {
    $( '#btn-sbmt' ).prop( 'disabled', this.files.length === 0 )
  } )
  count()

  $( '#change_docs' ).change( () =>
  {
    $( '.group-subir' ).slideToggle( 400 )
  } )

  $( '#change_documentos' ).change( () =>
  {
    $( '.group-subir-doc' ).slideToggle( 400 )
  } )

  $( '#show_direc' ).change( () =>
  {
    $( '.group-direc' ).slideToggle( 400 )
  } )

  $( '#form-fac-direc' ).validate( {
    submitHandler: ( form ) =>
    {
      const jQform = $( form )
      const btnSbmt = $( '#btn-sbmt-guardar-direc' )
      const txtBtn = $.trim( btnSbmt.html() )
      goToValidation = true
      if ( goToValidation )
      {
        btnSbmt.html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        )
        btnSbmt
          .html(
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
          )
          .attr( 'disabled', 'disabled' )
        jQform.children( 'input' ).attr( 'disabled', 'disabled' )
        jQform.children( 'input' ).attr( 'disabled', 'disabled' )

        $.ajax( {
          url: jQform.attr( 'action' ),
          type: jQform.attr( 'method' ),
          dataType: jQform.attr( 'data-type' ),
          data: jQform.serialize(),
          success: ( response ) =>
          {
            document
              .getElementById( 'subiste_rfc' )
              .setAttribute( 'style', 'display: block' )
            document
              .getElementById( 'sube_rfc' )
              .setAttribute( 'style', 'display: none' )
            $( 'html, body' ).animate(
              {
                scrollTop: `${$( '#afiliacionWizard' ).offset().top - 95}px`,
              },
              500
            )
            toastr[ response.response_type ]( response.message )
          },
          error: () =>
          {
            toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
          },
          complete()
          {
            btnSbmt.html( txtBtn )
            btnSbmt.removeAttr( 'disabled' )
          },
        } )
      }
    },
  } )

  $( '#form-subir-img' )
    .submit( ( e ) =>
    {
      e.preventDefault()
    } )
    .validate( {
      submitHandler: ( form ) =>
      {
        const btnSbmt = $( '#btnon' )
        const txtBtn = $.trim( btnSbmt.html() )

        const formData = new FormData()
        const $fotoProducto = $( '#fileImagen' )
        const archivos = $fotoProducto[ 0 ].files
        if ( archivos.length > 0 )
        {
          const foto = archivos[ 0 ]
          // Sólo queremos la primera imagen, ya que el usuario pudo seleccionar más
          // Ojo: En este caso 'foto' será el nombre con el que recibiremos el archivo en el servidor
          formData.append( 'foto', foto )
          btnSbmt
            .html(
              '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
            )
            .attr( 'disabled', 'disabled' )
          // jQform.children( 'input' ).attr( 'disabled', 'disabled' )
          $.ajax( {
            url: `${base_url()}app/Prueba_d/subirImagen`,
            dataType: 'json',
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false,
            success: ( response ) =>
            {
              toastr[ response.response_type ]( response.message )
              if ( response.response_type !== 'danger' )
              {
                $( '#negocio_logo' ).attr(
                  'src',
                  `${base_url()}static/uploads/perfil/${response.negocio_logo}`
                )

                setTimeout( () =>
                {
                  $( '#negocio_logo' ).attr(
                    'src',
                    `${base_url()}static/uploads/perfil/${response.negocio_logo
                    }`
                  )
                  $( '#fileImagen' ).val( null )
                  btnSbmt.html( txtBtn )
                  btnSbmt.removeAttr( 'disabled' )
                }, 1000 )
              }
            },
            error: () =>
            {
              toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
            },
            complete()
            {
              $( '#fileImagen' ).val( null )
              btnSbmt.html( txtBtn )
              btnSbmt.removeAttr( 'disabled' )
            },
          } )
        }
      },
    } )

  $( '#form-update-comercio' ).validate( {
    submitHandler: ( form ) =>
    {
      const jQform = $( form )
      const btnSbmt = $( '#btn-sbmt-create-comercio' )
      const txtBtn = $.trim( btnSbmt.html() )
      const RFC = $.trim( $( '#RFC' ).val() )
      const CRFC = $.trim( $( '#CRFC' ).val() )
      console.log( 'es este?' )

      let goToValidation = true

      if ( RFC.toUpperCase !== CRFC.toUpperCase )
      {
        toastr.warning( 'RFC no coinciden' )
        $( '#RFC' ).focus()
        goToValidation = false
      }

      if ( goToValidation )
      {
        btnSbmt.html(
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        )
        btnSbmt
          .html(
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-spinner fa-pulse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
          )
          .attr( 'disabled', 'disabled' )
        jQform.children( 'input' ).attr( 'disabled', 'disabled' )
        jQform.children( 'input' ).attr( 'disabled', 'disabled' )

        $.ajax( {
          url: jQform.attr( 'action' ),
          type: jQform.attr( 'method' ),
          dataType: jQform.attr( 'data-type' ),
          data: jQform.serialize(),
          success: ( response ) =>
          {
            toastr[ response.response_type ]( response.message )
            alert( 'Cuando actualizamos datos del comercio' )
            reload_keywords()

          },
          error: () =>
          {
            toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
          },
          complete()
          {
            btnSbmt.html( txtBtn )
            btnSbmt.removeAttr( 'disabled' )
          },
        } )
      }
    },
  } )
} )

function regresa()
{
  document.getElementById( 'subiste_rfc' ).setAttribute( 'style', 'display: none' )
  document.getElementById( 'sube_rfc' ).setAttribute( 'style', 'display: block' )
}

function selecciona_un_plan( clave )
{
  if ( clave === 1 )
  {
    document
      .getElementById( 'info-emprendedor' )
      .setAttribute( 'style', 'display: flex' )
    document.getElementById( 'info-pyme' ).setAttribute( 'style', 'display: none' )
    document
      .getElementById( 'info-visionario' )
      .setAttribute( 'style', 'display: none' )
    document
      .getElementById( 'info-consolidado' )
      .setAttribute( 'style', 'display: none' )
  } else if ( clave === 2 )
  {
    document
      .getElementById( 'info-emprendedor' )
      .setAttribute( 'style', 'display: none' )
    document.getElementById( 'info-pyme' ).setAttribute( 'style', 'display: flex' )
    document
      .getElementById( 'info-visionario' )
      .setAttribute( 'style', 'display: none' )
    document
      .getElementById( 'info-consolidado' )
      .setAttribute( 'style', 'display: none' )
  } else if ( clave === 3 )
  {
    document
      .getElementById( 'info-emprendedor' )
      .setAttribute( 'style', 'display: none' )
    document.getElementById( 'info-pyme' ).setAttribute( 'style', 'display: none' )
    document
      .getElementById( 'info-visionario' )
      .setAttribute( 'style', 'display: flex' )
    document
      .getElementById( 'info-consolidado' )
      .setAttribute( 'style', 'display: none' )
  } else if ( clave === 4 )
  {
    document
      .getElementById( 'info-emprendedor' )
      .setAttribute( 'style', 'display: none' )
    document.getElementById( 'info-pyme' ).setAttribute( 'style', 'display: none' )
    document
      .getElementById( 'info-visionario' )
      .setAttribute( 'style', 'display: none' )
    document
      .getElementById( 'info-consolidado' )
      .setAttribute( 'style', 'display: flex' )
  }
}

function preafil( tipo )
{
  $.ajax( {
    url: `${base_url()}app/afiliate/solicitar_afiliacion`,
    type: 'post',
    data: {
      tipo,
    },
    dataType: 'json',
    success( response )
    {
      toastr[ response.response_type ]( response.message )
      if ( response.response_type === 'success' )
      {
        document
          .getElementById( 'info-emprendedor' )
          .setAttribute( 'style', 'display: none' )
        document
          .getElementById( 'info-pyme' )
          .setAttribute( 'style', 'display: none' )
        document
          .getElementById( 'info-visionario' )
          .setAttribute( 'style', 'display: none' )
        document
          .getElementById( 'info-consolidado' )
          .setAttribute( 'style', 'display: none' )
        document
          .getElementById( 'boton-afiliate' )
          .setAttribute( 'style', 'display: none' )
        document
          .getElementById( 'boton-recibo' )
          .setAttribute( 'style', 'display: flex' )
      } else
      {
      }
    },
  } )
}

function detail( palabra )
{
  const myModal = new bootstrap.Modal( document.getElementById( 'modal_detalles' ) )
  myModal.show()
  const image = new Image()
  const src = `${base_url()}static/afiliacion/${palabra}` // Esta es la variable que contiene la url de una imagen ejemplo, luego puedes poner la que quieras
  image.src = src
  image.style = 'max-width: 100%;; height:auto;'
  image.class = 'img-fluid'
  $( '#image' ).empty()
  $( '#image' ).append( image )
}

function abrir()
{
  $.ajax( {
    url: `${base_url()}app/afiliate/conocer_afiliacion`,
    type: 'post',
    dataType: 'json',
    success( data )
    {
      if ( data == null || data[ 0 ].estatus == '26' )
      {
        const myModal = new bootstrap.Modal(
          document.getElementById( 'modal_afiliacion' )
        )
        myModal.show()
      }
    },
  } )
}

function borrarcp()
{
  $.ajax( {
    url: `${base_url()}app/Files/borrar_cp`,
    dataType: 'json',
    success: ( response ) =>
    {
      $.ajax( {
        url: `${base_url()}Validaciones/validacionGrande`,
        success( data )
        {
          const porcentajePerfil = parseInt( data.message, 10 )
          $( '#progreso' ).attr( 'style', `width: ${porcentajePerfil}%` )
          $( '#progreso' ).text( `${porcentajePerfil}%` )
          if ( porcentajePerfil < 70 )
          {
            minimo.style.display = 'block'
          } else
          {
            minimo.style.display = 'none'
          }
        },
      } )

      window.setTimeout( () =>
      {
        toastr.success( response.message )
        window.location.href = `${base_url()}app/myaccount/`
      }, 1500 )
    },
    error: () =>
    {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
    },
  } )
}

function count()
{
  $.ajax( {
    url: `${base_url()}app/Informacion_perfil/all_transacciones`,
    dataType: 'json',
    success( data )
    {
      $( '#counter' ).text( data.total )
      $( '#transacciones' ).text( data.calificados )
      $( '#requerimientos' ).text( data.urgentes )
    },
    error: () =>
    {
      toastr.error( 'Ocurrió un error, por favor vuelva a intentarlo' )
    },
    complete() { },
  } )
}
