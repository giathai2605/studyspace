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
            checkAndShowError('error', 'Lỗi!', 'Vui lòng nhập tên vai trò');
            return;
        }

        if (name.length > 255) {
            checkAndShowError('error', 'Lỗi!', 'Tên vai trò không được vượt quá 255 ký tự');
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
                checkAndShowError('success', 'Thành công!', 'Thêm vai trò thành công!');
                window.location.href = redirect;
            },
            error: function (xhr, status, error) {
                if (xhr.status === 422) {
                    let response = JSON.parse(xhr.responseText);
                    checkAndShowError('error', 'Lỗi!', response.message);
                } else {
                    checkAndShowError('error', 'Lỗi!', 'Có lỗi xảy ra: ' + error);
                }
            }
        });
    }

    // Form create
    $('#roleFormCreate').submit(function (event) {
        event.preventDefault();
        let form = $(this);
        let url = form.data('url');
        let redirect = form.data('redirect');
        checkForm(form, url, redirect);
    });

    // Form edit
    $('#roleFormEdit').submit(function (event) {
        event.preventDefault();
        let form = $(this);
        let url = form.data('url');
        let redirect = form.data('redirect');
        checkForm(form, url, redirect);
    });

    // Delete
    $('.deleteFormRole').submit(function (event) {
        event.preventDefault();

        Swal.fire({
            title: 'Xác nhận xóa?',
            text: 'Bạn có chắc chắn muốn xóa vai trò này?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Có, xóa nó!',
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
                    success: function () {
                        checkAndShowError('success', 'Thành công!', 'Xóa vai trò thành công!');
                        window.location.href = redirect;
                    },
                    error: function (xhr, status, error) {
                        checkAndShowError('error', 'Lỗi!', 'Có lỗi xảy ra: ' + error);
                    }
                });
            }
        });
    });
});
