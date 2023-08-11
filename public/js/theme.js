document.addEventListener('DOMContentLoaded', function() {
// Function to toggle the mode
function toggleMode() {
    const body = document.querySelector('body');
    body.classList.toggle('dark-mode');
    body.classList.toggle('light-mode');

    // Store the theme preference in local storage
    const theme = body.classList.contains('dark-mode') ? 'dark' : 'light';
    localStorage.setItem('theme', theme);

    // Update the theme class on the header element
    const header = document.querySelector('.header');
    header.classList.toggle('dark-mode', theme === 'dark');
    header.classList.toggle('light-mode', theme === 'light');

    // Update the theme class on the sidebar element
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('dark-mode', theme === 'dark');
    sidebar.classList.toggle('light-mode', theme === 'light');

    // Update the theme class on the .logos element
    const logos = document.querySelector('.logos');
    logos.classList.toggle('dark-mode', theme === 'dark');
    logos.classList.toggle('light-mode', theme === 'light');

    // Update the theme class on the .black-section element
    const blackSection = document.querySelector('.black-section');
    blackSection.classList.toggle('dark-mode', theme === 'dark');
    blackSection.classList.toggle('light-mode', theme === 'light');
}

// Function to set the initial mode and theme classes
function setInitialToggleState() {
    const body = document.querySelector('body');
    const storedTheme = localStorage.getItem('theme');
    const toggleCheckbox = document.getElementById('modeSwitch');
    const header = document.querySelector('.header');
    const sidebar = document.querySelector('.sidebar');
    const logos = document.querySelector('.logos');
    const black_section = document.querySelector('.black-section');

    if (storedTheme === 'dark') {
        body.classList.add('dark-mode');
        header.classList.add('dark-mode');
        sidebar.classList.add('dark-mode');
        logos.classList.add('dark-mode');
        black_section.classList.add('dark-mode');
        toggleCheckbox.checked = true;
    } else {
        body.classList.remove('dark-mode');
        header.classList.remove('dark-mode');
        sidebar.classList.remove('dark-mode');
        logos.classList.remove('dark-mode');
        black_section.classList.remove('dark-mode');
        body.classList.add('light-mode');
        header.classList.add('light-mode');
        sidebar.classList.add('light-mode');
        logos.classList.add('light-mode');
        black_section.classList.add('light-mode');
        toggleCheckbox.checked = false; // Uncheck the toggle for light mode
    }
}
// Call the function to set the initial toggle state
setInitialToggleState();

// Event listener for the toggle button
document.getElementById('modeSwitch').addEventListener('change', toggleMode);

// Set the initial mode and theme classes when the page loads
window.addEventListener('DOMContentLoaded', setInitialToggleState);
});