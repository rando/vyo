<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<!-- Useful meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="robots" content="index, follow, noodp">
<meta name="googlebot" content="index, follow">
<meta name="google" content="notranslate">
<meta name="format-detection" content="telephone=no">

<link rel="profile" href="http://gmpg.org/xfn/11">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,700i" rel="stylesheet">

<?php if (get_site_url() === 'http://localhost:8000') { ?>
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '316640588856795');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=316640588856795&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
<?php } ?>

<?php wp_head(); ?>

</head>

<?php
if ( is_front_page() ) {
?>
<body class="front-page">
    <div class="navbar-wrapper">
        <div class="container">
            <div class="row no-gutter justify-content-between">
                <div class="col-12 col-md-3 d-none d-sm-none d-md-block  text-md-left text-center p-3">
                    <a href="/">
                        <img src="<?= get_theme_file_uri('assets/images/static/') ?>logo-light.png" width="60" height="44" class="d-inline-block align-middle" alt="ВЙО. Агенція пригод">
                        <span class="logo-text">Агенція пригод</span>
                    </a>
                </div>
                <div class="col-12 col-md-6 text-center mt-3 mt-md-0 pt-1 pt-md-475 mb-4 mb-md-0 menu">
                        <a class="m-1 m-md-2 active" href="/">Головна</a href="#">
                        <a class="m-1 m-md-2" href="/tours">Мандрівки</a href="#">
                        <a class="m-1 m-md-2" href="/blog">Блог</a href="#">
                        <a class="m-1 m-md-2" href="/about-us">Про нас</a href="#">
                        <a class="m-1 m-md-2" href="/contacts">Контакти</a href="#">
                </div>
                <div class="col-12 d-none d-sm-none d-md-block col-md-3 text-md-right text-center pt-3">
                    <a href="https://facebook.com/vyo.travel" target="_blank"><img width="33" height="33" src="<?= get_theme_file_uri('assets/images/static/') ?>facebook-light.png" alt=""></a>
                    <a href="https://instagram.com/vyo.travel" target="_blank"><img width="33" height="33" src="<?= get_theme_file_uri('assets/images/static/') ?>instagram-light.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
<body class="<?= ($GLOBALS['active_page'] === "tours_list") ? 'grey' : 'all-page' ?>">
    <div class="navbar-wrapper navbar-all-pages">
        <div class="container">
            <div class="row no-gutter justify-content-between">
                <div class="col-12 col-md-4 d-none d-sm-none d-md-block text-md-left text-center p-3">
                    <a href="/">
                        <img src="<?= get_theme_file_uri('assets/images/static/') ?>logo-green.png" width="60" height="44" class="d-inline-block align-middle" alt="ВЙО. Агенція пригод">
                <span class="logo-text">Агенція пригод</span>
                    </a>
                </div>
                <div class="col-12 col-md-8 text-center text-lg-right mt-3 mt-md-0 pt-1 pt-md-475 mb-4 mb-md-0 menu">
                    <a class="m-1 m-md-2 <?= ($GLOBALS['active_page'] === "") ? 'active' : '' ?>" href="/">Головна</a href="#">
                    <a class="m-1 m-md-2 <?= ($GLOBALS['active_page'] === "tours_list" || $GLOBALS['active_page'] === "tour" ) ? 'active' : '' ?>" href="/tours">Мандрівки</a href="#">
                    <a class="m-1 m-md-2 <?= ($GLOBALS['active_page'] === "blog") ? 'active' : '' ?>" href="/blog">Блог</a href="#">
                    <a class="m-1 m-md-2 <?= ($GLOBALS['active_page'] === "about") ? 'active' : '' ?>" href="/about-us">Про нас</a href="#">
                    <a class="m-1 m-md-2 <?= ($GLOBALS['active_page'] === "contacts") ? 'active' : '' ?>" href="/contacts">Контакти</a href="#">
                    <a href="https://facebook.com/vyo.travel" class="d-none d-sm-none d-md-inline-block ml-5"><img width="33" height="33" src="<?= get_theme_file_uri('assets/images/static/') ?>facebook-dark.png" alt=""></a>
                    <a href="https://instagram.com/vyo.travel" class="d-none d-sm-none d-md-inline-block"><img width="33" height="33" src="<?= get_theme_file_uri('assets/images/static/') ?>instagram-dark.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>








