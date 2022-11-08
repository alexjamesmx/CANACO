function encuesta( divencuesta, clave ) {
  $( `#${divencuesta}` ).html(
    '<label class="form-label d-block">Cerré mi requerimieento:</label><div class="form-check form-check-inline"><div class="mb-0"><div class="form-check"> <input class="form-check-input" type="radio" name="sipude" value="0" id="sipude"><label class="form-check-label" for="p-fisica">Dentro de la plataforma</label></div></div></div><div class="form-check form-check-inline"><div class="mb-0"><div class="form-check"><input class="form-check-input"  type="radio"  value="1" name="sipude" id="nopude"><label class="form-check-label" for="p-moral">Fuera de la plataforma</label></div></div></div>',
  )

  if ( clave === '0' ) {
    $( `#${divencuesta}` ).html( '' )
    $( `#${divencuesta}` ).html(
      '<label class="form-label d-block">Cerré mi requerimiento:</label><div class="form-check form-check-inline"><div class="mb-0"><div class="form-check"> <input class="form-check-input" type="radio" name="dentrofuera" value="0" id="dentro"><label class="form-check-label" for="p-fisica">Dentro de la plataforma</label></div></div></div><div class="form-check form-check-inline"><div class="mb-0"><div class="form-check"><input class="form-check-input"  type="radio"  value="1" name="dentrofuera" id="fuera"><label class="form-check-label" for="p-moral">Fuera de la plataforma</label></div></div></div>',
    )
  } else if ( clave === '1' ) {
    $( `#${divencuesta}` ).html( '' )
    $( `#${divencuesta}` ).html(
      '  <div class="card m-12" id="div_modal"><h5>Agrega un comentario sobre por que deseas eliminar el requerimiento</h5>   </div><div class="card m-12" id="div_modal"> <textarea id="" name="rechaza" class="form-control ps-5"></textarea></div>',
    )
  }
}

function openmodal( modal ) {
  const myModal = new bootstrap.Modal( document.getElementById( modal.id ) )
  myModal.show()
}
