<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// ------------------------------------------------------------------------

// SINGLE BUSINESS VIEW

// ------------------------------------------------------------------------
// Enqueue stylesheet for single businesses and taxonomies

function cdash_single_business_style() {
	if( is_singular( 'business' ) || is_tax( 'business_category' ) || is_tax( 'membership_level' ) ) {
		wp_enqueue_style( 'cdash-business-directory', plugin_dir_url(__FILE__) . 'css/cdash-business-directory.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'cdash_single_business_style' );

// Display single business (filter content)
function cdash_single_business($content) {
	if(in_array('get_the_excerpt', $GLOBALS['wp_current_filter'])) {
		return $content;
	}
	if( is_singular('business') && is_main_query() ) {
		$post_id = get_the_id();
		$meta = get_post_custom($post_id);
		$options = get_option('cdash_directory_options');
		$member_options = get_option('cdashmm_options');


		// make location/address metabox data available
		global $buscontact_metabox;
		$contactmeta = $buscontact_metabox->the_meta();

		// make logo metabox data available
		global $buslogo_metabox;
		$logometa = $buslogo_metabox->the_meta();

		global $post;
		$business_content = "<div id='business'>";
		if((isset($member_options['hide_lapsed_members'])) && (cdash_display_business_status($post_id) == "lapsed")) {
			$business_content .= "This business is not a current member.";
		}else{
		if( isset( $options['sv_thumb'] ) && "1" == $options['sv_thumb'] ) {
			$business_content .= get_the_post_thumbnail( $post_id, 'full' );
		}

		if( isset( $options['sv_logo'] ) && isset( $logometa['buslogo'] ) && "1" == $options['sv_logo'] ) {
			$attr = array(
				'class'	=> 'alignleft logo',
			);
			$business_content .= wp_get_attachment_image($logometa['buslogo'], 'full', 0, $attr );
		}

		if( isset( $options['sv_description'] ) && "1" == $options['sv_description'] ) {
			$business_content .= $content;
		}

		if( isset( $options['sv_social'] ) && "1" == $options['sv_social'] ) {
			$business_content .= cdash_display_social_media( $post_id );
		}

		if( isset( $options['sv_memberlevel'] ) && "1" == $options['sv_memberlevel'] ) {
			$business_content .= cdash_display_membership_level( $post_id );
		}

		if( isset( $options['sv_category'] ) && "1" == $options['sv_category'] ) {
			$business_content .= cdash_display_business_categories( $post_id );
		}

		if( isset( $contactmeta['location'] ) ) {
			$locations = $contactmeta['location'];
			foreach( $locations as $location ) {
				if( isset( $location['donotdisplay'] ) && "1" == $location['donotdisplay'] ) {
					continue;
				} else {
					$business_content .= "<div class='location'>";
					if( isset($options['sv_name'] ) && "1" == ( $options['sv_name'] ) && isset( $location['altname'] ) && '' !== $location['altname'] ) {
						$business_content .= "<h3>" . $location['altname'] . "</h3>";
					}
					if( isset( $options['sv_address'] ) && "1" == $options['sv_address'] ) {
						$business_content .= cdash_display_address( $location );
						//$address_for_maps = cdash_display_address( $location );
						$business_content .= cdash_display_google_map_link($location);
					}

          if( isset($options['sv_hours'] ) && "1" == ( $options['sv_hours'] ) && isset( $location['hours'] ) && '' !== $location['hours'] ) {
						$business_content .= $location['hours'];
					}

					if( isset( $options['sv_url'] ) && "1" == $options['sv_url'] && isset( $location['url'] ) && '' !== $location['url'] ) {
						$business_content .= cdash_display_url( $location['url'] );
					}

					if( isset( $options['sv_phone'] ) && "1" == $options['sv_phone'] && isset( $location['phone'] ) && '' !== $location['phone'] ) {
						$business_content .= cdash_display_phone_numbers( $location['phone'] );
					}

					if( isset( $options['sv_email'] ) && "1" == $options['sv_email'] && isset( $location['email'] ) && '' !== $location['email'] ) {
						$business_content .= cdash_display_email_addresses( $location['email'] );
					}

				$business_content .= "</div>";
				}
			}
		}

		if( isset($options['bus_custom'] )) {
		 	$business_content .= cdash_display_custom_fields( get_the_id() );
		}
		$business_contacts = '';
		$business_content .= apply_filters( 'cdash_single_business_before_map', $business_contacts );
		if( isset( $options['sv_map']) && "1" == $options['sv_map'] ) {
			// only show the map if locations have addresses entered
			$needmap = "false";
			if( isset( $contactmeta['location'] ) ) {
				$locations = $contactmeta['location'];
				foreach ( $locations as $location ) {
					if( ( isset( $location['address'] ) || ( isset( $location['custom_latitude'] ) && isset( $location['custom_longitude'] ) ) ) && !isset( $location['donotdisplay'] ) ) {
						$needmap = "true";
					}
				}
			}

			if( $needmap == "true" ) {
				$business_content .= "<div id='map-canvas' style='width: 100%; height: 300px; margin: 20px 0;'></div>";
				add_action('wp_footer', 'cdash_single_business_map');
			}
		}
	}
		$business_content .= "</div>";
        $business_content .= cdash_display_edit_link($post_id);

				if(isset($options['business_listings_url']) ) {
					$business_content .= cdash_back_to_bus_link();
				}

	$content = $business_content;
	}
	return $content;
	//wp_reset_postdata();
}
add_filter('the_content', 'cdash_single_business');


// ------------------------------------------------------------------------
// Add map to single business view
// ------------------------------------------------------------------------

function cdash_single_business_map() {
	$options = get_option('cdash_directory_options');
	if( is_singular('business') && isset($options['sv_map']) && $options['sv_map'] == "1" ) {
		global $buscontact_metabox;
		$contactmeta = $buscontact_metabox->the_meta();
		$locations = $contactmeta['location'];  ?>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL547yG2qyUzKT9lLUXKypr6ScCvcBakY">
		</script>
		<script type="text/javascript">

		function initialize() {
			var locations = [
				<?php
				foreach($locations as $location) {
					if( isset( $location['donotdisplay'] ) && $location['donotdisplay'] == "1") {
						continue;
					} else {
              if( ( isset( $location['latitude'] ) && isset( $location['longitude'] ) ) || isset( $location['custom_latitude'] ) && isset( $location['custom_longitude'] ) ) {
							if( isset( $location['custom_latitude'] ) ) {
								$lat = $location['custom_latitude'];
							} else {
								$lat = $location['latitude'];
							}

							if( isset( $location['custom_longitude'] ) ) {
								$long = $location['custom_longitude'];
							} else {
								$long = $location['longitude'];
							}

							// get the map icon
							$id = get_the_id();
							$buscats = get_the_terms( $id, 'business_category');
							if( isset( $buscats ) && is_array( $buscats ) ) {
								foreach($buscats as $buscat) {
									$buscatid = $buscat->term_id;
									$iconid = get_tax_meta($buscatid,'category_map_icon');
									if($iconid !== '') {
										$icon = $iconid['src'];
									}
								}
							}

							if(!isset($icon)) {
								$icon = plugins_url( '/images/map_marker.png', __FILE__ );
							}

							if(isset($location['altname'])) {
								$htmlname = $location['altname'];
								$poptitle = htmlentities($htmlname, ENT_QUOTES);
							} else {
								$htmltitle = htmlentities(get_the_title(), ENT_QUOTES);
								$poptitle = esc_html($htmltitle, ENT_QUOTES);
							}

							// get other information for the pop-up window
							$popaddress = esc_html( $location['address'] );
							$popcity = esc_html( $location['city'] );
							$popstate = esc_html( $location['state'] );
							?>

							['<div class="business" style="width: 150px; height: 150px;"><h5><?php echo $poptitle; ?></h5><?php echo $popaddress; ?><br /><?php echo $popcity; ?>, <?php echo $location["state"]; ?> <?php echo $location["zip"]; ?> </div>', <?php echo $lat; ?>, <?php echo $long; ?>, '<?php echo $icon; ?>'],
							<?php
						}
					}
				} ?>

				];

				var bounds = new google.maps.LatLngBounds();
				var mapOptions = {
				    // zoom: 13,
				}
				var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
				<?php
				$map_style = '';
				echo apply_filters( 'cdash_map_styles', $map_style ); ?>
				var infowindow = new google.maps.InfoWindow();
				var marker, i;

			    for (i = 0; i < locations.length; i++) {
			    	marker = new google.maps.Marker({
			        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			        map: map,
			        icon: locations[i][3]
			    	});

					bounds.extend(marker.position);

					// Don't zoom in too far on only one marker - http://stackoverflow.com/questions/3334729/google-maps-v3-fitbounds-zoom-too-close-for-single-marker

				    if (bounds.getNorthEast().equals(bounds.getSouthWest())) {
				       var extendPoint1 = new google.maps.LatLng(bounds.getNorthEast().lat() + 0.01, bounds.getNorthEast().lng() + 0.01);
				       var extendPoint2 = new google.maps.LatLng(bounds.getNorthEast().lat() - 0.01, bounds.getNorthEast().lng() - 0.01);
				       bounds.extend(extendPoint1);
				       bounds.extend(extendPoint2);
				    }

				    map.fitBounds(bounds);

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
					    return function() {
					        infowindow.setContent(locations[i][0]);
					        infowindow.open(map, marker);
					    }
					})(marker, i));

					map.fitBounds(bounds);
				}
			}
		google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	<?php }
}

