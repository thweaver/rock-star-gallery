<?php get_header(); ?>
<?php 
	$image = get_field('featured_photo');
	$image = $image['sizes']['page-header'];
	$show = get_field('show_photo_2');
?>
<div class="wrapper wrapper--page">
<!--Page Title-->
<div class="page-title-container">
	<div class="page-title">
		<h1>
			<span>Search Results</span>
		</h1>
	</div>
</div>

<div class="container page-container">
	
	<!--Post Header-->

	<div class="post-copy">
		<div class="wysiwyg">
			<p class="type--collapsed"><?php $num = $wp_query->found_posts; if (have_posts()) : echo $num; endif;?> <?php if (!have_posts()) { ?>No<?php } ?> Results Found</p>
			<?php if ( have_posts() ) : ?>
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post(); ?>

					<?php
					/*
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'content', 'search' );
				// End the loop.
				endwhile;
			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );
			endif;
			?>
		</div>
	</div>
	
</div>
<?php get_footer(); ?>