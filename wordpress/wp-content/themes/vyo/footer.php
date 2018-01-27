<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

    <div class="container-fluid subscribe">
        <div class="row justify-content-center">
            <div class="col-12 mt-100 mb-5 text-center">
                <h1>Підпишіться на нашу розсилку</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 mb-5 text-center">
                <p>Отримуйте свіжі новини про наші пригоди</p>
            </div>
        </div>
        <div class="row pb-100 justify-content-center">
            <div class="col-12 text-center">
                 <form>
                    <div class="row justify-content-center">
                        <input class="form-control col-8 col-sm-5 col-md-3 align-self-end mr-sm-35 mb-1"  type="email" id="vyo-email" aria-describedby="emailHelp" placeholder="Ваш email">
                        <button class="col-8 col-sm-4 col-md-3 col-lg-2 mt-md-0 mt-3 align-self-start btn btn-outline-vyo-lt text-uppercase">Підписатися!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid footer p-5">
        <div class="row no-gutter footer-menu mb-5 mt-2 justify-content-center">
            <div class="col-12 col-md-6 text-center menu">
                <a class="m-2 <?= ($GLOBALS['active_page'] == "") ? 'active' : '' ?>" href="/">Головна</a href="#">
                <a class="m-2 <?= ($GLOBALS['active_page'] === "tours_list" || $GLOBALS['active_page'] === "tour") ? 'active' : '' ?>" href="/tours">Мандрівки</a href="#">
                <!-- <a class="m-2" href="#">Блог</a href="#"> -->
                <a class="m-2 <?= ($GLOBALS['active_page'] === "about") ? 'active' : '' ?>" href="/about-us">Про нас</a href="#">
                <a class="m-2 <?= ($GLOBALS['active_page'] === "contacts") ? 'active' : '' ?>" href="/contacts">Контакти</a href="#">
            </div>
        </div>

        <div class="row no-gutter socials mb-5 justify-content-center">
            <div class="col-6 col-sm-1 p-2 text-right"><a href="https://facebook.com/vyo.travel"><img src="<?= get_theme_file_uri('assets/images/static/') ?>facebook-light.png" alt=""></a></div>
            <div class="col-6 col-sm-1 p-2 text-left"><a href="https://instagram.com/vyo.travel"><img src="<?= get_theme_file_uri('assets/images/static/') ?>instagram-light.png" alt=""></a></div>
        </div>

        <div class="row justify-content-center footer-logo mb-5">
            <div class="col-12 text-center"><img src="<?= get_theme_file_uri('assets/images/static/') ?>logo-light.png" alt=""></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <p class="vyo-phone mb-0">+38-096-781-65-37</p>
                <p class="vyo-number">+38-063-455-12-75</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 mb-5 text-center font-weight-bold">
                <p class="vyo-email"><a href="mailto:vyo.travel@gmail.com">vyo.travel@gmail.com</a></p>
            </div>
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>
