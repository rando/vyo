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
                <form action="https://vyo.us17.list-manage.com/subscribe/post?u=f077126371f084c1b9c46940d&amp;id=28468a9382" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
                    <div class="row justify-content-center">
                        <input class="form-control col-8 col-sm-5 col-md-3 align-self-end mr-sm-35 mb-1" 
                        type="email" value="" name="EMAIL" id="mce-EMAIL" aria-describedby="emailHelp" placeholder="Ваш email"> 
                        <button class="col-8 col-sm-4 col-md-3 col-lg-2 mt-md-0 mt-3 align-self-start btn btn-outline-vyo-lt text-uppercase" type="submit" id="mc-embedded-subscribe" name="subscribe">Підписатися!</button>
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
                <a class="m-2 <?= ($GLOBALS['active_page'] === "blog") ? 'active' : '' ?>" href="/blog">Блог</a href="#">
                <a class="m-2 <?= ($GLOBALS['active_page'] === "about") ? 'active' : '' ?>" href="/about-us">Про нас</a href="#">
                <a class="m-2 <?= ($GLOBALS['active_page'] === "contacts") ? 'active' : '' ?>" href="/contacts">Контакти</a href="#">
            </div>
        </div>

        <div class="row no-gutter socials mb-5 justify-content-center">
            <div class="col-6 col-sm-1 p-2 text-right"><a href="https://facebook.com/vyo.travel" target="_blank"><img src="<?= get_theme_file_uri('assets/images/static/') ?>facebook-light.png" alt=""></a></div>
            <div class="col-6 col-sm-1 p-2 text-left"><a href="https://instagram.com/vyo.travel" target="_blank"><img src="<?= get_theme_file_uri('assets/images/static/') ?>instagram-light.png" alt=""></a></div>
        </div>

        <div class="row justify-content-center footer-logo mb-5">
            <div class="col-12 text-center"><img src="<?= get_theme_file_uri('assets/images/static/') ?>logo-light.png" alt=""></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <p class="vyo-phone mb-0"><a href="tel:+380967816537">+38 096 781 65 37</a></p>
                <p class="vyo-number"><a href="tel:+380930950096">+38 093 095 00 96</a></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 mb-5 text-center font-weight-bold">
                <p class="vyo-email"><a href="mailto:vyo.travel@gmail.com" target="_blank">info@vyo.travel</a></p>
            </div>
        </div>
    </div>
<?php wp_footer(); ?>
<?php if (get_site_url() != 'http://localhost:8000') { ?>
    <script type="text/javascript">
        jQuery('#mc-embedded-subscribe').on('click', function() {
            fbq('track', 'Subscribe');    
            //ga('send', 'event', '', 'Form', 'Subscribe');
        });
    </script>
<? } ?>
</body>
</html>
