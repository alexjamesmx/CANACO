function reload_keywords() {
  $( '#progreso' ).attr( 'style', 'width: 0%' )
  $( '#progreso' ).text( '0%' )
  $.ajax( {
    url: `${base_url()}/Validaciones/validacionGrande`,
    dataType: 'json',
  } ).done( ( data ) => {
    const porcentajePerfil = parseInt( data.message, 10 )
    $( '#progreso' ).attr( 'style', `width: ${porcentajePerfil}%` )
    $( '#progreso' ).text( `${porcentajePerfil}%` )
  } )
  $( '#tbl-tbody-show-act-kw' ).load( base_url( 'app/myaccount/showkeywordsproductoservicio' ) )
}