function cdash_info_window() {
	global $post;
	$output = "<div style=\x22width: 200px; height: 150px\x22>";
	$output .= $location['altname'];
	$output .= "</div>";
	return $output;
}

// ------------------------------------------------------------------------
// TAXONOMY VIEW
// ------------------------------------------------------------------------

// modify query to order by business name
function cdash_reorder_taxonomies( $query ) {
	$options = get_option( 'cdash_directory_options' );
	if( isset( $options['tax_orderby_name'] ) && "1" == $options['tax_orderby_name'] ) {
		if( !( is_admin() || is_search() ) && ( is_tax( 'business_category' ) || is_tax( 'membership_level' ) ) ) {
			$query->set( 'orderby', 'title' );
			$query->set( 'order', 'ASC' );
		}
	}
}

add_action( 'pre_get_posts', 'cdash_reorder_taxonomies' );

function cdash_taxonomy_filter( $content ) {
	if(in_array('get_the_excerpt', $GLOBALS['wp_current_filter'])) {
		return $content;
	}
	if( is_tax( 'business_category' ) || is_tax( 'membership_level' ) ) {
		$options = get_option( 'cdash_directory_options' );

		// make location/address metabox data available
		global $buscontact_metabox;
		$contactmeta = $buscontact_metabox->the_meta();

		// make logo metabox data available
		global $buslogo_metabox;
		$logometa = $buslogo_metabox->the_meta();
		global $post;
		$tax_content = '';
		if( isset( $options['tax_thumb'] ) && "1" == $options['tax_thumb'] ) {
			$tax_content .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID, 'full') . '</a>';
		}
		if( isset( $options['tax_logo'] ) && "1" == $options['tax_logo'] && isset( $logometa['buslogo'] ) ) {
			$attr = array(
				'class'	=> 'alignleft logo',
			);
			$tax_content .= wp_get_attachment_image( $logometa['buslogo'], 'full', false, $attr );
		}
		$tax_content .= '<div class="cdash-description">' . $content . '</div>';

		if( isset( $options['tax_social'] ) && "1" == $options['tax_social'] ) {
			$tax_content .= cdash_display_social_media( get_the_id() );
		}

		if( isset( $options['tax_memberlevel'] ) && "1" == $options['tax_memberlevel'] ) {
			$tax_content .= cdash_display_membership_level( get_the_id() );
		}

		if (isset($options['tax_category']) && $options['tax_category'] == "1") {
			$tax_content .= cdash_display_business_categories( get_the_id() );
		}

		if( isset( $contactmeta['location'] ) ) {
			$locations = $contactmeta['location'];
			if( is_array( $locations ) ) {
				foreach( $locations as $location ) {
					if( isset( $location['donotdisplay'] ) && "1" == $location['donotdisplay'] ) {
						continue;
					} else {
						$tax_content .= "<div class='location'>";
						if( isset( $options['tax_name'] ) && "1" == $options['tax_name'] && isset( $location['altname'] ) && '' !== $location['altname'] ) {
							$tax_content .= "<h3>" . $location['altname'] . "</h3>";
						}

						if( isset( $options['tax_address'] ) && "1" == $options['tax_address'] ) {
							$tax_content .= cdash_display_address( $location );
						}

            if( isset( $options['tax_hours'] ) && "1" == $options['tax_hours'] ) {
							$tax_content .= $location['hours'];
						}

						if( isset( $options['tax_url'] ) && $options['tax_url'] == "1" && isset( $location['url'] ) && '' !== $location['url'] ) {
							$tax_content .= cdash_display_url( $location['url'] );
						}

						if( isset( $options['tax_phone'] ) && "1" == $options['tax_phone'] && isset( $location['phone'] ) && '' !== $location['phone'] ) {
							$tax_content .= cdash_display_phone_numbers( $location['phone'] );
						}

						if( isset( $options['tax_email'] ) && "1" == $options['tax_email'] && isset( $location['email'] ) && '' !== $location['email'] ) {
							$tax_content .= cdash_display_email_addresses( $location['email'] );
						}
					$tax_content .= "</div>";
					}
				}
			}
		}

		if( isset($options['bus_custom'] )) {
		 	$tax_content .= cdash_display_custom_fields( get_the_id() );
		}
		$tax_contacts = '';
		$tax_content .= apply_filters( 'cdash_end_of_taxonomy_view', $tax_contacts );
	$content = $tax_content;
	}
	return $content;
}

