<?php
require "../config/action.php";

$db = new Db();

session_start();
$milliseconds = round(microtime(true) * 1000);
$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if ($_FILES["file"]["size"] > 100919165) {
    echo json_encode("large_file");
    $uploadOk = 0;
    return;
}
//23211408
if (!file_exists('../../uploads/' . $_SESSION["full_data"]["user_data"]["id"])) {
    mkdir('../../uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/img", 0777, true);
    mkdir('../../uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/video/1", 0777, true);
    mkdir('../../uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/video/2", 0777, true);
}

if ($imageFileType === "jpg" || $imageFileType === "png" || $imageFileType === "jpeg" || $imageFileType === "gif") {
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
        $img_path = 'uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/img/" . $milliseconds . "." . $imageFileType;
        if (file_exists("../../" . $_SESSION["full_data"]["user_data"]["logo_path"])) {
            unlink("../../" . $_SESSION["full_data"]["user_data"]["logo_path"]);
        }

        if (move_uploaded_file($_FILES['file']['tmp_name'], '../../uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/img/" . $milliseconds . "." . $imageFileType)) {
            $db->setFilePath($_SESSION["full_data"]["user_data"]["id"], 'uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/img/" . $milliseconds . "." . $imageFileType, "logo_path");
            $_SESSION["full_data"]["user_data"]["logo_path"] = $img_path;
        } else {
            echo "img_upload_error";
        }
    }
} else if ($imageFileType == "mp4") {
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
        $v_s = $db->get_video_status();
        if ($v_s[0]["video_status"] == "active") {
            $video_path = 'uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/video/2/" . $milliseconds . "." . $imageFileType;
            if (file_exists("../../" . $_SESSION["full_data"]["user_data"]["new_video_path"])) {
                unlink("../../" . $_SESSION["full_data"]["user_data"]["new_video_path"]);
            }
            if (move_uploaded_file($_FILES['file']['tmp_name'], '../../uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/video/2/" . $milliseconds . "." . $imageFileType)) {
                $db->setFilePath($_SESSION["full_data"]["user_data"]["id"], 'uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/video/2/" . $milliseconds . "." . $imageFileType, "new_video_path");
                $_SESSION["full_data"]["user_data"]["new_video_path"] = $video_path;
            } else {
                echo "video_upload_error";
            }
        } else {
            $video_path = 'uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/video/1/" . $milliseconds . "." . $imageFileType;
            if (file_exists("../../" . $_SESSION["full_data"]["user_data"]["video_path"])) {
                unlink("../../" . $_SESSION["full_data"]["user_data"]["video_path"]);
            }
            if (move_uploaded_file($_FILES['file']['tmp_name'], '../../uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/video/1/" . $milliseconds . "." . $imageFileType)) {
                $db->setFilePath($_SESSION["full_data"]["user_data"]["id"], 'uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/video/1/" . $milliseconds . "." . $imageFileType, "video_path");
                $_SESSION["full_data"]["user_data"]["video_path"] = $video_path;
            } else {
                echo "video_upload_error";
            }
        }

    }
}

