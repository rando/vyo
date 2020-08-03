<?php
		/**
		* Template name: about
		 */
		
$GLOBALS['active_page'] = "about";

  function get_guides() {
    $args = array(
      'numberposts' => -1,
      'post_type'   => 'guides',
      'meta_query'     => array(
        array(
          'key'        => 'hide',
          'compare'    => '!=',
          'value'      => true
        )
      ),
      'meta_key'    => 'order',
      'orderby'   => 'meta_value',
      'order'     => 'ASC',
      'posts_per_page'=> 100
    );

    $guides = new WP_Query($args);
    return $guides;     
  }

get_header(); ?>


<div class="container about-us">
	<div class="row mt-4">
		<div class="col-12 pl-5">
			<h1>Про нас</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
Здоров, колєго! Раз ти вже зайшов на нашу сторінку, то давай знайомитися. Агенцію пригод “ВЙО” створили троє мандрівників, які мали мрії та амбіції влаштовувати веселі та вар’ятські мандрівки, так щоб із пригодами у всіх значеннях цього слова. І обрали собі таку назву, яка відповідає нашому настроєві і підтягуватиме відповідних людей зі спільними цінностями.
		</div>
	</div>

    <div class="row my-5 justify-content-center guides">
        <div class="col-12 text-center mb-475">
            <h2>Наші Гіди</h2>
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

</div>



<?php get_footer();
