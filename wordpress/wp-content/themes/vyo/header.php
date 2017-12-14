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
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="robots" content="index, follow, noodp">
<meta name="googlebot" content="index, follow">
<meta name="google" content="notranslate">
<meta name="format-detection" content="telephone=no">

<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body>


<?php
if ( is_front_page() ) { 
?>
    <div class="navbar-wrapper">
        <div class="container">
            <div class="row no-gutter justify-content-between">
                <div class="col-12 col-md-3 text-md-left text-center p-3">
                    <a href="#">
                        <img src="<?= get_theme_file_uri('assets/images/static/') ?>logo-light.png" width="60" height="44" class="d-inline-block align-middle" alt="ВЙО. Агенція пригод">
                <span class="logo-text">Агенція пригод</span>
                    </a>
                </div>
                <div class="col-12 col-md-6 text-md-center text-center pt-1 pt-md-475 mb-4 mb-md-0 menu">
                        <a class="m-2 active" href="#">Головна</a href="#">
                        <a class="m-2" href="#">Мандрівки</a href="#">
                        <a class="m-2" href="#">Блог</a href="#">
                        <a class="m-2" href="#">Про нас</a href="#">
                        <a class="m-2" href="#">Контакти</a href="#">
                </div>
                <div class="col-12 d-none d-sm-none d-md-block col-md-3 text-md-right text-center pt-3">
                    <a href="https://instagram.com/vyo.travel"><img width="33" height="33" src="<?= get_theme_file_uri('assets/images/static/') ?>instagram-light.png" alt=""></a>
                    <a href="https://instagram.com/vyo.travel"><img width="33" height="33" src="<?= get_theme_file_uri('assets/images/static/') ?>instagram-light.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>








