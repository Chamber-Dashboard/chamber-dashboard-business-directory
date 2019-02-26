<?php
//A-Z Directory Shortcode

/*function cdash_business_taxonomy_bus_alpha_index() {
  $args = array(
		'labels'        => 'Alpha Index',
    'show_ui'       => true,
    'query_var' => true,
		'show_admin_column' => false,
  );
	register_taxonomy( 'alpha_index', array( 'business' ), $args );
}*/
function cdash_business_taxonomy_bus_alpha_index(){
  register_taxonomy( 'alpha_index',array (
		0 => 'business',
	),
	array( 'hierarchical' => false,
		'label' => 'Alpha Index',
		'show_ui' => false,
		'query_var' => true,
		'show_admin_column' => false,
	) );
}
//add_action('init', 'cdash_business_taxonomy_bus_alpha_index', 0);

function cdash_business_save_alpha( $post_id ) {
  global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;
	//only run for businesses
	$slug = 'business';
	$letter = '';
	// If this isn't a 'business' post, don't update it.
	if ( isset( $_POST['post_type'] ) && ( $slug != $_POST['post_type'] ) )
	return;
	// Check permissions
	if ( !current_user_can( 'edit_post', $post_id ) )
	return;
	// OK, we're authenticated: we need to find and save the data
	$taxonomy = 'alpha_index';
  //set term as first letter of post title, lower case
    wp_set_object_terms( $post_id, strtolower(substr($_POST['post_title'], 0, 1)), $taxonomy );


	/*if ( isset( $_POST['post_type'] ) ) {
		// Get the title of the post
		$title = strtolower( $_POST['post_title'] );

		// The next few lines remove A, An, or The from the start of the title
		$splitTitle = explode(" ", $title);
		$blacklist = array("an","a","the");
		$splitTitle[0] = str_replace($blacklist,"",strtolower($splitTitle[0]));
		$title = implode("", $splitTitle);

		// Get the first letter of the title
		$letter = substr( $title, 0, 1 );

		// Set to 0-9 if it's a number
		if ( is_numeric( $letter ) ) {
			$letter = '0-9';
		}
	}*/
	//set term as first letter of post title, lower case
	//wp_set_post_terms( $post_id, $letter, $taxonomy );
}
//add_action( 'save_post', 'cdash_business_save_alpha' );
//add_action( 'post_updated', 'cdash_business_save_alpha');

function cdash_business_alpha_listing(){
  // Set our default attributes
	extract( shortcode_atts(
		array(
		'orderby' => 'name', // options: date, modified, menu_order, rand
		'order' => 'ASC',
		'showcount' => 0,
		'hierarchical' => 0,
		'hide_empty' => 1, //can be 0
		'child_of' => 0,
		'exclude' => '',
		'format' 	=> 'list', //options are list, grid
		), $atts )
	);

	$taxonomy = 'alpha_index';
	$args = array(
		'taxonomy' => $taxonomy,
		'orderby' => $orderby,
		'order' => $order,
		'show_count' => $showcount,
		'hierarchical' => $hierarchical,
		'hide_empty' => $hide_empty,
		'child_of' => $child_of,
		'exclude' => $exclude,
		'echo' => 0,
		'title_li' => '',
	);

	$taxonomies = get_terms( $args );

	if($format == 'list'){
		$categories = '<ul class="business-categories">' . 	wp_list_categories($args) . '</ul>';
	}else if($format == 'grid'){
		cdash_enqueue_styles();
		//$taxonomies = get_terms( $args );
		$categories = display_categories_grid($taxonomies);
	}
	return $categories;
}
//add_shortcode( 'business_alpha_index', 'cdash_business_alpha_listing' );

?>
