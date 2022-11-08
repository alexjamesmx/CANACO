//COLORES GRADIENTES HIGHCHARTS
Highcharts.setOptions({
  colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
      radialGradient: {
        cx: 0.5,
        cy: 0.3,
        r: 0.7,
      },
      stops: [
        [0, color],
        [1, Highcharts.color(color).brighten(-0.3).get('rgb')], // darken
      ],
    }
  }),
})

//OBTENER GRAFICAS
function get_reportes() {
  //REQUERIMIENTOS VIGENTES
  $.ajax({
    url: `${base_url()}app/afiliador_reportes/requerimientos_de_mis_afiliados`,
    dataType: 'json',
    success(data) {
      let series = [
        {
          name: 'Requerimientos vigentes',
          data: [
            { name: 'Totales', y: data['totales'], color: '#576a3d' },
            { name: 'De mis afiliados', y: data['mis_afiliados'] },
          ],
        },
      ]
      let pointFormat = '<b>{series.name}</b>: <b>{point.y}</b>'
      let format = '<b>{point.name}</b>: {point.y}'

      if (data['totales'] === 0 && data['mis_afiliados'] === 0) {
        series = [
          {
            name: 'Requerimientos vigentes',
            data: [
              { name: 'Totales', y: 100, color: '#576a3d' },
              { name: 'De mis afiliados', y: 0 },
            ],
          },
        ]
        pointFormat = '{series.name}: 0</b>'
        format = '<b>{point.name}</b>: 0'
      }
      Highcharts.chart('container', {
        chart: {
          shadow: {
            color: 'rgba(0, 0, 0, 0.1)',
            offsetX: 1,
            offsetY: 1,
            opacity: '0.1',
            width: 10,
          },

          borderRadius: '20px',

          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
        },
        title: {
          text: 'REQUERIMIENTOS <br>VIGENTES',
        },
        tooltip: {
          pointFormat,
        },
        accessibility: {
          point: {
            valueSuffix: '%',
          },
        },
        plotOptions: {
          pie: {
            size: 100,
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: true,
              format,
              connectorColor: 'silver',
            },
          },
        },
        series,
      })
    },
  })
  //NEGOCIOS SIN AFILIAR CIERRES CONFIRMADOS
  $.ajax({
    url: `${base_url()}app/afiliador_reportes/no_afils_con_cierres`,
    dataType: 'json',
    success(data) {
      let series = [
        {
          name: 'Cierres confirmados - No afiliados',
          data: [
            { name: 'Totales', y: data['totales'], color: '#576a3d' },
            { name: 'De mis afiliados', y: data['mis_afiliados'] },
          ],
        },
      ]
      let pointFormat = '<b>{series.name}</b>: <b>{point.y}</b>'
      let format = '<b>{point.name}</b>: {point.y}'

      if (data['totales'] === 0 && data['mis_afiliados'] === 0) {
        series = [
          {
            name: 'Cierres confirmados - No afiliados',
            data: [
              { name: 'Totales', y: 100, color: '#576a3d' },
              { name: 'De mis afiliados', y: 0 },
            ],
          },
        ]
        pointFormat = '<b>{series.name}</b>: 0</b>'
        format = '<b>{point.name}</b>: 0'
      }

      Highcharts.chart('container2', {
        chart: {
          shadow: {
            color: 'rgba(0, 0, 0, 0.1)',
            offsetX: 1,
            offsetY: 1,
            opacity: '0.1',
            width: 10,
          },
          borderRadius: '20px',
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
        },
        title: {
          text: 'Negocios SIN afiliar <br>cierres confirmados',
        },
        tooltip: {
          pointFormat,
        },
        accessibility: {
          point: {
            valueSuffix: '%',
          },
        },
        plotOptions: {
          pie: {
            size: 100,
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: true,
              format,
              connectorColor: 'silver',
            },
          },
        },
        series,
      })
    },
  })
  //NEGOCIOS AFILIADOS CIERRES CONFIRMADOS
  $.ajax({
    url: `${base_url()}app/afiliador_reportes/afils_con_cierres`,
    dataType: 'json',
    success(data) {
      let series = [
        {
          name: 'Cierres confirmados - Afiliados',
          data: [
            { name: 'Totales', y: data['totales'], color: '#576a3d' },
            { name: 'De mis afiliados', y: data['mis_afiliados'] },
          ],
        },
      ]
      let pointFormat = '<b>{series.name}</b>: <b>{point.y}</b>'
      let format = '<b>{point.name}</b>: {point.y}'

      if (data['totales'] === 0 && data['mis_afiliados'] === 0) {
        series = [
          {
            name: 'Cierres confirmados - Afiliados',
            data: [
              { name: 'Totales', y: 100, color: '#576a3d' },
              { name: 'De mis afiliados', y: 0 },
            ],
          },
        ]
        pointFormat = '<b>{series.name}</b>: 0</b>'
        format = '<b>{point.name}</b>: 0'
      }

      Highcharts.chart('container3', {
        chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
        },
        title: {
          text: 'Negocios AFILIADOS <br>cierres confirmados',
        },
        tooltip: {
          pointFormat,
        },
        accessibility: {
          point: {
            valueSuffix: '%',
          },
        },
        plotOptions: {
          pie: {
            size: 100,
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: true,
              format,
              connectorColor: 'silver',
            },
          },
        },
        series,
      })
    },
  })
}

function getnomatchs() {
  $.ajax({
    url: `${base_url()}app/afiliador/getNomatchs`,
    success(data) {
      const nomatchs = parseInt(data, 10)
      $('#numnomatchs').html(
        `<p class="lead text-center text-primary ">${nomatchs}</p>`
      )
    },
  })
}

function get_misregs_hoy() {
  $.ajax({
    url: `${base_url()}app/afiliador/getMisregs`,
    success(data) {
      const noreg = parseInt(data, 10)
      $('#numreghoy').html(
        `<p class="lead text-center text-secondary"> <i class="fas fa-plus"></i>   ${noreg}</p>`
      )
    },
  })
}

$(document).ready(() => {
  getnomatchs()
  get_misregs_hoy()
  get_reportes()
})
