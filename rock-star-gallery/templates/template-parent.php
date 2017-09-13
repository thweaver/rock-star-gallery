<?php /* Template Name: Parent Template */ ?>

<?php get_header(); ?>
<div class="wrapper">
<!--Page Title-->
<div class="page-title-container">
	<div class="page-title">
		<h1>
			<span><?php the_title() ?></span>
		</h1>
	</div>
</div>
<?php 
	$header_photo = get_field('category_photo');
	$sml_header_photo = $header_photo['sizes']['feature'];
	$lrg_header_photo = $header_photo['sizes']['page-header'];
	$header_copy = get_field('category_copy');
	$page_items = get_field('page_items');
	$product_cat = get_field('product_category');
	$post_type = get_field('product_category_2');
	$show = get_field('show_photo');
?>
<!--Page Header-->
<div class="page-header">
	<?php if($header_photo && $header_copy && $show) { ?>
		<div class="container">
			<div class="cat-header">
				<img src="<?php echo $sml_header_photo ?>" class="cat-header-photo">
				<div class="cat-header-copy">
					<p>
						<?php
							echo mb_strimwidth($header_copy, 0, 900, "...<a href='#js-more' data-type='inline' class='venobox'>Read More</a>");
						?>
					</p>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if($header_photo && !$header_copy && $show) { ?>
		<div class="container">
			<img src="<?php echo $lrg_header_photo; ?>" alt="<?php the_title(); ?>" class="full-cat-header">
		</div>
	<?php } ?>
	<?php if($header_copy && $show == 0) { ?>
	<div class="container">
		<p class="header-copy">
			<?php
				echo mb_strimwidth($header_copy, 0, 900, "...<a href='#js-more' data-type='inline' class='venobox'>Read More</a>");
			?>
		</p>
	</div>
	<?php } ?>
	<?php if($header_copy) { ?>
	<div class="more-content" id="js-more">
		<p>
			<?php echo $header_copy ?>
		</p>
	</div>
	<?php } ?>
</div>

<!--Pages-->
 <div class="container flex-container post-flex-container">
	<?php 
 	$posts = get_field('page_list');
 	if( $posts ): ?>
 	    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
 	       <?php setup_postdata($post); ?>
 	       <?php
	 	       	$item_image = get_field('featured_photo');
	 	       	$item_image = $item_image['sizes']['featured-artist'];
	 	       	$item_image_2 = get_field('category_photo');
	 	       	$item_image_2 = $item_image_2['sizes']['featured-artist'];
	 	       	$title = get_the_title();
 	       ?>
 	       <a href="<?php the_permalink(); ?>" class="cat-item">
 	       	<h2><span><?php echo mb_strimwidth($title, 0, 70, '...'); ?></span></h2>
	 	       <?php if($item_image) { ?>
 	       			<img src="<?php echo $item_image; ?>" alt="<?php the_title(); ?>">
	 	       <?php } ?>
 	 	       <?php if($item_image_2) { ?>
 	       		<img src="<?php echo $item_image_2; ?>" alt="<?php the_title(); ?>">
 	 	       <?php } ?>
 	 	       <?php if(!$item_image_2 && !$item_image) { ?>
 	 	       <img src="<?php bloginfo('template_url'); ?>/img/default-thumb-sml.png" alt="<?php the_title(); ?>">
 	 	       <?php } ?>
	       		</a>
 	    <?php endforeach; ?>
 	    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
 	<?php endif; ?>
 </div>


</div>
<?php get_footer(); ?>