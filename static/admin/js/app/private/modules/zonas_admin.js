jQuery( document ).ready( () => {
  vista_pai()
  userspw()
  afilspw()
  reqpd()
  graf_zonas()
  cps()
} )
function vista_pai() {
  $.ajax( {
    url: `${base_url()}app/Grafica_jefe`,
    dataType: 'json',
    success( obje ) {
      Highcharts.chart( 'container-g23', {
        chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
        },
        title: {
          text: 'Zonas con menos comercios registrados - CANACO por municipio',
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
                name: 'Corregidora',
                y: obje.Corregidora,
              },
              {
                name: 'San Juan del Río',
                y: obje.Sanjuandelrio,
              },
              {
                name: 'El Marqués',
                y: obje.Elmarques,
              },
              {
                name: 'Amealco de Bonfil',
                y: obje.Amealco,
              },
              {
                name: 'Pinal de Amoles',
                y: obje.Pinal,
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
                name: 'Ezequiel Montes',
                y: obje.Ezequiel,
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
                name: 'Landa de Matamoros',
                y: obje.Landa,
              },
              {
                name: 'Pedro Escobedo',
                y: obje.Pedro,
              },
              {
                name: 'Peñamiller',
                y: obje.Penamiller,
              },
              {
                name: 'San Joaquín',
                y: obje.Sanjoaquin,
              },
              {
                name: 'Tequisquiapan',
                y: obje.Tequisquiapan,
              },
              {
                name: 'Tolimán',
                y: obje.Toliman,
              },
            ],
          },
        ],
      } )
    },
  } )
}

Highcharts.chart( 'container-g11', {
  chart: {
    type: 'line',
  },
  title: {
    text: 'Total de transacciones ENLACE - CANACO 2021',
  },
  subtitle: {
    text: 'Enero - Julio',
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
      data: [759, 861, 1023, 1255, 1399, 1007, 944, null, null, null, null, null],
    },
    {
      name: 'Solventadas',
      data: [600, 501, 1000, 800, 899, 400, 304, null, null, null, null, null],
    },
    {
      name: 'Sin solventar',
      data: [100, 260, 0, 400, 400, 300, 40, null, null, null, null, null],
    },
    {
      name: 'Pendientes',
      data: [59, 300, 23, 55, 100, 307, 600, null, null, null, null, null],
    },
    {
      name: 'Calificadas',
      data: [300, 124, 644, 904, 803, 88, 15, null, null, null, null, null],
    },
  ],
} )

function userspw() {
  $.ajax( {
    url: `${base_url()}app/Administrador/userspw`,
    dataType: 'json',
    success( data ) {
      $( '#r1' ).text( data )
    },
  } )
}

function afilspw() {
  $.ajax( {
    url: `${base_url()}app/Administrador/afilspw`,
    dataType: 'json',
    success( data ) {
      $( '#r2' ).text( data )
    },
  } )
}

function reqpd() {
  $.ajax( {
    url: `${base_url()}app/Administrador/reqpd`,
    dataType: 'json',
    success( data ) {
      $( '#r4' ).text( data )
    },
  } )
}
function graf_zonas() {
  $.ajax( {
    url: `${base_url()}app/Grafica_jefe`,
    dataType: 'json',
    success( obje ) {
      Highcharts.chart( 'container-g2', {
        chart: {
          type: 'column',
        },
        title: {
          text: 'Zonas con menos comercios registrados - CANACO',
        },
        subtitle: {
          text: 'Por municipio',
        },
        accessibility: {
          announceNewData: {
            enabled: true,
          },
        },
        xAxis: {
          type: 'category',
        },
        yAxis: {
          title: {
            text: 'Numero de comercios',
          },
        },
        legend: {
          enabled: false,
        },
        plotOptions: {
          series: {
            borderWidth: 0,
            dataLabels: {
              enabled: true,
              format: '{point.y}',
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
            name: 'Municipios',
            colorByPoint: true,
            data: [
              {
                name: 'Querétaro',
                y: obje.Queretaro,
              },
              {
                name: 'Corregidora',
                y: obje.Corregidora,
              },
              {
                name: 'San Juan del Río',
                y: obje.Sanjuandelrio,
              },
              {
                name: 'El Marqués',
                y: obje.Elmarques,
              },
              {
                name: 'Amealco de Bonfil',
                y: obje.Amealco,
              },
              {
                name: 'Pinal de Amoles',
                y: obje.Pinal,
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
                name: 'Ezequiel Montes',
                y: obje.Ezequiel,
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
                name: 'Landa de Matamoros',
                y: obje.Landa,
              },
              {
                name: 'Pedro Escobedo',
                y: obje.Pedro,
              },
              {
                name: 'Peñamiller',
                y: obje.Penamiller,
              },
              {
                name: 'San Joaquín',
                y: obje.Sanjoaquin,
              },
              {
                name: 'Tequisquiapan',
                y: obje.Tequisquiapan,
              },
              {
                name: 'Tolimán',
                y: obje.Toliman,
              },
            ],
          },
        ],
      } )
    },
  } )
}
function cps() {
  $.ajax( {
    url: `${base_url()}app/Grafica_jefe/datos_cp`,
    dataType: 'json',
    success( obje ) {
      const cpss = obje[0]
      const inof = obje[1]
      Highcharts.chart( 'container-g1', {
        chart: {
          type: 'column',
        },
        title: {
          text: 'C.P.s con más comercios',
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
        },
        legend: {
          enabled: false,
        },
        tooltip: {
          pointFormat: 'C.P.s con mas comercios: <b>{point.y}</b>',
        },
        series: [
          {
            name: 'Codigo postal',
            data: ( function () {
              const data = []
              for ( let i = 0; i < cpss.length; i++ ) {
                data.push( [cpss[i].negocio_cp, parseInt( inof[i], 10 )] )
              }
              return data
            }() ),

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
      } )
    },
  } )
}
