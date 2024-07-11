document.addEventListener('DOMContentLoaded', function () {

    function checkAndShowError(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text
        });
    }

    function validateInput(input, errorMessage) {
        if (input instanceof File) {
            // Đối tượng là một file
            if (input.size === 0) {
                checkAndShowError('error', 'Lỗi!', errorMessage);
                return false;
            }
        } else {
            // Đối tượng không phải là file, kiểm tra xem có rỗng không
            if (input === '') {
                checkAndShowError('error', 'Lỗi!', errorMessage);
                return false;
            }
        }
        return true;
    }

    function validateSelect(input, errorMessage) {
        if (input === '0' || input === '' || input === null) {
            checkAndShowError('error', 'Lỗi!', errorMessage);
            return false;
        }
        return true;
    }

    function validateNumber(input, errorMessage) {
        if (isNaN(input)) {
            checkAndShowError('error', 'Lỗi!', errorMessage);
            return false;
        } else if (input < 0) {
            checkAndShowError('error', 'Lỗi!', errorMessage);
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
            success: function () {
                checkAndShowError('success', 'Thành công!', successMessage);
                window.location.href = redirect;
            },
            error: function (xhr, status, error) {
                if (xhr.status === 422) {
                    var response = JSON.parse(xhr.responseText);
                    checkAndShowError('error', 'Lỗi!', response.message);
                } else {
                    checkAndShowError('error', 'Lỗi!', 'Có lỗi xảy ra: ' + error);
                }
            }
        });
    }

    function handleDeleteForm(form) {
        Swal.fire({
            title: 'Xác nhận xóa!',
            text: 'Bạn có chắc chắn muốn xóa khóa học này?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Có, xóa nó!',
            cancelButtonText: 'Hủy bỏ'
        }).then((result) => {
            if (result.isConfirmed) {
                let url = form.data('url');
                let redirect = form.data('redirect');

                $.ajax({
                    type: 'GET',
                    url: url,
                    processData: false,
                    contentType: false,
                    success: function () {
                        checkAndShowError('success', 'Thành công!', 'Khóa học đã được xóa thành công!');
                        window.location.href = redirect;
                    },
                    error: function (xhr, status, error) {
                        checkAndShowError('error', 'Lỗi!', 'Có lỗi xảy ra: ' + error);
                    }
                });
            }
        });
    }

    $('#showImport').click(function (e) {
        e.preventDefault();
        $('#coursesFormCreateImport').show();
        $('#coursesFormCreateSimple').hide();
        $('#chapterFormCreateImport').show();
        $('#chapterFormCreateSimple').hide();
        $('#formAddLessonImport').show();
        $('#formAddLessonSimple').hide();
        $('#practiceFormCreateImport').show();
        $('#practiceFormCreateSimple').hide();
        $('#testcaseFormCreateImport').show();
        $('#testcaseFormCreateSimple').hide();
    })
    $('#showSimple').click(function (e) {
        e.preventDefault();
        $('#coursesFormCreateImport').hide();
        $('#coursesFormCreateSimple').show();
        $('#chapterFormCreateImport').hide();
        $('#chapterFormCreateSimple').show();
        $('#formAddLessonImport').hide();
        $('#formAddLessonSimple').show();
        $('#practiceFormCreateImport').hide();
        $('#practiceFormCreateSimple').show();
        $('#testcaseFormCreateImport').hide();
        $('#testcaseFormCreateSimple').show();
    })

