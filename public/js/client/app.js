$(document).ready(function () {
    $("#oldToggleBtn").click(function () {
        let current_password = $("#current_password");
        let oldToggleButton = $("#oldToggleBtn");

        if (current_password.attr("type") === "password") {
            current_password.attr("type", "text");
            oldToggleButton.html("<i class='fa fa-eye'></i>");
        } else {
            current_password.attr("type", "password");
            oldToggleButton.html("<i class='fa fa-eye-slash'></i>");
        }
    });

    $("#newToggleBtn").click(function () {
        let new_password = $("#new_password");
        let newToggleButton = $("#newToggleBtn");

        if (new_password.attr("type") === "password") {
            new_password.attr("type", "text");
            newToggleButton.html("<i class='fa fa-eye'></i>");
        } else {
            new_password.attr("type", "password");
            newToggleButton.html("<i class='fa fa-eye-slash'></i>");
        }
    });

    $("#re_toggleBtn").click(function () {
        let re_passwordInput = $("#re_password");
        let re_toggleButton = $("#re_toggleBtn");

        if (re_passwordInput.attr("type") === "password") {
            re_passwordInput.attr("type", "text");
            re_toggleButton.html("<i class='fa fa-eye'></i>");
        } else {
            re_passwordInput.attr("type", "password");
            re_toggleButton.html("<i class='fa fa-eye-slash'></i>");
        }
    });
});
