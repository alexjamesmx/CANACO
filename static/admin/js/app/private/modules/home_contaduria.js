jQuery(document).ready(() => {
  get_top()
  afiliacionesN()
  dineroT()
})

function afiliacionesN() {
  $.ajax({
    url: `${base_url()}app/contaduria/afiliacionesN`,
    dataType: 'json',
    success(data) {
      $('#an').text(data)
    },
  })
}

function dineroT() {
  $.ajax({
    url: `${base_url()}app/contaduria/dineroT`,
    dataType: 'json',
    success(data) {
      $('#dineroT').text(Intl.NumberFormat('en-US').format(`${data[0].total}`))
      document.getElementById('dineroT_comisiones').textContent =
        Intl.NumberFormat('en-US').format(data[0].total * 0.1)
    },
  })

  $.ajax({
    url: `${base_url()}app/contaduria/dineroFT`,
    dataType: 'json',
    success(data) {
      $('#dineroFT').text(
        Intl.NumberFormat('en-US').format(Number(`${data[0].total}`))
      )
      document.getElementById('dineroFT_comisiones').textContent =
        Intl.NumberFormat('en-US').format(data[0].total * 0.1)
    },
  })

  $.ajax({
    url: `${base_url()}app/contaduria/afils24`,
    dataType: 'json',
    success(data) {
      // console.log(data);
      $('#afils24').text(Intl.NumberFormat('en-US').format(data))
    },
  })
}
