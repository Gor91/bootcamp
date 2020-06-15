<?php
require "../config/action.php";
require "../config/const.php";
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="wrapper">
    <div class="sign__up__wrapper">
        <a href="../../index.php" class="sign__home ">Home</a> 
        <div class="sign__up__left" style="background-image: url(../../img/bg/sign__up.png);">
            <h4 class="sign__up__left__title">Register</h4>
            <footer class="footer">
                <div class="container">
                    <div class="footer__copyright">&copy; EIF | All rights Reserved 2020</div>
                </div>
            </footer>
        </div>
        <div class="sign__up__right">
            <h1 class="sign__up__right__title">INNOVATION MATCHING GRANT BOOTCAMP</h1>
            <form action="#" class="sign__up__form" id="sign_up_f">
                <div class="sign__up__block">
                    <div class="sign__up__block__title">Personal Details</div>
                    <div class="sign__up__block__cont">
                        <div class="sign__up__row">
                            <?php if ($_SESSION["full_data"]["user_data"]["f_name"] != "") { ?>
                                <input type="text" name="f_name" class="sign__up__input aaa" id="input1"
                                       value="<?php echo $_SESSION["full_data"]["user_data"]["f_name"]; ?> ">
                            <?php } else { ?>
                                <input type="text" name="f_name" class="sign__up__input bbbb" id="input1">
                            <?php } ?>
                            <label for="input1" class="sign__up__label">First Name*</label>
                        </div>
                        <div class="sign__up__row">
                            <?php if ($_SESSION["full_data"]["user_data"]["l_name"] != "") { ?>
                                <input type="text" name="l_name" class="sign__up__input" id="input2"
                                       value="<?php echo $_SESSION["full_data"]["user_data"]["l_name"]; ?> ">
                            <?php } else { ?>
                                <input type="text" name="l_name" class="sign__up__input" id="input2">
                            <?php } ?>
                            <label for="input2" class="sign__up__label">Last Name*</label>
                        </div>
                        <div class="sign__up__row">
                            <?php if ($_SESSION["full_data"]["user_data"]["email"] != "") { ?>
                                <input disabled type="text" name="email" class="sign__up__input" id="input3"
                                       value="<?php echo $_SESSION["full_data"]["user_data"]["email"]; ?> ">
                            <?php } else { ?>
                                <input disabled type="text" name="email" class="sign__up__input" id="input3">
                            <?php } ?>
                            <label for="input3" class="sign__up__label">Email Address*</label>
                        </div>
                    </div>
                </div>
                <div class="sign__up__block">
                    <div class="sign__up__block__title">Company Profile</div>
                    <div class="sign__up__block__cont">
                        <div class="sign__up__row">
                            <?php if ($_SESSION["full_data"]["user_data"]["company_name"] != "") { ?>
                                <input type="text" name="company_name" class="sign__up__input" id="input4"
                                       value="<?php echo $_SESSION["full_data"]["user_data"]["company_name"]; ?> ">
                            <?php } else { ?>
                                <input type="text" name="company_name" class="sign__up__input" id="input4">
                            <?php } ?>
                            <label for="input4" class="sign__up__label">Company Name*</label>
                        </div>
                        <div class="sign__up__row sign__up__row__textarea">
                            <?php if ($_SESSION["full_data"]["user_data"]["description"] != "") { ?>
                                <textarea name="description" class="sign__up__input "
                                          id="input5"><?php echo $_SESSION["full_data"]["user_data"]["description"] ?></textarea>
                            <?php } else { ?>
                                <textarea name="description" class="sign__up__input" id="input5"></textarea>
                            <?php } ?>
                            <label for="input5" class="sign__up__label">Description</label>
                        </div>
                        <div class="upload__logo__block">
                            <?php if ($_SESSION["full_data"]["user_data"]["logo_path"] != "") { ?>
                                <img id="logo_user"
                                     src="<?php echo $const["root_path"] . $_SESSION["full_data"]["user_data"]["logo_path"] ?>"
                                     width="400" height="400" alt="">
                            <?php } else { ?>
                                <img id="logo_user" src="../../img/icons/icon-image.png" alt="">
                            <?php } ?>
                        </div>

                        <div class="myfile__hide__row">
                            <input type="file" id="myfile" name="logo" class="myfile__hide">
                            <label for="myfile" class="upload__logo">
                                <img src="../../img/icons/icon-upload.svg" alt="" class="upload__logo__icon">
                                Choose
                            </label>
                            <button class="upload__logo" id="logo_upload">Upload Logo</button>
                        </div>
                        <p class="sign__up__desc">

                        </p>
                        <div class="upload__video__block" id="video_div">
				<?php if ($_SESSION["full_data"]["user_data"]["video_path"] != "") {?>
                               		<input type="hidden" name="video_path" value="allow">
                            		<video width="400" height="250" controls>
		                                <source id="video_player_src"  src="<?php echo $const["root_path"] . $_SESSION["full_data"]["user_data"]["video_path"] ?>"  type="video/mp4">
                		        </video>
                            <?php }else{?>
                                <input type="hidden" name="video_path" value="">
                                <source src="../../img/icons/icon-video.png" alt="">
                           <?php }?>                        </div>
                        <div class="myfile__hide__row">
                            <input type="file" id="myVideo" name="video"  class="myfile__hide">
                            <label for="myVideo" class="upload__logo">
                                <img src="../../img/icons/icon-upload.svg"  alt="" class="upload__logo__icon">
                                Choose
                            </label>
                            <button class="upload__logo" id="video_upload" >Upload Video</button>
                        </div>
                        <p class="sign__up__desc">

                        </p>
                    </div>
                </div>
                <div class="sign__up__block">
                    <div class="sign__up__block__title">Create Password</div>
                    <div class="sign__up__block__cont">
                        <div class="sign__up__row">
                            <input type="password" class="sign__up__input" id="input6" name="password">
                            <label for="input6" class="sign__up__label" id="pass_label">Password*</label>
                        </div>
                        <div class="sign__up__row">
                            <input type="password" class="sign__up__input" id="input7" name="confirm_password">
                            <label for="input7" class="sign__up__label" id="confirm_pass_label">Confirm
                                Password*</label>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade alert__margin show" role="alert">
                            <span id="alert_span">The file size is large please upload it up to 100 mb file.</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <button type="button" class="sign__up__submit" id="sign_up_reg">Complete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="loader__all">
    <div id="preload">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
</div>
<script src="../../lib/jquery-3.5.1.min.js"></script>
<script src="../../lib/popper.min.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
<script src="../../lib/OwlCarousel/owl.carousel.min.js"></script>
<script src="../../js/main.js?t=<?=time()?>"></script>
<script src="../../js/script.js?t=<?=time()?>"></script>
</body>
</html>
