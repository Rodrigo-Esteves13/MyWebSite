// Check if the popup has already been displayed
if (!localStorage.getItem('popupDisplayed')) {
  // Check if the user has clicked on the header option
  var headerOptionClicked = false;

  // Add an event listener to the header option
  document.querySelector('.buy-coffee').addEventListener('click', function() {
    headerOptionClicked = true;
  });

  // Add an event listener to the window load event
  window.addEventListener('load', function () {
    // Show the popup if it's the first visit or header option is clicked
    if (!localStorage.getItem('popupDisplayed') || headerOptionClicked) {
      document.getElementById('popup').style.display = 'block';
    }
  });
}

// Function to handle the popup form submission
function handlePopupSubmit() {
  // Get the selected coffee option
  var coffeeOption = document.querySelector('input[name="coffeeOption"]:checked').value;

  // Process the selected option (e.g., send a request, display a message)
  if (coffeeOption === 'custom') {
    var customAmount = document.getElementById('customAmount').value;
    console.log('Custom amount:', customAmount);
  } else if (coffeeOption === 'none') {
    console.log('No coffee selected');
  } else {
    console.log('Coffee amount:', coffeeOption);
  }

  // Hide the popup
  document.getElementById('popup').style.display = 'none';

  // Set a flag to indicate that the popup has been displayed
  localStorage.setItem('popupDisplayed', true);
}

// Function to validate the custom amount input
function isValidAmount(amount) {
  // Check if the input is a valid number
  if (!isNaN(amount)) {
    // Check if the input has at most 2 decimal places
    if (/^\d+(\.\d{1,2})?$/.test(amount)) {
      return true;
    }
  }
  return false;
}

// Show the popup after a timeout (adjust the delay as needed)
setTimeout(function () {
  if (!localStorage.getItem('popupDisplayed')) {
    document.getElementById('popup').style.display = 'block';
  }
}, 500);

function formatAmountInput(input) {
  var inputValue = input.value;
  var numberValue = parseFloat(inputValue.replace(/[^0-9]/g, ''));
  var formattedValue = (numberValue / 100).toFixed(2);

  if (isNaN(numberValue)) {
    input.value = '0.00';
  } else {
    input.value = formattedValue;
  }
}

document.addEventListener('DOMContentLoaded', function() {
  var input = "";

  $("#customAmount").keydown(function(e) {
    if (e.keyCode == 8 && input.length > 0) {
      input = input.slice(0, input.length - 1);
      $(this).val(formatNumber(input));
    } else {
      var key = getKeyValue(e.keyCode);
      if (key) {
        input += key;
        $(this).val(formatNumber(input));
      }
    }
    return false;
  });

  function getKeyValue(keyCode) {
    if (keyCode > 57) {
      keyCode -= 48;
    }
    if (keyCode >= 48 && keyCode <= 57) {
      return String.fromCharCode(keyCode);
    }
  }

  function formatNumber(input) {
    if (isNaN(parseFloat(input))) {
      return "0.00";
    }
    var num = parseFloat(input);
    return (num / 100).toFixed(2);
  }
});


window.addEventListener('DOMContentLoaded', function () {
  var buyCoffeeLink = document.querySelector('.buy-coffee');
  buyCoffeeLink.addEventListener('click', function (event) {
      event.preventDefault();
      document.getElementById('popup').style.display = 'block';
  });
});