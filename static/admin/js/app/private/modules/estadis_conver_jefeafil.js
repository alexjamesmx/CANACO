Highcharts.chart( 'container', {
  title: {
    text: 'Conversiones',
  },

  subtitle: {
    text: '',
  },

  yAxis: {
    title: {
      text: 'Número de Conversiones',
    },
  },

  xAxis: {
    accessibility: {
      rangeDescription: '',
    },
  },

  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle',
  },

  plotOptions: {
    series: {
      label: {
        connectorAllowed: false,
      },
      pointStart: 2010,
    },
  },

  series: [
    {
      name: 'Afiliaciones',
      data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175],
    },
  ],

  responsive: {
    rules: [
      {
        condition: {
          maxWidth: 500,
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom',
          },
        },
      },
    ],
  },
} )
