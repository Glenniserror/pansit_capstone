document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('login-form-container');
    const signupForm = document.getElementById('signup-form-container');
    const loginTab = document.getElementById('login-tab');
    const signupTab = document.getElementById('signup-tab');
    const subText = document.getElementById('sub-text');
    const portalCard = document.getElementById('portal-card');

    loginTab.addEventListener('click', () => {
        loginTab.classList.add('active');
        signupTab.classList.remove('active');
        loginForm.classList.remove('hidden');
        signupForm.classList.add('hidden');
        subText.innerText = "Sign in to your account";
        
        // Logo on LEFT side for login
        portalCard.style.flexDirection = "row";
    });

    signupTab.addEventListener('click', () => {
        signupTab.classList.add('active');
        loginTab.classList.remove('active');
        signupForm.classList.remove('hidden');
        loginForm.classList.add('hidden');
        subText.innerText = "Create your admin account";
        
        // Logo on RIGHT side for signup
        portalCard.style.flexDirection = "row-reverse";
    });

    // Maintain layout on window resize
    window.addEventListener('resize', () => {
        // Restore appropriate direction based on active tab
        if (signupTab.classList.contains('active')) {
            portalCard.style.flexDirection = "row-reverse"; // Logo RIGHT
        } else {
            portalCard.style.flexDirection = "row"; // Logo LEFT
        }
    });
    //para hindi mag auto fill yung unput fields
    window.addEventListener('load', function () {
        document.querySelectorAll('input[type="email"], input[type="password"], input[type="text"]').forEach(function (input) {
            input.value = '';
        });
    });
});