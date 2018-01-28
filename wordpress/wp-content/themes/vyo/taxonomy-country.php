<?php
		/**
		* Template name: country
		 */
$GLOBALS['active_page'] = "tours_list";

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
	$country = 'Китай';
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'tour',
		'meta_key'		=> 'countries_$_name',
		'meta_value'	=> $country,
		'compare'	=> 'LIKE'
	);

	$args = array(
		'post_type' => 'tour',
		'tax_query' => array(
		array(
		'taxonomy' => 'countries',
		'field' => 'slug',
		'terms' => 'china',
		),
		),
	);

	$tours = new WP_Query($args);
	return $tours;		
}

$tours = get_tours();

get_header(); ?>

<pre>
	<?php print_r($tours); ?>
</pre>

<div class="all-tours">
	<div class="tours">
		<div class="container tour-container">

			<div class="row mt-4">
				<div class="col-12 pl-5">
					<h1><?php single_cat_title(); ?></h1>
				</div>
			</div>

			
			<?php
			while ( have_posts() ):
				the_post();
			?>

			<!-- <?php print_r(get_the_term_list( get_the_ID(), 'country', '', ', ' )); ?> -->


			<pre>
			<?= print_r(get_fields()); ?>
			</pre>

	        <div class="row tour no-gutters m-4">
	            <div class="col-7"><img class="w-100" src="<?= get_the_post_thumbnail_url(); ?>" alt=""></div>
	            <div class="col-5 tour-detail">
	                <div class="tour-date"><span class="font-weight-bold"><?= get_readable_start_date(get_field('tour-dates')); ?> - <?= get_field('tour-dates')[0]['end-date']; ?></span> (<?= the_field('days-num') ?> днів)</div>
	                <div class="tour-countries mb-35"><?= get_readable_countries(get_field('countries')); ?></div>
	                <div class="tour-bottom">
	                    <h3 class="tour-name font-weight-bold mb-3">
	                    	<a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>
	                    </h3>
	                    <div class="tour-description pr-3"><?= the_content(); ?></div>

						<div class="tour-price my-3 ml-1 font-weight-bold">
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