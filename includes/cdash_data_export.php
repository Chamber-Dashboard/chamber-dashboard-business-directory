<?php
add_filter( 'wp_privacy_personal_data_exporters', 'cdash_register_exporter', 10);
function cdash_register_exporter( $exporters_array ) {
	$exporters_array['chamber-dashboard-business-directory'] = array(
		'exporter_friendly_name' => 'CD Business exporter', // isn't shown anywhere
		'callback' => 'cdash_exporter_function', // name of the callback function which is below
	);
	return $exporters_array;
}

function cdash_exporter_function($email_address, $page = 1){
    // Limit us to 500 at a time to avoid timing out.
	$number = 500;
    $page   = (int) $page;
    
    $export_items = array();
    global $buscontact_metabox;
    
    global $billing_metabox;
    $billing_meta = $billing_metabox->the_meta();

	$businesses = get_posts( array(
		'post_type' => 'business',
		'posts_per_page' => 100, // how much to process each time
		'paged' => $page,
		'meta_key' => $billing_meta['billing_email'],
		'meta_value' => $email_address
    ) );
    
    if($businesses){
		global $buscontact_metabox;
		
        foreach ( (array) $businesses as $business ){
			$contactmeta = $buscontact_metabox->the_meta();
			$locations = $contactmeta['location'];
			
			if( isset( $contactmeta['location'] ) ) {
				foreach( $locations as $location ) {
					if(isset( $location['altname'] ) ){
						$location_name = $location['altname'];
					}else{
						$location_name = "No Location name.";
					}
				}
			}
            // here you can specify the fields, that exist in any way
			$data = array(
				array(
					'name' => 'Business ID',
					'value' => $business->ID
				),
				array(
					'name' => 'Business Name',
					'value' => $business->post_title
				),
				array(
					'name' => 'Email',
					'value' => $email_address
				),
				array(
					'name' => 'Location',
					'value' => $location_name
				),
            );
            $export_items[] = array(
                'group_id' => 'businesses',
                'group_label' => 'Businesses',
                'item_id' => 'business-'.$business->ID,
                'data' => $data
           );
        }
    }
    // $done identifies whether or not the number of $comments is less than $number. If it is, all comments have been processed and we're done.
	$done = count( $businesses ) < $number;
	// The function should return an array with the (array)'data' to be exported and whether or not we're (bool)'done'
	return array(
		'data' => $export_items,
		'done' => $done,
	);
}


?>