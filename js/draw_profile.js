$(document).ready(function () {
    var base_url = "http://localhost/eif_bootcamp/eif/";
    if(localStorage.getItem("profile_data")){
        let data_profile = JSON.parse(localStorage.getItem("profile_data"))
        data_profile.f_name ? $("#input1").val(data_profile.f_name)  : $("#input1").val("")
        data_profile.l_name ? $("#input2").val(data_profile.l_name)  : $("#input2").val("")
        data_profile.email ? $("#input3").val(data_profile.email)  : $("#input3").val("")
        data_profile.company_name ? $("#input4").val(data_profile.f_name)  : $("#input4").val("")
        data_profile.description ? $("#input5").val(data_profile.description)  : $("#input5").val("")
        $(".img_data_profile").attr("src", "../../"+data_profile.logo_path).css({
            width: "400",
            height: "400"
        });

        $("#video_div").empty();
        $("#video_div").append("<video  width=\"400\"  height=\"200\" \"400\" id=\"video_player\" controls>\n" +
            "                            <source id=\"video_player_src\" src=\"" + base_url+data_profile.video_path + "\"  type=\"video/mp4\">\n" +
            "                            Your browser does not support HTML video.\n" +
            "                        </video>\n")

        if(data_profile.new_video_path && data_profile.new_video_path != ""){
            $("#new_video_div").css("display","block");
            $("#new_video_div").empty();
            $("#new_video_div").append("<video  width=\"400\"  height=\"200\" \"400\" id=\"video_player\" controls>\n" +
                "                            <source id=\"video_player_src\" src=\"" + base_url+data_profile.new_video_path + "\"  type=\"video/mp4\">\n" +
                "                            Your browser does not support HTML video.\n" +
                "                        </video>\n")
        }
    }
})