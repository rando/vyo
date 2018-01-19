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


<?php
// $args = array(
// 	'numberposts'	=> -1,
// 	'post_type'		=> 'post',
// 	'meta_key'		=> 'featured',
// 	'meta_value'	=> true
// );

// $featured = new WP_Query( $args );

// if( $featured->have_posts() ):
// 	while( $featured->have_posts() ):
// 		$featured->the_post();
// 		the_field('price');
// 		the_title();
// 	endwhile;
// endif; 
?>

<?php wp_reset_query(); ?>

<?php

	function get_featured_posts() {
		$args = array(
			'numberposts'	=> -1,
			'post_type'		=> 'tours',
			'meta_key'		=> 'featured',
			'meta_value'	=> true
		);

		$featured = new WP_Query($args);
		return $featured;			
	}

	function get_guides() {
		$args = array(
			'numberposts'	=> -1,
			'post_type'		=> 'guides',
			'meta_key'		=> 'order',
			'orderby'		=> 'meta_value',
			'order'			=> 'ASC'
		);

		$guides = new WP_Query($args);
		return $guides;			
	}

	function get_tours() {
		$tours = 
			array(
				0 => array()
			);
		return $tours;
	}

	function get_reviewers() {
		$args = array(
			'numberposts'	=> -1,
			'post_type'		=> 'reviewers',
		);

		$reviewers = new WP_Query($args);
		return $reviewers;			
	}
