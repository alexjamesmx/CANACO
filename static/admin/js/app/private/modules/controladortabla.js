// $( document ).ready( () => {
//   get_top()
//   $( '#data_tables' ).DataTable( {
//     language: {
//       url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
//     },
//   } )

//   $( '#misrequerimientos' ).DataTable( {
//     language: {
//       url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
//     },
//   } )

//   $( '#controls-data-tables-pagination' ).DataTable( {
//     language: {
//       url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
//     },
//   } )

//   $( '#data_seguimiento' ).DataTable( {
//     language: {
//       url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
//     },
//   } )

//   $( '#cotrolsconta1' ).DataTable( {
//     language: {
//       url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
//     },
//   } )

//   $( '#cotrolsconta2' ).DataTable( {
//     language: {
//       url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
//     },
//   } )
// } )

// function get_top() {
//   $.ajax( {
//     url: `${base_url()}app/Jefe_afiliador/toptenaltas`,
//     dataType: 'json',
//     success( data ) {
//       Highcharts.chart( 'containerg4', {
//         chart: {
//           type: 'column',
//         },
//         title: {
//           text: 'Top 10 altas de comercios',
//         },
//         subtitle: {
//           text: '',
//         },
//         accessibility: {
//           announceNewData: {
//             enabled: true,
//           },
//         },
//         xAxis: {
//           type: 'category',
//         },
//         yAxis: {
//           title: {
//             text: 'Usuarios afiliados',
//           },
//         },
//         legend: {
//           enabled: false,
//         },
//         plotOptions: {
//           series: {
//             borderWidth: 0,
//             dataLabels: {
//               enabled: true,
//               format: '{point.y:.1f}%',
//             },
//           },
//         },

//         tooltip: {
//           headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
//           pointFormat:
//             '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>',
//         },

//         series: [
//           {
//             name: 'Codigo postal',
//             data: ( function () {
//               const dat = []
//               for ( let i = 0; i < data.length; i++ ) {
//                 dat.push( [
//                   `${data[i].nombre} ${data[i].apellido1} ${data[i].apellido2}`,
//                   parseInt( data[i].afilie ),
//                 ] )
//               }
//               // console.log('true',data);
//               return dat
//             }() ),

//             dataLabels: {
//               enabled: true,
//               rotation: -90,
//               color: '#FFFFFF',
//               align: 'right',
//               format: '{point.y}', // one decimal
//               y: 10, // 10 pixels down from the top
//               style: {
//                 fontSize: '13px',
//                 fontFamily: 'Verdana, sans-serif',
//               },
//             },
//           },
//         ],
//       } )
//     },
//   } )
// }
