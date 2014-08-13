<?php 
// force WP functionality to load so we can use wp_query
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

// header('Content-Type: application/csv');
// header('Content-Disposition: attachment; filename="chamber-dashboard-export.csv";');

$args = array( 
    'post_type' => 'business', 
    'posts_per_page' => -1,   
    'order' => 'ASC',
);

$sizequery = new WP_Query( $args );
$maxsize = 0;

if ( $sizequery->have_posts() ) :
			while ( $sizequery->have_posts() ) : $sizequery->the_post();

				$id = get_the_id();
				$variable = get_post_meta($id, '_cdash_location', true);
				if(sizeof($variable) > $maxsize)
					$maxsize= sizeof($variable);

							endwhile;
			endif;
			
			// Reset Post Data
			wp_reset_postdata();



$args = array( 

			    'post_type' => 'business', 
			    'posts_per_page' => 1,   
			    'order' => 'ASC',
			);
			
			$testquery = new WP_Query( $args );

			$locationfields = array( 
				'altname' => '', 
				'address' => '', 
				'city' => '',
				'state' => '',
				'zip' => '',
				'url' => '',
				'phone' => '',
				'email' => ''
			);
			
			// The Loop
			if ( $testquery->have_posts() ) :
			while ( $testquery->have_posts() ) : $testquery->the_post();

$
			  	global $buscontact_metabox;
				$contactmeta = $buscontact_metabox->the_meta();
				echo '<pre>';
				print_r($contactmeta);
				echo '</pre>';
				foreach($contactmeta as $key => $location) {
					foreach($locationfields as $header => $info) {
						if(!empty($location[$header])) {
							$locationfields[$header] = $info;
						}
					} 

				}
			endwhile;
			endif;
			
			// Reset Post Data
			wp_reset_postdata(); 

?>