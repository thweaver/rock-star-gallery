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

function max_title_length( $title ) {
	$max = 50;
	if( strlen( $title ) > $max ) {
	return substr( $title, 0, $max ). " &hellip;";
	} else {
	return $title;
	}
}



function display_taxonomy_terms($post_type, $display = false) {
    global $post;
    $term_list = wp_get_post_terms($post->ID, $post_type, array('fields' => 'names'));
 
    if($display == false) {
        echo $term_list[0];
    }elseif($display == 'return') {
        return  $term_list[0];
    }
}




class acf_field_taxonomy_chooser extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		// $test = get_field( 'test_term_select', $_GET['post'] );
		// echo 'shit<pre>';
		// print_r( $test );
		// echo '</pre>';
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/
		
		$this->name = 'taxonomy-chooser';
		
		
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		
		$this->label = __('Term and Taxonomy Chooser', 'acf-taxonomy-chooser');
		
		
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		
		$this->category = 'choice';
		
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		
		$this->defaults = array(
            'choices'		=> array(),
            'tax_type'		=> 0,
            'allow_null' 	=> 0,
            'ui'            => 0,
            'ajax'          => 0,
            'type_value'	=> 1,
            'multiple'		=> 0,
		);
		// Notes: 'multiple' used to be associated with a 'select multiple values field' also
		
		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('taxonomy-chooser', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> __('Error! Please enter a higher value', 'acf-taxonomy-chooser'),
		);
		
				
		// do not delete!
    	parent::__construct();
    	
	} // end __construct
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/
        // choices : Term or Taxonomy
        acf_render_field_setting( $field, array(
            'label'			=> __('Select Type','taxonomy-chooser'),
            'instructions'	=> '',
            'type'			=> 'select',
            'name'			=> 'tax_type',
            'choices'		=> array(
                1				=> __("Taxonomy",'taxonomy-chooser'),
                0				=> __("Term",'taxonomy-chooser'),
               	),
            'layout'	=>	'horizontal',
        ));
         // choices : Allowed Taxonomies
        acf_render_field_setting( $field, array(
            'label'			=> __('Choose Allowed Taxonomies','taxonomy-chooser'),
            'instructions'	=> '',
            'type'			=> 'select',
            'name'			=> 'choices',
            'choices'		=> acf_get_pretty_taxonomies(),
            'multiple'		=> 1,
            'ui'			=> 1,
            'allow_null'	=> 1,
            'placeholder'	=> __("All Taxonomies",'taxonomy-chooser'),
        ));
         // term id or slug
        acf_render_field_setting( $field, array(
            'label'			=> __('Return Term Value','taxonomy-chooser'),
            'instructions'	=> __('Specify the returned value on front end (taxonomies always return as slug)','taxonomy-chooser'),
            'type'			=> 'radio',
            'name'			=> 'type_value',
            'choices'		=> array(
                1				=> __("ID",'taxonomy-chooser'),
                0				=> __("Slug",'taxonomy-chooser'),
            ),
            'layout'	=>	'horizontal',
        ));
        // multiple
        // acf_render_field_setting( $field, array(
        //     'label'			=> __('Select multiple values?','taxonomy-chooser'),
        //     'instructions'	=> '',
        //     'type'			=> 'radio',
        //     'name'			=> 'multiple',
        //     'choices'		=> array(
        //         1				=> __("Yes",'taxonomy-chooser'),
        //         0				=> __("No",'taxonomy-chooser'),
        //     ),
        //     'layout'	=>	'horizontal',
        // ));
	
	} // end render field settings
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
    function render_field( $field ) {
        
        $taxonomies             = array();
        $taxonomies             = acf_get_array( $taxonomies );
        $taxonomies             = acf_get_pretty_taxonomies( $taxonomies );
        $taxonomy_terms         = acf_get_taxonomy_terms();
        $selected_taxonomies    = array();
        $terms = array();
       	$slug_name = ! empty( $field['choices'] ) ? $field['choices'] : array_keys( acf_get_pretty_taxonomies() );
       	if( $field['tax_type'] == 'Term' ){ // select terms
       		 foreach( $slug_name as $k1 => $v1 ) {
	        	$terms = array_merge($terms, get_terms( $v1, array( 'hide_empty' => false ) ) );
	            foreach( $taxonomies as $k2 => $v2 ) {
	                if( $v1 == $k2 ) {
	                    $field['choices'][$k1] = $v2;
	                }
	            }
	        }
	  
	        foreach( $field['choices'] as $k1 => $v1 ) {
	            foreach( $taxonomy_terms as $k2 => $v2 ) {
	                if( $v1 == $k2 ) {
	                    $selected_taxonomies[$v1] = $taxonomy_terms[$k2];
	                }
	            }
	        }
       	} else { //select taxonomies
   			$taxonomies = array();
   			foreach ( $slug_name as $tax_name ) { // only use allowed taxonomies
   				$taxonomies[ $tax_name ] = get_taxonomy( $tax_name );
   			}
   		    
   		    foreach( $taxonomies as $taxonomy ) {
   				$selected_taxonomies[ $taxonomy->name ] = $taxonomy->label;
   			}
       	}
       
        $field['choices'] = $selected_taxonomies;
        // add empty value (allows '' to be selected)
        if( empty($field['value']) ){
            $field['value'] = '';
            $field['value']['cat']	 = 	'';
        }
        // placeholder
        if( empty($field['placeholder']) ) {
            $field['placeholder'] = __("Select",'acf');
        }
        // vars
        $atts = array(
            'id'				=> $field['id'],
            'class'				=> $field['class'] . ' js-multi-taxonomy-select2',
            'name'				=> $field['name'],
            'data-ui'			=> $field['ui'],
            'data-ajax'			=> $field['ajax'],
            'data-placeholder'	=> $field['placeholder'],
            'data-allow_null'	=> $field['allow_null']
        );
        // hidden input
        if( $field['ui'] ) {
            acf_hidden_input(array(
                'type'	=> 'hidden',
                'id'	=> $field['id'],
                'name'	=> $field['name'],
                'value'	=> implode(',', $field['value'])
            ));
        } elseif( $field['multiple'] ) {
            acf_hidden_input(array(
                'type'	=> 'hidden',
                'name'	=> $field['name'],
            ));
        } 
        // ui
        if( $field['ui'] ) {
            $atts['disabled'] = 'disabled';
            $atts['class'] .= ' acf-hidden';
        }
        // special atts
        foreach( array( 'readonly', 'disabled' ) as $k ) {
            if( !empty($field[ $k ]) ) {
                $atts[ $k ] = $k;
            }
        }
        // vars
        $els = array();
        $choices = array();
    	// loop through values and add them as options
    	if( !empty($field['choices']) ) {
    	    foreach( $field['choices'] as $k => $v ) { // allowed taxonomies
   		         if( is_array($v) ){
    	            // optgroup
    	            $els[] = array( 'type' => 'optgroup', 'label' => $k );
    	            if( !empty($v) ) {
    	                foreach( $v as $k2 => $v2 ) {
    	                	$strip_v2_hyphen = preg_replace( '#-\s?#', '', $v2 ); // Child categories have hyphens before the name, we need to remove them in order to match them
    	                	
    	                	if ($field['type_value']) { // value = term ID
    	                		foreach ($terms as $key => $val) {
    	                			if ($val->name == $strip_v2_hyphen ) {
    	                			    $els[] = array( 'type' => 'option', 'value' => $val->term_id, 'label' => $v2 , 'selected' => $slct = ($val->term_id == $field['value'] ? "selected": "") );
    	                			}
	
    	                		}
    	                	} else { // value = term slug
    	                		preg_match( '#(?::)(.*)#', $k2, $value ); // originally returns 'taxonomy:term-slug' this removes 'taxonomy:'
    	                		$els[] = array( 'type' => 'option', 'value' => $value[1], 'label' => $v2, 'selected' => $slct = ($value[1] == $field['value'] ? "selected": "") );
    	                	}
    	                	$choices[] = $k2;
    	                }
    	            }
    	            $els[] = array( 'type' => '/optgroup' );
    	        } else { // value = Taxonomy Slug
    	            $els[] = array( 'type' => 'option', 'value' => $k, 'label' => $v, 'selected' => $slct = ($k == $field['value'] ? "selected": "") );
    	            $choices[] = $k;
    	        }
    	    }
    	}
    	// null
    	if( $field['allow_null'] ) {
    	    array_unshift( $els, array( 'type' => 'option', 'value' => '', 'label' => '- ' . $field['placeholder'] . ' -' ) );
    	}		
    	        
    	// html
    	echo '<select ' . acf_esc_attr( $atts ) . '>';	
        	// construct html
        	if( !empty($els) ) {
        	    foreach( $els as $el ) {
        	        // extract type
        	        $type = acf_extract_var($el, 'type');
        	        if( $type == 'option' ) {
        	            // get label
        	            $label = acf_extract_var($el, 'label');
        	            // validate selected
        	            if( acf_extract_var($el, 'selected') ) {
        	                $el['selected'] = 'selected';
         	           }
        	            echo acf_esc_attr( $el );
        	            echo '<option ' . acf_esc_attr( $el ) . '>' . $label . '</option>';
        	        } else {
        	            echo '<' . $type . ' ' . acf_esc_attr( $el ) . '>';
        	        }
        	    }
        	}
    	echo '</select>';
	
    } // end render field
		
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/
    function input_admin_enqueue_scripts() {
        $dir = plugin_dir_url( __FILE__ );
        // register & include JS
        wp_register_script( 'acf-input-taxonomy-chooser', "{$dir}js/input.js" );
        wp_enqueue_script('acf-input-taxonomy-chooser');
    }
	
	
	/*
	*  input_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/
	/*
		
	function input_admin_head() {
	
		
		
	}
	
	*/
	
	
	/*
   	*  input_form_data()
   	*
   	*  This function is called once on the 'input' page between the head and footer
   	*  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and 
   	*  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
   	*  seen on comments / user edit forms on the front end. This function will always be called, and includes
   	*  $args that related to the current screen such as $args['post_id']
   	*
   	*  @type	function
   	*  @date	6/03/2014
   	*  @since	5.0.0
   	*
   	*  @param	$args (array)
   	*  @return	n/a
   	*/
   	
   	/*
   	
   	function input_form_data( $args ) {
	   	
		
	
   	}
   	
   	*/
	
	
	/*
	*  input_admin_footer()
	*
	*  This action is called in the admin_footer action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_footer)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/
	/*
		
	function input_admin_footer() {
	
		
		
	}
	
	*/
	
	
	/*
	*  field_group_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
	*  Use this action to add CSS + JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/
	/*
	
	function field_group_admin_enqueue_scripts() {
		
	}
	
	*/
	
	/*
	*  field_group_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is edited.
	*  Use this action to add CSS and JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/
	/*
	
	function field_group_admin_head() {
	
	}
	
	*/
	/*
	*  load_value()
	*
	*  This filter is applied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	/*
	
	function load_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	
	*/
	
	
	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is saved in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	/*
	
	function update_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	
	*/
	
	
	/*
	*  format_value()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value which was loaded from the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*
	*  @return	$value (mixed) the modified value
	*/
		
	/*
	
	function format_value( $value, $post_id, $field ) {
		
		// bail early if no value
		if( empty($value) ) {
		
			return $value;
			
		}
		
		
		// apply setting
		if( $field['font_size'] > 12 ) { 
			
			// format the value
			// $value = 'something';
		
		}
		
		
		// return
		return $value;
	}
	
	*/
	
	
	/*
	*  validate_value()
	*
	*  This filter is used to perform validation on the value prior to saving.
	*  All values are validated regardless of the field's required setting. This allows you to validate and return
	*  messages to the user if the value is not correct
	*
	*  @type	filter
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$valid (boolean) validation status based on the value and the field's required setting
	*  @param	$value (mixed) the $_POST value
	*  @param	$field (array) the field array holding all the field options
	*  @param	$input (string) the corresponding input name for $_POST value
	*  @return	$valid
	*/
	
	/*
	
	function validate_value( $valid, $value, $field, $input ){
		
		// Basic usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = false;
		}
		
		
		// Advanced usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = __('The value is too little!','acf-taxonomy-chooser'),
		}
		
		
		// return
		return $valid;
		
	}
	
	*/
	
	
	/*
	*  delete_value()
	*
	*  This action is fired after a value has been deleted from the db.
	*  Please note that saving a blank value is treated as an update, not a delete
	*
	*  @type	action
	*  @date	6/03/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (mixed) the $post_id from which the value was deleted
	*  @param	$key (string) the $meta_key which the value was deleted
	*  @return	n/a
	*/
	
	/*
	
	function delete_value( $post_id, $key ) {
		
		
		
	}
	
	*/
	
	
	/*
	*  load_field()
	*
	*  This filter is applied to the $field after it is loaded from the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0	
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	/*
	
	function load_field( $field ) {
		
		return $field;
		
	}	
	
	*/
	
	
	/*
	*  update_field()
	*
	*  This filter is applied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	/*
	
	function update_field( $field ) {
		
		return $field;
		
	}	
	
	*/
	
	
	/*
	*  delete_field()
	*
	*  This action is fired after a field is deleted from the database
	*
	*  @type	action
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	n/a
	*/
	
	/*
	
	function delete_field( $field ) {
		
		
		
	}	
	
	*/
	
}
// create field
new acf_field_taxonomy_chooser();



/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );;




