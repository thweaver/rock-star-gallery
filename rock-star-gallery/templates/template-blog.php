<?php /* Template Name: Blog Template */ ?>

<?php get_header(); ?>

<div class="wrapper wrapper--page">
<!--Page Title-->
<div class="page-title-container">
	<div class="page-title">
		<h1>
			<span><?php the_title() ?></span>
		</h1>
	</div>
</div>

<div class="container page-container">
	<div class="post-header blog-header">
		<h2 class="blog-title"><span>Featured Post</span></h2>
		<?php
			global $paged;
			if(empty($paged)) $paged = 1;
			$query = new WP_Query(array(
				'post_type' => 'post',
				'posts_per_page' => 1
			));
		?>
		<?php if ( $query->have_posts() ) { ?>
		<?php while ( $query->have_posts() ) { $query->the_post(); ?>
			<?php
				$image = get_field('featured_photo');
				$image = $image['sizes']['page-header'];
				$title = get_the_title();
			?>
			<a href="<?php the_permalink() ?>">
				<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" class="post-image">
				<div class="post-title">
					<div>
						<h1><?php echo mb_strimwidth($title, 0, 70, '...'); ?></h1>
						<span>Posted: <?php the_date() ?></span>
					</div>
				</div>
			</a>
			<?php } ?>
			<?php } else { ?>
		<?php } ?>
		<?php wp_reset_postdata(); ?>
	</div>
	<div class="post-sub-title">
		<h2>
			<span>Recent Posts</span>
		</h2>
	</div>
	<?php
		global $paged;
		if(empty($paged)) $paged = 1;
		$query = new WP_Query(array(
			'post_type' => 'post',
			'posts_per_page' => 12,
			'offset' => 1,
			'paged' => $paged
		));
	?>
	<?php if ( $query->have_posts() ) { ?>
		<div class="post-item flex-container post-flex-container">
		<?php while ( $query->have_posts() ) { $query->the_post(); ?>
			<?php
				$image = get_field('featured_photo');
				$image = $image['sizes']['feature'];

				$title = get_the_title();
			?>
			<?php if( 0 == $wp_query->current_post ) { ?>
			<?php } else { ?>
			<a href="<?php the_permalink(); ?>" class="post-block">
				<h2><?php echo mb_strimwidth($title, 0, 70, '...'); ?></h2>
				<?php if($image) { ?>
				<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
				<?php } ?>
				<?php if(!$image) { ?>
				<img src="<?php bloginfo('template_url'); ?>/img/default-thumb.png" alt="<?php the_title(); ?>">
				<?php } ?>
			</a>
			<?php } ?>
	<?php } ?>
		</div>
		<?php tfg_pagination($pages = $query->max_num_pages); ?>
	<?php } else { ?>
		<p>There are no blog posts at this time. Please check back soon.</p>
	<?php } ?>	
</div>
<?php get_footer(); ?>


