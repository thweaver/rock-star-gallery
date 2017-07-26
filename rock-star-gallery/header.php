<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
		<meta name="format-detection" content="telephone=no">
		<title><?php the_title() ?></title>
		<meta name="description" content="">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<link href="<?php bloginfo('template_url'); ?>/css/main.min.css" rel="stylesheet">
		<script src="<?php bloginfo('template_url'); ?>/js/modernizr.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class( 'page-' . $post->post_name ); ?>>
	<nav class="main-nav">
		<a href="#" class="site-logo">
			<?php include 'img/logo-rockstar.svg' ?>
		</a>
		<div class="nav-flex">
			<ul>
				<li><a href="#" class="main-nav-item">CELEBRITY ARTISTS</a></li>
				<li><a href="#" class="main-nav-item">Fine Photography</a></li>
				<li><a href="#" class="main-nav-item">Collectibles</a></li>
			</ul>
			<form class="search-bar">
				<div class="search-input">
					<input type="text" class="search-text" />
					<?php include 'img/icon-search.svg' ?>
				</div>
			</form>
		</div>
	</nav>
	<nav class="secondary-nav">
		<ul class="secondary-nav-list">
			<li><a href="#" class="secondary-nav-item">Whats New</a></li>
			<li><a href="#" class="secondary-nav-item">Live Events</a></li>
			<li><a href="#" class="secondary-nav-item">Press</a></li>
			<li><a href="#" class="secondary-nav-item">Contact Us</a></li>
		</ul>
		<ul class="social-nav">
			<li>
				<a href="#" class="social-icon">
					<?php include 'img/icon-socialMedia--facebook.svg' ?>
				</a>
			</li>
			<li>
				<a href="#" class="social-icon">
					<?php include 'img/icon-socialMedia--twitter.svg' ?>
				</a>
			</li>
			<li>
				<a href="#" class="social-icon">
					<?php include 'img/icon-socialMedia--instagram.svg' ?>
				</a>
			</li>
			<li>
				<a href="#" class="social-icon">
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