?>







		
		<?php


		// function get_reviewers_1() {
		// 	$reviewers = 
		// 		array(
		// 			'nfedorova' => array(
		// 				'name' => 'Наталя Чистякова',
		// 				'description' => 'Організатор Lviv Travel Club',
		// 				'review' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet aperiam minima ipsa aspernatur suscipit veritatis unde quasi soluta consequatur, odit maiores explicabo ullam exercitationem laborum impedit voluptate ipsam inventore optio.',
		// 				'img' => 'nchystiakova.jpg'
		// 			),
		// 			'mstriltsiv' => array(
		// 				'name' => 'Маріан Стрільців',
		// 				'description' => 'Фотограф, журналіст',
		// 				'review' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet aperiam minima ipsa aspernatur suscipit veritatis unde quasi soluta consequatur, odit maiores explicabo ullam exercitationem laborum impedit voluptate ipsam inventore optio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat iusto a maiores commodi enim ea odio nemo earum ipsum dolorum nobis vero soluta ullam ex beatae eum necessitatibus quidem, fugit.',
		// 				'img' => 'mstriltsiv.jpg'
		// 			),
		// 		);
		// 	return $reviewers;
		// }

		// function get_guides_1() {
		// 	$guides = 
		// 		array(
		// 			'achystyakov' => array(
		// 				'name' => 'Арсен Чистяков',
		// 				'img' => 'achystyakov.jpg',
		// 				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores accusamus reprehenderit officia sunt est ex laboriosam quisquam. Nulla, veritatis. Nobis, aliquid mollitia veniam natus quidem modi cum voluptas repellat similique.',
		// 				'facebook' => 'https://facebook.com/achystyakov',
		// 				'instagram' => 'https://instagram.com/achystyakov',
		// 				'email' => 'achystyakov@gmail.com',
		// 				'phone' => '+380967816537'
		// 				),
		// 			'ysira' => array(
		// 				'name' => 'Юля Сіра',
		// 				'img' => 'ysira.jpg',
		// 				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores accusamus reprehenderit officia sunt est ex laboriosam quisquam. Nulla, veritatis. Nobis, aliquid mollitia veniam natus quidem modi cum voluptas repellat similique.',
		// 				'facebook' => 'https://facebook.com/yuliya.sira',
		// 				'instagram' => 'https://instagram.com/sirenjka',
		// 				'email' => 'ysira@gmail.com',
		// 				'phone' => '+380661230986'
		// 				),
		// 			'maxymbalanduh' => array(
		// 				'name' => 'Максим Баландюх',
		// 				'img' => 'mbalandukh.jpg',
		// 				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores accusamus reprehenderit officia sunt est ex laboriosam quisquam. Nulla, veritatis. Nobis, aliquid mollitia veniam natus quidem modi cum voluptas repellat similique.',
		// 				'facebook' => 'https://facebook.com/maxymbalanduh',
		// 				'instagram' => 'https://instagram.com/balanduh',
		// 				'email' => 'mbalandukh@gmail.com',
		// 				'phone' => '+380931110333'
		// 				)
		// 			);
				
		// 	return  $guides;
		// }

		//$featured_posts = get_featured_posts();
		//foreach ($featured_posts as $i=>$featured_post) {
	?>

	<?php
	$featured = get_featured_posts();

	if( $featured->have_posts() ):
		$i = 0;
		$posts_nums = $featured->post_count;


	endif; 
	?>

    <!-- Featured Tours Carousel -->
    <div id="carousel-header-cover" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
      	<?php 
      	while ($i < $posts_nums): 
      	?>
        <li data-target="#carousel-header-cover" data-slide-to="<?= $i ?>" class="<?= ($i == 0) ? "active" : "" ?>"></li>
   		<?php 
   		$i++;
   		endwhile; 
   		?>
      </ol>

      <div class="carousel-inner">
		<?php
		$i = 0;
		while ( $featured->have_posts() ):
			$featured->the_post();
		?>

        <div class="carousel-item <?= ($i == 0) ? "active" : "" ?>">
          <div class="shadow-top"></div>
          <div class="shadow-bottom"></div>
          <img class="d-block w-100" src="<?= get_the_post_thumbnail_url(); ?>" alt="First slide">
          <div class="carousel-caption d-none d-block h-85">
          	<!-- TODO: Add days wording -->
          	<div class="d-flex align-items-center flex-column justify-content-between h-100 mt-4">
	            <div class="tour-date font-weight-bold mb-3"><?= the_field('date-start') ?> - <?= the_field('date-end') ?> (<?= the_field('days-num') ?> days)</div>
	            <div class="tour-countries mb-md-6"><?= the_field('countries') ?></div>
	            <div class="mt-auto"><h3 class="tour-name mb-3"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h3></div>
	            <div class="mt-auto mb-6">
		            <p class="tour-price font-weight-bold mb-3"><?= the_field('price') ?> <?= the_field('currency'); ?></p>
		            <a href="<?= the_permalink() ?>" role="button" class="btn btn-outline-vyo-lt">ВЙО!</a>
	            </div>
            </div>
          </div>
        </div>

		<?php
		$i++;
		endwhile;
		wp_reset_query();
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

        <!-- About Us block -->

    <div class="container">
        <div class="row mt-4 mb-65 justify-content-center">
            <div class="col-12 text-center mb-475">
                <h1>Про нас</h1>
            </div>
            <div class="w-100"></div>
            <div class="col-8">

            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam sint, eius aliquam sequi eos fugiat molestias, in temporibus illum aliquid reiciendis iste obcaecati saepe et eveniet, alias ipsam, culpa beatae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis praesentium neque iure impedit sequi, suscipit vero quis unde cum? Beatae soluta dolorem laborum quidem maxime repellendus dolor minus fugit in.</div>
        </div>

        <!-- TODO: VIDEO about US. -->
        <!-- 
        <div class="row mb-65 justify-content-center">
            <div class="col-12 text-center">
                <iframe class="w-75" src="https://www.youtube.com/embed/mg67iIFivDo" frameborder="0" allowfullscreen="allowfullscreen" data-link="https://www.youtube.com/watch?v=mg67iIFivDo"></iframe>
            </div>
        </div> -->

        <!-- Guides block -->
        <div class="row mb-5 justify-content-center guides">
            <div class="col-12 text-center mb-475">
                <h1>Наші Гіди</h1>
            </div>
            <div class="w-100"></div>
        

        <?php

		$guides = get_guides();

		if( $guides->have_posts() ):
			$i = 0;
			$guides_nums = $guides->post_count;

		endif;



		while ( $guides->have_posts() ):
			$guides->the_post();
		?>
            <div class="col-md-4 col-12 mb-3 text-center">
                <div class="guide">
                    <img class="w-75 rounded-circle mb-35" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                    <div class="guide-name font-weight-bold text-center mb-1"><?= the_title(); ?></div>
                    <div class="guide-desc mb-4"><?= the_content() ?></div>
                    <div class="guide-socials"><a href="<?= the_field('facebook'); ?>">Facebook</a><a href="<?= the_field('instagram'); ?>">Instagram</a></div>
                </div>
            </div>
  		<?php
  		endwhile;
  		?>
        </div>

        <!-- Tours block -->

        <div class="row mb-5 no-gutters tours">
            <div class="col-12 text-center"><h1>Найближчі Подорожі</h1></div>

            <div class="w-100"></div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>slovenia.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">29 грудня 2017 - 04 січня 2018</span> (10 днів)</div>
                        <div class="tour-countries mb-35">Словенія, Угорщина</div>
                        <h3 class="tour-name font-weight-bold mb-475">Новий рік в Альпах</h3>
                        <button class="btn btn-outline-vyo-dr align-bottom">ВЙО!</button>
                    </div>
                </div>        
            </div>

           <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>lofoten.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">03 березня - 10 березня 2018</span> (7 днів)</div>
                        <div class="tour-countries mb-35">Норвегія</div>
                        <h3 class="tour-name font-weight-bold mb-475">Лофотени: полювання на полярне сяйво</h3>
                        <button class="btn btn-outline-vyo-dr align-bottom">ВЙО!</button>
                    </div>
                </div>        
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>ebc.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">11 березня - 04 квітня 2018</span> (24 дня)</div>
                        <div class="tour-countries mb-35">Непал</div>
                        <h3 class="tour-name font-weight-bold mb-475">Побачити Еверест</h3>
                        <button class="btn btn-outline-vyo-dr align-self-end">ВЙО!</button>
                    </div>
                </div>        
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>china.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">28 квітя - 13 травня 2018</span> (15 днів)</div>
                        <div class="tour-countries mb-35">Китай</div>
                        <h3 class="tour-name font-weight-bold mb-475">Від Гонконгу до Пекіну</h3>
                        <button class="btn btn-outline-vyo-dr align-self-end">ВЙО!</button>
                    </div>
                </div>        
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>tmb-refugio.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">24 червня - 30 червня 2018</span> (7 днів)</div>
                        <div class="tour-countries mb-35">Франція, Італія, Швейцарія</div>
                        <h3 class="tour-name font-weight-bold mb-475">Навколо Монблану в готелях</h3>
                        <button class="btn btn-outline-vyo-dr align-self-end">ВЙО!</button>
                    </div>
                </div>        
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>tmb-camping.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">01 липня - 08 липня 2018</span> (7 днів)</div>
                        <div class="tour-countries mb-35">Франція, Італія, Швейцарія</div>
                        <h3 class="tour-name font-weight-bold mb-475">Навколо Монблану в кемпінгах</h3>
                        <button class="btn btn-outline-vyo-dr align-self-end">ВЙО!</button>
                    </div>
                </div>        
            </div>
        </div>

        <div class="row justify-content-center mb-65">
            <div class="col-8 text-center"><a href="#" class="btn btn-vyo-black text-uppercase">Усі подорожі</a></div>
        </div>
    </div>


