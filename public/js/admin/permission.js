document.addEventListener('DOMContentLoaded', function () {

    function checkAndShowError(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text
        });
    }

    function checkForm(form, url, redirect) {
        let name = form.find('input[name="name"]').val();

        if (name.trim() === '') {
            checkAndShowError('error', 'Error', 'Please enter permission name!');
            return;
        }

        if (name.length > 255) {
            checkAndShowError('error', 'Error', 'Permission name must be less than 255 characters!');
            return;
        }

        let formData = new FormData(form[0]);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                checkAndShowError('success', 'Success', 'Permission created or updated successfully');
                window.location.href = redirect;
            },
            error: function (xhr, status, error) {
                if (xhr.status === 422) {
                    let response = JSON.parse(xhr.responseText);
                    checkAndShowError('error', 'Error', response.message);
                } else {
                    checkAndShowError('error', 'Error', 'An error occurred: ' + error);
                }
            }
        });
    }

    // Form create
    $('#permissionFormCreate').submit(function (event) {
        event.preventDefault();
        let form = $(this);
        let url = form.data('url');
        let redirect = form.data('redirect');
        checkForm(form, url, redirect);
    });

    // Form edit
    $('#permissionFormEdit').submit(function (event) {
        event.preventDefault();
        let form = $(this);
        let url = form.data('url');
        let redirect = form.data('redirect');
        checkForm(form, url, redirect);
    });

    // Delete
    $('.deleteFormPermission').submit(function (event) {
        event.preventDefault();

        Swal.fire({
            title: 'Confirm Deletion',
            text: 'Are you sure you want to delete this permission?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                let url = $(this).data('url');
                let redirect = $(this).data('redirect');

                $.ajax({
                    type: 'GET',
                    url: url,
                    processData: false,
                    contentType: false,
                    success: function () {
                        checkAndShowError('success', 'Success', 'Permission deleted successfully');
                        window.location.href = redirect;
                    },
                    error: function (xhr, status, error) {
                        checkAndShowError('error', 'Error', 'An error occurred: ' + error);
                    }
                });
            }
        });
    });
});
