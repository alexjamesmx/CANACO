Highcharts.chart( 'container-g1', {
  chart: {
    type: 'column',
  },
  title: {
    text: 'Top 10 Afiliadores',
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
      text: 'Afiliaciones',
    },
  },
  legend: {
    enabled: false,
  },
  tooltip: {
    pointFormat: 'Afiliaciones',
  },
  series: [
    {
      name: 'Population',
      data: [
        ['Juan', 24],
        ['Andres', 20],
        ['Jonathan', 14],
        ['Joseph', 13],
        ['Caesar', 13],
        ['Bruno', 12],
        ['Elizabeth', 12],
        ['Erina', 12],
        ['Karen', 12],
        ['Guadalupe', 11],
      ],
      dataLabels: {
        enabled: true,
        rotation: -90,
        color: '#FFFFFF',
        align: 'right',
        format: '{point.y:.1f}', // one decimal
        y: 10, // 10 pixels down from the top
        style: {
          fontSize: '13px',
          fontFamily: 'Verdana, sans-serif',
        },
      },
    },
  ],
} )

Highcharts.chart( 'container-g2', {
  chart: {
    type: 'line',
  },
  title: {
    text: 'Historico anual de afiliación',
  },
  subtitle: {
    text: '',
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
      text: 'Afiliaciones',
    },
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true,
      },
      enableMouseTracking: false,
    },
  },
  series: [
    {
      name: 'Tokyo',
      data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
    },
  ],
} )

Highcharts.chart( 'container-g4', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie',
  },
  title: {
    text: 'Top 10 búsquedas',
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>',
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
      name: 'Brands',
      colorByPoint: true,
      data: [
        {
          name: 'Agua',
          y: 61.41,
          sliced: true,
          selected: true,
        },
        {
          name: 'Helado',
          y: 11.84,
        },
        {
          name: 'Papas',
          y: 10.85,
        },
        {
          name: 'Computadoras',
          y: 4.67,
        },
        {
          name: 'Vaca',
          y: 4.18,
        },
        {
          name: 'Mole',
          y: 1.64,
        },
        {
          name: 'chivo',
          y: 1.6,
        },
        {
          name: 'Laptop',
          y: 1.2,
        },
        {
          name: 'Maiz',
          y: 1.2,
        },
        {
          name: 'Lechera',
          y: 2.61,
        },
      ],
    },
  ],
} )

const chart = Highcharts.chart( 'container-g3', {
  title: {
    text: 'Top 10 de giros',
  },
  subtitle: {
    text: '',
  },
  xAxis: {
    categories: [
      'Mineria',
      'Construcción',
      'Transportes',
      'Financiero',
      'Industrias manufacteras',
      'Salud',
      'Educativo',
      'Inmobiliaros',
      'Culturales',
      'Agricultura',
    ],
  },
  series: [
    {
      type: 'column',
      colorByPoint: true,
      data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1],
      showInLegend: false,
    },
  ],
} )

document.getElementById( 'plain' ).addEventListener( 'click', () => {
  chart.update( {
    chart: {
      inverted: false,
      polar: false,
    },
    subtitle: {
      text: 'Plain',
    },
  } )
} )

document.getElementById( 'inverted' ).addEventListener( 'click', () => {
  chart.update( {
    chart: {
      inverted: true,
      polar: false,
    },
    subtitle: {
      text: 'Inverted',
    },
  } )
} )

document.getElementById( 'polar' ).addEventListener( 'click', () => {
  chart.update( {
    chart: {
      inverted: false,
      polar: true,
    },
    subtitle: {
      text: 'Polar',
    },
  } )
} )
