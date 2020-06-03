<?php
require "php/config/action.php";
require "php/config/const.php";
$db = new Db();
$categories = $db->get_categores();
session_start();
$href = "";
$link_name = "";
$apply = false;
if (!empty($_SESSION) && array_key_exists("full_data", $_SESSION)) {
    $href = $const["root_path"] . "php/pages/profile.php";
    $link_name = "MY PROFILE";
} else {
    $href = $const["root_path"] . "php/pages/sign__in.php";
    $apply = true;
    $link_name = "SIGN IN";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EIF Bootcamp</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">

    <!--    start header-->
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">INNOVATION MATCHING GRANT BOOTCAMP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <div class="header__list"><a href="#about" class="nav-item nav-link header__link">About</a>
                        </div>
                        <div class="header__list"><a href="#agenda" class="nav-item nav-link header__link">Agenda</a>
                        </div>
                        <div class="header__list"><a href="#mentors" class="nav-item nav-link header__link">Mentors</a>
                        </div>
                        <div class="header__list"><a href="#participants" class="nav-item nav-link header__link">Participants</a>
                        </div>
                        <div class="header__list"><a href="#learning"
                                                     class="nav-item nav-link header__link">Learning</a></div>
                        <div class="header__list"><a href="#contact" class="nav-item nav-link header__link">Contacts</a>
                        </div>
                        <div class="header__list"><a href="<?php echo $href ?>"
                                                     class="nav-item nav-link header__link sign_in_bk"
                                                     id="sign_in"><?php echo $link_name ?></a></div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--    end header-->
    <!--    start banner-->
    <section id="banner" class="banner">
        <div class="container">
            <figure class="banner__logo">
                <a href="index.php" class="banner__logo__link">
                    <img src="img/logo/logo-eif.png" width="150" height="50" alt="" class="banner__logo__img">
                </a>
            </figure>
            <div class="row justify-content-between banner__content ">
                <div class="col-9">
                    <div class="banner__desc">
                        <h3 class="banner__sub__title">
                            EIF Online Bootcamp & Online Mentorship Platform
                        </h3>
                        <h1 class="banner__title">
                            INNOVATION MATCHING GRANT BOOTCAMP
                        </h1>
                        <?php if ($apply) { ?>
                            <a href="<?php echo $href ?>" class="banner__apply">APPLY</a>
                        <?php } ?>

                    </div>
                </div>
                <div class="col-3">
                    <nav class="banner__nav ">
                        <ul class="banner__nav__block">
                            <li class="banner__nav__list"><a href="#about" class="banner__nav__link">About</a></li>
                            <li class="banner__nav__list"><a href="#agenda" class="banner__nav__link">Agenda</a></li>
                            <li class="banner__nav__list"><a href="#mentors" class="banner__nav__link">Mentors</a></li>
                            <li class="banner__nav__list"><a href="#participants"
                                                             class="banner__nav__link">Participants</a></li>
                            <li class="banner__nav__list"><a href="#learning" class="banner__nav__link">Learning</a>
                            </li>
                            <li class="banner__nav__list"><a href="#contact" class="banner__nav__link">Contacts</a></li>
                            <li class="banner__nav__list"><a href="<?php echo $href ?>"
                                                             class="banner__nav__link sign_in_bk"><?php echo $link_name; ?></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>

    </section>
    <!--    end banner-->
    <!--    start about-->
    <section id="about" class="about">
        <div class="container">
            <div class="container">
                <div class="row align-items-center justify-content-between flex-md-row flex-sm-column justify-content-sm-center">
                    <div class="col-md-6 col-sm-12 justify-content-sm-center">
                        <figure class="about__figure">
                            <img src="img/post/about.png" alt="" class="about__img">
                        </figure>
                    </div>
                    <div class="col-md-6 col-sm-12 p-sm-1">
                        <h2 class="about__title title">About</h2>
                        <p class="about__desc">
                            Innovation Matching Grants bootcamp event is organized to give the startups an exclusive
                            opportunity to learn from top speakers, gain valuable skills and prepare for pitching.
                            Startups will also have one on one learning sessions with professional mentors who will
                            share their knowledge about making attractive presentations for the upcoming Venture
                            Forum. This event is a great chance to gain entrepreneurship knowledge for building a
                            successful startup with the help of speakers, mentors and useful learning materials.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    end about-->

    <!--    start agenda-->
    <section id="agenda" class="agenda">
        <div class="container">
            <h2 class="agenda__title title">Agenda</h2>
        </div>
        <div class="agenda__cont owl-carousel">
            <div class="item agenda__item">
                <p class="agenda__day__big">DAY 1 Session 1</p>
                <p class="agenda__day__small">June 3, 2020</p>
                <p class="agenda__day__small">18:00 – 19:00</p>
                <h4 class="agenda__item__title">WELCOME – OPENING</h4>
                <ul>
                    <li style="list-style-type: disc;">IMG, RMG grant project introduction</li>
                    <li style="list-style-type: disc;">What will you gain from the Bootcamp</li>
                </ul>
                <h5 class="agenda__speakers__title">Speakers</h5>
                <div class="agenda__speakers__row">
                    <img src="img/users/18.png" alt="" class="agenda__speakers__avatar">
                    <p class="agenda__speakers__name">Bagrat Yengibaryan</p>
                </div>
                <div class="agenda__speakers__row">
                    <img src="img/users/17.png" alt="" class="agenda__speakers__avatar">
                    <p class="agenda__speakers__name"> Amalya Yeghoyan</p>
                </div>

            </div>
            <div class="item agenda__item">
                <p class="agenda__day__big">DAY 1 Session 2</p>
                <p class="agenda__day__small">June 3, 2020</p>
                <p class="agenda__day__small">19:00 – 20:00</p>
                <ul>
                    <li style="list-style-type: disc;">How to make your product win the competitors?</li>
                    <li style="list-style-type: disc;">Why do you need investment and how to raise your first million dollars?</li>
                    <li  style="list-style-type: disc;">How to pitch your startup and what is important for an investor to hear from you?</li>
                </ul>
                <p>Q&A session</p>
                <h5 class="agenda__speakers__title">Speakers</h5>
                <div class="agenda__speakers__row">
                    <img src="img/users/4.png" alt="" class="agenda__speakers__avatar">
                    <p class="agenda__speakers__name">Peter Michaelian
                    </p>
                </div>
            </div>
            <div class="item agenda__item">
                <p class="agenda__day__big">Day 2 Session 3</p>
                <p class="agenda__day__small">June 4, 2020</p>
                <p class="agenda__day__small">21:00-22:00</p>
                <ul>
                    <li style="list-style-type: disc;">How to make your product win the competitors?</li>
                    <li style="list-style-type: disc;">Why do you need investment and how to raise your first million dollars?</li>
                    <li  style="list-style-type: disc;">How to pitch your startup and what is important for an investor to hear from you?</li>
                </ul>
                <p>Q&A session</p>
                <h5 class="agenda__speakers__title">Speakers</h5>
                <div class="agenda__speakers__row">
                    <img src="img/users/2.png" alt="" class="agenda__speakers__avatar">
                    <p class="agenda__speakers__name">Zarik Poghossian</p>
                </div>
            </div>
            <div class="item agenda__item">
                <p class="agenda__day__big">Day 3 Session 4</p>
                <p class="agenda__day__small"> June 5, 2020</p>
                <p class="agenda__day__small">14:00-15:00</p>
                <ul>
                    <li style="list-style-type: disc;">How to make your product win the competitors?</li>
                    <li style="list-style-type: disc;">Why do you need investment and how to raise your first million dollars?</li>
                    <li  style="list-style-type: disc;">How to pitch your startup and what is important for an investor to hear from you?</li>
                </ul>
                <p>Q&A session</p>
                <h5 class="agenda__speakers__title">Speakers</h5>
                <div class="agenda__speakers__row">
                    <img src="img/users/5.png" alt="" class="agenda__speakers__avatar">
                    <p class="agenda__speakers__name">Yeva Hyusyan</p>
                </div>
            </div>
            <div class="item agenda__item">
                <p class="agenda__day__big">Day 4 Session 5</p>
                <p class="agenda__day__small">June 8, 2020</p>
                <p class="agenda__day__small">19:00-20:00</p>
                <ul>
                    <li style="list-style-type: disc;">How to make your product win the competitors?</li>
                    <li style="list-style-type: disc;">Why do you need investment and how to raise your first million dollars?</li>
                    <li  style="list-style-type: disc;">How to pitch your startup and what is important for an investor to hear from you?</li>
                </ul>
                <p>Q&A session</p>
                <h5 class="agenda__speakers__title">Speakers</h5>
                <div class="agenda__speakers__row">
                    <img src="img/users/16.png" alt="" class="agenda__speakers__avatar">
                    <p class="agenda__speakers__name">Tania Sahakian</p>
                </div>
            </div>
            <div class="item agenda__item">
                <p class="agenda__day__big">Day 5 Session 6</p>
                <p class="agenda__day__small">June 9, 2020</p>
                <p class="agenda__day__small">14:00-15:00</p>
                <h4 class="agenda__item__title">CONTRACTING, LEGAL AND FINANCIAL ISSUES</h4>
                <p>Q&A session</p>
                <h5 class="agenda__speakers__title">Speakers</h5>
                <div class="agenda__speakers__row">
                    <img src="img/users/1.png" alt="" class="agenda__speakers__avatar">
                    <p class="agenda__speakers__name">Aram Khachatryan</p>
                </div>
                <div class="agenda__speakers__row">
                    <img src="img/users/3.png" alt="" class="agenda__speakers__avatar">
                    <p class="agenda__speakers__name">Knarik Barseghyan</p>
                </div>
            </div>
            <div class="item agenda__item">
                <p class="agenda__day__big">Day 6 Session</p>
                <p class="agenda__day__small">June 10, 2020</p>
                <p class="agenda__day__small">14:00-15:00</p>
                <ul>
                    <li style="list-style-type: disc;">How to make your product win the competitors?</li>
                    <li style="list-style-type: disc;">Why do you need investment and how to raise your first million dollars?</li>
                    <li  style="list-style-type: disc;">How to pitch your startup and what is important for an investor to hear from you?</li>
                </ul>
                <p>Q&A session</p>
                <h5 class="agenda__speakers__title">Speakers</h5>
                <div class="agenda__speakers__row">
                    <img src="img/users/15.png" alt="" class="agenda__speakers__avatar">
                    <p class="agenda__speakers__name">Mikayel Vardanyan</p>
                </div>
            </div>
        </div>
    </section>
    <!--    end agenda-->
    <!--    start mentors__speakers-->
    <section id="mentors" class="mentors__speakers">
        <div class="container">
            <h2 class="mentors__speakers__title title">
                Mentors/Speakers
            </h2>
            <div class="speakers__block">
                <h3 class="speakers__title">Speakers <img src="img/icons/iocn-speakers.png" alt=""
                                                          class="speakers__title__icon"></h3>
                <div class="row align-items-start">
                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/bagrat-yengibaryan-30865013/" target="_blank">
                            <img src="img/users/18.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Bagrat Yengibaryan</h4>
                            <p class="speakers__position">Director at</p>
                            <p class="speakers__company">EIF</p>
                        </a>
                    </div>
                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/amalya-yeghoyan-a045ba33/" target="_blank">
                            <img src="img/users/17.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Amalya Yeghoyan</h4>
                            <p class="speakers__position">Project Manager at</p>
                            <p class="speakers__company">EIF</p>
                        </a>
                    </div>
                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/peter-michaelian-0b7087b/" target="_blank">
                            <img src="img/users/4.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Peter Michaelian</h4>
                            <p class="speakers__position">Head of Design at</p>
                            <p class="speakers__company">Dolby</p>
                        </a>
                    </div>
                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/yeva-hyusyan-5a16a220/" target="_blank">
                            <img src="img/users/5.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Yeva Hyusyan</h4>
                            <p class="speakers__position">CEO at</p>
                            <p class="speakers__company">SoloLearn</p>
                        </a>
                    </div>
                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/aram-khachatryan-80253948/" target="_blank">
                            <img src="img/users/1.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Aram Khachatryan</h4>
                            <p class="speakers__position">Head of legal practice at </p>
                            <p class="speakers__company">EIF</p>
                        </a>
                    </div>
                    <div class="speakers col-md-3 col-sm-12">
                        <img src="img/users/3.png" alt="" class="speakers__img">
                        <h4 class="speakers__name">Knarik Barseghyan</h4>
                        <p class="speakers__position">Deputy director of finance at </p>
                        <p class="speakers__company">EIF</p>
                    </div>
                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/zarik-boghossian-37ab/" target="_blank">
                            <img src="img/users/2.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Zarik Boghossian</h4>
                            <p class="speakers__position">Founder and CEO of</p>
                            <p class="speakers__company">ZEMA Enterprises</p>
                        </a>
                    </div>
                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/mikayelvardanyan/" target="_blank">
                            <img src="img/users/15.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Mikayel Vardanyan</h4>
                            <p class="speakers__position">CPO at</p>
                            <p class="speakers__company">Picsart</p>
                        </a>
                    </div>
                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/tania-sahakian/" target="_blank">
                            <img src="img/users/16.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Tania Sahakian</h4>
                            <p class="speakers__position">Director at</p>
                            <p class="speakers__company">DISQO</p>
                        </a>
                    </div>

                </div>
            </div>
            <div class="speakers__block">
                <h3 class="speakers__title">Mentors <img src="img/icons/icon-mentors.png" alt=""
                                                         class="speakers__title__icon"></h3>
                <div class="row align-items-start">
                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/astipili/" target="_blank">
                            <img src="img/users/12.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Astghik Piliposyan</h4>
                            <!--                            <p class="speakers__position">Position, Name of </p>-->
                            <!--                            <p class="speakers__company">Company</p>-->
                        </a>
                    </div>
                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/tterian/" target="_blank">
                            <img src="img/users/14.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Tigran Astvatsatryan</h4>
                            <!--                            <p class="speakers__position">Position, Name of </p>-->
                            <!--                            <p class="speakers__company">Company</p>-->
                        </a>
                    </div>
                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/narinekotikyan/" target="_blank">
                            <img src="img/users/13.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Narine Kotikyan</h4>
                            <!--                            <p class="speakers__position">Position, Name of </p>-->
                            <!--                            <p class="speakers__company">Company</p>-->
                        </a>
                    </div>

                    <div class="speakers col-md-3 col-sm-12">
                        <a href="https://www.linkedin.com/in/artak-aloyan-30b10a5/" target="_blank">
                            <img src="img/users/11.png" alt="" class="speakers__img">
                            <h4 class="speakers__name">Artak Aloyan</h4>
                            <!--                            <p class="speakers__position">Position, Name of </p>-->
                            <!--                            <p class="speakers__company">Company</p>-->
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--    end mentors__speakers-->
    <!--start participants-->
    <section id="participants" class="participants">
        <div class="container">
            <h2 class="participants__title title">Participants</h2>
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-sm-12">
                            <h5 class="participants__name user_profile" data-id="7">Lucky Carrot</h5>
                            <h5 class="participants__name user_profile" data-id="8">Smart electronics LLC</h5>
                            <h5 class="participants__name user_profile" data-id="9">RIOsys LLC</h5>
                            <h5 class="participants__name user_profile" data-id="10">TakeAway.am</h5>
                            <h5 class="participants__name user_profile" data-id="11">Arvest Quiz</h5>
                            <h5 class="participants__name user_profile" data-id="12">Oores</h5>
                            <h5 class="participants__name user_profile" data-id="13">Nairi Stem</h5>
                            <h5 class="participants__name user_profile" data-id="14">Easy Sales</h5>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h5 class="participants__name user_profile" data-id="15">ERA Technologies LLC</h5>
                            <h5 class="participants__name user_profile" data-id="16">AVA</h5>
                            <h5 class="participants__name user_profile" data-id="17">Aion Clouds LLC</h5>
                            <h5 class="participants__name user_profile" data-id="18">Revalkon</h5>
                            <h5 class="participants__name user_profile" data-id="19">Mimo LLC</h5>
                            <h5 class="participants__name user_profile" data-id="20">Eventor</h5>
                            <h5 class="participants__name user_profile" data-id="21">Genevo Incorporated LLC</h5>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h5 class="participants__name  user_profile" data-id="22">Wirestock LLC</h5>
                            <h5 class="participants__name  user_profile" data-id="23">Kenguru</h5>
                            <h5 class="participants__name  user_profile" data-id="25">Rendchain</h5>
                            <h5 class="participants__name  user_profile" data-id=26">gHost LLC</h5>
                            <h5 class="participants__name  user_profile" data-id="27">ARD Music</h5>
                            <h5 class="participants__name  user_profile" data-id="28">STEM Didactics LLC</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--    end participants-->
    <!--start Learning-->
    <section id="learning" class="learning">
        <div class="container">
            <h2 class="learning__title title">Learning</h2>

            <ul class="nav nav-pills learning__nav" id="pills-tab" role="tablist">
                <?php
                for ($i = 1; $i <= count($categories); $i++) {
                    if ($i == 1) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" id="<?php echo "a" . $categories[$i][0]["category_id"] ?>-tab"
                               data-toggle="pill" href="#<?php echo "a" . $categories[$i][0]["category_id"] ?>__cont"
                               role="tab"
                               aria-controls="<?php echo "a" . $categories[$i][0]["category_id"] ?>__cont"
                               aria-selected="true"><?php echo $categories[$i][0]["category_name"] ?></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" id="<?php echo "a" . $categories[$i][0]["category_id"] ?>1-tab"
                               data-toggle="pill" href="#<?php echo "a" . $categories[$i][0]["category_id"] ?>__cont"
                               role="tab"
                               aria-controls="<?php echo "a" . $categories[$i][0]["category_id"] ?>__cont"
                               aria-selected="false"><?php echo $categories[$i][0]["category_name"] ?></a>
                        </li>
                    <?php } ?>


                <?php } ?>
            </ul>

            <div class="tab-content learning__content" id="pills-tabContent">
                <?php
                for ($i = 1;
                $i <= count($categories);
                $i++) {
                if ($i == 1){
                ?>
                <div class="tab-pane fade show active"
                     id="<?php echo "a" . $categories[$i][0]["category_id"] ?>__cont" role="tabpanel"
                     aria-labelledby="<?php echo "a" . $categories[$i][0]["category_id"] ?>-tab">
                    <div class="row">

                        <?php }else{ ?>
                        <div class="tab-pane fade"
                             id="<?php echo "a" . $categories[$i][0]["category_id"] ?>__cont" role="tabpanel"
                             aria-labelledby="<?php echo "a" . $categories[$i][0]["category_id"] ?>-tab">
                            <div class="row">
                                <?php } ?>
                                <?php for ($j = 0; $j < count($categories[$i]); $j++) {
                                    $path = explode("../../", $categories[$i][$j]["learning_path"])[1];
                                    ?>
                                    <div class="learning__item col-md-4 col-sm-12">
                                        <img src="<?php echo $path ?>" alt="" class="learning__item__img">
                                        <a target="_blank" href="<?php echo $categories[$i][$j]["learning_link"] ?>">
                                            <h5 class="learning__item__title"><?php echo $categories[$i][$j]["learning_name"] ?></h5>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php }
                        ?>
                    </div>
                </div>

    </section>
    <!--end Learning-->
    <!--    start contact-->
    <section id="contact" class="contact">
        <div class="container">
            <h2 class="contact__title title">Contact us</h2>
            <div class="row">
                <div class="contact__info col-md-3 col-sm-12">
                    <h3 class="contact__info__title">email</h3>
                    <a href="mailto:jon.doe@eif.am" class="contact__info__link">info@eif.am</a>
                </div>
                <div class="contact__info col-md-3 col-sm-12">
                    <h3 class="contact__info__title">phone</h3>
                    <a href="tel:+374000000" class="contact__info__link">(+374)11219797</a>
                </div>
            </div>
            <div class="row organize">
                <div class="col-md-4 col-sm-12 organize__item">
                    <h3 class="organize__item__title">ORGANIZED BY</h3>
                    <figure class="organize__item__figure">
                        <a href="#" class="organize__item__link">
                            <img src="img/logo/logo-eif.png" alt="" class="organize__item__img">
                        </a>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-12 organize__item">
                    <h3 class="organize__item__title">IN PARTNERSHIP WITH</h3>
                    <figure class="organize__item__figure">
                        <a href="#" class="organize__item__link">
                            <img src="img/logo/logo-hti.png" alt="" class="organize__item__img">
                        </a>
                        <a href="#" class="organize__item__link">
                            <img src="img/logo/logo-ra-gov.png" alt="" class="organize__item__img">
                        </a>
                        <a href="#" class="organize__item__link">
                            <img src="img/logo/logo-wb.png" alt="" class="organize__item__img">
                        </a>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!--    end contact-->
    <!--    start footer-->
    <footer class="footer">
        <div class="container">
            <div class="footer__copyright">&copy; EIF | All rights Reserved 2020</div>
        </div>
    </footer>
    <!--    end footer-->
</div>
<script src="lib/jquery-3.5.1.min.js"></script>
<script src="lib/popper.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/OwlCarousel/owl.carousel.min.js"></script>
<script src="js/script.js"></script>
<script src="js/main.js"></script>
</body>
</html>