<?php
session_start();
require "../config/action.php";

$db = new Db();

if ($_SESSION && array_key_exists("full_data", $_SESSION) && array_key_exists("status", $_SESSION["full_data"]) && $_SESSION["full_data"]["status"] == "admin_login") {
    $target_dir = "../../uploads/admin/category/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $milliseconds = round(microtime(true) * 1000);

    if ($imageFileType === "jpg" || $imageFileType === "png" || $imageFileType === "jpeg" || $imageFileType === "gif") {
        if (0 < $_FILES['file']['error']) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        } else {

            $img_path = $target_dir . $milliseconds . "." . $imageFileType;
            $img_full = '../../uploads/admin/category/' . $milliseconds . "." . $imageFileType;
            if (move_uploaded_file($_FILES['file']['tmp_name'], '../../uploads/admin/category/' . $milliseconds . "." . $imageFileType)) {
                $_SESSION["admin_img_tmp_path"] = $img_full;
                echo json_encode($img_full);
            } else {
                echo "img_upload_error";
            }
        }
    }

}