add_filter( 'the_content', 'cdash_taxonomy_filter' );
// add_filter( 'get_the_excerpt', 'cdash_taxonomy_filter' ); this won't retain formatting

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
			'level' => '', // options: slug of any membership level
			'text' => 'excerpt', // options: excerpt, description, none
			'display' => '', // options: address, url, phone, email, location_name, category, level, social_media_links, social_media_icons, location, hours
			'single_link' => 'yes', // options: yes, no
			'perpage' => '-1', // options: any number
			'orderby' => 'title', // options: date, modified, menu_order, rand, membership_level
			'order' => 'asc', //options: asc, desc
			'image' => 'logo', // options: logo, featured, none
			'status' => '' // options: slug of any membership status
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
		wp_enqueue_style( 'cdash-business-directory', plugin_dir_url(__FILE__) . 'css/cdash-business-directory.css' );
		wp_enqueue_script( 'cdash-business-directory', plugin_dir_url(__FILE__) . 'js/cdash-business-directory.js' );
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

	$args = cdash_add_hide_lapsed_members_filter($args);
	$businessquery = new WP_Query( $args );
	// The Loop
	if ( $businessquery->have_posts() ) :
		$business_list = '';
		$business_list .= "<div id='businesslist' class='" . $format . "'>";
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
					//$business_list .= '<p>' . $level . '</p>';
					$business_list .= "<div class='description'>";

			  	if( "logo" == $image ) {
			  		global $buslogo_metabox;
						$logometa = $buslogo_metabox->the_meta();
						if( isset( $logometa['buslogo'] ) ) {
					  	$logoattr = array(
							'class'	=> 'alignleft logo',
							);
							if( $single_link == "yes" ) {
								$business_list .= "<a href='" . get_the_permalink() . "'>" . wp_get_attachment_image($logometa['buslogo'], 'thumb', 0, $logoattr ) . "</a>";
							} else {
								$business_list .= wp_get_attachment_image($logometa['buslogo'], 'thumb', 0, $logoattr );
							}
						}
			  	} elseif( "featured" == $image ) {
			  		$thumbattr = array(
							'class'	=> 'alignleft logo',
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
		return $business_list;
	endif;
	wp_reset_postdata();
}
add_shortcode( 'business_directory', 'cdash_business_directory_shortcode' );


/*function cdash_display_business_listings($format, $category, $level, $text, $display, $single_link, $perpage, $orderby, $order, $image, $status){

}*/

// ------------------------------------------------------------------------
// BUSINESS MAP SHORTCODE
// ------------------------------------------------------------------------

function cdash_business_map_shortcode( $atts ) {
	// Set our default attributes
	extract( shortcode_atts(
		array(
			'category' => '', // options: slug of any category
			'level' => '', // options: slug of any membership level
			'single_link' => 'yes', // options: yes, no
			'perpage' => '-1', // options: any number
			'cluster' => 'no', // options: yes or no
			'width'	  => '100%', //options - any number with % or px
			'height'  => '500px' // options - any number with px
		), $atts )
	);

	$args = array(
		'post_type' => 'business',
		'posts_per_page' => $perpage,
    'business_category' => $category,
    'membership_level' => $level,
	);
	wp_enqueue_style( 'cdash-business-directory', plugin_dir_url(__FILE__) . 'css/cdash-business-directory.css' );

	$args = cdash_add_hide_lapsed_members_filter($args);
	$mapquery = new WP_Query( $args );
	$business_map = "<div id='map-canvas' style='width:" . $width . "; height:" . $height . ";'></div>";
	$business_map .= "<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAL547yG2qyUzKT9lLUXKypr6ScCvcBakY'></script>";
	if( "yes" == $cluster ) {
        $business_map .= "<script src='" . plugin_dir_url(__FILE__) . "js/markerclusterer.js'></script>";
	}
	$business_map .= "<script type='text/javascript'>";
	$business_map .= "function initialize() {
				var locations = [";

	// The Loop
	if ( $mapquery->have_posts() ) :
		while ( $mapquery->have_posts() ) : $mapquery->the_post();
			global $buscontact_metabox;
			$contactmeta = $buscontact_metabox->the_meta();
			if( isset( $contactmeta['location'] ) ) {
				$locations = $contactmeta['location'];
				if( !empty( $locations ) ) {
					foreach( $locations as $location ) {
						if( isset( $location['donotdisplay'] ) && $location['donotdisplay'] == "1") {
							continue;
						} elseif( isset( $location['address'] ) ) {
							// Get the latitude and longitude from the address
							if( ( isset( $location['latitude'] ) && isset( $location['longitude'] ) ) || isset( $location['custom_latitude'] ) && isset( $location['custom_longitude'] ) ) {
								if( isset( $location['custom_latitude'] ) ) {
									$lat = $location['custom_latitude'];
								} else {
									$lat = $location['latitude'];
								}
								if( isset( $location['custom_longitude'] ) ) {
									$long = $location['custom_longitude'];
								} else {
									$long = $location['longitude'];
								}

								// Get the map icon
								$id = get_the_id();
								$buscats = get_the_terms( $id, 'business_category');
								if( isset( $buscats ) && is_array( $buscats ) ) {
									foreach($buscats as $buscat) {
										$buscatid = $buscat->term_id;
										$iconid = get_tax_meta($buscatid,'category_map_icon');
										if($iconid !== '') {
											$icon = $iconid['src'];
										}
									}
								}
								if(!isset($icon)) {
                	$icon = plugins_url( '/images/map_marker.png', __FILE__ );
								}

								// Create the pop-up info window
								$popaddress = esc_html( $location['address'] );
								$popcity = esc_html( $location['city'] );
								$popstate = esc_html( $location['state'] );
								$poptitle = esc_html( get_the_title() );

								if($single_link == "yes") {
									$thismapmarker = "['<div class=\x22business\x22 style=\x22width: 150px; height: 150px;\x22><h5><a href=\x22" . get_the_permalink() . "\x22>" . $poptitle . "</a></h5> " . $popaddress . "<br />" . $popcity . ", " . $popstate . "&nbsp;" . $location['zip'] . "</div>', " . $lat . ", " . $long . ", '" . $icon . "'],";

									$business_map .= str_replace(array("\r", "\n"), '', $thismapmarker);
								} else {
									$thismapmarker .= "['<div class=\x22business\x22 style=\x22width: 150px; height: 150px;\x22><h5>" . $poptitle . "</h5> " . $popaddress . "<br />" . $popcity . ", " . $popstate . "&nbsp;" . $location['zip'] . "</div>', " . $lat . ", " . $long . ", '" . $icon . "'],";
									$business_map .= str_replace(array("\r", "\n"), '', $thismapmarker);
								}
							}
						}
					}
				}
			}

		endwhile;

	endif;

	$business_map .= "];

					var bounds = new google.maps.LatLngBounds();
					var mapOptions = {
					    zoom: 13,
					    scrollwheel: false
					}

					var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);";

					if( "yes" == $cluster ) {
						$business_map .=
                        "var options = {
                            imagePath: '" . plugins_url( '/js/images/m', __FILE__ ) . "'
                        };

                        var markerCluster = new MarkerClusterer(map, marker, options);";

					}

					$map_style = '';
					$business_map .= apply_filters( 'cdash_map_styles', $map_style );
					$business_map .= "
					var infowindow = new google.maps.InfoWindow();
					var marker, i;

				    for (i = 0; i < locations.length; i++) {
				    	marker = new google.maps.Marker({
				        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
				        map: map,
				        icon: locations[i][3]
				    	});";

						if( "yes" == $cluster ) {
							$business_map .= "markerCluster.addMarker(marker);";
						}

						$business_map .= "
						bounds.extend(marker.position);
						google.maps.event.addListener(marker, 'click', (function(marker, i) {
						    return function() {
						        infowindow.setContent(locations[i][0]);
						        infowindow.open(map, marker);
						    }
						})(marker, i));
						map.fitBounds(bounds);

						if (bounds.getNorthEast().equals(bounds.getSouthWest())) {
					       var extendPoint1 = new google.maps.LatLng(bounds.getNorthEast().lat() + 0.01, bounds.getNorthEast().lng() + 0.01);
					       var extendPoint2 = new google.maps.LatLng(bounds.getNorthEast().lat() - 0.01, bounds.getNorthEast().lng() - 0.01);
					       bounds.extend(extendPoint1);
					       bounds.extend(extendPoint2);
					    }
					}
				}

			google.maps.event.addDomListener(window, 'load', initialize);

		</script>";
	return $business_map;
    //return "Testing";
	wp_reset_postdata();
}

