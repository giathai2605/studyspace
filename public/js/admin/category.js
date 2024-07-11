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
            checkAndShowError('error', 'Có lỗi', errorMessage);
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
                checkAndShowError('success', 'Thành công', successMessage);
                window.location.href = redirect;
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    let response = JSON.parse(xhr.responseText);
                    checkAndShowError('error', 'Có lỗi', response.message);
                } else {
                    checkAndShowError('error', 'Có lỗi', 'Có lỗi xảy ra: ' + error);
                }
            }
        });
    }

    $('#categoryFormCreate').submit(function (event) {
        event.preventDefault();

        let url = $(this).data('url');
        let redirect = $(this).data('redirect');
        let formData = new FormData(this);

        if (
            validateInput($('input[name="name"]').val(), 'Tên danh mục không được để trống!')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm danh mục thành công!');
        }
    });

    $('#categoryFormEdit').submit(function (event) {
        event.preventDefault();

        let url = $(this).data('url');
        let redirect = $(this).data('redirect');
        let formData = new FormData(this);

        if (
            validateInput($('input[name="name"]').val(), 'Tên danh mục không được để trống!')
        ) {
            handleFormSubmission(formData, url, redirect, 'Cập nhật danh mục thành công!');
        }
    });

    $('.deleteFormCategory').submit(function (event) {
        event.preventDefault();

        Swal.fire({
            title: 'Xác nhận xóa',
            text: 'Bạn có chắc muốn xóa danh mục này không?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy bỏ'
        }).then((result) => {
            if (result.isConfirmed) {
                let url = $(this).data('url');
                let redirect = $(this).data('redirect');

                $.ajax({
                    type: 'GET',
                    url: url,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        checkAndShowError('success', 'Thành công', 'Danh mục đã được xoá!');
                        window.location.href = redirect;
                    },
                    error: function (xhr, status, error) {
                        checkAndShowError('error', 'Có lỗi', 'Có lỗi xảy ra: ' + error);
                    }
                });
            }
        });
    });
});
