<?php
		/**
		* Template name: about
		 */
		
$GLOBALS['active_page'] = "about";

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-8">
			<?php
			while ( have_posts() ) : the_post();

				the_content();

			endwhile; // End of the loop.
			?>
		</div>
	</div>
</div><!-- .wrap -->

<?php get_footer();
