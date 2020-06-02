<?php
session_start();
require "../config/const.php";
require "../config/action.php";

$db = new Db();
$v_c = $db->get_video_status();
$on_video_status = "";
$off_video_status = "";
if ($v_c[0]["video_status"] == '"disabled"' || $v_c[0]["video_status"] == "disabled") {
    $off_video_status = "checked";
    $on_video_status = "";
} else {
    $on_video_status = "checked";
    $off_video_status = "";
}
if (!empty($_SESSION)) {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN</title>
        <link rel="stylesheet" href="../../css/all.min.css">
        <link rel="stylesheet" href="../../css/style.css">
    </head>
    <body>
    <div class="wrapper">
        <div class="sign__up__wrapper">
            <button type="button" class="sign__up__submit" id="sign_out">sign out</button>
            <a href="../../index.php" class="sign__home ">Home</a>
            <div class="sign__up__left sign__up__left__admin">
                <h4 class="mt-5 mb-5 text-center">Admin</h4>
                <hr>
                <div class="row justify-content-center mt-5 mb-5">

                    <div id="video_radio">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input <?php echo $on_video_status ?> type="radio" id="customRadioInline1"
                                                                  name="customRadioInline1" class="custom-control-input"
                                                                  value="on">
                            <label class="custom-control-label" for="customRadioInline1">Turn on video upload</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input <?php echo $off_video_status ?> type="radio" id="customRadioInline2"
                                                                   name="customRadioInline1"
                                                                   class="custom-control-input"
                                                                   value="off">
                            <label class="custom-control-label" for="customRadioInline2">Turn off video upload</label>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row justify-content-between">
                    <h4 class="ml-5">Learning list</h4>
                    <button id="add_learning" class="btn btn-primary  mr-5">Add Learning</button>
                </div>
                <hr>

                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <?php
                        for ($i = 1; $i <= count($_SESSION["full_data"]["category"]); $i++) { ?>
                            <div class="card-header"
                                 id="heading-<?php echo $_SESSION["full_data"]["category"][$i][0]["category_id"] ?>">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse-<?php echo $_SESSION["full_data"]["category"][$i][0]["category_id"] ?>"
                                            aria-expanded="true"
                                            aria-controls="collapse-<?php echo $_SESSION["full_data"]["category"][$i][0]["category_id"] ?>">
                                        <?php echo $_SESSION["full_data"]["category"][$i][0]["category_name"] ?>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse-<?php echo $_SESSION["full_data"]["category"][$i][0]["category_id"] ?>"
                                 class="collapse show"
                                 aria-labelledby="heading-<?php echo $_SESSION["full_data"]["category"][$i][0]["category_id"] ?>"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <ul class="nav flex-column nav__admin__edit_list">
                                        <?php
                                        for ($j = 0; $j < count($_SESSION["full_data"]["category"][$i]); $j++) { ?>
                                            <li class="nav-item">
                                                <div class="row align-items-center justify-content-between">
                                                    <a class="nav-link"
                                                       href="#"><?php echo $_SESSION["full_data"]["category"][$i][$j]["learning_name"] ?></a>
                                                    <div>
                                                        <button class="btn btn-outline-primary edit_learning"
                                                                data-id="<?php echo $_SESSION["full_data"]["category"][$i][$j]["learning_id"] ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>

            </div>
            <div class="sign__up__right sign__up__right_admin">
                <form class="sign__up__form" id="edit_learnings" style="opacity: 0">
                    <div class="sign__up__block">
                        <div class="sign__up__block__title">Learning Part</div>
                        <div class="sign__up__block__cont">
                            <div class="sign__up__row mb-5">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category select</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <?php
                                        for ($i = 1; $i <= count($_SESSION["full_data"]["category"]); $i++) { ?>
                                            <option value="<?php echo $i ?>">
                                                <?php echo $_SESSION["full_data"]["category"][$i][0]["category_name"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="sign__up__row">
                                <input type="text" name="company_name" class="sign__up__input" id="learning_name">
                                <label for="learning_name" class="sign__up__label">Learning name</label>
                            </div>
                            <div class="sign__up__row">
                                <input type="url" name="company_name" class="sign__up__input" id="learning_link">
                                <label for="learning_link" class="sign__up__label">Link</label>
                            </div>
                            <div class="upload__logo__block">
                                <img id="learning_icon" src="../../img/icons/icon-image.png" alt="">
                            </div>
                            <div class="myfile__hide__row">
                                <input type="file" id="myfile" name="logo" class="myfile__hide">
                                <label for="myfile" class="upload__logo">
                                    <img src="../../img/icons/icon-upload.svg" alt="" class="upload__logo__icon ">
                                    Choose
                                </label>
                                <button class="upload__logo" id="admin_logo_upload">Upload Image</button>
                            </div>
                        </div>
                    </div>
                    <div class="sign__up__block">
                        <div class="sign__up__block__title">Save Changes ?</div>
                        <div class="sign__up__block__cont">
                            <div class="alert alert-success alert-dismissible fade alert__margin show" role="alert">
                                Successfully saved.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="sign__up__bottom__form">
                                <button type="button" id="learnign_save" class="sign__up__submit">Save</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="../../lib/jquery-3.5.1.min.js"></script>
    <script src="../../lib/popper.min.js"></script>
    <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../lib/OwlCarousel/owl.carousel.min.js"></script>
    <script src="../../js/script.js"></script>
    <script src="../../js/main.js"></script>

    </body>
    </html>
<?php } else {
    header('Location: '.$const["root_path"]);
} ?>

