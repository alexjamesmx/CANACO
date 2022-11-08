jQuery( document ).ready( () => {
  reload_table()
} )

function reload_table() {
  $( '#tbl-tbody-show-reasignacionhistory' ).load(
    base_url( 'app/jefeafilcomercios/showlistreasignacionescomercios' ),
  )
}
