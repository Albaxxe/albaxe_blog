document.addEventListener('DOMContentLoaded', () => {
    const messageContainer = document.getElementById('message-container');
    if (messageContainer) {
        setTimeout(() => {
            messageContainer.style.display = 'none';
        }, 5000); // Cache après 5 secondes
    }
});

// Toggle dropdown menu
function toggleDropdown(event) {
    event.preventDefault();
    const dropdown = document.getElementById('dropdownMenu');
    if (dropdown) {
        dropdown.classList.toggle('show');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const userMenu = document.querySelector('.user-menu');
    const dropdown = document.querySelector('.user-menu .dropdown');

    if (userMenu && dropdown) {
        userMenu.addEventListener('click', (event) => {
            event.stopPropagation();
            dropdown.classList.toggle('show');
        });

        document.addEventListener('click', () => {
            dropdown.classList.remove('show');
        });
    }
});
