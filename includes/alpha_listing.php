<?php
//A-Z Directory Shortcode

function cdash_business_alpha_listing($atts){
  // Set our default attributes
	extract( shortcode_atts(
		array(
		'format' 	=> 'list', //options are list, grid
		), $atts )
	);

  global $wpdb;

  $query = "SELECT DISTINCT(SUBSTRING(post_title, 1, 1)) AS first_char
      FROM $wpdb->posts
      WHERE post_status = 'publish'
      AND post_type = 'business'
      ORDER BY first_char ASC";

  $results = $wpdb -> get_results($query);

	if($format == 'list'){
		$categories = '<ul class="business-categories">';
    foreach($results as $result) {
      $categories .= "<li>" . $result->first_char;
      //$categories .= cdash_business_listing_for_alpha($result->first_char);
      $categories .= "</li>";
    }
    $categories .= '</ul>';
	}else if($format == 'grid'){
		cdash_enqueue_styles();
		//$taxonomies = get_terms( $args );
		$categories = display_categories_grid($taxonomies);
	}

	return $categories;
}
add_shortcode( 'business_alpha_index', 'cdash_business_alpha_listing' );

//If length of alpha is not a single character, exclude it. Sanitize the user input
function cdash_business_listing_for_alpha($alpha) {
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

?>
