const chart = Highcharts.chart( 'afilmenc', {
  title: {
    text: 'Afiliaciones mensuales',
  },
  subtitle: {
    text: 'Consejeros',
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
  series: [
    {
      type: 'column',
      colorByPoint: true,
      data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
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
      text: 'Consejeros',
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
      text: 'Consejeros',
    },
  } )
} )
