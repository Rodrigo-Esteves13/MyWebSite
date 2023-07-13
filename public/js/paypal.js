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
    var paypalURL = 'https://www.paypal.com/paypalme/rodrigo13esteves/' + encodeURIComponent(amount);
    window.open(paypalURL, '_blank');
}


