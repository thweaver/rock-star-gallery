<?php get_header(); ?>
<?php 
	$image = get_field('featured_photo');
	$image = $image['sizes']['page-header'];
?>
<div class="wrapper wrapper--page">
<!--Page Title-->
<div class="page-title-container">
	<div class="page-title">
		<h1>
			<span><?php the_title(); ?></span>
		</h1>
	</div>
</div>

<div class="container page-container">
	<?php if($image) { ?>
	<!--Post Header-->
	<div class="post-header">
		<img src="<?php echo $image; ?>" alt="<?php echo $title ?>" class="post-image">
	</div>
	<div class="post-divider"></div>
	<?php } ?>
	<!--Post Header-->

	<?php if( have_rows('page_content') ): ?>
		 <?php while ( have_rows('page_content') ) : the_row(); ?>

		 	<!--WYSIWYG-->
		 	<?php  if( get_row_layout() == 'text_block' ) { ?>
		 	<div class="post-copy">
		 		<div class="wysiwyg">
			 		<?php the_sub_field('text'); ?>
			 	</div>
		 	</div>
		 	<?php } ?>

		 	<!--Sub Title-->
	 	 	<?php  if( get_row_layout() == 'section_title_block' ) { ?>
	 	 	<div class="post-sub-title">
	 	 		<h2>
	 	 			<span><?php the_sub_field('section_title'); ?></span>
	 	 		</h2>
	 	 	</div>
	 	 	<?php } ?>

 		 	<!--Divider-->
 	 	 	<?php  if( get_row_layout() == 'section_divider' ) { ?>
 	 	 	<div class="post-divider"></div>
 	 	 	<?php } ?>

 		 	<!--Photo-->
 	 	 	<?php  if( get_row_layout() == 'photo_block' ) { ?>
 	 	 	<?php 
 	 	 		$post_image = get_sub_field('photo');
 	 	 		$post_image = $post_image['sizes']['full'];
 	 	 		$post_link = get_sub_field('photo_link');
 	 	 	?>
 	 	 	<?php if($post_link) { ?>
 	 	 	<a href="<?php echo $post_link; ?>" class="post-item post-content-image">
	 	 	 	<img src="<?php echo $post_image; ?>" alt="<?php echo $title ?>">
	 	 	 </a>
 	 	 	<?php } ?>
 	 	 	<?php if(!$post_link) { ?>
	 	 	 <img src="<?php echo $post_image; ?>" alt="<?php echo $title ?>" class="post-image">
 	 	 	<?php } ?>
 	 	 	<?php } ?>

 		 	<!--Video-->
 	 	 	<?php  if( get_row_layout() == 'video_block' ) { ?>
 	 	 	<div class="post-item video-container">
 	 	 		<?php the_sub_field('video'); ?>
 	 	 	</div>
 	 	 	<?php } ?>

 		 	<!--Posts-->
 	 	 	<?php  if( get_row_layout() == 'related_items_block' ) { ?>
 	 	 	<div class="post-item flex-container post-flex-container">
 	 	 	<?php 
	 	 	 	$posts = get_sub_field('related_items');
	 	 	 	if( $posts ): ?>
	 	 	 	    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
	 	 	 	       <?php setup_postdata($post); ?>
	 	 	 	       <?php
		 	 	 	       	$item_image = get_field('featured_photo');
		 	 	 	       	$item_image = $item_image['sizes']['featured-artist'];
		 	 	 	       	$item_image_2 = get_field('category_photo');
		 	 	 	       	$item_image_2 = $item_image_2['sizes']['featured-artist'];

		 	 	 	       	$item_image_3 = get_field('featured_product_photo');
		 	 	 	       	$item_image_3 = $item_image_3['sizes']['featured-artist'];

	 	 	 	       	 	$title = get_the_title();
        	 	 	       ?>
        	 	 	       <a href="<?php the_permalink(); ?>" class="post-block">
        	 	 	       		<h2><?php echo mb_strimwidth($title, 0, 70, '...'); ?></h2>
		 	 	 	       <?php if($item_image) { ?>
	 	 	 	       			<img src="<?php echo $item_image; ?>" alt="<?php the_title(); ?>">
		 	 	 	       <?php } ?>
	   	 	 	 	       <?php if($item_image_2) { ?>
	    	 	 	       		<img src="<?php echo $item_image_2; ?>" alt="<?php the_title(); ?>">
	   	 	 	 	       <?php } ?>
       	 	 	 	       <?php if($item_image_3) { ?>
        	 	 	       		<img src="<?php echo $item_image_3; ?>" alt="<?php the_title(); ?>">
       	 	 	 	       <?php } ?>
 	 	 	       		</a>
	 	 	 	    <?php endforeach; ?>
	 	 	 	    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	 	 	 	<?php endif; ?>
	 	 	 </div>
 	 	 	<?php } ?>


 		 	<!--Gallery-->
 	 	 	<?php  if( get_row_layout() == 'photo_gallery_block' ) { ?>
 	 	 	<div class="post-gal flex-container post-flex-container">
 	 	 		<?php 
 	 	 		$gal_images = get_sub_field('photo_gallery');
 	 	 		if( $gal_images ): ?>
 	 		        <?php foreach( $gal_images as $gal_image ): ?>
 	 		            	<a href="<?php echo $gal_image['url']; ?>" class="gal-item venobox" data-gall="gal">
        	                     <img src="<?php echo $gal_image['sizes']['square']; ?>" alt="<?php the_title(); ?>" />
        	                </a>
 	 		        <?php endforeach; ?>
 	 	 		<?php endif; ?>
	 	 	 </div>
	 	 	 <?php } ?>



		 <?php endwhile; ?>
	<?php endif; ?>
	
</div>
<?php get_footer(); ?>