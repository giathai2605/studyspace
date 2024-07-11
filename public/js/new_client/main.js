let isPageLoaded = false;
document.addEventListener('DOMContentLoaded', function () {
    
  
    if (isPageLoaded) {
        return;
    } else {
        isPageLoaded = true;
    }
    var currentUrl = window.location.href;

    // Lặp qua tất cả các nav-item
    $(".nav-item").each(function () {
        // Lấy giá trị của thuộc tính data-nav
        var navIdentifier = $(this).data("nav");
        // Kiểm tra xem đường dẫn có chứa định danh của nav-item không
        if (currentUrl.includes(navIdentifier)) {
            // Thêm class "active" cho nav-item tương ứng
            $(".nav-item").removeClass("active");
            $(this).addClass("active");
            return false; // Dừng vòng lặp khi tìm thấy nav-item cần thiết
        }
    });
    $(document).ready(function(){
    let scrollPositionY = 50;
    let scrollPositionX = 70;

    let iframeDocument = $('.frameCertificate').contents();

    iframeDocument.scrollTop(scrollPositionY);
    iframeDocument.scrollLeft(scrollPositionX);
    });
    function checkAuth(auth) {
        let authLocal = localStorage.getItem('userData');
        let idUserLocal = authLocal ? JSON.parse(authLocal).id : null;
        if (auth == idUserLocal) {
            return true;
        } else {
            return false;
        }
    }

    function executeRecaptcha(action, callback) {
        grecaptcha.ready(function () {
            grecaptcha.execute('6LeBGhEpAAAAAMsIqkTVwYDs-7tD--PaRcFDq-aq', {action: action})
                .then(callback);
        });
    }
    function checkAndShowError(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text
        });
    }
    function handleAjaxRequest(url, form_data, successCallback, errorCallback) {
        $.ajax({
            url: url,
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: successCallback,
            error: errorCallback
        });
    }
    var INDEX = 0;
    $("#chat-submit").click(function (e) {
        e.preventDefault();
        let url = $("#sendMessage").attr('data-url');
        let form_data = new FormData($("#sendMessage")[0]);
        let userDataId = form_data.get('user_id');
        executeRecaptcha('submit', function (token) {
            if (token) {
                handleAjaxRequest(
                    url,
                    form_data,
                    function (response) {
                        generate_message(response['messages'], userDataId);
                        showListSenders(response['senders']);
                    },
                    function (error) {
                        console.error(error);
                    }
                );
            } else {
                checkAndShowError('error', 'Error', 'Please verify captcha')
            }
        });
        var msg = $("#chat-input").val();
        if (msg.trim() == '') {
            return false;
        }
    })
    const messageChannel = pusher.subscribe('chat');
    messageChannel.bind('MessageSent', function (data) {
        showChat(data['messages']);
        showMessageUser(data['messages']);
        showListSenders(data['senders']);
        generate_message(data['messages']);
    });

    //chuyển chat.created_at sang dạng thứ 2, 7:30 PM
    function showTime(time) {
        let daysOfWeek = ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'];
        let date = new Date(time);
        let dayOfWeek = daysOfWeek[date.getDay()]; // Lấy số thứ tự của ngày trong tuần (0 đến 6)
        let hours = date.getHours();
        let minutes = date.getMinutes();
        minutes = minutes < 10 ? '0' + minutes : minutes;
        let strTime = `${dayOfWeek}, ${hours}:${minutes}`;
        return strTime;
    }

    function generate_message(data, userDataId = null, callback = null) {
        // $(".chat-logs").html("");
        let tempContent = "";
        $.each(data, function (index, value) {
            if (value.user_id == JSON.parse(localStorage.getItem('userData')).id || value.receiver_id == JSON.parse(localStorage.getItem('userData')).id) {
                let type = value.user.roleID == 4 ? "self" : "user";
                let strTime = showTime(value.created_at);
                INDEX++;
                let url = localStorage.getItem('urlAsset');
                let avatar = userData ? url + userData.avatar : "https://static.thenounproject.com/png/1995071-200.png";
                const str = `
                                    <div id="cm-msg-${INDEX}" class="chat-msg ${type}"/>
                                        <span class="msg-avatar">
                                            <img src="${avatar}" >
                                        </span>
                                        <div class="cm-msg-text">
                                            ${value.content}
                                        </div>
                                        <span class="text-sm text-gray-500 mt-1">
                                            ${strTime}
                                        </span>
                                    </div>
                                   `;
                tempContent += str;
                $("#cm-msg-" + INDEX).hide().fadeIn(300);
            }
        })
        if (userDataId == null) {
            $(".chat-logs").html("");
            $(".chat-logs").append(tempContent);
        }
        if (tempContent != "" && JSON.parse(localStorage.getItem('userData')).id == userDataId) {
            $(".chat-logs").html("");
            $(".chat-logs").append(tempContent);
        }
        $("#chat-input").val('');
        if (typeof callback == 'function') {
            callback();
        }
    }


    $(document).delegate(".chat-btn", "click", function () {
        var name = $(this).html();
        $("#chat-input").attr("disabled", false);
        generate_message(name, 'self');
    })

    $("#chat-circle").click(function () {
        $("#chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');
    })

    $(".chat-box-toggle").click(function () {
        $("#chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');
    })

    $(document).on('click', '.show-chat', function (e) {
        e.preventDefault();
        let url = $(this).attr('data-url');
        $(".chat-cont-right").html("")
        $(".list-unstyled").html("");
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                showChat(data['messages']);
                showMessageUser(data['messages']);
                showListSenders(data['senders']);
            }
        });
    })

    function showChat(data ) {
        $.each(data, function (index, value) {
            let avatarPath = value.user.avatar;
            let avatar = localStorage.getItem('urlAsset') + avatarPath;
            $(".chat-cont-right").html("")
            $(".list-unstyled").html("");
            $(".list-senders").html("");
            let url = localStorage.getItem('urlAsset') + "sendMessage";

            let showChatStr = `
                                <div class="chat-header">
                                    <a id="back_user_list" class="back-user-list">
                                        <i class="material-icons">${value.user.firstName + value.user.firstName}</i>
                                    </a>
                                    <div class="media d-flex">
                                        <div class="media-img-wrap flex-shrink-0">
                                            <div class="avatar avatar-online">
                                                <img src="${avatar}" alt="User Image"
                                                     class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="media-body flex-grow-1">
                                            <div class="user-name">${value.user.firstName}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-body">
                                    <div class="chat-scroll">
                                        <ul class="list-unstyled"></ul>
                                    </div>
                                </div>
                                <form id="sendMessageTo${value.user.id}" data-url="${url}" method="post">
                                    <input type="hidden" name="_token" value="${csrf}" autocomplete="off">
                                     <div class="chat-footer">
                                        <div class="input-group">
                                                    <input type="text" name="content" class="input-msg-send form-control"
                                                           placeholder="Type your message here...">
                                                    <input type="hidden" name="user_id" value="${JSON.parse(localStorage.getItem('userData')).id}">
                                                    <input type="hidden" name="receiver_id" value="${data[0].user.id}">
                                                    <button data-id="${value.user.id}" type="submit" class="btn btn-primary msg-send-btn rounded-pill sendMessageTo">
                                                    <img src="${urlAsset}img/send-icon.svg" alt="">
                                                    </button>
                                        </div>
                                     </div>
                                </form>
                                `
            $(".chat-cont-right").append(showChatStr);
        })
    }
    $(document).on('click', '.sendMessageTo', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let form = $("#sendMessageTo" + id);
        let url = form.attr('data-url');
        let data = new FormData(form[0]);
        let withUserId = data.get('receiver_id');
        let userDataId = data.get('user_id');
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                showChat(data['messages']);
                showMessageUser(data['messages'], withUserId);
                showListSenders(data['senders']);
                generate_message(data['messages']);
            }
        });
    })

    function showMessageUser(data, withUserId) {
        let typeContent = "";
        console.log(data)
        $.each(data, function (index, chat) {
            if (
                (withUserId == chat.receiver_id && JSON.parse(localStorage.getItem('userData')).id == chat.user_id) ||
                (withUserId == chat.user_id && JSON.parse(localStorage.getItem('userData')).id == chat.receiver_id) ||
                (withUserId == null)
            ) {
                let type = chat.user.roleID == 4 ? "received" : "sent";
                let strTime = showTime(chat.created_at)
                let showChatScroll = `
                                            <li class="media ${type} d-flex">
                                                <div class="media-body flex-grow-1">
                                                    <div class="msg-box">
                                                        <div class="msg-bg">
                                                            <p>${chat.content}</p>
                                                        </div>
                                                        <ul class="chat-msg-info">
                                                            <li>
                                                                <div class="chat-time">
                                                                    <span>${strTime}</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                `
                typeContent += showChatScroll;
            }else{
                typeContent += "";
            }
            console.log(index)
        })
        if (typeContent != "") {
            $(".list-unstyled").append(typeContent);
        }

    }

    function showListSenders(data) {
        $(".list-senders").html("");
        const arrIdSender = [];
        let countMessage = data.length;
        $.each(data, function (index, value) {
            let id = value.user_id;
            let lastMessage = data[countMessage - 1].content ? data[countMessage - 1].content : value.latest_message.content;
            let url = urlAsset + 'getChatWithUser/' + id;
            url = url.replace(':userId', id);
            let avatarPath = value.user.avatar;
            let avatar = localStorage.getItem('urlAsset') + avatarPath;
            //kiểm tra xem id đã tồn tại trong mảng chưa
            if (!arrIdSender.includes(id)) {
                let listSenders = `
                                        <a  type="button" data-url = "${url}" data-sendersID = "${id}" class="media d-flex show-chat" id="showChat${id}">
                                                <div class="media-img-wrap flex-shrink-0">
                                                    <div class="avatar avatar-away">
                                                        <img src="${avatar}"
                                                             alt="User Image"
                                                             class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="media-body flex-grow-1">
                                                    <div>
                                                        <div
                                                            class="user-name">${value.user.firstName + value.user.lastName}</div>
                                                        <div class="user-last-chat">${lastMessage}</div>
                                                    </div>
                                        </div>
                                            </div>
                                        </a>
                `
                $(".list-senders").append(listSenders);
                arrIdSender.push(id);
            } else {
                return;
            }
        })
    }
        $("#chat-circle").click(function(){
            $(".box-chat").toggle('scale');
            $(".pkcp-popup").hide('scale');
        });
        $("#pkcp-button").click(function(){
            console.log('pkcp-button')
            // $(".pkcp-popup").toggle('scale');
            $(".box-chat").hide('scale');
        });
})
