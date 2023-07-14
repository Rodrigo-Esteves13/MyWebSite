<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R.ME</title>
</head>
<body>
<script src="{{ asset('js/popup.js') }}"></script>
    <!-- Popup HTML code -->
    <div id="popup" class="popup">
            <div class="popup-content">
                <h2>Buy me a coffee</h2>
                <p>Support my work by buying me a coffee. Choose an amount:</p>
                <form onsubmit="event.preventDefault(); handlePopupSubmit();">
                    <label><input type="radio" name="coffeeOption" value="1"> 1€</label><br>
                    <label><input type="radio" name="coffeeOption" value="2"> 2€</label><br>
                    <label><input type="radio" name="coffeeOption" value="5"> 5€</label><br>
                    <label><input type="radio" name="coffeeOption" value="10"> 10€</label><br>
                    <label>
                        <input type="radio" name="coffeeOption" value="custom">
                        Custom amount:
                        <input type="text" id="customAmount" placeholder="Enter amount" oninput="formatAmountInput(this)">
                    </label><br>
                    <label>
                        <input type="radio" name="coffeeOption" value="none">
                        I don't want to support
                    </label><br>
                    <button type="submit">Submit</button><br><br>
                    <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/pp-acceptance-medium.png" alt="PayPal">
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/paypal.js') }}"></script>
</body>
</html>
