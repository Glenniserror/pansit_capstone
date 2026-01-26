const bubble = document.getElementById('ai-bubble');
        const chatWindow = document.getElementById('ai-chat-window');
        const closeChat = document.getElementById('close-chat');
        const startChatBtn = document.getElementById('start-chat-btn');
        const sendBtn = document.getElementById('ai-send-btn');
        const input = document.getElementById('ai-input');
        const chatContent = document.getElementById('chat-content');

        function openChat() {
            chatWindow.classList.add('open');
            bubble.style.display = 'none';
        }

        function closeWindow() {
            chatWindow.classList.remove('open');
            bubble.style.display = 'flex';
        }

        function sendMessage() {
            const text = input.value.trim();
            if (!text) return;

            const userMsg = document.createElement('div');
            userMsg.className = 'msg user';
            userMsg.textContent = text;
            chatContent.appendChild(userMsg);

            input.value = '';
            chatContent.scrollTop = chatContent.scrollHeight;

            setTimeout(() => {
                const botMsg = document.createElement('div');
                botMsg.className = 'msg bot';
                botMsg.textContent = 'I can help you with that math problem!';
                chatContent.appendChild(botMsg);
                chatContent.scrollTop = chatContent.scrollHeight;
            }, 1000);
        }

        bubble.addEventListener('click', openChat);
        startChatBtn.addEventListener('click', openChat);
        closeChat.addEventListener('click', closeWindow);
        sendBtn.addEventListener('click', sendMessage);
        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });

// Success Alert
function showSuccessAlert() {
    Swal.fire({
        icon: 'success',
        title: 'Great Job!',
        text: 'You have completed the quiz successfully!',
        confirmButtonColor: '#11998e',
        confirmButtonText: 'Continue Learning'
    });
}

// Error Alert
function showErrorAlert() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong! Please try again.',
        confirmButtonColor: '#eb3349',
        footer: '<a href="#">Need help? Contact support</a>'
    });
}

// Warning Alert
function showWarningAlert() {
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        confirmButtonColor: '#f5576c',
        showCancelButton: true,
        cancelButtonColor: '#6c757d'
    });
}

// Info Alert
function showInfoAlert() {
    Swal.fire({
        icon: 'info',
        title: 'Did you know?',
        text: 'The Pythagorean theorem is one of the most famous mathematical formulas!',
        confirmButtonColor: '#4facfe'
    });
}

// Question Alert
function showQuestionAlert() {
    Swal.fire({
        icon: 'question',
        title: 'Need Help?',
        text: 'Would you like to start a chat with our AI assistant?',
        showCancelButton: true,
        confirmButtonText: 'Yes, start chat',
        cancelButtonText: 'Maybe later',
        confirmButtonColor: '#667eea'
    });
}

// Custom Alert with HTML
function showCustomAlert() {
    Swal.fire({
        title: '<strong>HTML Content</strong>',
        icon: 'info',
        html: `
            <p>You can use <b>bold text</b>, <i>italics</i>, and even <u>underlines</u>!</p>
            <p style="color: #667eea;">And custom colors too!</p>
        `,
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#fa709a'
    });
}

// Progress Update Alert
function showProgressAlert() {
    Swal.fire({
        title: 'Module Progress',
        html: `
            <div style="text-align: left; margin: 20px 0;">
                <p style="margin: 10px 0;"><strong>Sequences and Series:</strong> 100%</p>
                <div style="background: #e0e0e0; border-radius: 10px; height: 8px;">
                    <div style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); width: 100%; height: 100%; border-radius: 10px;"></div>
                </div>
                
                <p style="margin: 20px 0 10px 0;"><strong>Polynomials:</strong> 45%</p>
                <div style="background: #e0e0e0; border-radius: 10px; height: 8px;">
                    <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); width: 45%; height: 100%; border-radius: 10px;"></div>
                </div>
            </div>
        `,
        icon: 'success',
        confirmButtonText: 'Keep Going!',
        confirmButtonColor: '#667eea'
    });
}

// Quiz Complete Alert
function showQuizComplete() {
    Swal.fire({
        title: 'Quiz Completed! 🎉',
        html: `
            <div style="font-size: 48px; margin: 20px 0;">85%</div>
            <p><strong>Excellent work!</strong></p>
            <p>You answered 17 out of 20 questions correctly.</p>
        `,
        icon: 'success',
        confirmButtonText: 'View Results',
        confirmButtonColor: '#11998e',
        showCancelButton: true,
        cancelButtonText: 'Next Quiz'
    });
}

// Confirm Delete Alert
function showConfirmDelete() {
    Swal.fire({
        title: 'Delete Progress?',
        text: "This will reset your progress in this module. This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#eb3349',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleted!',
                text: 'Your progress has been reset.',
                icon: 'success',
                confirmButtonColor: '#11998e'
            });
        }
    });
}

// Input Alert
function showInputAlert() {
    Swal.fire({
        title: 'Set Your Goal',
        input: 'number',
        inputLabel: 'How many quizzes do you want to complete this week?',
        inputPlaceholder: 'Enter a number',
        showCancelButton: true,
        confirmButtonColor: '#667eea',
        inputValidator: (value) => {
            if (!value) {
                return 'You need to enter a number!';
            }
            if (value < 1) {
                return 'Please enter at least 1 quiz!';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Goal Set!',
                text: `You've set a goal to complete ${result.value} quizzes this week!`,
                icon: 'success',
                confirmButtonColor: '#11998e'
            });
        }
    });
}

// Auto-close Timer Alert
function showTimerAlert() {
    let timerInterval;
    Swal.fire({
        title: 'Session Timeout',
        html: 'You will be logged out in <b></b> seconds.',
        timer: 5000,
        timerProgressBar: true,
        confirmButtonColor: '#667eea',
        didOpen: () => {
            const b = Swal.getHtmlContainer().querySelector('b');
            timerInterval = setInterval(() => {
                b.textContent = Math.ceil(Swal.getTimerLeft() / 1000);
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    });
}

// Toast Notification
function showToast() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

    Toast.fire({
        icon: 'success',
        title: 'Quiz saved successfully!'
    });
}

// Logout Handler
function handleLogout() {
    Swal.fire({
        title: 'Logout',
        text: 'Are you sure you want to logout?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#eb3349',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, logout',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Logged Out',
                text: 'You have been successfully logged out!',
                icon: 'success',
                confirmButtonColor: '#11998e',
                timer: 2000
            });
        }
    });
}