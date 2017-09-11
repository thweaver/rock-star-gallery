<?php /* Template Name: Home Template */ ?>

<?php get_header(); ?>
<?php 
	$email = get_field('info_email', 16);
?>
<div class="wrapper">
	<!-- Hero -->
	<div class="hero">
		<div class="hero-brand">
			<h2>
				<span>WELCOME TO</span>
				<span>ROCK STAR</span>
				<span>gallery</span>
			</h2>
			<div class="hero-contact">
				<a href="tel:<?php the_field('phone_number', 16); ?>" class="hero-contact-block">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 135.4181976 135.4182129"><path fill="#424143" d="M99.305 81.264c9.035-9.038 36.113 18.041 36.113 27.076 0 9.037-27.078 27.078-27.078 27.078-18.073 0-54.66-18.545-72.258-36.113C18.545 81.737 0 45.147 0 27.079 0 27.079 18.072 0 27.079 0c9.003 0 36.113 27.079 27.075 36.113-9.007 9.034-18.072 9.034-18.072 18.041 0 9.07 9.065 18.072 18.072 27.11 9.038 9.003 18.072 18.041 27.11 18.041 9.003 0 9.003-9.038 18.04-18.04"/></svg>
					<span><?php the_field('phone_number', 16); ?></span>
				</a>
				<a href="mailto:<?php echo antispambot( $email ) ?>" class="hero-contact-block">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="5.6 16.9 92.8 66.2"><g fill="#FFF"><path d="M52 63.2l-11.5-10L7.7 81.3c1.2 1.1 2.8 1.8 4.6 1.8h79.4c1.8 0 3.4-.7 4.6-1.8L63.5 53.2 52 63.2z"/><path d="M96.3 18.7c-1.2-1.1-2.8-1.8-4.6-1.8H12.3c-1.8 0-3.4.7-4.6 1.8L52 56.6l44.3-37.9zm-90.7 4v55l32-27.2zm60.8 27.8l32 27.2v-55z"/></g></svg>
					<span><?php echo antispambot( $email ) ?></span>
				</a>
			</div>
		</div>
		<div class="hero-video-container">
			<video playsinline autoplay muted loop class="hero-video">
    		    <source src="<?php bloginfo('template_url'); ?>/vid/rsgbg.mp4" type="video/mp4">
    		    <source src="<?php bloginfo('template_url'); ?>/vid/rsgbg.webm" type="video/webm">
    		</video>
    	</div>
		<!-- Featured Artists -->
		<div class="featured-artists js-slider-2">
			<?php 
		 	$posts = get_field('featured_pages');
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
		 	       <a href="<?php the_permalink(); ?>" class="featured-artist">
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

	<!-- Whats New -->
	<div class="page-title-container page-title-container--alt-container">
		<div class="page-title">
			<h3>
				<span>Whats New</span>
			</h3>
		</div>
	</div>
	<div class="gradient">
		<div class="container flex-container">
	 	 	<?php 
 	 	 	$wn_posts = get_field('whats_new_posts');
 	 	 	if( $wn_posts ): ?>
 	 	 	    <?php foreach( $wn_posts as $post): // variable must be called $post (IMPORTANT) ?>
 	 	 	       <?php setup_postdata($post); ?>
 	 	 	       <?php
	 	 	 	       	$item_image_3 = get_field('featured_photo');
	 	 	 	       	$item_image_3 = $item_image_3['sizes']['featured-artist'];
	 	 	 	       	$item_image_4 = get_field('category_photo');
	 	 	 	       	$item_image_4 = $item_image_4['sizes']['featured-artist'];

	 	 	 	       	$item_image_5 = get_field('featured_product_photo');
	 	 	 	       	$item_image_5 = $item_image_5['sizes']['featured-artist'];

 	 	 	       	 	$title = get_the_title();
    	 	 	       ?>
    	 	 	       <a href="<?php the_permalink(); ?>" class="post-block">
    	 	 	       	<h2><?php echo mb_strimwidth($title, 0, 70, '...'); ?></h2>
	 	 	 	       <?php if($item_image_3) { ?>
 	 	 	       			<img src="<?php echo $item_image_3; ?>" alt="<?php the_title(); ?>">
	 	 	 	       <?php } ?>
   	 	 	 	       <?php if($item_image_4) { ?>
    	 	 	       		<img src="<?php echo $item_image_4; ?>" alt="<?php the_title(); ?>">
   	 	 	 	       <?php } ?>
   	 	 	 	       <?php if($item_image_5) { ?>
    	 	 	       		<img src="<?php echo $item_image_5; ?>" alt="<?php the_title(); ?>">
   	 	 	 	       <?php } ?>
   	 	 	 	       <?php if(!$item_image_3 && !$item_image_4 && !$item_image_5) { ?>
   	 	 	 	       <img src="<?php bloginfo('template_url'); ?>/img/default-thumb-sml.png" alt="<?php the_title(); ?>">
   	 	 	 	       <?php } ?>
	 	 	       		</a>
 	 	 	    <?php endforeach; ?>
 	 	 	    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
 	 	 	<?php endif; ?>
		</div>
	</div>

	<!-- Home Mission -->
	<div class="star-bg top-divider">
		<div class="container slim-container text-container">
				<?php 
					$home_copy = get_field('about_copy');
				?>
				<h2 class="yellow-title centered"><?php the_field('about_headline'); ?></h2>
				<p class="callout">
					<?php
						echo mb_strimwidth($home_copy, 0, 500, "...<a href='#js-more' data-type='inline' class='venobox'>Read More</a>");
					?>
				</p>
				<div class="more-content" id="js-more">
					<p>
						<?php echo $home_copy ?>
					</p>
				</div>
			<?php if(get_field('about_video')) { ?>
			<div class="padded-container">
				<div class="video-container">
					<?php the_field('about_video') ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
<?php get_footer(); ?>