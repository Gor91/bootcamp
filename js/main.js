var base_url = "http://bootcamp.eif.am/";

$(".sign_in_bk").on("click", function () {
    if ($(this).text() === "MY PROFILE") {
        location.replace(base_url + "php/pages/profile.php");
    } else {
        location.replace(base_url + "php/pages/sign__in.php");
    }
})

$(".login_in_bk").on("click", function (e) {
    e.preventDefault();
    $(".alert_wp").css("display", "none");
    $.ajax({
        method: "Post",
        url: base_url + "php/login.php",
        data: {action: "sign_in", email: $(".email_sign").val(), pass: $(".pass_sign").val()},
        success: function (data) {
            if (data && typeof data === "string" && JSON.parse(data) !== "user_not_found") {
                $(".alert_wp").css("display", "none");

                let res_data = "";
                try {
                    res_data = JSON.parse(data);
                } catch (e) {
                }
                if (res_data && "status" in res_data && res_data.status === "first_login") {
                    location.replace(base_url + "php/pages/sign__up.php");
                } else if (res_data && "status" in res_data && res_data.status === "registered_user") {
                    location.replace(base_url + "php/pages/profile.php");
                } else if (res_data && "status" in res_data && res_data.status === "admin_login") {
                    location.replace(base_url + "php/pages/admin.php");
                }
            } else if (JSON.parse(data) === "user_not_found") {
                $(".alert_wp").css("display", "block");
            }
        }
    })
})

$("#logo_upload").on("click", function (e) {
    e.preventDefault();
    var file_data = $('#myfile').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    $.ajax({
        url: 'upload.php', // point to server-side PHP script
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (php_script_response) {
            if (php_script_response && "status" in JSON.parse(php_script_response)) {
                $("#logo_user").attr("src", JSON.parse(php_script_response).img_path).css({
                    width: "400",
                    height: "400"
                });
            }
        }
    });
})

