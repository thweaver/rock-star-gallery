<?php /* Template Name: Category Template */ ?>

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

<!--Artists-->




 <?php if( $page_items == 'art' ){ ?>
 <?php $terms = get_terms( $product_cat ); 
 	
 ?>
 <div class="container flex-container post-flex-container">
 <?php foreach ( $terms as $term )  : ?>
  
    <?php 
    	$cat_image = get_field('category_photo', $term);
    	$cat_image = $cat_image['sizes']['feature'];
    	$term_link = get_term_link( $term );
    ?>
     
    <a href="<?php echo $term_link; ?>" class="cat-item">
    	<h2><span><?php echo $term->name; ?></span></h2>
    	<?php if($cat_image) { ?>
    	<img src="<?php echo $cat_image; ?>" alt="<?php echo $category->name; ?>">
    	<?php } ?>
    	<?php if(!$cat_image) { ?>
    	<img src="<?php bloginfo('template_url'); ?>/img/default-thumb.png" alt="<?php echo $category->name; ?>">
    	<?php } ?>
    </a>
 <?php endforeach; ?>
	</div>
 <?php } ?>
















<!--Products-->
<?php if( $page_items == 'pro' ){ ?>
<?php
	global $paged;
	if(empty($paged)) $paged = 1;
	$query = new WP_Query(array(
		'post_type' => $post_type,
		'posts_per_page' => 999,
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
<?php } ?>
</div>
<?php get_footer(); ?>