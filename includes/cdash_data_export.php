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
			$contactmeta = $buscontact_metabox->the_meta($business->ID);
			
			$business_details = cdash_export_bus_location_data($contactmeta);
			
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
					'name' => 'Address',
					'value' => $business_details['address']
				),
				array(
					'name' => 'Phone',
					'value' => $business_details['phone']
				),
				array(
					'name' => 'Email',
					'value' => $business_details['email']
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

function cdash_export_bus_location_data($contactmeta){
	$business_details = array();
	$locations = $contactmeta['location'];
	$phone_number = '';
	$email = '';
	$business_address = '';
	if( isset( $contactmeta['location'] ) ) {
		foreach( $locations as $location ) {
			if(isset( $location['address'] ) ){
				$address = $location['address'];
			}else{
				$address = "";
			}

			if(isset( $location['city'] ) ){
				$city = $location['city'];
			}else{
				$city = '';
			}

			if(isset( $location['state'] ) ){
				$state = $location['state'];
			}else{
				$state = '';
			}

			if(isset( $location['zip'] ) ){
				$zip = $location['zip'];
			}else{
				$zip = '';
			}

			if(isset( $location['country'] ) ){
				$country = $location['country'];
			}else{
				$country = '';
			}
			$business_address = $address . ', ' . $city . ', ' . $state . ' ' . $zip . ' ' . $country;
			$business_details['address'] = $business_address;

			if(isset($location['phone'])) {
				$phones = $location['phone'];
				if(is_array($phones)) {
					foreach($phones as $phone) {
						if(isset($phone['phonenumber'])){
							$phone_number .= $phone['phonenumber'];
						}
					}
				}
			}else{
				$phone_number = '';
			}
			$business_details['phone'] = $phone_number;

			if(isset($location['email'])) {
				$emails = $location['email'];
				if(is_array($emails)) {
					foreach($emails as $email) {
						if(isset($email['emailaddress'])){
							$email = $email['emailaddress'];
						}
					}
				}
			}else{
				$email = '';
			}
			$business_details['email'] = $email;
		}
	}
	return $business_details;
}


?>