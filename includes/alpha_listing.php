<?php
//A-Z Directory Shortcode
function cdash_alpha_listing_styles(){
	wp_enqueue_style( 'alpha-listing-css', plugins_url( '/css/alpha_listing.css', dirname(__FILE__) ));
}

add_action( 'wp_enqueue_scripts', 'cdash_alpha_listing_styles' );


function cdash_business_alpha_listing($atts){
  // Set our default attributes
	extract( shortcode_atts(
		array(
		'format' 	=> 'list', //options are list, grid
		), $atts )
	);
	$business_listings = '';

	$business_listings .= cdash_list_alpha();
	$business_listings .= "<br /><div class='business_listings'>";
	$business_listings .= "Display initial businesses here.";
	$business_listings .= "</div>";

	if($format == 'list'){

	}else if($format == 'grid'){
		cdash_enqueue_styles();
		//$taxonomies = get_terms( $args );
		//$alpha = display_categories_grid($taxonomies);
	}

	return $business_listings;
}
add_shortcode( 'business_alpha_index', 'cdash_business_alpha_listing' );

//Display the list of alphabet
function cdash_list_alpha(){
	global $wpdb;

  $query = "SELECT DISTINCT(SUBSTRING(post_title, 1, 1)) AS first_char
      FROM $wpdb->posts
      WHERE post_status = 'publish'
      AND post_type = 'business'
      ORDER BY first_char ASC";

  $results = $wpdb -> get_results($query);
	$alpha = '';
	$alpha .= "<div class='alpha_listings'>";
	$alpha .= "<ul>";
	foreach($results as $result) {
		$alpha .= "<li>" . $result->first_char;
		//$alpha .= cdash_business_listing_for_alpha($result->first_char);
		$alpha .= "</li>";
	}
	$alpha .= "</ul></div>";

	return $alpha;
}
//If length of alpha is not a single character, exclude it. Sanitize the user input
function cdash_business_listing_for_alpha($alpha) {
	//call this function via Ajax when clicked on an alphabet/number
	
  global $wpdb;

  $query = "SELECT * FROM $wpdb->posts
      WHERE post_status = 'publish'
      AND post_type = 'business'
      AND SUBSTRING(post_title, 1, 1) = '$alpha'
      ORDER BY post_title ASC";

    $results = $wpdb->get_results($query);

    $ret = "<ul>";
    foreach($results as $result) {
      $ret .= "<li>" . $result->post_title . "</li>";
    }
    $ret .= "</ul>";
    return $ret;
}

function cdash_business_listings(){
	//run wp_query to get all businesses and display them when the page loads
}

?>
