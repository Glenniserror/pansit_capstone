// Elements
const teacherLoginForm = document.getElementById('login-form-container');
const teacherSignupForm = document.getElementById('signup-form-container');
const teacherLoginTab = document.getElementById('login-tab');
const teacherSignupTab = document.getElementById('signup-tab');
const teacherSubText = document.getElementById('sub-text');
const teacherPortalCard = document.getElementById('portal-card');

// Show Sign Up form
function showSignUp() {
    teacherLoginTab.classList.remove('active');
    teacherSignupTab.classList.add('active');

    teacherLoginForm.classList.add('hidden');
    teacherSignupForm.classList.remove('hidden');

    teacherSubText.innerText = "Create your teacher account";

    // Slide animation
    teacherPortalCard.style.flexDirection = "row-reverse";
}

// Show Login form
function showLogin() {
    teacherSignupTab.classList.remove('active');
    teacherLoginTab.classList.add('active');

    teacherSignupForm.classList.add('hidden');
    teacherLoginForm.classList.remove('hidden');

    teacherSubText.innerText = "Sign in to your account";

    teacherPortalCard.style.flexDirection = "row";
}

// Event listeners
teacherLoginTab.addEventListener('click', showLogin);
teacherSignupTab.addEventListener('click', showSignUp);
