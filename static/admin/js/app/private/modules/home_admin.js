var month = new Date().getMonth()
var months = [
  'Enero',
  'Febrero',
  'Marzo',
  'Abril',
  'Mayo',
  'Junio',
  'Julio',
  'Agosto',
  'Septiembre',
  'Octubre',
  'Noviembre',
  'Diciembre',
]
var chart_regitros_comparaciones
//COLORES HIGHCHARTS
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
jQuery(document).ready(($) => {
  vista_pai()
  userspw()
  afilspw()
  reqpd()
  meses()
  reportes()
  getnomatchs()
  requerimientos_vigentes()
  build_initial_chart_regitros_comparaciones()
  metrica_registro_comparaciones()
  get_top_conversiones()
  total_afiliaciones_actuales()
  no_oportunidades_negocio()
})

function vista_pai() {
  $.ajax({
    url: `${base_url()}app/Grafica_jefe`,
    dataType: 'json',
    success(obje) {
      Highcharts.chart('container-g2', {
        chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
        },
        title: {
          style: {
            fontSize: '30px',
          },
          text: 'Comercios por MUNICIPIO',
        },
        subtitle: {
          text: 'Total comercios: ' + obje.All,
        },
        tooltip: {
          pointFormat: '<h2>{series.name}: <b>{point.y:1f}</b></h2>',
        },
        accessibility: {
          point: {
            valueSuffix: '%',
          },
        },
        plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              style: {
                fontSize: '15px',
              },
              enabled: true,
              format: '<h2><b>{point.name}</b>: {point.percentage:.1f} %</h2>',
            },
          },
        },
        series: [
          {
            name: 'Comercios registrados',
            colorByPoint: true,
            data: [
              {
                name: 'Querétaro',
                y: obje.Queretaro,
              },
              {
                name: 'Amealco de Bonfil',
                y: obje.Amealco,
              },
              {
                name: 'Arroyo Seco',
                y: obje.Arroyo,
              },
              {
                name: 'Cadereyta de Montes',
                y: obje.Cadereyta,
              },
              {
                name: 'Colón',
                y: obje.Colon,
              },
              {
                name: 'Corregidora',
                y: obje.Corregidora,
              },
              {
                name: 'El Marqués',
                y: obje.Elmarques,
              },
              {
                name: 'Huimilpan',
                y: obje.Huimilpan,
              },
              {
                name: 'Jalpan de Serra',
                y: obje.Jalpandeserra,
              },
              {
                name: 'Peñamiller',
                y: obje.Penamiller,
              },

              {
                name: 'Pinal de Amoles',
                y: obje.Pinal,
              },
              {
                name: 'San Joaquín',
                y: obje.Sanjoaquin,
              },
              {
                name: 'San Juan del Río',
                y: obje.Sanjuandelrio,
              },
              {
                name: 'Tolimán',
                y: obje.Toliman,
              },
              {
                name: 'Tequisquiapan',
                y: obje.Tequisquiapan,
              },
              {
                name: 'Landa de Matamoros',
                y: obje.Landa,
              },
              {
                name: 'Pedro Escobedo',
                y: obje.Escobedo,
              },
              {
                name: 'Ezequiel Montes',
                y: obje.Ezequiel,
              },
              {
                name: 'Sin locación',
                y: obje.All_unregistered,
              },
            ],
          },
        ],
      })
    },
  })
}

