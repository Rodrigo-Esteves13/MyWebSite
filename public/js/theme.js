// Function to toggle the mode
function toggleMode() {
    const body = document.querySelector('body');
    body.classList.toggle('dark-mode');
    body.classList.toggle('light-mode');

    // Store the theme preference in local storage
    const theme = body.classList.contains('dark-mode') ? 'dark' : 'light';
    localStorage.setItem('theme', theme);
}

// Function to set the initial mode as stored in local storage
// Function to set the initial state of the toggle based on the stored theme
function setInitialToggleState() {
    const body = document.querySelector('body');
    const storedTheme = localStorage.getItem('theme');
    const toggleCheckbox = document.getElementById('modeSwitch');

    if (storedTheme === 'dark') {
        body.classList.add('dark-mode');
        toggleCheckbox.checked = true; // Check the toggle for dark mode
    } else {
        body.classList.remove('dark-mode');
        toggleCheckbox.checked = false; // Uncheck the toggle for light mode
    }
}

// Call the function to set the initial toggle state
setInitialToggleState();

// Rest of your toggle logic...


// Event listener for the toggle button
document.getElementById('modeSwitch').addEventListener('change', toggleMode);

// Set the initial mode when the page loads
window.addEventListener('DOMContentLoaded', setInitialMode); // Changed from 'load'
