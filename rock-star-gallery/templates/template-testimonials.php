<?php /* Template Name: Testimonials Template */ ?>

<?php get_header(); ?>
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
	<div class="flex-container">
		<div class="testimonial-container">
			<?php if( have_rows('testimonials') ): ?>
				 <?php while ( have_rows('testimonials') ) : the_row(); ?>
				 	<div class="post-copy">
				 		<div class="wysiwyg">
				 			<p><?php the_sub_field('testimonial_copy') ?></p>
				 			<h3><?php the_sub_field('testimonial_name') ?></h3>
				 		</div>
				 	</div>
		 		 <?php endwhile; ?>
		 	<?php endif; ?>
		</div>
		<div class="testimonial-form">
				<h2>
					<span>Leave a testimonial!</span>
				</h2>
			<div class="testimonial-form-container">
				<?php echo do_shortcode( '[contact-form-7 id="263" title="Testimonial"]' ); ?>
			</div>
		</div>
	</div>
	<div class="post-sub-title">
		<h2>
			<span>Satisfied Clients</span>
		</h2>
	</div>
	<div class="post-gal flex-container post-flex-container">


 		<?php 
 		$gal_images = get_field('testimonial_photos');
 		if( $gal_images ): ?>
	        <?php foreach( $gal_images as $gal_image ): ?>
	            	<a href="<?php echo $gal_image['url']; ?>" class="gal-item venobox" data-gall="gal">
                     <img src="<?php echo $gal_image['sizes']['square']; ?>" alt="<?php the_title(); ?>" />
                </a>
	        <?php endforeach; ?>
 		<?php endif; ?>

	</div>
	
</div>
<?php get_footer(); ?>