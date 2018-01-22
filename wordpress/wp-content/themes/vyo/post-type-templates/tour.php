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
	function get_guides() {
		$guides = get_field('guides');

		$contacts = array();

		foreach ($guides as $idx => $guide) {
			$guide_id = $guide->ID;
			$avatar_url = get_the_post_thumbnail_url($guide_id);
			$name = $guide->post_title;

			$phone = get_field('phone', $guide_id);
			$email = get_field('email', $guide_id);
			$facebook = get_field('facebook', $guide_id);

			$contact = array(
				'id'		=> $id,
				'name'		=> $name,
				'avatar'	=> $avatar_url,
				'phone'		=> $phone,
				'email'		=> $email,
				'facebook'	=> $facebook
			);

			array_push($contacts, $contact);
		}

		return $contacts;
	}

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

	function get_li_elements($field) {
		$fields_raw = explode('<br />', $field);
		$fields_output = "";
		foreach ($fields_raw as $idx => $field) {
			$fields_output .= '<li>'.trim($field).'</li>';
		}
		return $fields_output;
	}


	$CONTACTS = get_guides();
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
			<div class="col-12 col-md-5 text-center text-md-left tour-dates"><span><?= the_field('date-start') ?> - <?= the_field('date-end') ?></span> (<?= the_field('days-num') ?> днів)</div>
			<div class="col-12 col-md-3 text-center text-md-left tour-price"><?= the_field('price') ?> <?= the_field('currency'); ?></div>
			<div class="col-12 col-md-4 text-center text-md-right tour-order text-right"><a href="<?= the_permalink() ?>" role="button" class="btn btn-outline-vyo-green">Їду!</a></div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-12 tour-line"></div>
		</div>
	</div>

	<div class="container tour mt-475">
		<div class="row">
			<div class="col-12 col-md-9 tour-detail-description">
				<div class="row">
					<div class="col-12"><h3>Короткий опис туру</h3></div>
					<div class="col-12 tour-short-description"><?= the_content(); ?></div>
					<div class="col-12 tour-complex-and-comfort">
						<div class="row mb-md-4">
							<div class="col-12 col-md-6">
								<div class="row">
									<div class="col-5 col-md-6 col-lg-4">Складність</div>
									<div class="col-7 col-md-6 col-lg-8"><?= draw_circle(get_field('difficult')); ?></div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="row">
									<div class="col-5 col-md-6 col-lg-4">Комфорт</div>
									<div class="col-7 col-md-6 col-lg-8"><?= draw_circle(get_field('comfort')); ?></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 peoples">Кількість людей: <span class="font-weight-bold"><?= get_field('peoples'); ?></span></div>
				</div>

				<div class="row mt-475">
					<div class="col-12">
						<h3>За що ми любимо цей тур?</h3>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-12">
						<ul><?= get_li_elements(get_field('favorites')); ?></ul>
					</div>
				</div>

				<div class="row mt-475">
					<div class="col-12">
						<h3>Програма</h3>
					</div>
				</div>

				<?php
				$program_by_days = get_field('days');

				foreach ($program_by_days as $idx => $program_day):
					$day = $program_day['day'];
					$program = $program_day['program'];
					$day_images = $program_day['images'];
				?>

				<div class="row mt-3">
					<div class="col-9">
						<h4><?= $day ?></h4>
					</div>
					<div class="w-100"></div>
					<div class="col-9"><?= $program; ?></div>
					<div class="w-100"></div>
					<?php
					if ($day_images):
					?>
					<div class="col-12 day-photos">
						<div class="row gallery">
							<div class="col-12">
								<?php

								foreach ($day_images as $idx => $image):
									$image_url = $image['sizes']['medium'];
								?>
								<img src="<?= $image_url ?>" alt="">
								<?php
								endforeach
								?>
							</div>
						</div>
					</div>
					<?php
					endif;
					?>
				</div>
				<?php
				endforeach;
				?>

				<div class="row mt-475">
					<div class="col-9">
						<h3>У тур включено</h3>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-9">
						<ul><?= get_li_elements(get_field('included')); ?></ul>
					</div>
				</div>

				<div class="row mt-475">
					<div class="col-9">
						<h3>У тур НЕ включено</h3>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-9">
						<ul><?= get_li_elements(get_field('not-included')); ?></ul>
					</div>
				</div>
			</div>

			<!-- Guides -->
			<div class="col-12 col-md-3 text-right tour-guide">
			<?php
			foreach ($CONTACTS as $idx => $contact):
			?>
                <div class="guide text-center mb-4">
                    <img class="w-75 rounded-circle mb-35" src="<?= $contact['avatar'] ?>" alt="<?= $contact['name']; ?>">
                    <div class="guide-name font-weight-bold text-center mb-1"><?= $contact['name']; ?></div>
                </div>
            <?php
            endforeach;
            ?>
			</div>

		</div>



		<div class="row mt-475">
			<div class="col-9">
				<h3>Фото</h3>
			</div>
		</div>

		<div class="row mt-3 gallery">
			<div class="col-12">
				<?php
				foreach (get_field('gallery') as $idx => $image):
					$image_url = $image['sizes']['medium'];
					$image_large_url = $image['sizes']['medium_large'];
				?>
				<img src="<?= $image_url ?>" data-large-img="<?= $image_large_url; ?>" alt="">
				<?php
				endforeach
				?>
			</div>
		</div>

		<div class="row text-center mt-475">
			<div class="col-12">
				<h1>Виникли питання?</h1>
			</div>
		</div>

		<div class="row text-center mt-3 mb-5">
			<div class="col-12 col-md-4 contact-info">
				<div>Пишіть</div>
				<?php
				foreach ($CONTACTS as $idx => $contact):
				?>
				<div class="font-weight-bold"><?= $contact['email']; ?></div>
				<?php
				endforeach;
				?>
			</div>
			<div class="col-12 col-md-4 contact-info">
				<div>Дзвоніть</div>
				<?php
				foreach ($CONTACTS as $idx => $contact):
				?>
				<div class="font-weight-bold"><?= $contact['phone']; ?></div>
				<?php
				endforeach;
				?>				
			</div>
			<div class="col-12 col-md-4 contact-info">
				<div>Фейсбучте</div>
				<?php
				foreach ($CONTACTS as $idx => $contact):
				?>
				<div class="font-weight-bold"><a href="https://fb.com/<?= $contact['facebook']; ?>"><?= $contact['facebook']; ?></a></div>
				<?php
				endforeach;
				?>
			</div>
		</div>

	</div>

</article>
