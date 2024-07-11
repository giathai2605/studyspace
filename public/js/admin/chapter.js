document.addEventListener('DOMContentLoaded', function () {

    function checkAndShowError(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text
        });
    }

    function checkForm(form, url, redirect) {
        let CourseID = form.find('select[name="CourseID"]').val();
        let ChapterName = form.find('input[name="ChapterName"]').val();
        // let ChapterTotalTime = form.find('input[name="ChapterTotalTime"]').val();
        // let ChapterLessonCount = form.find('input[name="ChapterLessonCount"]').val();
        let SortNumber = form.find('input[name="SortNumber"]').val();

        if (CourseID.trim() === '') {
            checkAndShowError('error', 'Error', 'Please select course!');
            return;
        }

        if (ChapterName.trim() === '') {
            checkAndShowError('error', 'Error', 'Please enter chapter name!');
            return;
        }

        if (ChapterName.length > 255) {
            checkAndShowError('error', 'Error', 'Chapter name must be less than 255 characters!');
            return;
        }

        // if (!Number.isInteger(parseInt(ChapterTotalTime)) || parseInt(ChapterTotalTime) <= 0) {
        //     checkAndShowError('error', 'Error', 'Total time must be integer and greater than 0!');
        //     return;
        // }
        //
        // if (!Number.isInteger(parseInt(ChapterLessonCount)) || parseInt(ChapterLessonCount) <= 0) {
        //     checkAndShowError('error', 'Error', 'Lesson count must be integer and greater than 0!');
        //     return;
        // }

        if (!Number.isInteger(parseInt(SortNumber)) || parseInt(SortNumber) <= 0) {
            checkAndShowError('error', 'Error', 'Sort number must be integer and greater than 0!');
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
                checkAndShowError('success', 'Success', 'Chapter created or updated successfully');
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
    $('#chapterFormCreate').submit(function (event) {
        event.preventDefault();
        let form = $(this);
        let url = form.data('url');
        let redirect = form.data('redirect');
        checkForm(form, url, redirect);
    });

    // Form edit
    $('#chapterFormEdit').submit(function (event) {
        event.preventDefault();
        let form = $(this);
        let url = form.data('url');
        let redirect = form.data('redirect');
        checkForm(form, url, redirect);
    });

    // Delete
    $('.deleteFormChapter').submit(function (event) {
        event.preventDefault();

        Swal.fire({
            title: 'Confirm Deletion',
            text: 'Are you sure you want to delete this chapter?',
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
                        checkAndShowError('success', 'Success', 'Chapter deleted successfully');
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
