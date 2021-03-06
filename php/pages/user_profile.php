<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="wrapper">
    <div class="sign__up__wrapper">
        <a href="../../index.php" class="sign__home ">Home</a>
        <div class="sign__up__left" style="background-image: url(../../img/bg/profile.png);">
            <h4 class="sign__up__left__title">PROFILE</h4>
            <footer class="footer">
                <div class="container">
                    <div class="footer__copyright">&copy; EIF | All rights Reserved 2020</div>
                </div>
            </footer>
        </div>
        <div class="sign__up__right">
            <h1 class="sign__up__right__title">INNOVATION MATCHING GRANT BOOTCAMP</h1>
            <form action="#" class="sign__up__form">
                <div class="sign__up__block">
                    <div class="sign__up__block__title">Personal Details</div>
                    <div class="sign__up__block__cont">
                        <div class="sign__up__row">
                            <input type="text" class="sign__up__input" id="input1" value="">
                        </div>
                        <div class="sign__up__row">
                            <input type="text" class="sign__up__input" id="input2" value="">
                        </div>
                        <div class="sign__up__row">
                            <input type="text" class="sign__up__input" id="input3" value="">
                        </div>
                    </div>
                </div>
                <div class="sign__up__block">
                    <div class="sign__up__block__title">Company Profile</div>
                    <div class="sign__up__block__cont">
                        <div class="sign__up__row">
                            <input type="text" class="sign__up__input" id="input4" value="Start Up XYZ">
                        </div>
                        <div class="sign__up__row sign__up__row__textarea">
                            <textarea class="sign__up__input" id="input5"></textarea>
                        </div>
                        <div class="upload__logo__block ">
                            <img src="" alt="" class="img_data_profile">
                        </div>

                        <p class="sign__up__desc">
                        </p>

                        <div class="upload__video__block" id="video_div">
                            <video width="400" height="200" id="video_player" controls>
                                <source id="video_player_src"
                                        src=""
                                        type="video/mp4">
                                Your browser does not support HTML video.
                            </video>
                        </div>                        <br>
                        <div  class="upload__video__block" id="new_video_div" style="display: none">
                            <video width="400" height="200" id="video_player" controls>
                                <source id="new_video_player_src"
                                        src=""
                                        type="video/mp4">
                                Your browser does not support HTML video.
                            </video>
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
<script src="../../js/main.js?t=<?=time()?>"></script>
<script src="../../js/draw_profile.js?t=<?=time()?>"></script>
</body>
</html>