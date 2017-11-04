<?php get_header(); ?>
<?php 
	$image = get_field('featured_photo');
	$image = $image['sizes']['page-header'];
	$show = get_field('show_photo_2');
?>
<div class="wrapper wrapper--page">
<!--Page Title-->
<div class="page-title-container">
	<div class="page-title">
		<h1>
			<span>404</span>
		</h1>
	</div>
</div>

<div class="container page-container">
	
	<!--Post Header-->

	<div class="post-copy">
		<div class="wysiwyg">
			<h2>Oops! That page can't be found</h2>
		</div>
	</div>
	
</div>
<?php get_footer(); ?>