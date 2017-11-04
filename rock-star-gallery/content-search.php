
	
	<h3 ><span class="small-span"><?php $post_type = get_post_type_object( get_post_type($post) );
	echo $post_type->labels->singular_name ; ?></span><br/><?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?></h3>
<hr/><br/>