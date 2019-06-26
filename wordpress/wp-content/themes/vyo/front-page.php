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

  function get_readable_start_date($tour_dates) {
    $first_date = $tour_dates[0];
    $readable_star_date = $start_date = $first_date['start-date'];
    $end_date = $first_date['end-date'];

    // Rewrite with proper DATE functions
    if (substr($start_date, -4) == substr($end_date, -4)) {
      $readable_star_date = substr($start_date, 0, -4);
    }

    return $readable_star_date; 
  }

  function get_readable_countries($countries, $link=false) {
    $all_countries = array();
    foreach ($countries as $idx => $country) {
      $country_name = $country->name;
      if ($link) {
        $format = '<a href="/country/%s" alt="%s">%s</a>';
        $country_name = sprintf($format, $country->slug, $country->name, $country->name); 
      }
      array_push($all_countries, $country_name);
    }
    return join(', ', $all_countries);
  }

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
      'numberposts' => -1,
      'post_type'   => 'guides',
      'meta_query'     => array(
        array(
          'key'        => 'featured',
          'compare'    => '=',
          'value'      => true
        )
      ),
      'meta_key'    => 'order',
      'orderby'   => 'meta_value',
      'order'     => 'ASC'
    );

    $guides = new WP_Query($args);
    return $guides;     
  }

	function get_tours() {
		$args = array(
			'post_type'		=> 'tours',
			'meta_key'		=> 'date-start',
			'orderby'		=> 'meta_value',
			'order'			=> 'ASC',
			'posts_per_page'=> 6
		);

		$tours = new WP_Query($args);
		return $tours;		
	}

	function get_reviewers() {
		$args = array(
      'orderby'   => 'rand',
      'posts_per_page' => 5, 
      'post_type'		=> 'reviewers',
		);

		$reviewers = new WP_Query($args);
		return $reviewers;			
	}
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


      <div class="carousel-inner competition">
      <!-- TODO Remove when competition ended -->
      <!-- 
        <div class="carousel-item active">
          <div class="shadow-top"></div>
          <div class="shadow-bottom"></div>
          <img class="d-block w-100" src="https://vyo.travel/wp-content/uploads/2019/04/20170707-tmb_4339-gorgany.jpg" alt="First slide">
          <div class="carousel-caption d-none d-block h-85">
            <div class="d-flex align-items-center flex-column justify-content-between h-100 mt-4">
              <div class="mt-475">

                <h3 class="mb-3"><a target="_blank" href="https://www.gorgany.com/stories/salewa/">Купуєш Salewa?</a></h3>
                <p><a target="_blank" style="text-decoration: none; color: #fff; font-size: 1.5rem;" href="https://www.gorgany.com/stories/salewa/">Маєш шанс виграти похід навколо Монблану</a></p>
                
              </div>
              <div class="mt-auto mb-6">
                <a target="_blank" href="https://www.gorgany.com/stories/salewa/" role="button" class="btn btn-outline-vyo-lt">Умови розіграшу</a>
              </div>
            </div>
          </div>
        </div>

        -->

		<?php
		$i = 0;
		while ( $featured->have_posts() ):
			$featured->the_post();
		?>

        
        <!-- TODO RETURN when competition ended
        <div class="carousel-item">
        -->
        <div class="carousel-item <?= ($i == 0) ? "active" : "" ?>">
        
          <div class="shadow-top"></div>
          <div class="shadow-bottom"></div>
          <img class="d-block w-100" src="<?= get_the_post_thumbnail_url(); ?>" alt="First slide">
          <div class="carousel-caption d-none d-block h-85">
          	<!-- TODO: Add days wording -->
          	<div class="d-flex align-items-center flex-column justify-content-between h-100 mt-4">
	            <div class="tour-date font-weight-bold mb-3"><?= get_readable_start_date(get_field('tour-dates')); ?> - <?= get_field('tour-dates')[0]['end-date']; ?> (<?= the_field('days-num') ?> днів)</div>
	            <div class="tour-countries mb-md-6"><?= get_readable_countries(get_field('countries'), true); ?></div>
	            <div class="mt-auto"><h3 class="tour-name mb-3"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h3></div>
	            <div class="mt-auto mb-6">
		            <p class="tour-price font-weight-bold mb-3">
                  <?php
                  if (get_field('discount-price')) {
                    the_field('discount-price') ?> <?= the_field('currency');
                  ?> 
                  <del><?= the_field('price') ?> <?= the_field('currency'); ?></del>
                  <?php
                  } else {
                    the_field('price') ?> <?= the_field('currency');
                  }
                  ?>
                </p>
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
Здоров, колєго! Раз ти вже зайшов на нашу сторінку, то давай знайомитися:) Агенцію пригод “ВЙО” створили троє мандрівників, які мали мрії та амбіції влаштовувати веселі та вар'ятські мандрівки, так щоб із пригодами у всіх значеннях цього слова. І обрали собі таку назву, яка відповідає нашому настроєві і підтягуватиме відповідних людей зі спільними цінностями.
<!--             Трактат філософії ВЙО:
            - Життя надто коротке
            - Ліпше пізно ніж ніколи


             Здоров, колєго! Раз ти вже зайшов до нас, то давай знайомитися. Агенцію пригод “ВЙО” створили троє мандрівників, які люблять веселі вар'ятські мандрівки. (якщо тебе зачіпила філософія ВЙО, то ) (і відповідно шукаємо відповідних людей по духу близьких) Якщо пригоди то твоє, то вйо, пігнали!

            Агенцію пригод “ВЙО” створили троє мандрівників, які мали мрії та амбіції влаштовувати веселі та вар'ятські мандрівки, так щоб із пригодами у всіх значеннях цього слова. І обрали собі таку назву, яка відповідає нашому настроєві і підтягуватиме відповідних людей зі спільними цінностями. --></div>
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
                    <img class="w-75 rounded-circle mb-475" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                    <div class="guide-name font-weight-bold text-center mb-1"><?= the_title(); ?></div>
                    <div class="guide-desc mb-4"><?= the_content() ?></div>
                    <!-- <div class="guide-socials"><a href="<?= the_field('facebook'); ?>">Facebook</a><a href="<?= the_field('instagram'); ?>">Instagram</a></div> -->
                </div>
            </div>
  		<?php
  		endwhile;
  		?>
        </div>

        <!-- Tours block -->
		
        <?php
        $tours = get_tours();
        ?>
	
        <div class="row mb-5 no-gutters tours">
            <div class="col-12 mb-475 text-center"><h1>Найближчі Подорожі</h1></div>

            <div class="w-100"></div>


			<?php
			while ( $tours->have_posts() ):
				$tours->the_post();

			?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_the_post_thumbnail_url(); ?>" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold"><?= get_readable_start_date(get_field('tour-dates')); ?> - <?= get_field('tour-dates')[0]['end-date']; ?></span> (<?= the_field('days-num') ?> днів)</div>
                        <div class="tour-countries mb-35"><?= get_readable_countries(get_field('countries'), true); ?></div>
                        <div class="tour-bottom">
	                        <h3 class="tour-name font-weight-bold mb-3">
	                        	<a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>
	                        </h3>
	                        <a href="<?= the_permalink() ?>" role="button" class="btn btn-outline-vyo-dr align-bottom">ВЙО!</a>
                        </div>
                    </div>
                </div>        
            </div>

            <?php
            endwhile;
            ?>
        </div>

        <div class="row justify-content-center mb-65">
            <div class="col-8 text-center"><a href="/tours/" class="btn btn-vyo-black text-uppercase">Усі подорожі</a></div>
        </div>
    </div>

    <!-- Carousel Reviewer block -->

	<?php
	$reviewers = get_reviewers();

	if( $reviewers->have_posts() ):
		$i = 0;
		$reviewers_nums = $reviewers->post_count;


	endif; 
	?>

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
				<div class="reviewer font-weight-bold mb-5">
        <?php if (get_field('facebook')) { ?>
          <a class="review-fb" href="<?= get_field('facebook'); ?>">
            <?= the_title(); ?>  
          </a>
        <?php } else {
        the_title(); 
        } ?>
        </div>
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