function meses() {
  const fecha = new Date()
  const year = fecha.getFullYear()
  $.ajax({
    url: `${base_url()}app/Grafica_jefe/graficaMes`,
    dataType: 'json',
    success(obje) {
      Highcharts.chart('container-g1', {
        chart: {
          type: 'line',
        },
        title: {
          text: `Total de transacciones ENLACE - CANACO ${year}`,
          style: {
            fontSize: '30px',
          },
        },
        subtitle: {
          text: 'Enero - Diciembre',
        },
        xAxis: {
          categories: [
            'Ene',
            'Feb',
            'Mar',
            'Abr',
            'May',
            'Jun',
            'Jul',
            'Ago',
            'Sep',
            'Oct',
            'Nov',
            'Dic',
          ],
        },
        yAxis: {
          title: {
            text: 'Número de transacciones',
          },
        },
        plotOptions: {
          line: {
            dataLabels: {
              enabled: true,
              style: {
                fontSize: '15px',
              },
            },
            enableMouseTracking: true,
          },
        },
        series: [
          {
            name: 'Totales',
            data: [
              obje.totales[1],
              obje.totales[2],
              obje.totales[3],
              obje.totales[4],
              obje.totales[5],
              obje.totales[6],
              obje.totales[7],
              obje.totales[8],
              obje.totales[9],
              obje.totales[10],
              obje.totales[11],
              obje.totales[12],
            ],
          },
          {
            name: 'Solventadas',
            data: [
              obje.solventados[1],
              obje.solventados[2],
              obje.solventados[3],
              obje.solventados[4],
              obje.solventados[5],
              obje.solventados[6],
              obje.solventados[7],
              obje.solventados[8],
              obje.solventados[9],
              obje.solventados[10],
              obje.solventados[11],
              obje.solventados[12],
            ],
          },
          {
            name: 'No solventados',
            data: [
              obje.nsolventados[1],
              obje.nsolventados[2],
              obje.nsolventados[3],
              obje.nsolventados[4],
              obje.nsolventados[5],
              obje.nsolventados[6],
              obje.nsolventados[7],
              obje.nsolventados[8],
              obje.nsolventados[9],
              obje.nsolventados[10],
              obje.nsolventados[11],
              obje.nsolventados[12],
            ],
          },
          {
            name: 'Pendientes',
            data: [
              obje.pendientes[1],
              obje.pendientes[2],
              obje.pendientes[3],
              obje.pendientes[4],
              obje.pendientes[5],
              obje.pendientes[6],
              obje.pendientes[7],
              obje.pendientes[8],
              obje.pendientes[9],
              obje.pendientes[10],
              obje.pendientes[11],
              obje.pendientes[12],
            ],
          },
          {
            name: 'Calificadas',
            data: [
              obje.calificadas[1],
              obje.calificadas[2],
              obje.calificadas[3],
              obje.calificadas[4],
              obje.calificadas[5],
              obje.calificadas[6],
              obje.calificadas[7],
              obje.calificadas[8],
              obje.calificadas[9],
              obje.calificadas[10],
              obje.calificadas[11],
              obje.calificadas[12],
            ],
          },
        ],
      })
    },
  })
}

function userspw() {
  $.ajax({
    url: `${base_url()}app/Administrador/userspw`,
    dataType: 'json',
    success(data) {
      $('#r1').text(data)
    },
  })
}

function afilspw() {
  $.ajax({
    url: `${base_url()}app/Administrador/afilspw`,
    dataType: 'json',
    success(data) {
      $('#r2').text(data)
    },
  })
}

function reqpd() {
  $.ajax({
    url: `${base_url()}app/Administrador/reqpd`,
    dataType: 'json',
    success(data) {
      $('#r4').text(data)
    },
  })
}

function reportes() {
  $.ajax({
    url: `${base_url()}app/reportes/todosreqs`,
    dataType: 'json',
    success(data) {
      $('#todosreqs').text(data)
    },
  })

  $.ajax({
    url: `${base_url()}app/reportes/todosreqsvigs`,
    dataType: 'json',
    success(data) {
      $('#todosreqsvigs').text(data)
    },
  })

  $.ajax({
    url: `${base_url()}app/reportes/todosreqssol`,
    dataType: 'json',
    success(data) {
      $('#todosreqssol').text(data)
    },
  })

  $.ajax({
    url: `${base_url()}app/reportes/todosmatch`,
    dataType: 'json',
    success(data) {
      $('#todosmatch').text(data)
    },
  })

  $.ajax({
    url: `${base_url()}app/reportes/todosnoafils`,
    dataType: 'json',
    success(data) {
      $('#todosnoafils').text(data)
    },
  })

  $.ajax({
    url: `${base_url()}app/reportes/todosignorados`,
    dataType: 'json',
    success(data) {
      $('#todosignorados').text(data)
    },
  })
}
function abrixr() {
  const myModal = new bootstrap.Modal(document.getElementById('note_triste'))
  myModal.show()
}
function modalabrir1() {
  const myModal = new bootstrap.Modal(document.getElementById('note_triste'))
  myModal.show()
}

function getnomatchs() {
  $.ajax({
    url: `${base_url()}app/Jefe_afiliador/getNomatchs`,
    dataType: 'json',
    success(data) {
      console.log('NOMATCHS ', data)
      const nomatchs_semana = parseInt(data['semana'])
      const nomatchs_totales = parseInt(data['totales'])

      $('#numnomatchs_semanales').html(
        `<p class="lead text-center text-primary m-0">${nomatchs_semana}</p>`
      )

      $('#numnomatchs_totales').html(
        `<p class="lead text-center text-primary m-0">${nomatchs_totales}</p>`
      )
    },
  })
}

const requerimientos_vigentes = () => {
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
      Highcharts.chart('container-requerimientos-vigentes', {
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
          style: {
            fontSize: '30px',
          },
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
              style: {
                fontSize: '15px',
              },
            },
          },
        },
        series,
      })
    },
  })
}