add_shortcode( 'business_map', 'cdash_business_map_shortcode' );

// ------------------------------------------------------------------------
// BUSINESS SEARCH RESULTS SHORTCODE
// ------------------------------------------------------------------------
function cdash_business_search_results_shortcode( $atts ) {
	extract( shortcode_atts(
        array(
			'format' => 'list',  // options: list, grid2, grid3, grid4, responsive
        ), $atts )
	);
	wp_enqueue_style( 'cdash-business-directory', plugin_dir_url(__FILE__) . 'css/cdash-business-directory.css' );
	if( $format !== 'list' ) {
		wp_enqueue_script( 'cdash-business-directory', plugin_dir_url(__FILE__) . 'js/cdash-business-directory.js' );
	}
	$search_results = "";
	// Search results
	if( $_GET ) {
		// Get the search terms
		$buscat = $_GET['buscat'];
		$searchtext = $_GET['searchtext'];

		// Set up a query with the search terms
        $options = get_option('cdash_directory_options');
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$args = array(
            'post_type' => 'business',
            'posts_per_page' => $options['search_results_per_page'],
            'paged' => $paged,
            'order' => 'ASC',
            'orderby' => 'title'
        );
        if ( $buscat ) {
            $buscat_params = array(
                'taxonomy' => 'business_category',
                'field' => 'slug',
                'terms' => $buscat,
                'operator' => 'IN',
            );
            $args['tax_query'] = array(
            $buscat_params,
         );
        }
        if ( $searchtext ) {
        	$args['s'] = $searchtext;
        }
		$args = cdash_add_hide_lapsed_members_filter($args);
        $search_query = new WP_Query( $args );
		if ( $search_query->have_posts() ) {
			// Display the search results
			$search_results .= "<div id='search-results' class='" . $format . "'>";
			$search_results .= "<h2>" . __('Search Results', 'cdash') . "</h2>";
			while ( $search_query->have_posts() ) : $search_query->the_post();
				$search_results .= "<div class='search-result business'>";
				$search_results .= "<h3><a href='" . get_the_permalink() . "'>" . get_the_title() . "</a></h3>";
				$options = get_option('cdash_directory_options');

				// make location/address metabox data available
				global $buscontact_metabox;
				$contactmeta = $buscontact_metabox->the_meta();

				// make logo metabox data available
				global $buslogo_metabox;
				$logometa = $buslogo_metabox->the_meta();
				global $post;

				if ( isset( $options['tax_thumb'] ) && "1" == $options['tax_thumb'] ) {
					$search_results .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID, 'full') . '</a>';
				}

				if ( isset( $options['tax_logo'] ) && "1" == $options['tax_logo'] && isset( $logometa['buslogo'] ) ) {
					$attr = array(
						'class'	=> 'alignleft logo',
					);
					$search_results .= wp_get_attachment_image( $logometa['buslogo'], 'full', 0, $attr );
				}

				$search_results .= '<div class="cdash-description">' . get_the_excerpt() . '</div>';
				if ( isset( $options['tax_memberlevel'] ) && "1" == $options['tax_memberlevel'] ) {
					$search_results .= cdash_display_membership_level( $post->ID );
				}

				if ( isset( $options['tax_category'] ) && "1" == $options['tax_category'] ) {
					$search_results .= cdash_display_business_categories( $post->ID );
				}

				if ( isset( $options['tax_social'] ) && "1" == $options['tax_social'] ) {
					$search_results .= cdash_display_social_media( get_the_id() );
				}

				if( isset( $contactmeta['location'] ) && is_array( $contactmeta['location'] ) ) {
					$locations = $contactmeta['location'];
					foreach($locations as $location) {
						if( isset( $location['donotdisplay'] ) && "1" == $location['donotdisplay'] ) {
							continue;
						} else {
							$search_results .= "<div class='location'>";
							if ( isset( $options['tax_name'] ) && "1" == $options['tax_name'] && isset( $location['altname'] ) && '' !== $location['altname'] ) {
								$search_results .= "<h3>" . $location['altname'] . "</h3>";
							}

							if ( isset( $options['tax_address'] ) && "1" == $options['tax_address'] ) {
								$search_results .= cdash_display_address( $location );
							}

							if ( isset( $options['tax_url'] ) && "1" == $options['tax_url'] && isset( $location['url'] ) && '' !== $location['url'] ) {
								$search_results .= cdash_display_url( $location['url'] );
							}

                            if ( isset( $options['tax_hours'] ) && "1" == $options['tax_hours'] && isset( $location['hours'] ) && '' !== $location['hours'] ) {
								$search_results .= $location['hours'];
							}

							if ( isset( $options['tax_phone'] ) && "1" == $options['tax_phone'] && isset( $location['phone'] ) && '' !== $location['phone'] ) {
								$search_results .= cdash_display_phone_numbers( $location['phone'] );
							}

							if ( isset( $options['tax_email'] ) && "1" == $options['tax_email'] && isset( $location['email'] ) && '' !== $location['email'] ) {
								$search_results .= cdash_display_email_addresses( $location['email'] );
							}
							$search_results .= "</div><!-- .location -->";
						}
					}
				}

				//if( $options['bus_custom'] ) {
				if ( isset( $options['bus_custom'] ) && "1" == $options['bus_custom'] ) {
					$search_results .= cdash_display_custom_fields( get_the_id() );
				}
				$search_results .= "</div><!-- .search-result -->";
			endwhile;
			$total_pages = $search_query->max_num_pages;
			if ($total_pages > 1){
				$current_page = max( 1, get_query_var( 'paged' ) );
				$big = 999999999; // need an unlikely integer
   				$search_results .= "<div class='pagination'>";
			  	$search_results .= paginate_links( array (
			      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			      'format' => '?page=%#%',
			      'current' => $current_page,
			      'total' => $total_pages,
			    ) );
			    $search_results .= "</div>";
			}
			$search_results .= "</div><!-- #search-results -->";
		//endif;
        }else{
            //$search_results = "<h2>Search Results</h2>";
        $search_results = "We're sorry, your search for <b>".$searchtext . "</b> did not produce any results.<br />";
        $search_results .= "<h3>Search Suggestions</h3>";
        $search_results .= "<ul><li>Try a different search term</li>";
        $search_results .= "<li>Check for typos or spelling errors</li><ul>";

        }

		// Reset Post Data

		wp_reset_postdata();

	}
	return $search_results;
}
add_shortcode( 'business_search_results', 'cdash_business_search_results_shortcode' );