//Courses
    // Form create
    $('#coursesFormCreateSimple').submit(function (event) {
        event.preventDefault();
        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);
        if (
            validateSelect($('input[name="CategoryID"]').val(), 'Danh mục không được để trống') &&
            validateInput($('input[name="CourseCode"]').val(), 'Mã khóa học không được để trống') &&
            validateInput($('input[name="CourseCode"]').val(), 'Mã khóa học đã tồn tại') &&
            validateInput($('input[name="CourseName"]').val(), 'Tên khóa học không được để trống') &&
            validateInput($('input[name="CourseSubTitle"]').val(), 'Tiêu đề khóa học không được để trống') &&
            validateInput($('input[name="Slug"]').val(), 'Đường dẫn không được để trống') &&
            validateInput($('input[name="Price"]').val(), 'Giá tiền không được để trống') &&
            validateNumber($('input[name="Price"]').val(), 'Giá tiền phải là một số') &&
            validateInput($('input[name="ImageData"]').val(), 'Hình ảnh không được để trống') &&
            validateInput($('input[name="IntroVideoLink"]').val(), 'Video mô tả không được để trống')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm khóa học thành công!');
        }
    });
    $('#coursesFormCreateImport').submit(function (event) {
        event.preventDefault();
        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);
        if (
            validateInput($('input[name="excel_file"]').val(), 'Excel không được để trống')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm khóa học thành công!');
        }
    });
    $('#coursesFormEdit').submit(function (event) {
        event.preventDefault();
        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);
        if (
            validateSelect($('input[name="CategoryID"]').val(), 'Danh mục không được để trống') &&
            validateInput($('input[name="CourseCode"]').val(), 'Mã khóa học không được để trống') &&
            validateInput($('input[name="CourseCode"]').val(), 'Mã khóa học đã tồn tại') &&
            validateInput($('input[name="CourseName"]').val(), 'Tên khóa học không được để trống') &&
            validateInput($('input[name="CourseSubTitle"]').val(), 'Tiêu đề khóa học không được để trống') &&
            validateInput($('input[name="Slug"]').val(), 'Đường dẫn không được để trống') &&
            validateInput($('input[name="Price"]').val(), 'Giá tiền không được để trống') &&
            validateNumber($('input[name="Price"]').val(), 'Giá tiền phải là một số') &&
            validateInput($('input[name="ImageData"]').val(), 'Hình ảnh không được để trống') &&
            validateInput($('input[name="IntroVideoLink"]').val(), 'Video mô tả không được để trống')
        ) {
            handleFormSubmission(formData, url, redirect, 'Cập nhật khóa học thành công!');
        }
    });

    $('.destroyFromCourses').submit(function (event) {
        event.preventDefault();
        handleDeleteForm($(this));
    });
//Chapter
    //có các trường CourseID, ChapterName, ChapterLessonCount, SortNumber
    $('#chapterFormCreateSimple').submit(function (event) {
        event.preventDefault();
        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);
        if (
            validateSelect($('input[name="CourseID"]').val(), 'Mã khóa học không được để trống') &&
            validateInput($('input[name="ChapterName"]').val(), 'Tên chương học không được để trống') &&
            validateInput($('input[name="SortNumber"]').val(), 'Số thứ tự không được để trống') &&
            validateNumber($('input[name="SortNumber"]').val(), 'Số thứ tự phải là một số')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm chương học thành công!');
        }
    });
    $('#chapterFormCreateImport').submit(function (event) {
        event.preventDefault();
        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);
        if (
            validateInput($('input[name="excel_file"]').val(), 'Excel không được để trống!')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm chương học thành công!');
        }
    });
    $('#chapterFormEdit').submit(function (event) {
        event.preventDefault();
        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);
        if (
            validateSelect($('input[name="CourseID"]').val(), 'Mã khóa học không được để trống') &&
            validateInput($('input[name="ChapterName"]').val(), 'Tên chương học không được để trống') &&
            validateInput($('input[name="SortNumber"]').val(), 'Số thứ tự không được để trống') &&
            validateNumber($('input[name="SortNumber"]').val(), 'Số thứ tự phải là một số')
        ) {
            handleFormSubmission(formData, url, redirect, 'Cập nhật chương học thành công!');
        }
    });
//delete deleteFormChapter
    $('.deleteFormChapter').submit(function (event) {
        event.preventDefault();
        handleDeleteForm($(this));
    });

