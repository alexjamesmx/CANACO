function reload_keywords()
{
  // $( '#progreso' ).attr( 'style', 'width: 0%' )
  // $( '#progreso_no' ).text( '0%' )
  $.ajax( {
    url: `${base_url()}/Validaciones/validacionGrande`,
    dataType: 'json',
  } ).done( ( data ) =>
  {
    console.trace( 'Validación grande' )
    const porcentajePerfil = parseInt( data.message, 10 )
    if ( document.getElementById( 'progreso' ).style.width != porcentajePerfil )
    {
      $( '#progreso' ).attr( 'style', `width: ${porcentajePerfil}%` )
      $( '#progreso_no' ).text( `${porcentajePerfil}%` )
    }

    if ( data.bandera_keywords > 0 )
    {
      $( '#porcentaje_productos_servicios' ).html( `<i class="fas fa-check"> &nbsp</i> ` )
    }
    else
    {
      $( '#porcentaje_productos_servicios' ).html( `<i class="fas fa-times" style="color:red;">&nbsp</i>` )
    }
    if ( data.bandera_datos_negocio > 0 )
    {
      $( '#porcentaje_datos_comercio' ).html( `<i class="fas fa-check">&nbsp</i>` )
    }
    else
    {
      $( '#porcentaje_datos_comercio' ).html( `<i class="fas fa-times" style="color:red;">&nbsp</i>` )
    }
    if ( data.bandera_afiliacion > 0 )
    {
      $( '#porcentaje_afiliacion' ).html( `<i class="fas fa-check">&nbsp &nbsp</i>` )
    }
    else
    {
      $( '#porcentaje_afiliacion' ).html( `<i class="fas fa-times" style="color:red;">&nbsp &nbsp</i>` )
    }
    if ( data.bandera_cv > 0 )
    {
      $( '#porcentaje_curriculum' ).html( `<i class="fas fa-check">&nbsp &nbsp</i>` )
    }
    else
    {
      $( '#porcentaje_curriculum' ).html( `<i class="fas fa-times" style="color:red;">&nbsp &nbsp</i>` )
    }

    if ( data.bandera_documentos > 0 )
    {
      $( '#porcentaje_documentos_comercio' ).html( `<i class="fas fa-check">&nbsp</i>` )
    }
    else
    {
      $( '#porcentaje_documentos_comercio' ).html( `<i class="fas fa-times" style="color:red;">&nbsp</i>` )
    }
    if ( data.bandera_datos_usuario > 0 )
    {
      $( '#porcentaje_datos_contacto' ).html( `<i class="fas fa-check">&nbsp</i>` )
    }
    else
    {
      $( '#porcentaje_datos_contacto' ).html( `<i class="fas fa-times"style="color:red;">&nbsp</i>` )
    }

  } )

  $( '#tbl-tbody-show-act-kw' ).load( base_url( 'app/myaccount/showkeywordsproductoservicio' ) )
}



function requerimiento_imagen( id_usuario )
{
  window.open( `${base_url()}/app/perfil/perfil_publico/${id_usuario}` )
}
