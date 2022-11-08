Highcharts.chart( 'container-grafic', {
  chart: {
    type: 'column',
  },
  title: {
    text: 'Top 20 Afiliadores',
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

Highcharts.chart( 'container-grafic2', {
  chart: {
    type: 'column',
  },
  title: {
    text: 'Numero de altas en la plataforma',
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
        ['Juan', 36],
        ['Andres', 19],
        ['Jonathan', 39],
        ['Joseph', 54],
        ['Caesar', 56],
        ['Bruno', 43],
        ['Elizabeth', 20],
        ['Erina', 29],
        ['Karen', 59],
        ['Guadalupe', 58],
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

Highcharts.chart( 'container-grafic-conteo-cp', {
  chart: {
    type: 'column',
  },
  title: {
    text: 'Numero de altas en la plataforma',
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
        ['76180', 24],
        ['76149', 20],
        ['76087', 14],
        ['76000', 13],
        ['76010', 13],
        ['76150', 12],
        ['76083', 12],
        ['76154', 12],
        ['76085', 12],
        ['76155', 11],
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
Highcharts.chart( 'container-grafic-conteo-cp2', {
  chart: {
    type: 'column',
  },
  title: {
    text: 'Numero de altas en la plataforma',
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
        ['76180', 24],
        ['76149', 20],
        ['76087', 14],
        ['76000', 13],
        ['76010', 13],
        ['76150', 12],
        ['76083', 12],
        ['76154', 12],
        ['76085', 12],
        ['76155', 11],
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