// ------------------------------------------------------------------------
// BUSINESS SEARCH SHORTCODE
// ------------------------------------------------------------------------
function cdash_business_search_form_shortcode( $atts ) {
	extract( shortcode_atts(
		array(
			'results_page' => 'notset',  // options: any url
			'class'		   => 'business_search_form'
		), $atts )
	);

	// Search form
	$search_form = "<div id='business-search' class='" . $class . "'><h3>" . __('Search', 'cdash') . "</h3>";
	if( $results_page == 'notset') {
		$search_form .= __( 'You must enter a results page!', 'cdash' );
	} else {
		$search_form .= "<form id='business-search-form' method='get' action='" . home_url('/') . $results_page . "'>";
	}
	$search_form .= "<p class='business-search-term'><label id='business-search-term'>" . __('Search Term', 'cdash') . "</label><br /><input type='text' value='' name='searchtext' id='searchtext' /></p>";
	// $search_form .= "<p><label>Business Name</label><br /><input type='text' value='' name='business_name' id='business_name' /></p>";
		// searching by business name seems like a good idea, but you can only query the slug, so if the name isn't exactly like the slug, it won't find anything
	// $search_form .= "<p><label>City</label><br /><input type='text' value='' name='city' id='city' /></p>";
		// I would really like to be able to search by city, but since WPAlchemy serializes the locations array, I don't think this is possible
	$search_form .= "<p class='business-category-text'><label id='business-category-text'>" . __('Business Category', 'cdash') . "</label><br /><select name='buscat'><option value=''>";

	$terms = get_terms( 'business_category', 'hide_empty=0' );
        foreach ($terms as $term) {
            $search_form .= "<option value='" . $term->slug . "'>" . $term->name;
        }
    $search_form .= "</select></p>";
	$search_form .= "<input type='submit' value='" . __('Search', 'cdash') . "'>";
	$search_form .= "</form>";
	$search_form .= "</div>";
	return $search_form;
}
add_shortcode( 'business_search_form', 'cdash_business_search_form_shortcode' );

