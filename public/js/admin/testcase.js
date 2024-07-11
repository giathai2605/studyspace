document.addEventListener('DOMContentLoaded', function () {
    function checkAndShowError(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text
        });
    }

    function validateInput(input, errorMessage) {
        if (input.trim() === '') {
            checkAndShowError('error', 'Error', errorMessage);
            return false;
        }
        return true;
    }

    function handleFormSubmission(formData, url, redirect, successMessage) {
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function() {
                checkAndShowError('success', 'Success', successMessage);
                window.location.href = redirect;
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    var response = JSON.parse(xhr.responseText);
                    checkAndShowError('error', 'Error', response.message);
                } else {
                    checkAndShowError('error', 'Error', 'An error occurred: ' + error);
                }
            }
        });
    }

    // Lắng nghe sự kiện khi biểu mẫu được gửi
    $('#testcaseFormCreate, #testcaseEditCreate').submit(function (event) {
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu một cách thông thường

        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);

        if (
            validateInput($('input[name="NameFunction"]').val(), 'Name function cannot be empty') &&
            validateInput($('input[name="Input"]').val(), 'Input cannot be empty') &&
            validateInput($('input[name="InputDetail"]').val(), 'Input detail cannot be empty') &&
            validateInput($('input[name="ExpectOutput"]').val(), 'Expected output cannot be empty') &&
            validateInput($('input[name="SortNumber"]').val(), 'Sort number cannot be empty')
        ) {
            handleFormSubmission(formData, url, redirect, 'Testcase created or updated successfully');
        }
    });
});
