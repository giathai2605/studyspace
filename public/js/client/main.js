document.addEventListener("DOMContentLoaded", function () {
    const noteForm = document.querySelector("#noteForm");
    const noteContent = document.querySelector("#noteContent");
    if (noteContent !== null) {
        const originalNoteContent = noteContent.value;

        noteContent.addEventListener("focusout", function () {
            if (noteContent.value !== originalNoteContent) {
                const formData = new FormData(noteForm);

                $.ajax({
                    url: noteForm.getAttribute("action"),
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        console.log("Form submitted successfully!");
                    },
                    error: function (error) {
                        console.error("Error submitting form:", error);
                    },
                });
            }
        });
    }
    $(document).ready(function () {
        //whistlist
        $(".add-to-wishlist").click(function (e) {
            e.preventDefault();
            var course_id = $(this).attr("data-course-id");
            var url = $(this).attr("href");
            var csrf = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
                url: url,
                method: "POST",
                data: {
                    course_id: course_id,
                    _token: csrf,
                },
                success: function (data) {
                    if (data.success == 1) {
                        swal({
                            title: "Thành công!",
                            text: data.message,
                            icon: "success",
                            button: "OK",
                        });
                        if (data.is_wishlist == 1) {
                            $(
                                '.add-to-wishlist[data-course-id="' +
                                    course_id +
                                    '"]'
                            ).html(
                                '<i class="fa-solid fa-heart"></i>'
                            );
                        } else {
                            $(
                                '.add-to-wishlist[data-course-id="' +
                                    course_id +
                                    '"]'
                            ).html(
                                '<i class="fa-regular fa-heart"></i>'
                            );
                        }
                    } else {
                        swal({
                            title: "Error!",
                            text: data.message,
                            icon: "error",
                            button: "OK",
                        });
                    }
                },
            });
        });
$("#notComplete").click(function (e) {
    console.log("click")
   e.preventDefault();
    Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: 'Bạn cần phải hoàn thành bài học để xem bình luận',
    });
});
        //filter
        $("#filterByCategory").change(function (e) {
            //show value
            e.preventDefault();
            let value = $(this).val();
            let url = $(this).data("url");
            let urlPath = $(this).data("asset");
            let image = "";
            console.log(urlPath);
            let showCourseFilter = $("#showCourseFilter");
            url = url.replace("4", value);
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    showCourseFilter.empty();
                    console.log(response);
                    $.each(response, function (index, course) {
                        //kiểm tra xem course.ImageData có chứa http hay không
                        if (
                            course.course.ImageData.includes("http") === false
                        ) {
                            image = urlPath + course.course.ImageData;
                        } else {
                            image = course.course.ImageData;
                        }
                        let badge =
                            course.isDone == 1
                                ? "<span class='badge info-low'>Complete</span>"
                                : "<span class='badge badge-danger'>Incomplete</span>";
                        let str = `
                        <tr>
                                    <td>
                                        <div class="sell-table-group d-flex align-items-center">
                                            <div class="sell-group-img">
                                                <a href="course-details.html">
                                                    <img src="${image}" class="img-fluid " alt="">
                                                </a>
                                            </div>
                                            <div class="sell-tabel-info">
                                                <p><a href="course-details.html">${
                                                    course.course.CourseName
                                                }</a></p>
                                                <div class="course-info d-flex align-items-center border-bottom-0 pb-0">
                                                    <div class="rating-img d-flex align-items-center">
                                                        <img src="${
                                                            urlPath +
                                                            "img/icon/icon-01.svg"
                                                        }" alt="">
                                                        <p>${
                                                            course.course
                                                                .LessonCount
                                                        } Lesson</p>
                                                    </div>
                                                    <div class="course-view d-flex align-items-center">
                                                        <img src="${
                                                            urlPath +
                                                            "img/icon/timer-start.svg"
                                                        }" alt="">
                                                        <p>7hr 20min</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>${course.DonePercent}%</td>
                                    <td>${badge}</td>
                                </tr>
                    `;
                        showCourseFilter.append(str);
                    });
                },
            });
        });
        //search

        function createCustomListItem(course, assetPath) {
            let listItem = $("<li></li>");
            let link = $("<a></a>", {
                href: assetPath + "client/course-intro/" + course.id,
            });
            let img = $("<img>", {
                src: course.ImageData.includes("http")
                    ? course.ImageData
                    : assetPath + course.ImageData,
                alt: "",
                class: "list-avatar",
            });
            let divName = $("<div></div>", {
                class: "list-name",
                text: course.CourseName,
            });

            link.append(img);
            link.append(divName);
            listItem.append(link);

            return listItem;
        }
        function showCourseFilterByCategory(course, assetPath, isDone = null) {
            console.log(isDone);
            if (course.ImageData.includes("http") === false) {
                image = assetPath + course.ImageData;
            } else {
                image = course.ImageData;
            }
            if (isDone != null) {
                var badge =
                    isDone == 1
                        ? "<span class='badge info-low'>Complete</span>"
                        : "<span class='badge badge-danger'>Incomplete</span>";
            } else {
                var badge =
                    course.isDone == 1
                        ? "<span class='badge info-low'>Complete</span>"
                        : "<span class='badge badge-danger'>Incomplete</span>";
            }
            let str = `
                        <tr>
                                    <td>
                                        <div class="sell-table-group d-flex align-items-center">
                                            <div class="sell-group-img">
                                                <a href="course-details.html">
                                                    <img src="${image}" class="img-fluid " alt="">
                                                </a>
                                            </div>
                                            <div class="sell-tabel-info">
                                                <p><a href="course-details.html">${
                                                    course.CourseName
                                                }</a></p>
                                                <div class="course-info d-flex align-items-center border-bottom-0 pb-0">
                                                    <div class="rating-img d-flex align-items-center">
                                                        <img src="${
                                                            assetPath +
                                                            "img/icon/icon-01.svg"
                                                        }" alt="">
                                                        <p>${
                                                            course.LessonCount
                                                        } Lesson</p>
                                                    </div>
                                                    <div class="course-view d-flex align-items-center">
                                                        <img src="${
                                                            assetPath +
                                                            "img/icon/timer-start.svg"
                                                        }" alt="">
                                                        <p>7hr 20min</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>${course.DonePercent}%</td>
                                    <td>${badge}</td>
                                </tr>
                    `;
            return str;
        }

        // Hàm xử lý sự kiện khi nhập vào ô tìm kiếm
        function handleSearchInput(
            inputElement,
            resultsContainer,
            assetPath,
            viewShowCourse
        ) {
            inputElement.on("input", function () {
                let searchQuery = $(this).val().toLowerCase();
                resultsContainer.empty();
                let searchRoute = inputElement.data("url");
                let csrfToken = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    url: searchRoute,
                    method: "POST",
                    data: {
                        _token: csrfToken,
                        query: searchQuery,
                    },
                    dataType: "json",
                    success: function (response) {
                        $.each(response["courses"], function (index, course) {
                            // Tạo phần tử li tùy chỉnh
                            let customListItem;
                            if (viewShowCourse === "createCustomListItem") {
                                if (response["hasId"] === false) {
                                    customListItem = createCustomListItem(
                                        course,
                                        assetPath
                                    );
                                } else {
                                    customListItem = createCustomListItem(
                                        course.course,
                                        assetPath
                                    );
                                }
                            } else if (
                                viewShowCourse === "showCourseFilterByCategory"
                            ) {
                                if (response["hasId"] === false) {
                                    customListItem = showCourseFilterByCategory(
                                        course,
                                        assetPath
                                    );
                                } else {
                                    customListItem = showCourseFilterByCategory(
                                        course.course,
                                        assetPath,
                                        course.isDone
                                    );
                                }
                            }

                            // Gắn phần tử li vào container kết quả tìm kiếm
                            resultsContainer.append(customListItem);
                        });
                    },
                });
            });
        }

        // Sử dụng hàm xử lý tìm kiếm với các phần tử cụ thể của trang mới
        //         let searchInput = $('#newSearchInput');
        //         let searchResultsContainer = $('#newSearchResults');
        //         let newAssetPath = $('#newSearchInput').data('asset');
        let searchInput = $("#searchInput");
        let searchResultsContainer = $("#searchResults");
        let showCourseFilter = $("#showCourseFilter");
        var assetPath = $("#searchInput").data("asset");
        var $headerSearchDropdown = $(".header_search_dropdown");

        searchInput.on("focus", function () {
            // Khi input được focus, hiển thị dropdown
            $headerSearchDropdown.show();
        });

        searchInput.on("blur", function () {
            // Khi input mất focus, ẩn dropdown
            $headerSearchDropdown.hide();
        });
        handleSearchInput(
            searchInput,
            searchResultsContainer,
            assetPath,
            "createCustomListItem"
        );
        handleSearchInput(
            searchInput,
            showCourseFilter,
            assetPath,
            "showCourseFilterByCategory"
        );

        const API_URL = "{{ url('/') }}";
        const pusher = new Pusher("7bf8a43e00069152b7a0", {
            cluster: "ap1",
        });

        function executeRecaptcha(action, callback) {
            grecaptcha.ready(function () {
                grecaptcha
                    .execute("6LeBGhEpAAAAAMsIqkTVwYDs-7tD--PaRcFDq-aq", {
                        action: action,
                    })
                    .then(callback);
            });
        }
        function checkAndShowError(icon, title, text) {
            Swal.fire({
                icon: icon,
                title: title,
                text: text,
            });
        }
        function handleAjaxRequest(
            url,
            form_data,
            successCallback,
            errorCallback
        ) {
            $.ajax({
                url: url,
                type: "POST",
                data: form_data,
                contentType: false,
                processData: false,
                success: successCallback,
                error: errorCallback,
            });
        }

        const commentChannel = pusher.subscribe("comment-channel");
        let urlAsset = localStorage.getItem("urlAsset");
        const functionComment = commentChannel.bind(
            "new-comment",
            function (data) {
                const listComment = $("#list__comment");
                newCommentHTML = `
                                    <div class="border-t pt-5">
                                        <div class="flex items-center gap-x-4 mb-2">
                                            <img src="${
                                                urlAsset + data[0].avatar
                                            }" alt="" class="rounded-full shadow w-10 h-10">
                                            <div>
                                                <h4 class="-mb-1 text-base">
                                                    ${data[0].firstname} ${data[0].lastname}
                                                </h4>
                                                <span class="text-sm text-gray-500 mt-1">
                                                 Vừa xong
                                                </span>
                                            </div>
                                        </div>
                                        <p class="bg-gray-100 px-3 py-2 rounded-md">
                                            ${data[0].Content}
                                        </p>
                                        ${
                                            data[0].Image
                                                ? `<img src="${API_URL}/${data[0].Image}" alt="" class="w-full mt-2 rounded-md object-cover">`
                                                : ""
                                        }
                                    </div>
                                `;
                listComment.append(newCommentHTML);
            }
        );

        $("#add__comment").submit(function (e) {
            console.log("submit comment");
            e.preventDefault();
            var urlComment = $(this).data("url");
            const submit = $(this).find('button[type="submit"]');
            const content = $(this).find('input[name="Content"]');
            submit.attr("disabled", true);
            submit.html("Đang gửi...");
            console.log(urlComment);
            const form_data = new FormData(this);
            executeRecaptcha("submit", function (token) {
                if (token) {
                    handleAjaxRequest(
                        urlComment,
                        form_data,
                        function (response) {
                            console.log(response);
                            submit.attr("disabled", false);
                            submit.html(`<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>`);
                            content.val("");
                            functionComment(response);
                        },
                        function (error) {
                            console.error(error);
                        }
                    );
                } else {
                    checkAndShowError(
                        "error",
                        "Error",
                        "Please verify captcha"
                    );
                }
            });
        });

        const replyCommentChannel = pusher.subscribe("reply-comment-channel");
        replyCommentChannel.bind("new-reply", function (data) {
            console.log(data);
            const listReplyComment = $(
                `#list__reply-comment-${data[0].CommentID}`
            );
            const newReply = `<div>
                    <div class="flex items-center gap-x-4 my-2">
                        <img src="${ urlAsset + data[0].avatar}" alt="" class="rounded-full shadow w-8 h-8">
                        <div>
                            <h4 class="-mb-1 text-base">
                                ${data[0].firstname} ${data[0].lastname}
                            </h4>
                            <span class="text-sm text-gray-500 mt-1">
                                Vừa xong
                            </span>
                        </div>
                    </div>
                    <p class="bg-gray-100 px-3 py-2 rounded-md">
                        ${data[0].Content}
                    </p>

                </div>`;
            listReplyComment.append(newReply);
        });
        $(document).on("click", ".add__reply-comment", function (e) {
            e.preventDefault();
            console.log("click reply comment");
            var idComment = $(this).data("id");
            var replyForm = $(`#replyComment${idComment}`);
            var urlReply = replyForm.data("url");
            const form_data = new FormData(replyForm[0]);
            executeRecaptcha("submit", function (token) {
                if (token) {
                    handleAjaxRequest(
                        urlReply,
                        form_data,
                        function (response) {
                            console.log(response);
                            replyForm.find('input[name="Content"]').val("");
                        },
                        function (error) {
                            console.error(error);
                        }
                    );
                } else {
                    checkAndShowError(
                        "error",
                        "Error",
                        "Please verify captcha"
                    );
                }
            });
        });
    });
});
