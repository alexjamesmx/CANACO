jQuery( document ).ready( ( $ ) => {
  $( '#demo_tabla' ).DataTable( {
    processing: true,
    serverSide: true,
    serverMethod: 'post',
    ajax: {
      url: `${base_url()}app/home/consulta_demo_tabla`,
    },
    columns: [{ data: 'municipio_id' }, { data: 'nombre_municipio' }],
  } )
} )