$("#video_upload").on("click", function (e) {
    e.preventDefault();
    $(".loader__all").css("display","block");
    if ($('#myVideo').prop('files')[0]) {
        var file_data = $('#myVideo').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: 'upload.php', // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (php_script_response) {
                if (php_script_response && JSON.parse(php_script_response) === "large_file") {
                    $(".loader__all").css("display","none");
                    $(".alert__margin").css("display", "block")
                    return;
                }
                if (php_script_response && "status" in JSON.parse(php_script_response)) {
                    if (JSON.parse(php_script_response).type === "new_video_path") {
                        $(".loader__all").css("display","none");
                        setTimeout(function () {
                            $("input[name=video_path]").val("uploaded")
                            //video_div
                            $("#new_video_div").empty();
                            $("#new_video_div").append("<video  width=\"400\"  height=\"200\" \"400\" id=\"video_player\" controls>\n" +
                                "                            <source id=\"video_player_src\" src=\"" + JSON.parse(php_script_response).img_path + "\"  type=\"video/mp4\">\n" +
                                "                            Your browser does not support HTML video.\n" +
                                "                        </video>\n")
                        }, 1000)
                    } else {
                        $(".loader__all").css("display","none");
                        setTimeout(function () {
                            $("input[name=video_path]").val("uploaded")
                            //video_div
                            $("#video_div").empty();
                            $("#video_div").append("<video  width=\"400\"  height=\"200\" \"400\" id=\"video_player\" controls>\n" +
                                "                            <source id=\"video_player_src\" src=\"" + JSON.parse(php_script_response).img_path + "\"  type=\"video/mp4\">\n" +
                                "                            Your browser does not support HTML video.\n" +
                                "                        </video>\n")
                        }, 1000)
                    }

                }
                if(!php_script_response){
                    $(".loader__all").css("display","none");
                    $(".alert__margin").css("display", "block")
                   $("#alert_span").text("Something went wrong, please contact our administrator.")
                }
            },
            error:function (err) {
                console.log(err)
            }
        });
    } else {
        alert("Please choose file");
    }

})
$(".user_profile").on("click", function (e) {
    $.ajax({
        method: "Post",
        url: base_url + "php/login.php",
        data: {action: "see_profile", id: $(this).attr("data-id")},
        success: function (data) {
            if (data) {
                localStorage.removeItem("profile_data");
                localStorage.setItem("profile_data", data);
                location.replace(base_url + "php/pages/user_profile.php");
            }
        }
    })
})
$("#sign_up_reg").on("click", function () {
    let email_regex = new RegExp('^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$');
    let f_name_l_name = new RegExp('^[a-zA-Z ]+$');
    let pass_regex = new RegExp("^(?=.*[\\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])[\\w!@#$%^&*]{8,}$");
    let form_data = $("#sign_up_f").serialize();
    let inputs = $("#sign_up_f :input");
    let values = {};
    let errors = false
    if ($("input[name=confirm_password]").val() !== $("input[name=password]").val()) {
        errors = true;
        $("#confirm_pass_label").text("The password and the confirm password must be equal.").css("color", "red");
        $("#pass_label").text("The password and the confirm password must be equal.").css("color", "red");
    } else {
        errors = false;
        $("#confirm_pass_label").text("Confirm Password*").css("color", "black");
        $("#pass_label").text("Password*").css("color", "black");
    }
    inputs.each(function () {
        if (this.name !== "logo" && $(this).val() === "") {
            $(this).siblings("label").css("color", "red");
        }
        if (this.name === "f_name") {
            let res = f_name_l_name.test($("input[name=f_name]").val().trim());
            if (!res) {
                errors = true;
                $(this).siblings("label").css("color", "red");
            } else {
                $(this).siblings("label").css("color", "black");
            }
        }
        if (this.name === "l_name") {
            let res = f_name_l_name.test($("input[name=l_name]").val().trim());
            if (!res) {
                errors = true;
                $(this).siblings("label").css("color", "red");
            } else {
                $(this).siblings("label").css("color", "black");
            }
        }
        if (this.name === "email") {
            let email_result = email_regex.test($("input[name=email]").val().trim())
            if (!email_result) {
                $(this).siblings("label").css("color", "red");
                errors = true;
            } else {
                $(this).siblings("label").css("color", "black");
            }
        }
        if (this.name === "company_name") {
            let res = f_name_l_name.test($("input[name=company_name]").val().trim());
            if (!res) {
                errors = true;
                $(this).siblings("label").css("color", "red");
            } else {
                $(this).siblings("label").css("color", "black");
            }
        }
        if (this.name === "description") {
            let res = $("textarea[name=description]").val();
            if (res === "") {
                errors = true;
                $(this).siblings("label").css("color", "red");
            } else {
                $(this).siblings("label").css("color", "black");
            }
        }

        if (this.name === "password" && $("input[name=password]").val().trim() != "") {
            let res = pass_regex.test($("input[name=password]").val().trim());
            if (!res) {
                errors = true;
                $("#pass_label").text("Must have both capital letter and small letter and digital value and !@#$... such symbols")
                $(this).siblings("label").css("color", "red");
            } else {
                $("#pass_label").text("Password*")
                $(this).siblings("label").css("color", "black");
            }
        }
        if (this.name === "confirm_password" && $("input[name=confirm_password]").val().trim() != "") {
            let res = pass_regex.test($("input[name=confirm_password]").val().trim());
            if (!res) {
                errors = true;
                $("#confirm_pass_label").text("Must have both capital letter and small letter and digital value and !@#$... such symbols")
                $(this).siblings("label").css("color", "red");
            } else {
                $("#confirm_pass_label").text("Confirm Password*")
                $(this).siblings("label").css("color", "black");
            }
        }
        $("#logo_spec").css("color", "black");
    })

    let res = $("input[name=video_path]").val();
    if (res === "") {
        errors = true;
        $("#video_label").css("color", "red");
    } else {
        $("#video_label").css("color", "black");
    }

    if (!errors) {
        values["f_name"] = $("input[name=f_name]").val().trim();
        values["l_name"] = $("input[name=l_name]").val().trim();
        values["email"] = $("input[name=email]").val().trim();
        values["description"] = $("textarea[name=description]").val().trim();
        values["company_name"] = $("input[name=company_name]").val().trim();
        values["password"] = $("input[name=password]").val().trim();
        values["confirm_password"] = $("input[name=confirm_password]").val().trim();
        $.ajax({
                method: "Post",
                url: base_url + "php/login.php",
                data: {action: "first_login", data: values},
                success: function (data) {
                    if (data) {
                        if (JSON.parse(data) === "password_not_equal") {
                            //alert passwordi sxal

                        }
                        if (JSON.parse(data) === "email_not_found") {
                            //alert email@ chka dimel administratorin
                        }
                        if (typeof JSON.parse(data) == "object") {
                            location.replace(base_url + "php/pages/sign__up__thank__you.php");
                        }
                    }
                }
            }
        )
    }
})

