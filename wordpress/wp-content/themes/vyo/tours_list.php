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

 	// TODO Add get_price function

	function get_tours() {
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array(
			'post_type'			=> 'tours',
			'meta_key'			=> 'date-start',
			'orderby'			=> 'meta_value',
			'order'				=> 'ASC',
			'posts_per_page'	=> 30,
			'paged'				=> $paged,
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
	            <div class="col-12 col-sm-12 col-md-7 tour-image"><img class="w-100" src="<?= get_the_post_thumbnail_url(); ?>" alt=""></div>
	            <div class="col-12 col-sm-12 col-md-5 tour-detail">
	                <div class="tour-date">
							<?php
							if (get_field('quarantine')) { ?>
								<span class="font-weight-bold quarantine">Після карантину </span> (<?= the_field('days-num') ?> днів)
							<?php } else { ?>
							<span class="font-weight-bold">
							<?= get_readable_start_date(get_field('tour-dates')); ?> - <?= get_field('tour-dates')[0]['end-date']; ?>
						</span> (<?= the_field('days-num') ?> днів)
					<?php } ?>
					</div>
	                <div class="tour-countries mb-35"><?= get_readable_countries(get_field('countries'), true); ?></div>
	               	<div class="tour-name-and-desc">
	                    <h3 class="tour-name font-weight-bold mb-3">
	                    	<a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>
	                    </h3>
	                    <div class="tour-description d-block d-sm-block pr-3"><?= the_content(); ?></div>
	               	</div>
	                <div class="tour-bottom">
						<div class="tour-price my-4 my-md-4 ml-1 font-weight-bold">
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

<div class="container">
	<div class="row">
		<div class="col-12 text-center mt-4 mb-6">
			<div class="tour-pagination text-center">
			<?php
		    $total_pages = $tours->max_num_pages;

		    if ($total_pages > 1) {

		        $current_page = max(1, get_query_var('paged'));

		        echo paginate_links(array(
		            'base' => get_pagenum_link(1) . '%_%',
		            'format' => '?paged=%#%',
		            'current' => $current_page,
		            'total' => $total_pages,
		            'prev_text'    => __('« prev'),
		            'next_text'    => __('next »'),
		        ));
		    }
		    wp_reset_postdata();    
			?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();