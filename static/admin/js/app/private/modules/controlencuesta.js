$( document ).ready( () => {
  // SmartWizard initialize
  $( '#afiliacionWizard' ).on(
    'showStep',
    ( e, anchorObject, stepNumber, stepDirection, stepPosition ) => {
      if ( stepPosition === 'first' ) {
        $( '#afiliacionWizard .prev-btn' ).addClass( 'disabled' )
        $( '#afiliacionWizard .finish-btn' ).hide()
        $( '#afiliacionWizard .next-btn' ).show()
      } else if ( stepPosition === 'final' ) {
        $( '#afiliacionWizard .next-btn' ).hide()
        $( '#afiliacionWizard .finish-btn' ).show()
        $( '#afiliacionWizard .prev-btn' ).removeClass( 'disabled' )
      } else {
        $( '#afiliacionWizard .finish-btn' ).hide()
        $( '#afiliacionWizard .next-btn' ).show()
        $( '#afiliacionWizard .prev-btn' ).removeClass( 'disabled' )
      }
    },
  )

  $( '#afiliacionWizard' ).smartWizard( {
    selected: 1,
    theme: 'check',
    transitionEffect: 'fade',
    showStepURLhash: false,
    toolbarSettings: {
      toolbarPosition: 'none',
    },
  } )

  $( '#afiliacionWizard' ).on( 'leaveStep', ( e, anchorObject, stepNumber, stepDirection ) => {
    const elmForm = $( `#form-step-${stepNumber}` )
    if ( stepDirection === 'forward' && elmForm ) {
      return checkWizardValidation( elmForm )
    }
  } )

  $( '#afiliacionWizard .prev-btn' ).on( 'click', () => {
    $( '#afiliacionWizard' ).smartWizard( 'prev' )
    return true
  } )
  $( '#afiliacionWizard .next-btn' ).on( 'click', () => {
    $( '#afiliacionWizard' ).smartWizard( 'next' )
    return true
  } )
  $( '#afiliacionWizard .finish-btn' ).on( 'click', () => {
    if ( checkWizardValidation( $( '#afiliacionWizard #form-step-1' ) ) ) {
      return false
    }
    return true
  } )
  function checkWizardValidation( form ) {
    if ( $().validate ) {
      if ( $( form ).valid() ) {
        return true
      }
      return false
    }
    return false
  }
} )
function validarencuesta() {
  let inputavalue = 0

  for ( let index = 0; index < 5; index++ ) {
    if ( document.getElementById( `a${index + 1}` ).checked ) {
      inputavalue = document.getElementById( `a${index + 1}` ).value
    }
  }
  console.log( 'inputavalue', inputavalue )
}
