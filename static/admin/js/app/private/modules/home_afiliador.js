jQuery(document).ready(($) => {
  vista_pai()
  cps()
  count_converciones()
  marq()
  get_top()
  negocios_registros_completos()
})

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
      } else {
        $('#barraNomatch').remove()
      }
    },
  })
}
function count_converciones() {
  $.ajax({
    url: `${base_url()}app/Afiliador/count_converciones`,
    dataType: 'json',
    success(data) {
      console.log(data)
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
        },
        yAxis: {
          min: 0,
          title: {
            text: 'Population (millions)',
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

function get_top() {
  $.ajax({
    url: `${base_url()}app/Jefe_afiliador/toptenaltas`,
    dataType: 'json',
    success(data) {
      console.log('TOP ', data.length - 1)
      Highcharts.chart('containerg4', {
        chart: {
          type: 'column',
        },
        title: {
          text: 'Top 10 AFILIADORES',
        },
        subtitle: {
          text: '',
        },
        accessibility: {
          announceNewData: {
            enabled: true,
          },
        },
        xAxis: {
          type: 'category',
          max: data.length - 1,
        },
        yAxis: {
          title: {
            text: 'Comercios afiliados',
          },
          max: data[0]['afilie'],
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
          },
        },

        tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat:
            '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>',
        },

        series: [
          {
            name: 'Afiliaciones',
            data: (function () {
              const arr = []
              for (let i = 0; i < data.length; i++) {
                arr.push([
                  `${data[i].nombre} ${data[i].apellido1} ${data[i].apellido2}`,
                  parseInt(data[i].afilie),
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
