document.addEventListener('DOMContentLoaded', function() {
    // Function to toggle the mode
    function toggleMode(theme) {
        const body = document.body;
        body.classList.remove('dark-mode', 'light-mode');
        body.classList.add(theme + '-mode');

        // Store the theme preference in local storage
        localStorage.setItem('theme', theme);

        // Update theme classes for various elements
        const selectorsToUpdate = [
            '.header', '.sidebar', '.logos', '.logos.linkedin', '.logo-text', '.buyCoffee', '.black-section', '.fa-coffee', '.profile-info', '.app-name', '.app-name.linkedin', '.auth-links a', '.sidebar-item', '.auth-links', '.dropdown-toggle', '.modal-content', '.profile-dropdown', '.profile-table'
        ];

        selectorsToUpdate.forEach(selector => {
            const element = document.querySelector(selector);
            if (element) {
                element.classList.remove('dark-mode', 'light-mode');
                element.classList.add(theme + '-mode');
            }
        });
    }

    // Function to set the initial mode and theme classes
    function setInitialToggleState() {
        const body = document.body;
        const storedTheme = localStorage.getItem('theme');
        const toggleCheckbox = document.getElementById('modeSwitch');

        if (storedTheme === 'dark') {
            toggleMode('dark');
            toggleCheckbox.checked = true;
        } else {
            toggleMode('light');
            toggleCheckbox.checked = false; // Uncheck the toggle for light mode
        }
    }

    // Call the function to set the initial toggle state
    setInitialToggleState();

    // Event listener for the toggle button
    document.getElementById('modeSwitch').addEventListener('change', function() {
        toggleMode(this.checked ? 'dark' : 'light');
    });

    // Set the initial mode and theme classes when the page loads
    window.addEventListener('DOMContentLoaded', setInitialToggleState);
});
