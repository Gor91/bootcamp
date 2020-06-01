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
        <div class="sign__up__left" style="background-image: url(../../img/bg/sign_in.png);">
            <h4 class="sign__up__left__title">APPLY</h4>
            <footer class="footer">
                <div class="container">
                    <div class="footer__copyright">&copy; EIF | All rights Reserved 2020</div>
                </div>
            </footer>
        </div>
        <div class="sign__up__right">
            <form  class="sign__up__form">
                <div class="sign__up__block m-0">
                    <div class="sign__up__block__cont">
                        <p style="color: red;display: none" class="alert_wp">Wrong email or password.</p>
                        <div class="sign__up__row">
                            <input type="text" class="sign__up__input email_sign" id="input6">
                            <label for="input6" class="sign__up__label">Email Address</label>
                        </div>
                        <div class="sign__up__row">
                            <input type="password" class="sign__up__input pass_sign" id="input7">
                            <label for="input7" class="sign__up__label ">Password</label>
                        </div>
                        <button type="submit" class="sign__up__submit login_in_bk">Sign In</button>
                    </div>
                </div>
                <div class="sign__in__bottom">
                    <div class="sign__in__bottom__row">
                        <p class="sign__in__bottom__title">You Don't Have an Account?</p>
                        <a href="sign__in.php" class="upload__logo">SIGN Up</a>
                    </div>
                    <div class="sign__in__bottom__row">
<!--                        <p class="sign__in__bottom__title">Forgot Your Password?</p>-->
<!--                        <a href="#" class="upload__logo">Rest Password</a>-->
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