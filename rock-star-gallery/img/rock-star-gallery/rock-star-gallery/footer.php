		</div>
		<footer>
			<div class="gradient">
				<div class="container flex-container">
					<div class="footer-brand">
						<?php 
							$email = get_field('info_email', 16);
						?>
						<a href="#" class="footer-logo"><?php include 'img/logo-rockstar.svg' ?></a>
						<div class="footer-social-media">
							<a href="<?php the_field('facebook', 16) ?>" target="_blank"><?php include 'img/icon-socialMedia--facebook.svg' ?></a>
							<a href="<?php the_field('twitter', 16) ?>" target="_blank"><?php include 'img/icon-socialMedia--twitter.svg' ?></a>
							<a href="<?php the_field('instagram', 16) ?>" target="_blank"><?php include 'img/icon-socialMedia--instagram.svg' ?></a>
							<a href="<?php the_field('youtube', 16) ?>" target="_blank"><?php include 'img/icon-socialMedia--youtube.svg' ?></a>
							<a href="mailto:<?php echo antispambot( $email ) ?>" target="_blank"><?php include 'img/icon-socialMedia--email.svg' ?></a>
						</div>
					</div>
					<div class="footer-contact">
						<a href="<?php bloginfo('url')?>/contact" class="button"><span>Schedule a Visit</span></a>
						<p>
							<?php the_field('address', 16); ?>

						</p>
					</div>
				</div>
			</div>
		</footer>
		<p class="copyright">copyright © <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?><</p>
		<script src="<?php bloginfo( 'template_url' ); ?>/js/main.min.js?v=1"></script>
		<?php wp_footer(); ?>
	</body>
</html>