<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php
while ( have_posts() ): the_post(); 
	//tour
	if (true) {
		get_template_part( 'post-type-templates/tour' );
	}
	//post
	if (false) {

	}

	// page = contact, about us, ...
	// if () {

	// }
endwhile;
?>
<!-- 
<div class="container" role="main">



	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>	
	</div>
	
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	<h2>
	<?php 
		if (get_field('discount-price')) {
	?>
		<h2><?= get_field('discount-price') ?></h2> (<h2><s><?= the_field('price'); ?></s></h2>)
	<?php
		}
		else {
	?>
	<h2><?= get_field('price'); ?></h2>	
	<?php
		}
	?> 
	<h2><?= get_field('currency'); ?></h2>
	<h2><?= get_field('guides')->post_title; ?></h2>
	<h2><?= the_field('countries'); ?></h2>
	<h2><?= get_field('date-start'); ?></h2>
	<h2><?= get_field('date-end'); ?></h2>
	<h2><?= get_field('days-num'); ?></h2>
	<h2><?= get_field('comfort'); ?></h2>
	<h2><?= get_field('difficult'); ?></h2>
	<h2><?= get_field('peoples'); ?></h2>
	<h2><?= get_field('favorites'); ?></h2>
	<h2><?= get_field('program'); ?></h2>
	<h2><?= get_field('included'); ?></h2>
	<h2><?= get_field('not-included'); ?></h2>

	<?php
	//print("<pre>".print_r(get_field('gallery'), true)."</pre>");
	?>

	<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum dolore, excepturi quasi vitae esse sint dicta aliquam id quas, temporibus libero amet quaerat alias commodi itaque consectetur eveniet doloremque animi!</h1>

	<?php
	//print("<pre>".print_r(get_field('days'), true)."</pre>");
	?>

<?php
wp_link_pages( array(
	'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
	'after'       => '</div>',
	'link_before' => '<span class="page-number">',
	'link_after'  => '</span>',
) );
?>

	

	<?php
	/* Start the Loop */
/*			while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/post/content', get_post_format() );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

		the_post_navigation( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
		) );

	endwhile; // End of the loop.*/
	?>

</div><!-- .container --> -->

<?php get_footer();
