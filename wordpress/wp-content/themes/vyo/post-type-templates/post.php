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

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header tour-caption">
		<div class="image-wrap">
			<img class="tour-cover-img" src="<?= get_the_post_thumbnail(); ?>" alt="<?= the_title(); ?>">
			<div class="mask"></div>
		</div>
		<div class="image-content">
			<div class="container">
				<h1 class="entry-title"><?= the_title(); ?></h1>
			</div>
		</div>
	</header>

	<div class="container">
		<div class="row">
			<div class="col-8">
		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
			get_the_title()
		) );

		?>
			</div>
		</div>
	</div>

</article><!-- #post-## -->