//Lesson
    // có các trường CourseChapterId, LessonName, LessonDescription, SortNumber, Status
    $('#formAddLessonSimple').submit(function (event) {
        event.preventDefault();
        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);
        if (
            validateSelect($('input[name="CourseChapterId"]').val(), 'Mã chương học không được để trống') &&
            validateInput($('input[name="LessonName"]').val(), 'Tên bài học không được để trống') &&
            validateInput($('input[name="LessonDescription"]').val(), 'Mô tả bài học không được để trống') &&
            validateInput($('input[name="SortNumber"]').val(), 'Số thứ tự không được để trống') &&
            validateSelect($('input[name="Status"]').val(), 'Trạng thái không được để trống') &&
            validateNumber($('input[name="SortNumber"]').val(), 'Số thứ tự phải là một số')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm bài học thành công!');
        }
    });
    $('#lessonFormCreateImport').submit(function (event) {
        event.preventDefault();
        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);
        if (
            validateInput($('input[name="excel_file"]').val(), 'Excel không được để trống!')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm bài học thành công!');
        }
    });
    $('#formEditLesson').submit(function (event) {
        event.preventDefault();
        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);
        if (
            validateSelect($('input[name="CourseChapterId"]').val(), 'Mã chương học không được để trống') &&
            validateInput($('input[name="LessonName"]').val(), 'Tên bài học không được để trống') &&
            validateInput($('input[name="LessonDescription"]').val(), 'Mô tả bài học không được để trống') &&
            validateInput($('input[name="SortNumber"]').val(), 'Số thứ tự không được để trống') &&
            validateSelect($('input[name="Status"]').val(), 'Trạng thái không được để trống') &&
            validateNumber($('input[name="SortNumber"]').val(), 'Số thứ tự phải là một số')
        ) {
            handleFormSubmission(formData, url, redirect, 'Cập nhật khóa học thành công!');
        }
    });
