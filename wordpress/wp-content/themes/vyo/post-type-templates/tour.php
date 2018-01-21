<?php
/**
 * Template part for displaying tours
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<?php
  function get_readable_countries($countries) {
    $all_countries = array();
    foreach ($countries as $idx => $country) {
      array_push($all_countries, $country->name);
    }
    return join(', ', $all_countries);
  }

  function draw_circle($number) {
  	$output_html = "";
  	$black = '<span class="black-circle"></span>';
  	$grey = '<span class="grey-circle"></span>';

  	$max_number = 5;
  	$i = 0;
  	while ($i < $max_number) {
  		if ($number > $i) {
  			$output_html .= $black;
  		}
  		else {
  			$output_html .= $grey;
  		}
  		$i++;
  	}
  	return $output_html;
  }
?>


<article id="post-<?php the_ID(); ?>" class="tour">

	<header class="entry-header tour-caption">
		<div class="image-wrap">
			<img class="tour-cover-img" src="<?= get_field('tour-covered-image') ?>" alt="<?= the_title(); ?>">
			<div class="mask"></div>
		</div>
		<div class="image-content">
			<div class="container">
				<h2 class="countries"><?= get_readable_countries(get_field('countries')); ?></h2>
				<h1 class="entry-title"><?= the_title(); ?></h1>
			</div>
		</div>
	</header>

	<div class="container tour-detail-fixed ">
		<div class="row pt-35 pb-35">
			<div class="col-5 tour-dates"><span><?= the_field('date-start') ?> - <?= the_field('date-end') ?></span> (<?= the_field('days-num') ?> днів)</div>
			<div class="col-3 tour-price"><?= the_field('price') ?> <?= the_field('currency'); ?></div>
			<div class="col-4 tour-order text-right"><a href="<?= the_permalink() ?>" role="button" class="btn btn-outline-vyo-green">Їду!</a></div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-12 tour-line"></div>
		</div>
	</div>

	<div class="container tour mt-475">
		<div class="row">
			<div class="col-9 tour-detail-description">
				<div class="row">
					<div class="col-12"><h3>Короткий опис туру</h3></div>
					<div class="col-12 tour-short-description"><?= the_content(); ?></div>
					<div class="col-12 tour-complex-and-comfort">
						<div class="row">
							<div class="col-6">Складність <?= draw_circle(get_field('difficult')); ?></div>
							<div class="col-6">Комфорт <?= draw_circle(get_field('comfort')); ?></div>
						</div>
					</div>
					<div class="col-12">Кількість людей: <span class="font-weight-bold"><?= get_field('peoples'); ?></span></div>
				</div>
			</div>
			<div class="col-3 text-right tour-guide">
			<?php
			$guides = get_field('guides');
			foreach ($guides as $idx => $guide):
			?>
                <div class="guide text-center mb-4">
                    <img class="w-75 rounded-circle mb-35" src="<?= get_the_post_thumbnail_url($guide->ID); ?>" alt="<?= $guide->post_title; ?>">
                    <div class="guide-name font-weight-bold text-center mb-1"><?= $guide->post_title; ?></div>
                </div>
			<?php
			endforeach;
			?>
			</div>
		</div>

		<div class="row">
			<div class="col-9">
				<h3>За що ми любимо цей тур?</h3>
			</div>
		</div>

		<?php
		function get_favorites_lis() {
			$favorites_raw = explode('<br />', get_field('favorites'));
			$favorites_output = "";
			foreach ($favorites_raw as $idx => $favorite) {
				$favorites_output .= '<li>'.trim($favorite).'</li>';
			}
			return $favorites_output;
		}
		?>

		<div class="row">
			<div class="col-9">
				<ul><?= get_favorites_lis() ?></ul>
			</div>
		</div>

		<div class="row">
			<div class="col-9">
				<h3>Програма</h3>
			</div>
		</div>

		<?php
		$program_by_days = get_field('days');

		foreach ($program_by_days as $idx => $program_day):
			$day = $program_day['day'];
			$program = $program_day['program'];
		?>
		<div class="row">
			<div class="col-9">
				<h4><?= $day ?></h4>
			</div>
			<div class="w-100"></div>
			<div class="col-9"><?= $program; ?></div>
		</div>
		<?php
		endforeach;
		?>

<!-- 		<div class="row">
			<div class="col-9">
				<pre>
					<?php
					print_r(get_field('days'));
					?>
				</pre>
			</div>
		</div> -->
	</div>

</article>
