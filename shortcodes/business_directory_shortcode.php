<?php
// ------------------------------------------------------------------------
// BUSINESS DIRECTORY SHORTCODE
// ------------------------------------------------------------------------

function cdash_business_directory_shortcode( $atts ) {
	$options = get_option('cdash_directory_options');
	$member_options = get_option('cdashmm_options');
    global $post;
		global $business_list;
		$business_list = '';
	// Set our default attributes
	extract( shortcode_atts(
		array(
			'format' => 'list',  // options: list, grid2, grid3, grid4, responsive
			'category' => '', // options: slug of any category
			'tags'	=>	'', // options: slug of any tag
			'level' => '', // options: slug of any membership level
			'text' => 'excerpt', // options: excerpt, description, none
			'display' => '', // options: address, url, phone, email, location_name, category, level, social_media_links, social_media_icons, location, hours
			'single_link' => 'yes', // options: yes, no
			'perpage' => '-1', // options: any number
			'orderby' => 'title', // options: date, modified, menu_order, rand, membership_level
			'order' => 'asc', //options: asc, desc
			'image' => 'logo', // options: logo, featured, none
			'status' => '', // options: slug of any membership status
			'image_size'	=> '', //options: full_width
			'alpha'	=> 'no'	//options: yes, no
		), $atts )
	);

	//If member manager is active AND orderby="membership_level", set $level=$membership_level[0]
	//Loop through the memberhsip levels

	/*if(function_exists('cdashmm_requires_wordpress_version') && $orderby == 'membership_level'){
		$membership_levels =	get_terms( array(
		'taxonomy' => 'membership_level',
		'hide_empty' => false,
		'orderby'		=>	'term_order',
		'order'			=>	'ASC'
		) );

		foreach( $membership_levels as $level ){
			$level = $membership_level->slug;
		}
	}*/

	// Enqueue stylesheet if the display format is columns instead of list
	if($format !== 'list') {
		cdash_enqueue_styles();
		cdash_enqueue_scripts();
	}
	// If user wants to display stuff other than the default, turn their display options into an array for parsing later
	if($display !== '') {
  		$displayopts = explode( ", ", $display);
  	}
  	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

		// Calculate the offset
		//$offset = ( $paged - 1 ) * $perpage;

	$args = array(
		'post_type' => 'business',
		'posts_per_page' => $perpage,
		'paged' => $paged,
		'orderby' => $orderby,
		'order' => $order,
	  'business_category' => $category,
	  'membership_level' => $level
	);

	if((isset($status)) && ($status != '')){
		$args['tax_query'][] = array(
			    'taxonomy' => 'membership_status',
		      'field' => 'slug',
          'terms' => array($status),
				  'operator' => 'IN'
			);
	}

	if(isset($_GET['starts_with'])){
		$args['starts_with'] = $_GET['starts_with'];
	}

	$business_list = '';
	if($alpha == 'yes'){
		$business_list = cdash_list_alphabet();
	}


	$args = cdash_add_hide_lapsed_members_filter($args);
	$businessquery = new WP_Query( $args );

	// The Loop
	if ( $businessquery->have_posts() ) :
		//$business_list = '';
		$business_list .= "<div id='businesslist' class='" . $format . ' ' . $image_size . "'>";
		$count = 0;
			while ( $businessquery->have_posts() ) :
				$businessquery->the_post();
				$add = ( $count % 2 ) ? ' even_post' : ' odd_post';
				$count++;
				//$postClass = post_class('business');
					//$business_list .= "<div class='business'" . join( ' ', get_post_class() ) . "'>";
					$business_list .= "<div class='" . $add ." business " . join( ' ', get_post_class() ) . "'>";
					if($single_link == "yes") {
						$business_list .= "<h3><a href='" . get_the_permalink() . "'>" . get_the_title() . "</a></h3>";
					} else {
						$business_list .= "<h3>" . get_the_title() . "</h3>";
					}
					if($image_size != ""){
						$image_class = "logo";
					}else{
						$image_class = "alignleft logo";
					}

					//$business_list .= '<p>' . $level . '</p>';
					$business_list .= "<div class='description'>";

			  	if( "logo" == $image ) {
			  		global $buslogo_metabox;
						$logometa = $buslogo_metabox->the_meta();
						if( isset( $logometa['buslogo'] ) ) {
					  	$logoattr = array(
							//'class'	=> 'alignleft logo',
							'class'	=> $image_class,
							);
							if( $single_link == "yes" ) {
								$business_list .= "<a href='" . get_the_permalink() . "'>" . wp_get_attachment_image($logometa['buslogo'], 'thumb', 0, $logoattr ) . "</a>";
							} else {
								$business_list .= wp_get_attachment_image($logometa['buslogo'], 'thumb', 0, $logoattr );
							}
						}
			  	} elseif( "featured" == $image ) {
			  		$thumbattr = array(
							//'class'	=> 'alignleft logo',
							'class'	=> $image_class,
						);
						if( $single_link == "yes" ) {
							$business_list .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID, 'thumb', $thumbattr) . '</a>';
				    } else {
							$business_list .= get_the_post_thumbnail( $post->ID, 'thumb', $thumbattr);
						}
			  	}
					if( "excerpt" == $text ) {
			  		$business_list .= get_the_excerpt();
			  	} elseif( "description" == $text ) {
			  		$business_list .= get_the_content();
			  	}

          /*if( "excerpt" == $text ) {
			  		$business_list .= apply_filters('the_excerpt', get_the_excerpt()); //#GV#: fixed localization/internationalization issues
			  	} elseif( "description" == $text ) {
			  		$business_list .= apply_filters('the_content', get_the_content());  //#GV#: fixed localization/internationalization issues
			  	}*/
			  	$business_list .= "</div>";
			  	if( '' !== $display ) {
			  		global $buscontact_metabox;
						$contactmeta = $buscontact_metabox->the_meta();
				  		if( isset( $contactmeta['location'] ) ) {
				  			$locations = $contactmeta['location'];
				  			if( is_array( $locations ) ) {
									foreach( $locations as $location ) {
										if( isset( $location['donotdisplay'] ) && "1" == $location['donotdisplay'] ) {
											continue;
										} else {
								  		if( in_array( "location_name", $displayopts ) && isset( $location['altname'] ) && '' !== $location['altname'] ) {
								  			$business_list .= "<p class='location-name'>" . $location['altname'] . "</p>";
								  		}
									  	if( in_array( "address", $displayopts ) ) {
												$business_list .= cdash_display_address( $location );
									  	}
	                    if( in_array( "hours", $displayopts ) && isset( $location['hours'] ) && '' !== $location['hours'] ) {
												$business_list .= $location['hours'];
									  	}

									  	if( in_array( "phone", $displayopts ) && isset( $location['phone'] ) && '' !== $location['phone'] ) {
												$business_list .= cdash_display_phone_numbers( $location['phone'] );
									  	}

									  	if( in_array( "email", $displayopts ) && isset( $location['email'] ) && '' !== $location['email'] ) {
												$business_list .= cdash_display_email_addresses( $location['email'] );
											}

											if( in_array( "url", $displayopts ) && isset( $location['url'] ) && '' !== $location['url'] ) {
									  		$business_list .= cdash_display_url( $location['url'] );
									  	}
							  	}
					  		}
					  	}
				  	}
			  		if( in_array( "social_media", $displayopts ) ) {
			  			$business_list .= cdash_display_social_media( get_the_id() );
			  		}

			  		if(in_array("level", $displayopts)){
							$business_list .= cdash_display_membership_level( get_the_id() );
				  	}else if( isset( $options['tax_memberlevel'] ) && "1" == $options['tax_memberlevel'] ) {
							$business_list .= cdash_display_membership_level( get_the_id() );
						}

			  		if( in_array( "category", $displayopts ) ) {
						$business_list .= cdash_display_business_categories( get_the_id() );
				  	}

						if( in_array( "tags", $displayopts ) ) {
						$business_list .= cdash_display_business_tags( get_the_id() );
				  	}

			  	}
			  	$options = get_option( 'cdash_directory_options' );
			  	if( isset($options['bus_custom'] )) {
						$business_list .= cdash_display_custom_fields( get_the_id() );
					}
				$business_contacts = '';
				$business_list .= apply_filters( 'cdash_end_of_shortcode_view', $business_contacts );
			  	$business_list .= "</div>";
			endwhile;
			// pagination links
			/*$total_pages = $businessquery->max_num_pages;
			if ($total_pages > 1){
				$current_page = max(1, get_query_var('paged'));
   				$business_list .= "<div class='pagination'>";
			  	$business_list .= paginate_links( array (
			      'base' => rtrim( get_pagenum_link(1), "/" ) . '%_%',
			      'format' => '/page/%#%',
			      'current' => $current_page,
			      'total' => $total_pages,
			    ) );
			    $business_list .= "</div>";
			}*/
		$business_list .= "</div>";
		// pagination links
		$total_pages = $businessquery->max_num_pages;
		if ($total_pages > 1){
			$current_page = max(1, get_query_var('paged'));
				$business_list .= "<div class='pagination'>";
				$business_list .= paginate_links( array (
					'base' => rtrim( get_pagenum_link(1), "/" ) . '%_%',
					'format' => '/page/%#%',
					'current' => $current_page,
					'total' => $total_pages,
				) );
				$business_list .= "</div>";
		}
		wp_reset_postdata();
		return $business_list;
	endif;
	//Moved the reset_postdata to above the return $business_list so that it works properly with elementor
	//wp_reset_postdata();
}
add_shortcode( 'business_directory', 'cdash_business_directory_shortcode' );


//Display the list of alphabet
function cdash_list_alphabet(){
	//$ajax_url = admin_url( 'admin-ajax.php' );
	global $wpdb;
	global $wp;

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
		$alpha .= "<li><a href='";
		$alpha .= add_query_arg('starts_with', $result->first_char);
		$alpha .= "'>" . $result->first_char;
		//$alpha .= cdash_business_listing_for_alpha($result->first_char);
		$alpha .= "</a></li>";
	}
	$current_url = home_url( add_query_arg( array(), $wp->request ) );
	$alpha .= "<li><a href='" . $current_url . "'>View All</a></li>";
	$alpha .= "</ul></div>";

	return $alpha;
}

function cdash_starts_with_query_filter( $where, $query ) {
    global $wpdb;

    $starts_with = $query->get( 'starts_with' );

    if ( $starts_with ) {
        $where .= " AND $wpdb->posts.post_title LIKE '$starts_with%'";
    }

    return $where;
}
add_filter( 'posts_where', 'cdash_starts_with_query_filter', 10, 2 );

/*function cdash_display_business_listings($format, $category, $level, $text, $display, $single_link, $perpage, $orderby, $order, $image, $status){

}*/
?>