//delete deleteFormLesson
    $('.deleteLesson').submit(function (event) {
        event.preventDefault();
        handleDeleteForm($(this));
    });
    // practice
    $('#practiceFormCreateSimple, #practiceEditCreate').submit(function (event) {
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu một cách thông thường

        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);

        if (
            validateInput($('input[name="Problem"]').val(), 'Vấn đề không được để trống') &&
            validateInput($('input[name="ProblemDetail"]').val(), 'Chi tiết vấn đề không được để trống') &&
            validateInput($('input[name="Explain"]').val(), 'Giải thích không được để trống') &&
            validateInput($('input[name="Suggest"]').val(), 'Gợi ý không được để trống')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm luyện tập thành công!');
        }
    });
    $('#practiceFormCreateImport').submit(function (event) {
        event.preventDefault();
        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);
        if (
            validateInput($('input[name="excel_file"]').val(), 'Excel không được để trống!')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm luyện tập thành công!');
        }
    });
    $('#testcaseFormCreateSimple, #testcaseEditCreate').submit(function (event) {
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu một cách thông thường

        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);

        if (
            validateInput($('input[name="NameFunction"]').val(), 'Tên hàm không được để trống') &&
            validateInput($('input[name="Input"]').val(), 'Đầu vào không được để trống') &&
            validateInput($('input[name="InputDetail"]').val(), 'Chi tiết đầu vào không được để trống') &&
            validateInput($('input[name="ExpectOutput"]').val(), 'Kết quả đầu ra không được để trống') &&
            validateInput($('input[name="SortNumber"]').val(), 'Số thư tự không được để trống')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm kiểm thử thành công!');
        }
    });
    $('#testcaseFormCreateImport').submit(function (event) {
        event.preventDefault();
        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);
        if (
            validateInput($('input[name="excel_file"]').val(), 'Excel không được để trống!')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm kiểm thử thành công!');
        }
    });
    //delete deleteFormTestcase
    $('.deleteFormTestcase').submit(function (event) {
        event.preventDefault();
        handleDeleteForm($(this));
    });

    $('.deleteRating',).submit(function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'Xác nhận xóa!',
            text: 'Bạn có chắc chắn muốn xóa đánh giá này?',
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
                    success: function (response) {
                        checkAndShowError('success', 'Thành công!', 'Đánh giá đã được xóa thành công!');
                        window.location.href = redirect;
                    },
                    error: function (xhr, status, error) {
                        checkAndShowError('error', 'Lỗi!', 'Có lỗi xảy ra: ' + error);
                    }
                });
            }
        });
    });

    // video lesson
    $('#formAddLessonVideo').submit(function (event) {
        event.preventDefault();

        var url = $(this).data('url');
        var redirect = $(this).data('redirect');
        var formData = new FormData(this);

        if (
            validateInput($('input[name="LessonID"]').val(), 'Mã bài học không được để trống!') &&
            validateInput($('input[name="Title"]').val(), 'Tiêu đề video không được để trống!') &&
            validateInput($('input[name="LessonLinkUrl"]').val(), 'Video không được để trống!')
        ) {
            handleFormSubmission(formData, url, redirect, 'Thêm video thành công!');
        }
    });

    // delete video lesson
    $('.deleteLessonVideo').submit(function (event) {
        event.preventDefault();

        Swal.fire({
            title: 'Xác nhận xóa!',
            text: 'Bạn có chắc chắn muốn xóa video này?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Có, xóa nó!',
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
                        checkAndShowError('success', 'Thành công!', 'Video đã được xóa thành công!');
                        window.location.href = redirect;
                    },
                    error: function(xhr, status, error) {
                        checkAndShowError('error', 'Lỗi!', 'Có lỗi xảy ra: ' + error);
                    }
                });
            }
        });
    });

    $('.deleteReplyRating',).submit(function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'Xác nhận xóa!',
            text: 'Bạn có chắc chắn muốn xóa phản hồi này?',
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
                    success: function (response) {
                        checkAndShowError('success', 'Thành công!', 'Phản hồi đã được xóa thành công!');
                        window.location.href = redirect;
                    },
                    error: function (xhr, status, error) {
                        checkAndShowError('error', 'Lỗi!', 'Có lỗi xảy ra: ' + error);
                    }
                });
            }
        });
    });
    function formatIframe() {
        $(document).ready(function () {
            let scrollPositionY = 50;
            let scrollPositionX = 200;

            let iframeDocument = $('.frameCertificate').contents();

            iframeDocument.scrollTop(scrollPositionY);
            iframeDocument.scrollLeft(scrollPositionX);
        });
    }
    formatIframe();
    $('#filterCertificateByCategory').change(function (e) {
        e.preventDefault();
        let value = $(this).val();
        let url = $(this).data('url');
        let urlPath = $(this).data('asset');
        console.log(urlPath)
        let showCertificateFilter = $('#showCertificate');
        url = url.replace('4', value);
        $.ajax({
            type: 'GET',
            url: url,
            success: function (response) {
                showCertificateFilter.empty();
                console.log(response);
                $.each(response, function (index, item) {
                    let preview = urlPath + 'client/certificate/preview/' + item.courseID;
                    let download = urlPath + 'client/certificate/download/' + item.courseID;
                    let str = `
                          <tr>
                                <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                                    <h5 class="text-black dark:text-white">${index + 1}</h5>
                                </td>
                                <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                                    <h5 class="text-black dark:text-white">${item.user.firstName + item.user.lastName}</h5>
                                </td>
                                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <h5 class="text-black dark:text-white">${item.course.CourseName}</h5>
                                </td>
                                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <iframe class="frameCertificate"
                                            src="${preview}"
                                            frameborder="0"></iframe>
                                </td>
                                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input type="checkbox" data-asset="${urlPath}" data-type="certificates"
                                               onchange="update_status(this)"
                                               value="${item.id}" ${item.status == 1 ? 'checked' : ''}>
                                        <span></span>
                                    </label>
                                </td>

                                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <div class="flex items-center space-x-3.5">
                                        <a class="hover:text-primary"
                                           href="${preview}">
                                            <svg class="fill-current text-success" width="18" height="18"
                                                 viewBox="0 0 18 18"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                                    fill=""/>
                                                <path
                                                    d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                                    fill=""/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                          `
                    showCertificateFilter.append(str);
                });
            }
        })
        formatIframe();
    });
});