const metrica_registro_comparaciones = () => {
  fetch(base_url() + 'app/Jefe_afiliador/metrica_registro_comparaciones', {
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then((res) => res.json())
    .then((res) => {
      let data = []
      let monthData = []
      let findMaxValue = []
      Object.entries(res).forEach(([key, value]) => {
        Object.values(value).forEach((val, i) => {
          data.push(parseInt(val[0].total))
          findMaxValue.push(parseInt(val[0].total))

          //CORTA LOS ULTIMOS INDICES YA QUE REFLeJAN LA SUMA TOTAL POR SEMANA
          if (data.length % 5 === 0 && data.length > 0) {
            findMaxValue.splice(findMaxValue.length - 1, 1)
            monthData[key] = data.slice(data.length - 5, data.length - 1)
          }
        })
      })

      // console.log(monthData)
      // console.log('ENERO->', monthData['Enero'])
      // console.log('FEBRERO->', monthData['Febrero'])
      // console.log('MARZO->', monthData['Marzo'])
      // console.log('ABRIL->', monthData['Abril'])
      // console.log('MAYO->', monthData['Mayo'])
      // console.log('JUNIO->', monthData['Junio'])
      // console.log('JULIO->', monthData['Julio'])
      // console.log('AGOSTO->', monthData['Agosto'])
      // console.log('SEPTIEMBRE->', monthData['Septiembre'])
      // console.log('OCTUBRE->', monthData['Octubre'])
      // console.log('NOVIEMRBE->', monthData['Noviembre'])
      // console.log('DICIEMRBE->', monthData['Diciembre'])

      // console.log(findMaxValue)
      // console.log('MAX ', Math.max(...findMaxValue))
      const max = Math.max(...findMaxValue)
      chart_regitros_comparaciones.update({
        chart: {
          // inverted: false,
          // polar: false,
        },
        yAxis: { max: max },
        series: [
          monthData[months[0]]
            ? {
                data: monthData[months[0]],
              }
            : { data: [0, 0, 0, 0] },
          monthData[months[1]]
            ? {
                data: monthData[months[1]],
              }
            : { data: [0, 0, 0, 0] },
          monthData[months[2]]
            ? {
                data: monthData[months[2]],
              }
            : { data: [0, 0, 0, 0] },
          monthData[months[3]]
            ? {
                data: monthData[months[3]],
              }
            : { data: [0, 0, 0, 0] },
          monthData[months[4]]
            ? {
                data: monthData[months[4]],
              }
            : { data: [0, 0, 0, 0] },
          monthData[months[5]]
            ? {
                data: monthData[months[5]],
              }
            : { data: [0, 0, 0, 0] },
          monthData[months[6]]
            ? {
                data: monthData[months[6]],
              }
            : { data: [0, 0, 0, 0] },
          monthData[months[7]]
            ? {
                data: monthData[months[7]],
              }
            : { data: [0, 0, 0, 0] },
          monthData[months[8]]
            ? {
                data: monthData[months[8]],
              }
            : { data: [0, 0, 0, 0] },
          monthData[months[9]]
            ? {
                data: monthData[months[9]],
              }
            : { data: [0, 0, 0, 0] },
          monthData[months[10]]
            ? {
                data: monthData[months[10]],
              }
            : { data: [0, 0, 0, 0] },
          monthData[months[11]]
            ? {
                data: monthData[months[11]],
              }
            : { data: [0, 0, 0, 0] },
        ],
      })
    })
}

const build_initial_chart_regitros_comparaciones = () => {
  chart_regitros_comparaciones = Highcharts.chart('container', {
    chart: {
      type: 'spline',
    },
    title: {
      text:
        '<h1>No. ALTA de negocios por semanas (' +
        new Date().getFullYear() +
        ')</h1>',
      style: {
        fontSize: '30px',
      },
    },
    subtitle: {
      text: '(semanal)',
    },
    xAxis: {
      categories: [
        '<b>SEMANA 1</b>',
        '<b>SEMANA 2</b>',
        '<b>SEMANA 3</b>',
        '<b>SEMANA 4</b>',
      ],
      accessibility: {
        description: 'Semanas de ' + months[month] + ' (actual)',
      },
      max: 3,
    },
    yAxis: {
      title: {
        text: 'No. registros',

        style: {
          fontSize: '16px',
        },
      },
      labels: {
        formatter: function () {
          return '<b>' + this.value + '</b>'
        },
      },
    },
    tooltip: {
      crosshairs: true,
      shared: true,
    },
    plotOptions: {
      spline: {
        marker: {
          radius: 4,
          lineColor: '#666666',
          lineWidth: 1,
        },
        lineWidth: 3,
      },
    },
    series: [
      {
        name: 0 === new Date().getMonth() ? months[0] + '(actual)' : months[0],
        marker: {
          symbol: 'triangle',
        },
        data: [0, 0, 0, 0, 0],
      },
      {
        name: 1 === new Date().getMonth() ? months[1] + '(actual)' : months[1],
        marker: {
          symbol: 'cross',
        },
        data: [0, 0, 0, 0, 0],
      },
      {
        name: 2 === new Date().getMonth() ? months[2] + '(actual)' : months[2],
        marker: {
          symbol: 'diamond',
        },
        data: [0, 0, 0, 0, 0],
      },
      {
        name: 3 === new Date().getMonth() ? months[3] + '(actual)' : months[3],
        marker: {
          symbol: 'circle',
        },
        data: [0, 0, 0, 0, 0],
      },
      {
        name: 4 === new Date().getMonth() ? months[4] + '(actual)' : months[4],
        marker: {
          symbol: 'square',
        },
        data: [0, 0, 0, 0, 0],
      },
      {
        name: 5 === new Date().getMonth() ? months[5] + '(actual)' : months[5],
        marker: {
          symbol: 'triangle',
        },
        data: [0, 0, 0, 0, 0],
      },
      {
        name: 6 === new Date().getMonth() ? months[6] + '(actual)' : months[6],
        marker: {
          symbol: 'cross',
        },
        data: [0, 0, 0, 0, 0],
      },
      {
        name: 7 === new Date().getMonth() ? months[7] + '(actual)' : months[7],
        marker: {
          symbol: 'diamond',
        },
        data: [0, 0, 0, 0, 0],
      },
      {
        name: 8 === new Date().getMonth() ? months[8] + '(actual)' : months[8],
        marker: {
          symbol: 'circle',
        },
        data: [0, 0, 0, 0, 0],
      },
      {
        name: 9 === new Date().getMonth() ? months[9] + '(actual)' : months[9],
        marker: {
          symbol: 'triangle',
        },
        data: [0, 0, 0, 0, 0],
      },
      {
        name:
          10 === new Date().getMonth() ? months[10] + '(actual)' : months[10],
        marker: {
          symbol: 'square',
        },
        data: [0, 0, 0, 0, 0],
      },
      {
        name:
          11 === new Date().getMonth() ? months[11] + '(actual)' : months[11],
        marker: {
          symbol: 'triangle-down',
        },
        data: [0, 0, 0, 0, 0],
      },
    ],
  })
}

const get_top_conversiones = () => {
  $.ajax({
    url: `${base_url()}app/Jefe_afiliador/topconvers`,
    dataType: 'json',
    success(data) {
      Highcharts.chart('container-top-conversiones', {
        chart: {
          type: 'column',
        },
        title: {
          text: 'Top 10 AFILIADORES - ' + months[month],
          style: {
            fontSize: '30px',
          },
        },
        subtitle: {
          text: '(con más comercios convertidos)',
        },
        accessibility: {
          announceNewData: {
            enabled: true,
          },
        },
        xAxis: {
          type: 'category',
          max: 9,
          title: {
            text: 'Afiliadores',
            style: {
              fontSize: '18px',
              fontWeight: 'bold',
            },
          },
          labels: {
            style: {
              fontWeight: 'bold',
              fontSize: '16px',
            },
          },
        },
        yAxis: {
          allowDecimals: false,

          title: {
            text: 'No. conversiones',
            style: {
              fontSize: '18px',
            },
          },

          max: data[0]['total_afiliados'],
        },
        legend: {
          enabled: false,
        },
        plotOptions: {
          series: {
            borderWidth: 0,
            dataLabels: {
              enabled: true,
              format: '{point.y:.1f}%',
              style: {
                fontSize: '15px',
              },
            },
            // color: '#576a3d',
          },
        },

        tooltip: {
          headerFormat: '',
          pointFormat: `<h5><b> {point.y}</b> comercios</h5> afiliados por <span style="color:{point.color}"><b>{point.name}</b></span> se ha(n) convertido<br/>`,
        },

        series: [
          {
            name: 'Afiliador',
            data: (function () {
              const arr = []
              for (let i = 0; i < data.length; i++) {
                arr.push([
                  `${data[i].Nombre_Afiliador}`,
                  parseInt(data[i].total_afiliados),
                ])
              }
              return arr
            })(),

            dataLabels: {
              style: {
                fontSize: '15px',
              },
              enabled: true,
              rotation: -90,
              color: '#FFFFFF',
              align: 'right',
              format: '{point.y}', // one decimal
              y: 10, // 10 pixels down from the top
              style: {
                fontSize: '14px',
                fontFamily: 'Verdana, sans-serif',
              },
            },
          },
        ],
      })
    },
  })
}

const total_afiliaciones_actuales = () => {
  fetch(base_url() + 'app/Grafica_jefe/total_afiliaciones_actuales', {
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then((res) => res.json())
    .then((res) => {
      document.getElementById('total_afiliaciones').textContent = res
    })
}

const no_oportunidades_negocio = () => {
  fetch(base_url() + 'app/Grafica_jefe/no_oportunidades_negocio', {
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then((response) => response.json())
    .then((response) => {
      document.getElementById('no_oportunidades_negocio').textContent = response
    })
}
