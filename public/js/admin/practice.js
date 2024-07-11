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
    $('#practiceFormCreate, #practiceEditCreate').submit(function (event) {
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu một cách thông thường

        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);

        if (
            validateInput($('input[name="Problem"]').val(), 'Problem cannot be empty') &&
            validateInput($('input[name="ProblemDetail"]').val(), 'Problem detail cannot be empty') &&
            validateInput($('input[name="Explain"]').val(), 'Explain cannot be empty') &&
            validateInput($('input[name="Suggest"]').val(), 'Suggest cannot be empty')
        ) {
            handleFormSubmission(formData, url, redirect, 'Practice created successfully');
        }
    });
});