$("#profile_save_changes").on("click", function () {
    let email_regex = new RegExp('^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$');
    let f_name_l_name = new RegExp('^[a-zA-Z ]+$');
    let inputs = $("#edit_user_from_profile :input");
    let values = {};
    let errors = false
    $("input[name=video_path]").val("uploaded")
    inputs.each(function () {

        if (this.name !== "logo" && $(this).val() === "") {
            $(this).siblings("label").css("color", "red");
        }
        if (this.name !== "logo") {
            // values[this.name] = $(this).val()
        }
        if (this.name === "f_name") {
            let res = f_name_l_name.test($("input[name=f_name]").val().trim());
            if (!res) {
                errors = true;
                $(this).siblings("label").css("color", "red");
            } else {
                $(this).siblings("label").css("color", "black");
            }
        }
        if (this.name === "l_name") {
            let res = f_name_l_name.test($("input[name=l_name]").val().trim());
            if (!res) {
                errors = true;
                $(this).siblings("label").css("color", "red");
            } else {
                $(this).siblings("label").css("color", "black");
            }
        }
        if (this.name === "email") {
            let email_result = email_regex.test($("input[name=email]").val().trim())

            if (!email_result) {
                errors = true;
                $(this).siblings("label").css("color", "red");
            } else {
                $(this).siblings("label").css("color", "black");
            }
        }
        if (this.name === "company_name") {
            let res = f_name_l_name.test($("input[name=company_name]").val().trim());
            if (!res) {
                errors = true;
                $(this).siblings("label").css("color", "red");
            } else {
                $(this).siblings("label").css("color", "black");
            }
        }
        if (this.name === "description") {
            let res = $("textarea[name=description]").val();
            if (res === "") {
                errors = true;
                $(this).siblings("label").css("color", "red");
            } else {
                $(this).siblings("label").css("color", "black");
            }
        }
        $("#logo_spec").css("color", "black");
    })

    let res = $("input[name=video_path]").val();
    if (res === "") {
        errors = true;
        $("#video_label").css("color", "red");
    } else {
        $("#video_label").css("color", "black");
    }
    if (!errors) {
        values["f_name"] = $("input[name=f_name]").val().trim();
        values["l_name"] = $("input[name=l_name]").val().trim();
        values["email"] = $("input[name=email]").val().trim();
        values["description"] = $("textarea[name=description]").val().trim();
        values["company_name"] = $("input[name=company_name]").val().trim();
        $.ajax({
            method: "Post",
            url: base_url + "php/login.php",
            data: {action: "edit_from_profile", data: values},
            success: function (data) {
                if (data) {
                    if (JSON.parse(data) === "password_not_equal") {
                        //alert passwordi sxal
                    }
                    if (JSON.parse(data) === "email_not_found") {
                        //alert email@ chka dimel administratorin
                    }
                    if (typeof JSON.parse(data) == "object") {
                        location.replace(base_url);
                    }
                }
            }
        })
    }
})
$("#sign_out").on("click", function () {
    $.ajax({
        method: "Post",
        url: base_url + "php/login.php",
        data: {action: "log_out"},
        success: function (data) {
            if (data && JSON.parse(data) == "log_out") {
                location.replace(base_url);
            }
        }
    })
})

