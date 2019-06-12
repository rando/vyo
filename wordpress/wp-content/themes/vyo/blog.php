<?php
		/**
		* Template name: page
		 */
		
$GLOBALS['active_page'] = "blog";



get_header(); 


function get_blog_posts() {
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array(
		'post_type'			=> 'post',
		'order'				=> 'DESC',
		'posts_per_page'	=> 30,
		'paged'				=> $paged,
	);

	$posts = new WP_Query($args);
	return $posts;	
}

$posts = get_blog_posts();

?>

<div class="container articles">
	<div class="row mt-4">
		<div class="col-12 pl-5">
			<h1>Блог</h1>
		</div>
	</div>

	<?php
	while ( $posts->have_posts() ):
		$posts->the_post();
	?>
	<div class="article-container">
		<div class="row">
			<div class="col-10 p-4 article">
				<h3><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h3>
				<?php
				the_content( sprintf(
				__( '<span class="readmore btn btn-outline-vyo-dr align-bottom">Читати далі</span><span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
				) );
				?>
			</div>
		</div>
	</div>
    <?php
    endwhile;
    ?>

</div>

<?php
get_footer();