// ------------------------------------------------------------------------
// BUSINESS SEARCH SHORTCODE
// ------------------------------------------------------------------------
function cdash_business_search_shortcode( $atts ) {
	extract( shortcode_atts(
        array(
			'format' => 'list',  // options: any url
        ), $atts )
	);

	$resultspage = str_replace( home_url('/'), "", get_the_permalink() );
	$business_search = do_shortcode('[business_search_results format=' . $format . ']');
	$business_search .= do_shortcode('[business_search_form results_page='.$resultspage.']');
	return $business_search;
}
add_shortcode( 'business_search', 'cdash_business_search_shortcode' );

function cdash_business_categories_shortcode( $atts ) {
	// Set our default attributes
	extract( shortcode_atts(
		array(
		'orderby' => 'name', // options: date, modified, menu_order, rand
		'order' => 'ASC',
		'showcount' => 0,
		'hierarchical' => 1,
		'hide_empty' => 1,
		'child_of' => 0,
		'exclude' => '',
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

	$categories = '<ul class="business-categories">' . 	wp_list_categories($args) . '</ul>';
	return $categories;
}
add_shortcode( 'business_categories', 'cdash_business_categories_shortcode' );

// ------------------------------------------------------------------------
// DISPLAY ADDRESS
// ------------------------------------------------------------------------
function cdash_display_address( $location ) {
	$address = '';
	$address .= "<p class='address'>";
		if( isset( $location['address'] ) && '' !== $location['address'] ) {
			$street_address = $location['address'];
			$address .= str_replace("\n", '<br />', $street_address);
		}

    if( isset( $location['city'] ) && '' !== $location['city'] ) {
			$address .= "<br />" . $location['city'] . ",&nbsp;";
		}

		if( isset( $location['state'] ) && '' !== $location['state'] ) {
			$address .= $location['state'] . "&nbsp;";
		}

		if( isset( $location['zip'] ) && '' !== $location['zip'] ) {
			$address .= $location['zip'] . "&nbsp;";
		}

    if( isset( $location['country'] ) && '' !== $location['country'] ) {
			$address .= $location['country'];
		}
	$address .= "</p>";
	$address = apply_filters( 'cdash_filter_address', $address, $location );
	return $address;
}

// ------------------------------------------------------------------------
// DISPLAY GOOGLE MAP LINK
// ------------------------------------------------------------------------
function cdash_display_google_map_link( $location ) {
	$google_map_link = '';
	//$google_map_link .= "<p class='google_map_link'>";
	$google_map_link .= "<a target='_blank' href='https://www.google.com/maps/search/?api=1&query=";
		if( isset( $location['address'] ) && '' !== $location['address'] ) {
			$street_address = $location['address'];
			$street_address_array = explode(" ", $street_address);
			$cdash_st_ad_array_len = count($street_address_array);
			for($i=0; $i<count($street_address_array); $i++){
				$google_map_link .= $street_address_array[$i] . "%20";
			}
		}

    if( isset( $location['city'] ) && '' !== $location['city'] ) {
			$google_map_link .= $location['city'] . "%20";
		}

		if( isset( $location['state'] ) && '' !== $location['state'] ) {
			$google_map_link .= $location['state'] . "%20";
		}

		if( isset( $location['zip'] ) && '' !== $location['zip'] ) {
			$google_map_link .= $location['zip'] . "%20";
		}

    if( isset( $location['country'] ) && '' !== $location['country'] ) {
			$google_map_link .= $location['country'];
		}
	$google_map_link .= "'>Get Directions</a><br /><br />";
	return $google_map_link;
}




function cdash_display_social_media( $postid ) {
	// get options
	$options = get_option( 'cdash_directory_options' );
	// get meta
	global $buscontact_metabox;
	$meta = $buscontact_metabox->the_meta();
	$display = '<div class="cdash-social-media">';

	if( isset( $options['sm_display'] ) && "text" == $options['sm_display'] ) {
		// display text links
		if( isset( $meta['social'] ) ) {
			$social_links = $meta['social'];
			if( isset( $social_links ) ) {
				$display .= '<ul class="text-links">';
				foreach( $social_links as $link ) {
					$url = $link['socialurl'];
					if( null === parse_url( $url, PHP_URL_SCHEME )) {
						$url = "http://" . $url;
					}
					$display .= '<li><a href="' . $url . '" target="_blank">' . ucfirst( $link['socialservice'] ) . '</a></li>';
				}
				$display .= '</ul>';
			}
		}
	} elseif( isset( $options['sm_display'] ) && "icons" == $options['sm_display'] ) {
		// display icons
		if( isset( $meta['social'] ) ) {
			$social_links = $meta['social'];
			if( isset( $social_links ) ) {
				$display .= '<ul class="icons">';
				foreach( $social_links as $link ) {
					$url = $link['socialurl'];
					if( null === parse_url( $url, PHP_URL_SCHEME )) {
						$url = "http://" . $url;
					}
					//$display .= '<li><a href="' . $url . '" target="_blank"><img src="' . plugins_url() . '/chamber-dashboard-business-directory/images/social-media/' . $link['socialservice'] . '-' . $options['sm_icon_size'] . '.png" alt="' . ucfirst( $link['socialservice'] ) . '"></a></li>';
                    $display .= '<li><a href="' . $url . '" target="_blank"><img src="' . plugins_url('/images/social-media/', __FILE__) . $link['socialservice'] . '-' . $options['sm_icon_size'] . '.png" alt="' . ucfirst( $link['socialservice'] ) . '"></a></li>';
				}
				$display .= '</ul>';
			}
		}
	}
	$display .= "</div>";
	$display = apply_filters( 'cdash_filter_social_media', $display, $postid );
	return $display;
}

// ------------------------------------------------------------------------
// DISPLAY CUSTOM FIELDS
// ------------------------------------------------------------------------
function cdash_display_custom_fields( $postid ) {
	$options = get_option( 'cdash_directory_options' );
	$customfields = $options['bus_custom'];
	global $custom_metabox;
	$custommeta = $custom_metabox->the_meta();

	$custom_fields = '';
	if( isset( $customfields ) && is_array( $customfields ) ) {
		$custom_fields .= "<div class='custom-fields'>";
		foreach($customfields as $field) {
			if( is_singular( 'business' ) && isset( $field['display_single'] ) && "yes" == $field['display_single'] ) {
				$fieldname = $field['name'];
				if( isset( $custommeta[$fieldname] ) ) {
					$custom_fields .= "<p class='custom " . $field['name'] . "'><strong class='custom cdash-label " . $field['name'] . "'>" . $field['name'] . ":</strong>&nbsp;" . $custommeta[$fieldname] . "</p>";
				} elseif ( isset( $custommeta['_cdash_'.$fieldname] ) ) {
					$custom_fields .= "<p class='custom " . $field['name'] . "'><strong class='custom cdash-label " . $field['name'] . "'>" . $field['name'] . ":</strong>&nbsp;" . $custommeta['_cdash_'.$fieldname] . "</p>";
				}
			} elseif( isset( $field['display_dir'] ) && "yes" !== $field['display_dir'] ) {
				continue;
			} else {
				$fieldname = $field['name'];
				if( isset( $custommeta[$fieldname] ) ) {
					$custom_fields .= "<p class='custom " . $field['name'] . "'><strong class='custom cdash-label " . $field['name'] . "'>" . $field['name'] . ":</strong>&nbsp;" . $custommeta[$fieldname] . "</p>";
				} elseif( isset( $custommeta['_cdash_'.$fieldname] ) ) {
					$custom_fields .= "<p class='custom " . $field['name'] . "'><strong class='custom cdash-label " . $field['name'] . "'>" . $field['name'] . ":</strong>&nbsp;" . $custommeta['_cdash_'.$fieldname] . "</p>";
				}
			}
		}
		$custom_fields .= "</div>";
	}

	$custom_fields = apply_filters( 'cdash_filter_custom_fields', $custom_fields, $postid );
	return $custom_fields;
}

// ------------------------------------------------------------------------
// DISPLAY PHONE NUMBERS
// ------------------------------------------------------------------------
function cdash_display_phone_numbers( $phone_numbers ) {
	$phones_content = '';
	if( is_array( $phone_numbers ) ) {
		$phones_content .= "<p class='phone'>";
			$i = 1;
			foreach( $phone_numbers as $phone ) {
				if( $i !== 1 ) {
					$phones_content .= "<br />";
				}
				if( isset( $phone['phonenumber'] ) && '' !== $phone['phonenumber'] ){
					$phones_content .= "<a href='tel:" . $phone['phonenumber'] . "'>" . $phone['phonenumber'] . "</a>";
					if( isset( $phone['phonetype'] ) && '' !== $phone['phonetype'] ) {
						$phones_content .= "<span class='phone_type'>&nbsp;(" . $phone['phonetype'] . ")</span>";
					}
				}
				$i++;
			}
		$phones_content .= "</p>";
	}
	$phones_content = apply_filters( 'cdash_display_phone_numbers', $phones_content, $phone_numbers );
	return $phones_content;
}

// ------------------------------------------------------------------------
// DISPLAY EMAIL ADDRESSES
// ------------------------------------------------------------------------
function cdash_display_email_addresses( $email_addresses ) {
	$email_content = '';
	if( is_array( $email_addresses ) ) {
		$email_content .= "<p class='email'>";
			$i = 1;
			foreach( $email_addresses as $email ) {
				if( $i !== 1 ) {
					$email_content .= "<br />";
				}
				$email_content .= "<a href='mailto:" . $email['emailaddress'] . "'>" . $email['emailaddress'] . "</a>";
				if( isset( $email['emailtype'] ) && '' !== $email['emailtype']) {
					$email_content .= "<span class='email_type'>&nbsp;(". $email['emailtype'] .")</span>";
				}
				$i++;
			}
		$email_content .= "</p>";
	}
	$email_content = apply_filters( 'cdash_filter_email_addresses', $email_content, $email_addresses );
	return $email_content;
}

// ------------------------------------------------------------------------
// DISPLAY URL
// ------------------------------------------------------------------------
function cdash_display_url( $url ) {
	if( null === parse_url( $url, PHP_URL_SCHEME )) {
		$url = "http://" . $url;
	}
	$url_content = "<p class='website'><a href='" . $url . "' target='_blank'>" . __( 'Website', 'cdash' ) . "</a></p>";
	$url_content = apply_filters( 'cdash_filter_url', $url_content, $url );
	return $url_content;
}

// ------------------------------------------------------------------------
// DISPLAY MEMBERSHIP LEVEL
// ------------------------------------------------------------------------
function cdash_display_membership_level( $id ) {
	$levels_content = '';
	$levels = get_the_terms( $id, 'membership_level');
	if($levels) {
		$levels_content .= "<p class='membership'><span>" . __('Membership Level:&nbsp;', 'cdash') . "</span>";
		$i = 1;
		foreach($levels as $level) {
			if($i !== 1) {
				$levels_content .= ",&nbsp;";
			}
			$levels_content .= $level->name;
			$i++;
		}
	}
	$levels_content = apply_filters( 'cdash_filter_membership_level', $levels_content, $id );
	return $levels_content;
}

// ------------------------------------------------------------------------
// DISPLAY CATEGORIES
// ------------------------------------------------------------------------
function cdash_display_business_categories( $id ) {
	$category_content = '';
	$buscats = get_the_terms( $id, 'business_category');
	if($buscats) {
		$category_content .= "<p class='categories'><span>" . __('Categories:&nbsp;', 'cdash') . "</span>";
		$i = 1;
		foreach($buscats as $buscat) {
			$buscat_link = get_term_link( $buscat );
			if($i !== 1) {
				$category_content .= ",&nbsp;";
			}
			$category_content .= "<a href='" . $buscat_link . "'>" . $buscat->name . "</a>";
			$i++;
		}
	}
	$category_content = apply_filters( 'cdash_filter_business_categories', $category_content, $id );
	return $category_content;
}
// ------------------------------------------------------------------------
// DISPLAY BUSINESS STATUS
// ------------------------------------------------------------------------
function cdash_display_business_status( $id ) {
    if(function_exists( 'cdashmm_requires_wordpress_version' )){
        $status_content = '';
        $statuses = get_the_terms( $id, 'membership_status');
        if($statuses) {
            //$status_content .= "<p class='categories'><span>" . __('Status:&nbsp;', 'cdash') . "</span>";
            $i = 1;
            foreach($statuses as $status) {
                $status_link = get_term_link( $status );
                if($i !== 1) {
                    $status_content .= ",&nbsp;";
                }
                $status_content .= $status->slug;
                $i++;
            }
        }
        $status_content = apply_filters( 'cdash_filter_business_status', $status_content, $id );
        $membership_status = $status_content;
        return $status_content;
    }
}

// ------------------------------------------------------------------------
// ADD TAXONOMY FILTER TO HIDE LAPSED BUSINESSES
// ------------------------------------------------------------------------
function cdash_add_hide_lapsed_members_filter($args){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if(is_plugin_active('chamber-dashboard-member-manager/cdash-member-manager.php')){
        $member_options = get_option('cdashmm_options');

        if(isset($member_options['hide_lapsed_members'])){
            $args['tax_query'][] = array(
                'taxonomy' => 'membership_status',
                'field' => 'slug',
                'terms' => array('lapsed'),
                'operator' => 'NOT IN'
            );
        }
    }
	return $args;
}

// ------------------------------------------------------------------------
// ADD EDIT BUTTON IF MEMBER UPDATER IS INSTALLED AND USERS ARE LOGGED IN
// ------------------------------------------------------------------------

function cdash_show_edit_link(){
    $member_options = get_option('cdashmm_options');

    if(is_plugin_active('chamber-dashboard-member-updater/cdash-member-updater.php')){
        if ( !current_user_can('publish_posts') ) {
            echo "<h2>Please Login to update your business listing. If you do not have an account, please create an account. If you have already created an account, please contact Chamber Name to activate your account. Thanks!</h2><br />";
            //Link to the member login page
            echo '<p><a href="' . $member_options['user_login_page'] . '">Login</a></p><br />';
            echo '<p><a href="' . $member_options['user_registration_page'] . '">Register</a></p><br />';
            return;

        }
        else{
            //Check if the person (people post type) connected to this user is published. If the person is still pending, take the user to the business, but display a message saying that they need to be approved in order to edit they business listing.
            $edit_post_link = esc_url( add_query_arg( 'post_id', get_the_ID(), home_url('/edit-post/') ) );
            $business_edit .= "<a href='" . $edit_post_link . "'>Edit Your Business Listing</a><br />";
        }
    }
    return $business_edit;
}

// ------------------------------------------------------------------------
// CHECK IF MEMBER UPDATER IS ACTIVE
// ------------------------------------------------------------------------
function cdash_is_member_updater_active(){
    /**
 * Detect plugin. For use on Front End only.
 */
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if(is_plugin_active('chamber-dashboard-member-updater/cdash-member-updater.php')){
        return true;
    }else{
        return false;
    }
}

// ------------------------------------------------------------------------
// DISPLAY THE EDIT BUSINESS LINK ON THE SINGLE BUSINESS PAGE
// ------------------------------------------------------------------------

function cdash_display_edit_link($business_id)
{
    //$member_options = get_option('cdashmm_options');
    $member_updater = cdash_is_member_updater_active();
    if($member_updater){
        return cdashmu_display_business_edit_link($business_id);
    }
}


// ------------------------------------------------------------------------
// DISPLAY THE BACK TO BUSINESS LINK ON THE SINGLE BUSINESS PAGE
// ------------------------------------------------------------------------

function cdash_back_to_bus_link(){
	$options = get_option('cdash_directory_options');
	$back_bus_link = "";
	$back_bus_link = "<p><a href='" . $options['business_listings_url'] . "'></p>" . $options['business_listings_url_text'] . "</a>";
	return $back_bus_link;
}

?>
