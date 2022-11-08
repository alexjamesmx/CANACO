// jQuery(document).ready(($) => {
//   mago();
// })


// function mago(){
//   id = $('#id_usuario').val()
//   $.ajax({
//     url: base_url() + 'app/afiliate/conocer_afiliacion_afil',
//     type: 'post',
//     data: {
//       id: id,
//     },
//     dataType: 'json',
//     success: function (data) {

//       let actual
//       if (data == null) {
//         actual = 0
//       } else if (data[0].estatus == '24') {
//         actual = 1
//       } else if (data[0].estatus == '25') {
//         actual = 4
//       }

//       alert(actual);


//       $('#afiliacionWizard').on('showStep', function (
//         e,
//         anchorObject,
//         stepNumber,
//         stepDirection,
//         stepPosition,
//       ) {
//         if (stepPosition === 'first') {
//           $('#afiliacionWizard .prev-btn').addClass('disabled')
//           $('#afiliacionWizard .finish-btn').hide()
//           $('#afiliacionWizard .next-btn').show()
//         } else if (stepPosition === 'final') {
//           $('#afiliacionWizard .next-btn').hide()
//           $('#afiliacionWizard .finish-btn').show()
//           $('#afiliacionWizard .prev-btn').removeClass('disabled')
//         } else {
//           $('#afiliacionWizard .finish-btn').hide()
//           $('#afiliacionWizard .next-btn').show()
//           $('#afiliacionWizard .prev-btn').removeClass('disabled')
//         }
//       })

//       $('#afiliacionWizard').smartWizard({
//         selected: 0,
//         theme: 'check',
//         transitionEffect: 'fade',
//         showStepURLhash: false,
//         toolbarSettings: {
//           toolbarPosition: 'none',
//         },
//       })

//       $('#afiliacionWizard').on('leaveStep', function (
//         e,
//         anchorObject,
//         stepNumber,
//         stepDirection,
//       ) {
//         var elmForm = $('#form-step-' + stepNumber)
//         if (stepDirection === 'forward' && elmForm) {
//           return checkWizardValidation(elmForm)
//         }
//       })

//       $('#afiliacionWizard .prev-btn').on('click', function () {
//         $('#afiliacionWizard').smartWizard('prev')
//         return true
//       })
//       $('#afiliacionWizard .next-btn').on('click', function () {
//         $('#afiliacionWizard').smartWizard('next')
//         return true
//       })
//       $('#afiliacionWizard .finish-btn').on('click', function (event) {
//         if (checkWizardValidation($('#afiliacionWizard #form-step-1'))) {

//           return false
//         }
//         return true
//       })
//       function checkWizardValidation(form) {
//         if ($().validate) {
//           if ($(form).valid()) {
//             return true
//           } else {
//             return false
//           }
//         } else {
//           return false
//         }
//       }
//     },
//   })
// }
