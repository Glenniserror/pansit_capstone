// Logout Handler
document.getElementById('logout-btn').addEventListener('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will be logged out of your account.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the form if confirmed
            document.querySelector('form').submit();
        }
    });
});