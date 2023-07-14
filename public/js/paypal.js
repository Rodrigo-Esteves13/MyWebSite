// Store the reference to the PayPal window
var paypalWindow = null;

// Function to handle the popup form submission
function handlePopupSubmit() {
  var coffeeOption = document.querySelector('input[name="coffeeOption"]:checked').value;

  if (coffeeOption === 'custom') {
    var customAmount = document.getElementById('customAmount').value;
    console.log('Custom amount:', customAmount);
  } else if (coffeeOption === 'none') {
    console.log('No coffee selected');
    closePopup();
    return;
  } else {
    console.log('Coffee amount:', coffeeOption);
  }

  openPayPal(coffeeOption);
}

// Function to close the popup
function closePopup() {
  document.getElementById('popup').style.display = 'none';
}

// Add event listener to the form submission
document.querySelector('.popup-content form').addEventListener('submit', function (event) {
  event.preventDefault();
  handlePopupSubmit();
});

function openPayPal(amount) {
    if (amount === 'custom') {
        amount = document.getElementById('customAmount').value;
      }  
  var paypalURL = 'https://www.paypal.com/paypalme/rodrigo13esteves/' + encodeURIComponent(amount);
  
  // Check if the PayPal window is already open
  if (paypalWindow && !paypalWindow.closed) {
    // If it's open, navigate the existing window to the new URL
    paypalWindow.location.href = paypalURL;
  } else {
    // If it's not open, open a new window and store the reference
    paypalWindow = window.open(paypalURL, '_blank');
  }
}
