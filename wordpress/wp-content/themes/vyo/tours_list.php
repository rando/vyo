<?php
		/**
		* Template name: tours-list
		 */
$GLOBALS['active_page'] = "tours_list";
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

  function get_readable_countries($countries) {
    $all_countries = array();
    foreach ($countries as $idx => $country) {
      array_push($all_countries, $country->name);
    }
    return join(', ', $all_countries);
  }

	function get_tours() {
		$args = array(
			'post_type'		=> 'tours',
			'meta_key'		=> 'date-start',
			'orderby'		=> 'meta_value',
			'order'			=> 'ASC',
			'posts_per_page'=> -1
		);

		$tours = new WP_Query($args);
		return $tours;		
	}

	$tours = get_tours();

?>

<div class="all-tours">
	<div class="tours">
		<div class="container tour-container">

			<div class="row mt-4">
				<div class="col-12 pl-5">
					<h1>Мандрівки</h1>
				</div>
			</div>

			<?php
			while ( $tours->have_posts() ):
				$tours->the_post();
			?>

	        <div class="row tour no-gutters m-4">
	            <div class="col-8"><img class="w-100" src="<?= get_the_post_thumbnail_url(); ?>" alt=""></div>
	            <div class="col-4 tour-detail">
	                <div class="tour-date"><span class="font-weight-bold"><?= get_readable_start_date(get_field('tour-dates')); ?> - <?= get_field('tour-dates')[0]['end-date']; ?></span> (<?= the_field('days-num') ?> днів)</div>
	                <div class="tour-countries mb-35"><?= get_readable_countries(get_field('countries')); ?></div>
	                <div class="tour-bottom">
	                    <h3 class="tour-name font-weight-bold mb-3">
	                    	<a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>
	                    </h3>
	                    <div class="tour-description"><?= the_content(); ?></div>

						<div class="tour-price">
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
						</div>

	                    <a href="<?= the_permalink() ?>" role="button" class="btn btn-outline-vyo-dr align-bottom">ВЙО!</a>
	                </div>
	            </div>    
	        </div>
	        <?php
	        endwhile;
	        ?>
		</div>
	</div>
</div>

<?php get_footer();