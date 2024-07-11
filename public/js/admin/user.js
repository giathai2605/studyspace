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
            checkAndShowError('error', 'Lỗi!', errorMessage);
            return false;
        }
        return true;
    }

    function validateEmail(email) {
        const emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
        if (!emailRegex.test(email) || email.includes(' ')) {
            checkAndShowError('error', 'Lỗi!', 'Email không hợp lệ');
            return false;
        }
        return true;
    }

    function validatePhone(phone) {
        var phonePattern = /^\d{10}$/;
        if (!phone.match(phonePattern)) {
            checkAndShowError('error', 'Lỗi!', 'Số điện thoại không hợp lệ');
            return false;
        }
        return true;
    }

    function validatePassword(password, rePassword) {
        const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (password.trim() === '' || !passwordRegex.test(password)) {
            checkAndShowError('error', 'Lỗi!', 'Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ và số');
            return false;
        }
        if (password !== rePassword) {
            checkAndShowError('error', 'Lỗi!', 'Xác nhận mật khẩu không khớp');
            return false;
        }
        return true;
    }

    function validateDate(birthday) {
        var selectedDate = new Date(birthday);
        var currentDate = new Date();
        if (birthday.trim() === '' || selectedDate >= currentDate) {
            checkAndShowError('error', 'Lỗi!', 'Ngày sinh không hợp lệ');
            return false;
        }
        return true;
    }

    function validateRole(role) {
        if (role === '') {
            checkAndShowError('error', 'Lỗi!', 'Vui lòng chọn vai trò');
            return false;
        }
        return true;
    }

    function validateGender(gender) {
        if (gender === '3') {
            checkAndShowError('error', 'Lỗi!', 'Vui lòng chọn giới tính');
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
                checkAndShowError('success', 'Thành công!', successMessage);
                window.location.href = redirect;
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    var response = JSON.parse(xhr.responseText);
                    checkAndShowError('error', 'Lỗi!', response.message);
                } else {
                    checkAndShowError('error', 'Lỗi!', 'Có lỗi xảy ra: ' + error);
                }
            }
        });
    }

    // Lắng nghe sự kiện khi biểu mẫu được gửi
    $('#userFormCreate').submit(function (event) {
        event.preventDefault();

        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);

        if (
            validateInput($('input[name="firstName"]').val(), 'Tên không được để trống') &&
            validateInput($('input[name="lastName"]').val(), 'Họ không được để trống') &&
            validateInput($('input[name="email"]').val(), 'Email không được để trống') &&
            validateEmail($('input[name="email"]').val()) &&
            validateInput($('input[name="username"]').val(), 'Tên người dùng không được để trống') &&
            validatePassword($('input[name="password"]').val(), $('input[name="password_confirmation"]').val()) &&
            validatePhone($('input[name="phone"]').val()) &&
            validateDate($('input[name="birthday"]').val()) &&
            validateInput($('input[name="address"]').val(), 'Địa chỉ không được để trống') &&
            validateRole($('select[name="roleID"]').val()) &&
            validateGender($('select[name="gender"]').val())
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm người dùng thành công!');
        }
    });

    // Form edit
    $('#userFormEdit').submit(function (event) {
        event.preventDefault();

        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);

        if (
            validateInput($('input[name="firstName"]').val(), 'Tên không được để trống') &&
            validateInput($('input[name="lastName"]').val(), 'Họ không được để trống') &&
            validateInput($('input[name="email"]').val(), 'Email không được để trống') &&
            validateEmail($('input[name="email"]').val()) &&
            validateInput($('input[name="username"]').val(), 'Tên người dùng không được để trống') &&
            validatePhone($('input[name="phone"]').val()) &&
            validateDate($('input[name="birthday"]').val()) &&
            validateInput($('input[name="address"]').val(), 'Địa chỉ không được để trống') &&
            validateRole($('select[name="roleID"]').val()) &&
            validateGender($('select[name="gender"]').val())
        ) {
            handleFormSubmission(formData, url, redirect, 'Cập nhật người dùng thành công!');
        }
    });

    // Delete user
    $('.deleteFormUser').submit(function (event) {
        event.preventDefault();

        Swal.fire({
            title: 'Xác nhận xóa?',
            text: 'Bạn có chắc chắn muốn xóa người dùng này?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Có, xóa ngay!',
            cancelButtonText: 'Hủy bỏ'
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
                        checkAndShowError('success', 'Thành công!', 'Xóa người dùng thành công!');
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
