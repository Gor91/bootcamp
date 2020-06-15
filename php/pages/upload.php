<?php
require "../config/action.php";

$db = new Db();
session_start();
$milliseconds = round(microtime(true) * 1000);
$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if ($_FILES["file"]["size"] > 104857600) {
    echo json_encode("large_file");
    $uploadOk = 0;
    return;
}
//23211408
if (!file_exists('../../uploads/' . $_SESSION["full_data"]["user_data"]["id"])) {
    mkdir('../../uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/img", 0777, true);
}
if ($imageFileType === "jpg" || $imageFileType === "png" || $imageFileType === "jpeg" || $imageFileType === "gif") {
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
        $img_path = 'uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/img/" . $milliseconds . "." . $imageFileType;
        if ($_SESSION["full_data"]["user_data"]["logo_path"] && file_exists("../../" . $_SESSION["full_data"]["user_data"]["logo_path"])) {
            unlink("../../" . $_SESSION["full_data"]["user_data"]["logo_path"]);
        }
        if (move_uploaded_file($_FILES['file']['tmp_name'], '../../uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/img/" . $milliseconds . "." . $imageFileType)) {
            $db->setFilePath($_SESSION["full_data"]["user_data"]["id"], 'uploads/' . $_SESSION["full_data"]["user_data"]["id"] . "/img/" . $milliseconds . "." . $imageFileType, "logo_path");
            $_SESSION["full_data"]["user_data"]["logo_path"] = $img_path;
        } else {
            echo "img_upload_error";
        }
    }
} else {
    echo json_encode("file_type");
    return;

}
