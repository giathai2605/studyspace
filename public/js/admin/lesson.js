document.addEventListener('DOMContentLoaded', function() {

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

    function validateNumberInput(input, errorMessage) {

        if (input.trim() === '') {

            checkAndShowError('error', 'Error', errorMessage);
            return false;
        }

        if (isNaN(input)) {
            checkAndShowError('error', 'Error', 'Please enter a valid number');
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
    $('#formAddLesson').submit(function(event) {
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu một cách thông thường

        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);

        if (
            validateInput($('input[name="LessonName"]').val(), 'Lesson name cannot be empty') &&
            validateInput($('textarea[name="LessonDescription"]').val(),
                'Description cannot be empty') &&
                validateNumberInput($('input[name="SortNumber"]').val(),'Sort number failed')&&

                validateInput($('select[name="Status"]').val(), 'Status cannot be empty')&&
                validateInput($('select[name="CourseChapterId"]').val(), 'Chapter cannot be empty')
        ) {
            handleFormSubmission(formData, url, redirect, 'Lesson created successfully');
        }
    });

    $('#formEditLesson').submit(function(event) {
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu một cách thông thường

        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);

        if (
            validateInput($('input[name="LessonName"]').val(), 'Lesson name cannot be empty') &&
            validateInput($('textarea[name="LessonDescription"]').val(),
                'Description cannot be empty') &&
                validateNumberInput($('input[name="SortNumber"]').val(),'Sort number failed')&&

                validateInput($('select[name="Status"]').val(), 'Status cannot be empty')&&
                validateInput($('select[name="CourseChapterId"]').val(), 'Course cannot be empty')
        ) {
            handleFormSubmission(formData, url, redirect, 'Lesson created successfully');
        }
    })

    $('.deleteLesson').submit(function(event) {
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu một cách thông thường

        Swal.fire({
            title: 'Confirm Deletion',
            text: 'Are you sure you want to delete this lesson?',
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
                            'User deleted successfully');
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

    $('#formAddLessonVideo').submit(function(event) {
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu một cách thông thường

        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);

        if (
            validateInput($('input[name="LessonID"]').val(), 'Lesson ID cannot be empty') &&
            validateInput($('input[name="Title"]').val(), 'Video title cannot be empty') &&
            validateInput($('input[name="LessonLinkUrl"]').val(), 'Video URL cannot be empty')
        ) {
            handleFormSubmission(formData, url, redirect, 'Video created successfully');
        }
    });

    $('.deleteLessonVideo').submit(function(event) {
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu một cách thông thường

        Swal.fire({
            title: 'Confirm Deletion',
            text: 'Are you sure you want to delete this video?',
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
                            'User deleted successfully');
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
