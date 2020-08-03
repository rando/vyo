<?php
		/**
		* Template name: contacts
		 */
$GLOBALS['active_page'] = "contacts";

get_header(); ?>


<div class="container contacts">
	<div class="row mt-4">
		<div class="col-12 pl-5">
			<h1>Контакти</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
+38 096 781 65 37

+38 093 095 00 96

info@vyo.travel

<?= do_shortcode('[ninja_form id=2]') ?>
		</div>
	</div>

</div>

<?php get_footer();
