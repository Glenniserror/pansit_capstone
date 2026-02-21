/* ================================
   student_dashboard.js
   ================================ */

document.addEventListener('DOMContentLoaded', function () {

    /* ----------------------------------------
       BOTTOM NAV — active state
       ---------------------------------------- */
    document.querySelectorAll('.nav-item').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.nav-item').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    /* ----------------------------------------
       SIDEBAR NAV — active state
       ---------------------------------------- */
    document.querySelectorAll('.sidebar-item').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.sidebar-item').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    /* ----------------------------------------
       LOGOUT — SweetAlert2 confirmation
       ---------------------------------------- */
    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out of your account.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2563eb',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Replace with your logout route:
                // document.getElementById('logout-form').submit();
                console.log('Logging out...');
            }
        });
    }

    const logoutBtns = [
        document.getElementById('logout-btn-mobile'),
        document.getElementById('logout-btn-desktop')
    ];
    logoutBtns.forEach(btn => { if (btn) btn.addEventListener('click', confirmLogout); });

    /* ----------------------------------------
       CHAT — open chatbot (dispatches custom event)
       ---------------------------------------- */
    function openChat() {
        document.dispatchEvent(new CustomEvent('openChatbot'));
    }

    const chatTriggers = [
        document.getElementById('fab-chat'),
        document.getElementById('start-chat-btn'),
        document.getElementById('sidebar-chat-btn')
    ];
    chatTriggers.forEach(el => { if (el) el.addEventListener('click', openChat); });

});