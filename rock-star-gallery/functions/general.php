<?php

/*==============================================================================
Timezone
==============================================================================*/

date_default_timezone_set(get_option('timezone_string'));

/*==============================================================================
Inline SVG From File
==============================================================================*/

function svg( $svg ) {
	$svg = str_replace( site_url(), '', $svg );
	include ( ABSPATH . $svg );
}

/*==============================================================================
Page and Subpage Parent Checks
==============================================================================*/

function get_page_id($page_name){
	global $wpdb;
	$page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return $page_name;
}

function is_tree($pid) {
	global $post; 
	$anc = get_post_ancestors( $post->ID );
	foreach($anc as $ancestor) {
		if(is_page() && $ancestor == $pid) {
			return true;
		}
	}
	if(is_page()&&(is_page($pid))) {
		return true;
	} else {
		return false;
	}
};

function get_parent_slug() {
	global $post;
	if($post->post_parent == 0) return '';
	$post_data = get_post($post->post_parent);
	return $post_data->post_name;
}

/*======================================================================================*/
/* Custom Navigation Menus */
/*======================================================================================*/


function wpb_custom_new_menu() {
  register_nav_menu('top-menu',__( 'Top Menu' ));
  register_nav_menu('sub-menu',__( 'Sub Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );



/*==============================================================================
Pagination
==============================================================================*/

function tfg_pagination( $pages = '', $range = 2 ) {
	$showitems = $range * 2 + 1;
	global $paged;
	if( empty( $paged ) ) {
		$paged = 1;
	}
	if( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if( !$pages ) {
			$pages = 1;
		}
	}
	if( $pages > 1 ) {
		echo "<ul class='pagination'>";
		echo "<li class='pagination-label'>Page " . $paged . ' of ' . $pages . "</li>";
		if( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) echo "<li class='pagination-item'><a href='" . get_pagenum_link( 1 ) . "' class='pagination-link'>&laquo;</a></li>";
		if( $paged > 1 && $showitems < $pages ) echo "<li class='pagination-item'><a href='" . get_pagenum_link( $paged - 1 ) . "' class='pagination-link'>&lsaquo;</a></li>";
		for( $i = 1; $i <= $pages; $i++ ) {
			if( $pages != 1  && ( !( $i >= $paged + $range+1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				if( $paged == $i ) {
					echo "<li class='pagination-item pagination-item-current'><a href='" . get_pagenum_link( $i ) . "' class='pagination-link'>" . $i . "</a></li>";
				} else {
					echo "<li class='pagination-item'><a href='" . get_pagenum_link( $i ) . "' class='pagination-link'>" . $i . "</a></li>";
				}
			}
		}
		if( $paged < $pages && $showitems < $pages ) echo "<li class='pagination-item'><a href='" . get_pagenum_link( $paged + 1 ) . "' class='pagination-link'>&rsaquo;</a></li>";
		if( $paged < $pages - 1 && $paged + $range-1 < $pages && $showitems < $pages ) echo "<li class='pagination-item'><a href='".get_pagenum_link($pages)."' class='pagination-link'>&raquo;</a></li>";
		echo "</ul>";
	}
}

/*==============================================================================
Forms
==============================================================================*/

function clean_string($string){
	if(get_magic_quotes_gpc()){
		return stripslashes(trim($string));
	} else {
		return trim($string);
	}
}

function refill_field($field){
	if(!empty($_POST[$field])){
		return trim(stripslashes($_POST[$field]));
	} else {
		return '';
	}
}

function option_select($field, $val){
	if(!empty($_POST[$field]) && $_POST[$field] === $val){
		echo ' selected';
	}
}

function checkbox_check($field, $val){
	if(!empty($_POST[$field]) && $_POST[$field] == $val){
		echo ' checked';
	}
}

function show_form_status(){
	global $form_errors;
	global $form_success;
	if(!empty($form_errors)){
		echo '<div class="c-form-status c-form-errors">';
		foreach($form_errors as $error){
			echo '<p class="c-form-text no-orphan">'.$error.'</p>';
		}
		echo '</div>';
	} else if(isset($form_success)){
		echo '<div class="c-form-status c-form-success"><p class="c-form-text no-orphan">'.$form_success.'</p></div>';
	}
}

function get_email_id() {
	if ( get_option( 'contact_form_id' ) !== false ) {
		return get_option( 'contact_form_id' );
	} else {
		add_option( 'contact_form_id', 1, null, 'no' );
		return 1;
	}
}

function inc_email_id() {
	$current_id = get_email_id();
	update_option( 'contact_form_id', $current_id + 1 );
}

/*==============================================================================
Miscellaneous
==============================================================================*/

function current_url(){
	return (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
}