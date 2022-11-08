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
jQuery(document).ready(() => {
  vista_pai()
  cps()
  count_converciones()
  getnomatchs()
  get_misregs_hoy()
  get_top_conversiones()
  marq()
  get_reportes()
  get_tractoras_mayor_requerimientos()
  negocios_registros_completos()
  metrica_registro_comparaciones()
  build_initial_chart_regitros_comparaciones()
  meses()
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
          text: 'Comercios por MUNICIPIO',
        },
        subtitle: {
          text: 'Total comercios: ' + obje.All,
        },
        tooltip: {
          pointFormat: '{series.name}: <b>{point.y:1f}</b>',
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
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.1f} %',
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

function cps() {
  $.ajax({
    url: `${base_url()}app/Grafica_jefe/datos_cp`,
    dataType: 'json',
    success({ allCp }) {
      Highcharts.chart('container-g1', {
        chart: {
          type: 'column',
        },
        title: {
          text: 'C.Ps MAYOR comercios',
          style: {
            fontSize: '30px',
          },
        },
        subtitle: {
          text: '',
        },
        xAxis: {
          type: 'category',
          labels: {
            rotation: -45,
            style: {
              fontSize: '13px',
              fontFamily: 'Verdana, sans-serif',
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
          min: 0,
          title: {
            text: 'Population (millions)',
            style: {
              fontSize: '18px',
            },
          },
          max: allCp[0]['total'],
        },
        legend: {
          enabled: false,
        },
        tooltip: {
          pointFormat: 'c.p con: <b>{point.y}</b> comercios',
        },
        series: [
          {
            name: 'Codigo postal',
            data: (function () {
              const data = []
              for (let i = 0; i < allCp.length; i++) {
                data.push([allCp[i].negocio_cp, parseInt(allCp[i].total)])
              }
              return data
            })(),

            dataLabels: {
              enabled: true,
              rotation: -90,
              color: '#FFFFFF',
              align: 'right',
              format: '{point.y}', // one decimal
              y: 10, // 10 pixels down from the top
              style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif',
              },
            },
          },
        ],
      })
    },
  })
}

function count_converciones() {
  $.ajax({
    url: `${base_url()}app/Afiliador/count_converciones`,
    dataType: 'json',
    success(data) {
      const monthArr = [
        '0',
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

      //SI NO HAY DATOS ENTONCES LOS SACAMOS ESTATICOS
      if (data['year'] && data['month']) {
        $('#conversiones').text(0)
        document.getElementById('periodo_corte').textContent =
          data.periodo_corte +
          ' (' +
          monthArr[data.month] +
          '/' +
          data.year +
          ')'
      } else {
        //SI HAY DATOS ENTONCES
        $('#conversiones').text(data.cuantos[1])
        document.getElementById('periodo_corte').textContent =
          data.periodo_corte[0]['fecha'] +
          ' (' +
          monthArr[data.cuantos[0][0]['month']] +
          '/' +
          data.cuantos[0][0]['year'] +
          ')'
      }
    },
    error: () => {
      toastr.error('Ocurrió un error, por favor vuelva a intentarlo')
    },
    complete() {
      //   btnCancel.removeAttr('disabled');
    },
  })
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

function get_misregs_hoy() {
  $.ajax({
    url: `${base_url()}app/Jefe_afiliador/getMisregs`,
    dataType: 'json',
    success(data) {
      console.log(data)
      document.getElementById('regs_totales').textContent = data['totales']
      document.getElementById('misregs_comercios').textContent =
        data['comercios']
      document.getElementById('misregs_tractoras').textContent =
        data['tractoras']
    },
  })
}

function marq() {
  $.ajax({
    url: `${base_url()}app/requirements/lista_nomatch`,
    dataType: 'json',
    success(data) {
      if (data) {
        data.forEach((minidato) => {
          let contenido = ''
          contenido += '<li class="list-inline-item px-2 mb-0">'
          contenido += `<span class="text-primary"><b>${minidato.keyword}</b></span>`
          contenido += '</li>'
          $('#barraNomatch').append(contenido)
        })
      }
    },
  })
}
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

      Highcharts.chart('container-negocios-sinafiliar', {
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

      Highcharts.chart('container-negocios-afiliados', {
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

const negocios_registros_completos = () => {
  const options = {
    method: 'GET',
  }

  fetch(
    base_url() + 'app/Afiliador_reportes/negocios_registros_completos',
    options
  )
    .then((response) => response.json())
    .then(({ completos, incompletos }) => {
      document.getElementById('comercios-registros-completos').innerText =
        completos

      document.getElementById('comercios-registros-incompletos').innerText =
        incompletos
    })
    .catch((err) => console.error(err))
}
const get_top_conversiones = () => {
  $.ajax({
    url: `${base_url()}app/Jefe_afiliador/topconvers`,
    dataType: 'json',
    success(data) {
      console.log(data)
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
          text: '(más comercios convertidos)',
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
          max: data.length > 0 ? data[0]['total_afiliados']  : 0,
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

const get_tractoras_mayor_requerimientos = () => {
  $.ajax({
    url: `${base_url()}app/Jefe_afiliador/tractoras_con_mas_requerimientos`,
    dataType: 'json',
    success(data) {
      console.log(data)

      Highcharts.chart('container-tractoras-mayor-requerimientos', {
        chart: {
          type: 'column',
        },
        title: {
          text: '10 TRACTORAS con más requerimientos',
        },
        subtitle: {},
        accessibility: {
          announceNewData: {
            enabled: true,
          },
        },
        xAxis: {
          type: 'category',
          max: 9,
          title: {
            text: 'Tractoras',
          },
        },
        yAxis: {
          allowDecimals: false,

          title: {
            text: 'No. requerimientos',
          },
          max: data ? data[0]['requerimientos'] : 0,
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
            },
            color: '#FFC300',
          },
        },

        tooltip: {
          headerFormat: '<span style="font-size:11px">{point.name}</span><br>',
          pointFormat: `<h4><b>{point.name}</b> </h4><h5>No. requerimientos: <b> {point.y} </b>`,
        },

        series: [
          {
            name: 'Tractora',
            data: (function () {
              const arr = []
              if (data) {
                for (let i = 0; i < data.length; i++) {
                  arr.push([
                    `${data[i].negocio_nombre}`,
                    parseInt(data[i].requerimientos),
                  ])
                }
              } else {
                arr.push(['', 0])
              }
              return arr
            })(),

            dataLabels: {
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
        '<b><h1>No. ALTA de negocios por semanas(' +
        new Date().getFullYear() +
        ')</h1></b>',
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

const total_afiliaciones_actuales = () => {
  fetch(base_url() + 'app/Grafica_jefe/total_afiliaciones_actuales', {
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then((res) => res.json())
    .then((res) => {
      console.log(res)
      document.getElementById('total_afiliaciones').textContent = res
    })
}

function meses() {
  const fecha = new Date()
  const year = fecha.getFullYear()
  $.ajax({
    url: `${base_url()}app/Grafica_jefe/graficaMes`,
    dataType: 'json',
    success(obje) {
      console.log(obje)
      Highcharts.chart({
        chart: {
          renderTo: 'container-transacciones',
          type: 'line',
        },
        title: {
          text: `Total de transacciones ENLACE - CANACO ${year}`,
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
