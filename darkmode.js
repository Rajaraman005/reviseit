// Check the current theme preference from localStorage
let darkmode = localStorage.getItem('darkmode');
const themeswitch = document.getElementById('theme-switch');

// Enable Dark Mode
const enableDarkmode = () => {
    document.body.classList.add('darkmode');
    localStorage.setItem('darkmode', 'active');
};

// Disable Dark Mode
const disabledarkmode = () => {
    document.body.classList.remove('darkmode');
    localStorage.setItem('darkmode', null);
};

// Apply Dark Mode if the user previously selected it
if (darkmode === "active") enableDarkmode();

// Toggle Dark Mode when the button is clicked
themeswitch.addEventListener("click", () => {
    if (darkmode !== "active") {
        enableDarkmode();
    } else {
        disabledarkmode();
    }
});
