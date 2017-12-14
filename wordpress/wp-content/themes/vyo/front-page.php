<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

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

<?php get_footer();