var category_id = "";

$("#add_learning").on("click", function () {
    $("#edit_learnings").css("opacity", "1");
    $("#learning_name").val("");
    $("#learning_link").val("");
    $("#exampleFormControlSelect1").val("");
    $("#learning_icon").attr("src", "");
    $("#learnign_save").attr("data-status", "create");
})
$("#exampleFormControlSelect1").change(function () {
    category_id = $(this).children("option:selected").val();
})

var edit_learn_id = "";

$(".edit_learning").on("click", function () {
    $("#edit_learnings").css("opacity", "1");
    $(".edit_learning").removeClass("activ_edit_learning");
    $(this).addClass("activ_edit_learning");
    edit_learn_id = $(this).attr("data-id")
    $.ajax({
        method: "Post",
        url: base_url + "php/login.php",
        data: {action: "get_learning_data", id: $(this).attr("data-id")},
        success: function (data) {
            if (data && typeof JSON.parse(data) == "object") {
                let parsed_data = JSON.parse(data);
                $("#learning_name").val(parsed_data.name);
                $("#learning_link").val(parsed_data.link);
                $("#exampleFormControlSelect1").val(parsed_data.category_id);
                $("#learning_icon").attr("src", parsed_data.img_path).addClass("upload__logo__img");
            }
        }
    })
})
var is_img_uploaded = false;
$("#admin_logo_upload").on("click", function (e) {
    e.preventDefault();
    var file_data = $('#myfile').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    $.ajax({
        url: 'admin_upload.php', // point to server-side PHP script
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (php_script_response) {
            if (php_script_response && typeof JSON.parse(php_script_response) === "string") {
                $("#learning_icon").attr("src", JSON.parse(php_script_response)).addClass("upload__logo__img")
            }
            is_img_uploaded = true;
        }
    });
})

$("#learnign_save").on("click", function () {
    if ($(this).attr("data-status") === "create") {
        let learning_data = {
            learning_name: $("#learning_name").val(),
            learning_link: $("#learning_link").val(),
            selected_id: $("#exampleFormControlSelect1").val()
        }
        $.ajax({
            method: "Post",
            url: base_url + "php/login.php",
            data: {action: "add_learning", data: learning_data},
            success: function (data) {
                if(data === '"succesfulli_edited"'){
                    $(".alert__margin").css("display","block");
                }
            }
        })

    } else {
        let learning_data = {
            learning_name: $("#learning_name").val(),
            learning_link: $("#learning_link").val(),
            selected_id: $("#exampleFormControlSelect1").val(),
            learning_id: edit_learn_id,
            img_status: is_img_uploaded
        }
        $.ajax({
            method: "Post",
            url: base_url + "php/login.php",
            data: {action: "edit_learning", data: learning_data},
            success: function (data) {
                if(data === '"succesfulli_edited"'){
                    $(".alert__margin").css("display","block");
                }
            }
        })
    }
})

$("#video_radio input").on('change', function () {
    var status_video = "disabled";
    if ($('input[name=customRadioInline1]:checked').val() === "on") {
        status_video = "active";
    } else {
        status_video = "disabled";
    }
    $.ajax({
        method: "Post",
        url: base_url + "php/login.php",
        data: {action: "edit_video_status", change: status_video},
        success: function (data) {
        }
    })
});
$("#cancel_profile_changes").on("click", function () {
    location.replace(base_url);
})

