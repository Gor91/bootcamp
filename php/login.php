<?php
require "config/action.php";
if ($_POST && array_key_exists("action", $_POST)) {
    if ($_POST["action"] == "sign_in") {
        $db = new Db();
        $db->login($_POST);
    }
    if ($_POST["action"] == "first_login") {
        $db = new Db();
        $db->editUser($_POST);
    }
    if ($_POST["action"] == "edit_from_profile") {
        $db = new Db();
        $db->editUser($_POST);
    }
    if($_POST["action"]== "log_out"){
        $db = new Db();
        $db->sign_out();
    }
    if($_POST["action"]== "get_learning_data"){
        $db = new Db();
        $db->get_learning_data($_POST);
    }
    if($_POST["action"]== "add_learning"){
        $db = new Db();
        $db->add_learning($_POST);
    }
    if($_POST["action"]== "edit_learning"){
        $db = new Db();
        $db->edit_learning($_POST);
    }
    if($_POST["action"]== "edit_video_status"){
        $db = new Db();
        $db->edit_video_status($_POST);
    }
    if($_POST["action"]== "see_profile"){
        $db = new Db();
        $db->see_profile($_POST);
    }

} else {
    echo "<html lang=\"en\">
            <head>
                <meta charset=\"UTF-8\">
                <title>Title</title>
            </head>
            <body>
                <h1>404 not found</h1>
            </body>
        </html>";
}
