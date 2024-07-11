document.addEventListener('DOMContentLoaded', function() {
                function checkAndShowError(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text
        });
    }
         $('.deleteDocument').submit(function(event) {
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu một cách thông thường

        Swal.fire({
            title: 'Confirm Deletion',
            text: 'Are you sure you want to delete this document?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                var url = $(this).data('url');
                var redirect = $(this).data('redirect');

                $.ajax({
                    type: 'GET',
                    url: url,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        checkAndShowError('success', 'Success',
                            'Document deleted successfully');
                        window.location.href = redirect;
                    },
                    error: function(xhr, status, error) {
                        checkAndShowError('error', 'Error',
                            'An error occurred: ' + error);
                    }
                });
            }
        });
    });
});

