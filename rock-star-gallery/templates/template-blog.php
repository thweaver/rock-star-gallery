<?php /* Template Name: Blog Template */ ?>

<?php get_header(); ?>

<!--Page Title-->
<div class="page-title-container">
	<div class="page-title">
		<h1>
			<span>Grace Slick</span>
		</h1>
	</div>
</div>

<div class="container page-container">
	<div class="post-header blog-header">
		<h2 class="blog-title"><span>Featured Post</span></h2>
		<img src="<?php bloginfo('template_url'); ?>/img/temp/temp-blog.jpg" class="post-image">
		<div class="post-title">
			<div>
				<h1>Lorem Ipsum Dolar Sit Amit</h1>
				<span>Posted: Sat Aug 12th 2017</span>
			</div>
		</div>
	</div>
	<div class="post-sub-title">
		<h2>
			<span>Recent Posts</span>
		</h2>
	</div>
	<div class="post-item flex-container post-flex-container">
		<a href="#" class="post-block">
			<h2>ROCK STAR gallery Honors the Featured Artists Performing at Desert Trip</h2>
			<img src="<?php bloginfo('template_url'); ?>/img/temp/temp-feature.jpg" alt="<?php the_title(); ?>">
		</a>
		<a href="#" class="post-block">
			<h2>ROCK STAR gallery Honors the Featured Artists Performing at Desert Trip</h2>
			<img src="<?php bloginfo('template_url'); ?>/img/temp/temp-feature.jpg" alt="<?php the_title(); ?>">
		</a>
		<a href="#" class="post-block">
			<h2>ROCK STAR gallery Honors the Featured Artists Performing at Desert Trip</h2>
			<img src="<?php bloginfo('template_url'); ?>/img/temp/temp-feature.jpg" alt="<?php the_title(); ?>">
		</a>
		<a href="#" class="post-block">
			<h2>ROCK STAR gallery Honors the Featured Artists Performing at Desert Trip</h2>
			<img src="<?php bloginfo('template_url'); ?>/img/temp/temp-feature.jpg" alt="<?php the_title(); ?>">
		</a>
		<a href="#" class="post-block">
			<h2>ROCK STAR gallery Honors the Featured Artists Performing at Desert Trip</h2>
			<img src="<?php bloginfo('template_url'); ?>/img/temp/temp-feature.jpg" alt="<?php the_title(); ?>">
		</a>
		<a href="#" class="post-block">
			<h2>ROCK STAR gallery Honors the Featured Artists Performing at Desert Trip</h2>
			<img src="<?php bloginfo('template_url'); ?>/img/temp/temp-feature.jpg" alt="<?php the_title(); ?>">
		</a>
		<a href="#" class="post-block">
			<h2>ROCK STAR gallery Honors the Featured Artists Performing at Desert Trip</h2>
			<img src="<?php bloginfo('template_url'); ?>/img/temp/temp-feature.jpg" alt="<?php the_title(); ?>">
		</a>
		<a href="#" class="post-block">
			<h2>ROCK STAR gallery Honors the Featured Artists Performing at Desert Trip</h2>
			<img src="<?php bloginfo('template_url'); ?>/img/temp/temp-feature.jpg" alt="<?php the_title(); ?>">
		</a>
		<a href="#" class="post-block">
			<h2>ROCK STAR gallery Honors the Featured Artists Performing at Desert Trip</h2>
			<img src="<?php bloginfo('template_url'); ?>/img/temp/temp-feature.jpg" alt="<?php the_title(); ?>">
		</a>
	</div>
	<ul class="pagination">
		<li class="pagination-label">Page:</li>
		<li class="pagination-item pagination-item-current">
			<a href="#">1</a>
		</li>
		<li class="pagination-item">
			<a href="#">2</a>
		</li>
		<li class="pagination-item">
			<a href="#">3</a>
		</li>
		<li class="pagination-item">
			<a href="#">4</a>
		</li>
	</ul>
</div>
<?php get_footer(); ?>