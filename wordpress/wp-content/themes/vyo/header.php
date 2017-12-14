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
                        <img src="assets/img/static/logo-light.png" width="60" height="44" class="d-inline-block align-middle" alt="ВЙО. Агенція пригод">
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
                    <a href="https://instagram.com/vyo.travel"><img width="33" height="33" src="assets/img/static/instagram-light.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Tours Carousel -->
    <div id="carousel-header-cover" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
		
		<?php

		// TODO Mocked function
		function get_featured_posts() {
			return $array = array(
					    0 => array(
					    	'id' => '10',
					    	'url' => 'everest',
					    	'img' => '1.jpg',
					    	'name' => 'Побачити Еверест',
					    	'countries' => ['Непал'],
					    	'date' => '03 квітня - 25 квітня 2018',
					    	'days' => '10 днів',
					    	'price' => '885$'
					    	),
					    1 => array(
					    	'id' => '12',
					    	'url' => 'montblanc',
					    	'img' => '2.jpg',
					    	'name' => 'Тур навколо Монблану',
					    	'countries' => ['Швейцарія', 'Франція', 'Італія'],
					    	'date' => '03 квітня - 25 квітня 2018',
					    	'days' => '10 днів',
					    	'price' => '790€'
					    	)
					);
		}

		$featured_posts = get_featured_posts();
		foreach ($featured_posts as $i=>$featured_post) {
		?>
        <li data-target="#carousel-header-cover" data-slide-to="<?= $i ?>" class="<?= ($i == 0) ? "active" : "" ?>"></li>
		<?php } ?>
      </ol>
      <div class="carousel-inner">
		<?php
		foreach ($featured_posts as $i=>$post) {
		?>


        <div class="carousel-item <?= ($i == 0) ? "active" : "" ?>">
          <img class="d-block w-100" src="wp-content/themes/vyo/assets/images/<?= $post['img'] ?>" alt="First slide">
          <div class="carousel-caption d-none d-block">
          	<!-- TODO: Add days wording -->
            <p class="tour-date font-weight-bold m-2"><?= $post['date'] ?>(<?= $post['days'] ?>)</p>
            <p class="tour-countries mb-5"><?= join(', ', $post['countries']) ?></p>
            <h3 class="tour-name mb-4"><a href="#"><?= $post['name'] ?></a></h3>
            <p class="tour-price font-weight-bold mb-4"><?= $post['price'] ?></p>
            <button type="button" class="btn btn-outline-vyo-lt mb-4">ВЙО!</button>
          </div>
        </div>

		<?php
		}
		?>
      </div>
      <a class="carousel-control-prev" href="#carousel-header-cover" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Попередній</span>
      </a>
      <a class="carousel-control-next" href="#carousel-header-cover" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Наступний</span>
      </a>
    </div>
<?php } ?>







