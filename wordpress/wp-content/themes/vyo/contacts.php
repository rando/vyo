<?php
		/**
		* Template name: contacts
		 */


get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-12">
		CONTACTS!!!
			<?php
			while ( have_posts() ) : the_post();

				the_content();

			endwhile; // End of the loop.
			?>
		</div>
	</div>
</div><!-- .wrap -->

<?php get_footer();
