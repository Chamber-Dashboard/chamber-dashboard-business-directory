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
    'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	) );
}
add_action('init', 'cdash_business_taxonomy_bus_alpha_index', 0);

/* When the post is saved, saves our custom data */
function cdash_business_save_alpha( $post_id ) {
    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    //check location (only run for posts)
    $limitPostTypes = array('post');
    if (!in_array($_POST['post_type'], $limitPostTypes))
        return $post_id;

    // Check permissions
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;

    // OK, we're authenticated: we need to find and save the data
    $taxonomy = 'alpha_index';

    //set term as first letter of post title, lower case
    wp_set_post_terms( $post_id, strtolower(substr($_POST['post_title'], 0, 1)), $taxonomy );

    //delete the transient that is storing the alphabet letters
    //delete_transient( 'kia_archive_alphabet');
}
add_action( 'save_post', 'cdash_business_save_alpha' );

//add_action( 'save_post', 'cdash_business_save_alpha' );
add_action( 'post_updated', 'cdash_business_save_alpha');

//create array from existing posts
function cdash_alpha_run_once(){

    if ( false === get_transient( 'cdash_alpha_run_once' ) ) {

        $taxonomy = 'alpha_index';
        $alphabet = array();

        $posts = get_posts(array('numberposts' => -1) );

        foreach( $posts as $p ) :
        //set term as first letter of post title, lower case
        wp_set_post_terms( $p->ID, strtolower(substr($p->post_title, 0, 1)), $taxonomy );
        endforeach;

        set_transient( 'cdash_alpha_run_once', 'true' );

    }

}
add_action('init','cdash_alpha_run_once');


function cdash_business_alpha_listing($atts){
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
add_shortcode( 'business_alpha_index', 'cdash_business_alpha_listing' );

?>
