<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
		<meta name="format-detection" content="telephone=no">
		<meta name="description" content="">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<link href="<?php bloginfo('template_url'); ?>/css/main.min.css?v=2" rel="stylesheet">
		<script src="<?php bloginfo('template_url'); ?>/js/modernizr.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class( 'page-' . $post->post_name ); ?>>
	<div class="loader">
		<div class="loader-wrapper">
			<?php include 'img/loader-icon.svg' ?>
		</div>
	</div>
	<header>
		<a href="<?php bloginfo('url'); ?>" class="site-logo">
			<?php include 'img/logo-rockstar.svg' ?>
		</a>
		<nav class="nav-flex">
			<?php
				$c_menu = get_nav_menu('celebrity');
				$p_menu = get_nav_menu('photograhy');
				$co_menu = get_nav_menu('collectibles');
			?>
			<form class="search-bar">
				<div class="search-input">
					<input type="text" class="search-text" />
					<?php include 'img/icon-search.svg' ?>
				</div>
			</form>
			<ul class="main-nav">
				<li>
					<a href="<?php bloginfo('url'); ?>/celebrity-artists" class="main-nav-item">CELEBRITY ARTISTS</a>
					<?php if( count( $c_menu ) ) : ?>
						<ul class="sub-nav-list">
							<?php foreach($c_menu as $item) : ?>
								<li class="sub-nav-list-item">
									<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>">
									<?php echo $item->title; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</li>
				<li>
					<a href="<?php bloginfo('url'); ?>/fine-photography" class="main-nav-item">Fine Photography</a>
					<?php if( count( $p_menu ) ) : ?>
						<ul class="sub-nav-list">
							<?php foreach($p_menu as $item) : ?>
								<li class="sub-nav-list-item">
									<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>">
									<?php echo $item->title; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</li>
				<li>
					<a href="<?php bloginfo('url'); ?>/collectibles" class="main-nav-item">Collectibles</a>
					<?php if( count( $co_menu ) ) : ?>
						<ul class="sub-nav-list">
							<?php foreach($co_menu as $item) : ?>
								<li class="sub-nav-list-item">
									<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>"">
									<?php echo $item->title; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</li>
			</ul>
		</nav>
		<div class="hamburger">
			<a href="#" class="hamburger-icon">
				<span></span>
			</a>
		</div>
		<nav class="secondary-nav">
			<ul class="secondary-nav-list">
				<li><a href="<?php bloginfo('url'); ?>/blog" class="secondary-nav-item">Blog</a></li>
				<li><a href="<?php bloginfo('url'); ?>/featured-collections" class="secondary-nav-item">Featured Collections</a></li>
				<li><a href="<?php bloginfo('url'); ?>/gallery" class="secondary-nav-item">Gallery</a></li>
				<li><a href="<?php bloginfo('url'); ?>/testimonials" class="secondary-nav-item">Testimonials</a></li>
				<li><a href="<?php bloginfo('url'); ?>/testimonials" class="secondary-nav-item">Customer Service</a></li>
			</ul>
			<ul class="social-nav">
				<li>
					<a href="<?php the_field('facebook', 16) ?>" class="social-icon">
						<?php include 'img/icon-socialMedia--facebook.svg' ?>
					</a>
				</li>
				<li>
					<a href="<?php the_field('twitter', 16) ?>" class="social-icon">
						<?php include 'img/icon-socialMedia--twitter.svg' ?>
					</a>
				</li>
				<li>
					<a href="<?php the_field('instagram', 16) ?>" class="social-icon">
						<?php include 'img/icon-socialMedia--instagram.svg' ?>
					</a>
				</li>
				<li>
					<a href="<?php the_field('youtube', 16) ?>" class="social-icon">
						<?php include 'img/icon-socialMedia--youtube.svg' ?>
					</a>
				</li>
				<li>
					<a href="#" class="newsletter-btn">
						<span>Join Our Newsletter</span>
						<?php include 'img/icon-socialMedia--email.svg' ?>
					</a>
				</li>
			</ul>
		</nav>
	</header>