<!-- 


    <div id="carousel-review" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
 		<?php 
		$reviewers = get_reviewers();

		if( $reviewers->have_posts() ):
			$i = 0;
			$reviewers_nums = $reviewers->post_count;
		endif; 
 
      	while ($i < $reviewers_nums):
      	?>
        <li data-target="#carousel-review" data-slide-to="<?= $i; ?>" class="<?= ($i == 0) ? "active" : "" ?>"></li>
		<?php
		$i++;
		endwhile;
		?>

      </ol>

      <div class="carousel-inner">
		<?php
		$i = 0;
		while ( $reviewers->have_posts() ):
			$reviewers->the_post();
		?>
		<div class="carousel-item <?= ($i == 0) ? "active" : "" ?>">
			<img class="d-block w-100" src="<?= get_theme_file_uri('assets/images/static/') ?>empty.png" alt="First slide">
			<div class="carousel-caption d-none d-block">
				<div class="review-img mb-4">
					<img class="d-block rounded-circle" src="<?= get_the_post_thumbnail_url(); ?>" alt="First slide">
				</div>
				<div class="reviewer font-weight-bold"><?= the_title(); ?></div>
				<div class="mb-5"><?= get_field('position'); ?></div>
				<p class="font-italic"><?= the_content(); ?></p>
			</div>
		</div>
		<?php
		endwhile;
		?>
      </div>
      <a class="carousel-control-prev" href="#carousel-review" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Попередній</span>
      </a>
      <a class="carousel-control-next" href="#carousel-review" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Наступний</span>
      </a>
    </div> 

 -->










	<?php
	$reviewers = get_reviewers();

	if( $reviewers->have_posts() ):
		$i = 0;
		$reviewers_nums = $reviewers->post_count;


	endif; 
	?>

   <!-- Carousel Reviewer block -->

    <div id="carousel-review" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
      	<?php 
      	while ($i < $reviewers_nums): 
      	?>
        <li data-target="#carousel-review" data-slide-to="<?= $i ?>" class="<?= ($i == 0) ? "active" : "" ?>"></li>
   		<?php 
   		$i++;
   		endwhile; 
   		?>
      </ol>

      <div class="carousel-inner">
		<?php
		$i = 0;
		while ( $reviewers->have_posts() ):
			$reviewers->the_post();
		?>

		<div class="carousel-item <?= ($i == 0) ? "active" : "" ?>">
			<img class="d-block w-100" src="<?= get_theme_file_uri('assets/images/static/') ?>empty.png" alt="First slide">
			<div class="carousel-caption d-none d-block">
				<div class="review-img mb-4">
					<img class="d-block rounded-circle" src="<?= get_the_post_thumbnail_url(); ?>" alt="First slide">
				</div>
				<div class="reviewer font-weight-bold"><?= the_title(); ?></div>
				<div class="mb-5"><?= get_field('position'); ?></div>
				<div class="review-block font-italic"><?= the_content(); ?></div>
			</div>
		</div>

		<?php
		$i++;
		endwhile;
		wp_reset_query();
		?>
      </div>

      <a class="carousel-control-prev" href="#carousel-review" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Попередній</span>
      </a>
      <a class="carousel-control-next" href="#carousel-review" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Наступний</span>
      </a>
    </div>









<?php get_footer();