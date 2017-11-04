<form class="search-bar" role="search" method="get" id="searchform" action="<?php bloginfo('siteurl'); ?>">
			<div class="search-input">
				<input type="text" class="search-text" value="<?php echo get_search_query(); ?>" name="s" id="s"/>
				<?php include 'img/icon-search.svg' ?>
			</div>
		</form>