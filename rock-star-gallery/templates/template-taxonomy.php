<?php 
	$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
	$queried_object = get_queried_object(); 
	$taxonomy = $queried_object->taxonomy;
	$term_id = $queried_object->term_id;  
?>
<div class="wrapper">
<!--Page Title-->
<div class="page-title-container">
	<div class="page-title">
		<h1>
			<span><?php echo $term->name; ?></span>
		</h1>
	</div>
</div>




<?php 
	$header_photo = get_field('category_photo',  $taxonomy.'_'.$term_id);
	$sml_header_photo = $header_photo['sizes']['feature'];
	$lrg_header_photo = $header_photo['sizes']['page-header'];
	$header_copy = get_field('category_copy', $taxonomy.'_'.$term_id);
	$show = get_field('show_photo',  $taxonomy.'_'.$term_id);
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
							echo mb_strimwidth($header_copy, 0, 900, "...<a href='#js-more' data-type='inline' class='venobox read-more'>Read More</a>");
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
				echo mb_strimwidth($header_copy, 0, 900, "...<a href='#js-more' data-type='inline' class='venobox read-more'>Read More</a>");
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


<!--Products-->
<?php
	global $paged;
	if(empty($paged)) $paged = 1;
	$query = new WP_Query(array(
	    'post_type' => $cust_post,
	    'posts_per_page'    => 999, //important for a PHP memory limit warning
	      'tax_query' => array(
	        array(
	          'taxonomy' => $taxonomy,
	          'field' => 'id',
	          'terms' => $term_id, // Where term_id of Term 1 is "1".
	          'include_children' => false
	        )
	      )
	));
?>
<?php if ( $query->have_posts() ) { ?>
	<div class="container flex-container post-flex-container">
		<?php while ( $query->have_posts() ) { $query->the_post(); ?>
			<?php
				$image = get_field('featured_product_photo');
				$image = $image['sizes']['feature'];
				$title = get_the_title();
			?>
			<a href="<?php the_permalink(); ?>" class="cat-item">
				<h2><span><?php echo mb_strimwidth($title, 0, 30, '...'); ?></span></h2>
				<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
			</a>
		<?php } ?>
	</div>
<?php } else { ?>
<?php } ?>

</div>