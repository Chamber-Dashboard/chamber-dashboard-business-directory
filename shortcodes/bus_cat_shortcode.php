<?php
// ------------------------------------------------------------------------
// BUSINESS CATEGORIES SHORTCODE
// ------------------------------------------------------------------------
function cdash_business_categories_shortcode( $atts ) {
	// Set our default attributes
	extract( shortcode_atts(
		array(
		'orderby' => 'name', // options: date, modified, menu_order, rand
		'order' => 'ASC',
		'showcount' => 0,
		'hierarchical' => 1,
		'hide_empty' => 1, //can be 0
		'child_of' => 0,
		'exclude' => '',
		'format' 	=> 'list', //options are list, grid
		), $atts )
	);

	$taxonomy = 'business_category';
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
		$categories = display_categories_grid($taxonomies, $showcount);
	}
	return $categories;
}
add_shortcode( 'business_categories', 'cdash_business_categories_shortcode' );

?>
