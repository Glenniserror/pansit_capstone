const loginForm = document.getElementById('login-form-container');
const signupForm = document.getElementById('signup-form-container');
const loginTab = document.getElementById('login-tab');
const signupTab = document.getElementById('signup-tab');
const subText = document.getElementById('sub-text');
const portalCard = document.getElementById('portal-card');

function showSignUp() {
    // Switch Active Tabs
    loginTab.classList.remove('active');
    signupTab.classList.add('active');
    
    // Switch Form Visibility
    loginForm.classList.add('hidden');
    signupForm.classList.remove('hidden');
    
    // Change Subtitle
    subText.innerText = "Create your student account";

    // Trigger Slide Animation by changing flex direction
    portalCard.style.flexDirection = "row-reverse";
}

function showLogin() {
    signupTab.classList.remove('active');
    loginTab.classList.add('active');
    
    signupForm.classList.add('hidden');
    loginForm.classList.remove('hidden');
    
    subText.innerText = "Sign in to your account?";

    // Revert Slide Animation
    portalCard.style.flexDirection = "row";
}