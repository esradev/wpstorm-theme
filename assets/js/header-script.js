const submenuToggles = document.querySelectorAll('.submenu-toggle');
submenuToggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
        const submenuContent = toggle.nextElementSibling;
        submenuContent.classList.toggle('hidden');
    });
});

const mobileMenuCloseButton = document.getElementById('mobile-menu-close-button');
const mobileMenuOpenButton = document.getElementById('mobile-menu-open-button');
const mobileMenu = document.getElementById('mobile-menu-div');

if (mobileMenuCloseButton && mobileMenu) {
    mobileMenuCloseButton.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
    });
}
if (mobileMenuOpenButton && mobileMenu) {
    mobileMenuOpenButton.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
    })
}

const userProfileActionsToggle = document.getElementById('user-profile-actions-toggle');
const userProfileActionsDiv = document.getElementById('user-profile-actions-div');

if (userProfileActionsDiv && userProfileActionsToggle) {
    userProfileActionsToggle.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent the link's default behavior
        userProfileActionsDiv.classList.toggle('hidden');
    });
}