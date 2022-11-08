$(document).on('click', '.btn-showmodalaxv', (event) => {
  event.preventDefault()
  $('#modal-afilporvalidar').modal({
    backdrop: 'static',
    keyboard: true,
    show: true,
  })
})
