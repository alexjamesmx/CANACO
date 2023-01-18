function reload_keywords()
{
  // $( '#progreso' ).attr( 'style', 'width: 0%' )
  // $( '#progreso_no' ).text( '0%' )
  $.ajax( {
    url: `${base_url()}/Validaciones/validacionGrande`,
    dataType: 'json',
  } ).done( ( data ) =>
  {
    const porcentajePerfil = parseInt( data.message, 10 )
    if ( document.getElementById( 'progreso' ).style.width != porcentajePerfil )
    {
      $( '#progreso' ).attr( 'style', `width: ${porcentajePerfil}%` )
      $( '#progreso_no' ).text( `${porcentajePerfil}%` )
    }
  } )
  $( '#tbl-tbody-show-act-kw' ).load( base_url( 'app/myaccount/showkeywordsproductoservicio' ) )
}



function requerimiento_imagen( id_usuario )
{
  window.open( `${base_url()}/app/perfil/perfil_publico/${id_usuario}` )
}
