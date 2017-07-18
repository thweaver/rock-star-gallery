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

