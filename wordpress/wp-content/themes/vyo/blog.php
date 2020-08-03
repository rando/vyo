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

	<div class="row">
	<?php
	while ( $posts->have_posts() ):
		$posts->the_post();
	?>
		<div class="col-12 col-sm-12 col-md-6 col-lg-6 article-container">
			<div class="article">
		        <div><img class="w-100" src="<?= get_the_post_thumbnail_url(); ?>" alt=""></div>
		        <div class="article-detail">
		            <div class="article-bottom">
		                <h3 class="article-name font-weight-bold mb-3">
		                	<a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>
		                </h3>
						<?php
						the_content( sprintf(
						__( '<span class="readmore btn btn-outline-vyo-dr align-bottom mt-4">Цікаво</span><span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
						) );
						?>
		            </div>
		        </div>
		    </div>  
	    </div>

    <?php
    endwhile;
    ?>
    </div>

</div>

<?php
get_footer();