const foregroundColor = 'white'
const primaryColor = '#3a3a3a'
const separatorColor = '#d7d7d7'
const themeColor1 = '#145388'
const months = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
let data_chart = null

jQuery( document ).ready( ( $ ) => {
  const chartTooltip = {
    backgroundColor: foregroundColor,
    titleFontColor: primaryColor,
    borderColor: separatorColor,
    borderWidth: 0.5,
    bodyFontColor: primaryColor,
    bodySpacing: 10,
    xPadding: 15,
    yPadding: 15,
    cornerRadius: 0.15,
    displayColors: false,
  }

  data_chart = get_data_chart_client()

  const salesChart = document.getElementById( 'clientsChart' ).getContext( '2d' )
  const myChart = new Chart( salesChart, {
    type: 'LineWithShadow',
    options: {
      plugins: {
        datalabels: {
          display: false,
        },
      },
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        yAxes: [
          {
            gridLines: {
              display: true,
              lineWidth: 1,
              color: 'rgba(0,0,0,0.1)',
              drawBorder: false,
            },
            ticks: {
              beginAtZero: true,
              stepSize: 5,
              min: 50,
              max: 70,
              padding: 20,
            },
          },
        ],
        xAxes: [
          {
            gridLines: {
              display: false,
            },
          },
        ],
      },
      legend: {
        display: false,
      },
      tooltips: chartTooltip,
    },
    data: {
      labels: months,
      datasets: [
        {
          label: '',
          data: data_chart,
          borderColor: themeColor1,
          pointBackgroundColor: foregroundColor,
          pointBorderColor: themeColor1,
          pointHoverBackgroundColor: themeColor1,
          pointHoverBorderColor: foregroundColor,
          pointRadius: 6,
          pointBorderWidth: 2,
          pointHoverRadius: 8,
          fill: false,
        },
      ],
    },
  } )
} )

async function get_data_chart_client() {
  await $.ajax( {
    url: base_url( 'app/home/getdata_chart_client' ),
    type: 'post',
    dataType: 'json',
    data: null,
    success( json ) {
      return json.chart_data_client
    },
    error() {
      return 'ERROR'
    },
  } )
}
