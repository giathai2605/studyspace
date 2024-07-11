document.addEventListener('DOMContentLoaded', function () {

var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    const patternsToRemove = [
        /file:\/\/\/.*?\.js:\d+(:\d+)?/g, // Loại bỏ đường dẫn file và số dòng cụ thể
        /Node.js v\d+\.\d+\.\d+/g, // Loại bỏ thông tin về phiên bản Node.js
        /\btempe[0-9a-f]+\.js(:\d+)?\b/g // Loại bỏ đoạn ngẫu nhiên như tempe84ae7a.js:2
    ];
    function cleanErrorMessage(output, patterns) {
        patterns.forEach(pattern => {
            output = output.replace(pattern, '');
        });

        return output;
    }
    function changeLanguage() {
        var language = document.getElementById("languages").value;
        var form = document.getElementById('userPracticeForm');

        var existingInput = form.querySelector('input[name="selectedLanguage"]');

// Nếu đã có thẻ input ẩn, thì thay thế nó bằng một thẻ input mới
        if (existingInput) {
            // Tạo một thẻ input mới
            var newInput = document.createElement('input');
            newInput.type = 'hidden';
            newInput.name = 'selectedLanguage';
            newInput.value = language;

            // Thay thế thẻ input cũ bằng thẻ input mới
            form.replaceChild(newInput, existingInput);
        } else {
            // Nếu chưa có thẻ input ẩn, thêm một thẻ input mới vào form
            var newInput = document.createElement('input');
            newInput.type = 'hidden';
            newInput.name = 'selectedLanguage';
            newInput.value = language;

            // Thêm thẻ input mới vào form
            form.appendChild(newInput);
        }
        if (language === 'c' || language === 'cpp'){
            editor.setValue('#include <stdio.h>\n', -1);
            editor.session.setMode("ace/mode/c_cpp");
        }
        else if (language === 'php'){
            editor.setValue('<?php\n\n?>', -1);
            editor.session.setMode("ace/mode/php");
        }
        else if (language === 'js') {
            editor.setValue();
            editor.session.setMode("ace/mode/javascript");
        }
    }
    $("#themes").on("change", function() {
        var theme = $(this).val();
        editor.setTheme("ace/theme/" + theme);
    });
    document.getElementById('editor').style.fontSize = 15 + 'px';

    $("#fontSize").on("change", function() {
        var size = $(this).val();
        document.getElementById('editor').style.fontSize = size + 'px';
    });
    $("#btnSubmit").click(function (event) {
        event.preventDefault();

        // Ngăn chặn hành động mặc định của form
        let form = $("#userPracticeForm");
        let url = form.data('url');
        let data = new FormData(form[0]); // Lấy ra DOM element của form

        // Gửi Ajax request chỉ khi chưa có request nào đang được xử lý
        if (!form.data('isSubmitting')) {
            form.data('isSubmitting', true);

            $.ajax({
                url: url,
                method: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                        //swal confirm chuyển trang
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: response.message,
                        showCancelButton: true,
                        confirmButtonText: 'Chuyển trang',
                        cancelButtonText: 'Ở lại',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = response.url;
                        }
                    });
                    $("#btnSubmit").prop("disabled", true);
                },
                error: function (response) {
                        var jsonResponse = response.responseJSON;
                        if (jsonResponse && jsonResponse.message) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Có lỗi',
                                text: jsonResponse.message
                            });
                        } else {
                            console.log('Lỗi không xác định');
                        }
                },
                complete: function () {
                    // Thiết lập lại trạng thái isSubmitting khi request hoàn tất
                    form.data('isSubmitting', false);
                }
            });
        }
    });


    document.getElementById("languages").addEventListener("change", changeLanguage);

    changeLanguage();
    window.onload = function () {
        editor = ace.edit("editor");
        editor.session.setMode("ace/mode/c_cpp");
    }


    $('#compiler').submit(function (event) {
        $("#btnSubmit").prop("disabled", false);
        event.preventDefault();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method: "POST",
            // data: new FormData(this),
            data: {
                language: $("#languages").val(),
                code: editor.getSession().getValue(),
                _token : $("input[name=_token]").val(),
                idPractice : $("input[name=idPractice]").val(),
            },

            success: function (response) {
                response = cleanErrorMessage(response, patternsToRemove);

                if (response.toLowerCase().indexOf("error") === -1 && response.toLowerCase().indexOf("fail") === -1) {
                    $("#btnSubmit").prop("disabled", false);
                }else{
                    $("#btnSubmit").prop("disabled", true);
                }
                $(".output").html(response);
            }
        })
    });

});
