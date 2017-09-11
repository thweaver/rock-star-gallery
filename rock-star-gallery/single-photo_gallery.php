<?php /* Template Name: Gal Template */ ?>

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
?>
<!--Page Header-->
<div class="page-header">
	<?php if($header_photo && $header_copy) { ?>
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
	<?php if($header_photo && !$header_copy) { ?>
		<div class="container">
			<img src="<?php echo $lrg_header_photo; ?>" alt="<?php the_title(); ?>" class="full-cat-header">
		</div>
	<?php } ?>
	<?php if(!$header_photo && $header_copy) { ?>
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

<div class="container flex-container post-flex-container">
<?php 
$gal_images = get_field('post_gallery_images');
if( $gal_images ): ?>
<?php foreach( $gal_images as $gal_image ): ?>
    	<a href="<?php echo $gal_image['url']; ?>" class="gal-item venobox" data-gall="gal">
	         <img src="<?php echo $gal_image['sizes']['square']; ?>" alt="<?php the_title(); ?>" />
	    </a>
<?php endforeach; ?>
<?php endif; ?>
</div>

<?php get_footer(); ?>