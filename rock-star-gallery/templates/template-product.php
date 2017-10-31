
<?php 
	$item_image = get_field('featured_product_photo');
	$item_image_thumb = $item_image['sizes']['product-slide'];
	$item_image_lrg = $item_image['sizes']['full'];
	$page_items = get_field('show_products');
	$product_cat = get_field('related_products');
	$terms = get_the_terms( $post->ID, $cust_tax );
	if ( !empty( $terms ) ){
	    // get the first term
	    $term = array_shift( $terms );
	}
	$queried_object = get_queried_object(); 
	$post_type = get_post_type();
	$taxonomy = $queried_object->taxonomy;
	$term_id = $queried_object->term_id;
	$term_name = $term->term_id;    
	$item_info = get_field('item_info');
?>
<div class="wrapper">
<!--Page Title-->
<div class="page-title-container">
	<div class="page-title">
		<h1>
			<span><?php echo $term->name ?></span>
		</h1>
	</div>
</div>


<div class="container flex-container flex-top-center container--page">

	<div class="product-slider js-slider">
		<a href="<?php echo $item_image_lrg ?>" class="venobox" data-gall="product">
			<img src="<?php echo $item_image_thumb ?>" alt="<?php the_title(); ?>">
		</a>
 		<?php 
 		$gal_images = get_field('product_photos');
 		if( $gal_images ): ?>
	        <?php foreach( $gal_images as $gal_image ): ?>
	           <a href="<?php echo $gal_image['url']; ?>" class="venobox" data-gall="product">
                 <img src="<?php echo $gal_image['sizes']['product-slide']; ?>" alt="<?php the_title(); ?>" />
            </a>
	        <?php endforeach; ?>
 		<?php endif; ?>
	</div>
	<div class="product-info">
		<div class="product-title">
			<h2><?php the_title(); ?></h2>
			<h3>By: <?php echo $term->name ?></h3>
			<?php if(get_field('item_id')) { ?>
			<h4>Item ID: <?php the_field('item_id') ?></h4>
			<?php } ?>
		</div>
		<?php if($item_info) { ?>
		<p>
			

			<?php
				echo mb_strimwidth($item_info, 0, 330, "...<a href='#js-more' data-type='inline' class='venobox read-more'>Read More</a>");
			?>

		</p>
		<?php } ?>
		<a href="#js-price" data-type='inline' class="button button--full venobox"><span>Request price</span></a>
	</div>
	<div class="more-content" id="js-price">
		<div class="product-form">
				<h2>
					<span>Request Price</span>
				</h2>
			<div class="product-form-container">
				<?php echo do_shortcode( '[contact-form-7 id="6951" title="Product"]' ); ?>
			</div>
		</div>
	</div>
	<?php if($item_info) { ?>
	<div class="more-content" id="js-more">
		<p>
			<?php echo $item_info ?>
		</p>
	</div>
	<?php } ?>

</div>
<?php if( $page_items == 'auto' || $page_items == 'man' ){ ?>
<!--Page Title-->
<div class="page-title-container page-title-container--alt-container">
	<div class="page-title page-title--alt-title">
		<h3>
			<span>Related Pieces</span>
		</h3>
	</div>
</div>
<!-- Featured Artists -->

<div class="related-content js-slider-2">


	<!--Products-->
	<?php if( $page_items == 'auto' ){ ?>
	<?php
		global $paged;
		if(empty($paged)) $paged = 1;
		$query = new WP_Query(array(
			'post_type' => $post_type,
			'posts_per_page' => 12,
			'tax_query' => array(
				  array(
				    'taxonomy' => $cust_tax,
				    'field' => 'id',
				    'terms' => $term->term_id, // Where term_id of Term 1 is "1".
				    'include_children' => false
				  )
			)
		));
	?>
	<?php if ( $query->have_posts() ) { ?>
		
			<?php while ( $query->have_posts() ) { $query->the_post(); ?>
				<?php
					$image = get_field('featured_product_photo');
					$image = $image['sizes']['feature'];
					$title = get_the_title();
				?>
				<a href="<?php the_permalink(); ?>" class="related-item">
					<h2><span><?php echo mb_strimwidth($title, 0, 30, '...'); ?></span></h2>
					<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
				</a>
			<?php } ?>

	<?php } else { ?>
	<?php } ?>
	<?php } ?>

	<?php if( $page_items == 'man' ){ ?>
	 	<?php 
 	 	$posts = get_field('related_products');
 	 	if( $posts ): ?>
 	 	    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
 	 	       <?php setup_postdata($post); ?>
 	 	       <?php
	 	 	       	$related_image = get_field('featured_photo');
	 	 	       	$related_image = $related_image['sizes']['featured-artist'];
	 	 	       	$related_image_2 = get_field('category_photo');
	 	 	       	$related_image_2 = $related_image_2['sizes']['featured-artist'];

	 	 	       	$related_image_3 = get_field('featured_product_photo');
	 	 	       	$related_image_3 = $related_image_3['sizes']['featured-artist'];

 	 	       	 	$title = get_the_title();
 	 	       ?>
 	 	       <a href="<?php the_permalink(); ?>" class="related-item">
 	 	       	<h2><span><?php echo mb_strimwidth($title, 0, 70, '...'); ?></span></h2>
	 	 	       <?php if($related_image) { ?>
 	 	       			<img src="<?php echo $related_image; ?>" alt="<?php the_title(); ?>">
	 	 	       <?php } ?>
 	 	 	       <?php if($related_image_2) { ?>
 	 	       		<img src="<?php echo $related_image_2; ?>" alt="<?php the_title(); ?>">
 	 	 	       <?php } ?>
 	 	 	       <?php if($related_image_3) { ?>
 	 	       		<img src="<?php echo $related_image_3; ?>" alt="<?php the_title(); ?>">
 	 	 	       <?php } ?>
	 	       		</a>
 	 	    <?php endforeach; ?>
 	 	    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
 	 	<?php endif; ?>
	 	<?php } ?>


</div>
<?php } ?>