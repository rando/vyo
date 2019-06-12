<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

  $GLOBALS['active_page'] = "blog";

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

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header article-caption">
		<div class="image-wrap">
			<img class="tour-cover-img" src="<?= get_the_post_thumbnail(); ?>" alt="<?= the_title(); ?>">
			<div class="mask"></div>
		</div>
		<div class="image-content">
			<div class="container mt-65">
				<h1 class="entry-title"><?= the_title(); ?></h1>
			</div>
		</div>
	</header>



	<div class="container article mt-475">
		<div class="row">
			<div class="col-8">
				<?php
				the_content();
				?>
			</div>
		</div>
	</div>

	<?php
	$tours = get_field('tours');
	if ($tours):
	?>

	<div class="row no-gutters tours">
	<div class="col-12 text-center"><h1>Наші Подорожі</h1></div>

	<div class="w-100"></div>
	</div>

	<div class="blog">
		<div class="container tours my-4">
			<div class="row">
				<?php
				foreach ( $tours as $tour ):
				?>

	            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
	                <div class="tour">
	                    <div><img class="w-100" src="<?= get_the_post_thumbnail_url($tour->ID); ?>" alt=""></div>
	                    <div class="tour-detail">
	                          <div class="tour-bottom">
		                        <h3 class="tour-name font-weight-bold mb-3 p-1">
		                        	<a href="/tours/<?= $tour->post_name ?>"><?= $tour->post_title ?></a>
		                        </h3>
		                        <a href="/tours/<?= $tour->post_name ?>" role="button" class="btn btn-outline-vyo-dr align-bottom">ВЙО!</a>
	                        </div>
	                    </div>
	                </div>       
	            </div>

	            <?php
	            endforeach;
				?>
			</div>
		</div>
	</div>
	<?php
	endif;
	?>

</article><!-- #post-## -->
