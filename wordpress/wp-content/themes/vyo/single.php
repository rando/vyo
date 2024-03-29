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

if (true) {
	$GLOBALS['active_page'] = "tour";
}
//post
if (false) {
	$GLOBALS['active_page'] = "blog";
}

get_header(); ?>



<?php
while ( have_posts() ): the_post(); 
	$post_type = get_post_type();

	if ($post_type === "tours") {
		get_template_part( 'post-type-templates/tour' );
	}
	//post
	if ($post_type === "post") {
		get_template_part( 'post-type-templates/post' );
	}

	// page = contact, about us, ...
	// if () {

	// }
endwhile;
?>

<?php get_footer(); ?>
