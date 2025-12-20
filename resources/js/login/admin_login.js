// Elements
const adminLoginForm = document.getElementById('login-form-container');
const adminSignupForm = document.getElementById('signup-form-container');
const adminLoginTab = document.getElementById('login-tab');
const adminSignupTab = document.getElementById('signup-tab');
const adminSubText = document.getElementById('sub-text');
const adminPortalCard = document.getElementById('portal-card');

// Show Sign Up form
function showSignUp() {
    adminLoginTab.classList.remove('active');
    adminSignupTab.classList.add('active');

    adminLoginForm.classList.add('hidden');
    adminSignupForm.classList.remove('hidden');

    adminSubText.innerText = "Create your admin account";

    // Slide animation
    adminPortalCard.style.flexDirection = "row-reverse";
}

// Show Login form
function showLogin() {
    adminSignupTab.classList.remove('active');
    adminLoginTab.classList.add('active');

    adminSignupForm.classList.add('hidden');
    adminLoginForm.classList.remove('hidden');

    adminSubText.innerText = "Sign in to your account";

    adminPortalCard.style.flexDirection = "row";
}

// Event listeners
adminLoginTab.addEventListener('click', showLogin);
adminSignupTab.addEventListener('click', showSignUp);
