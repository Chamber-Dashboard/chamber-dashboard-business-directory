<?php

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_enqueue_scripts', 'cdash_addons_enqueue_scripts' );
function cdash_addons_enqueue_scripts(){
  // enqueue the thickbox scripts and styles
  wp_enqueue_script( 'thickbox' );
  wp_enqueue_style( 'thickbox' );

  wp_enqueue_style( 'addons.css', plugins_url( 'includes/addons.css', __FILE__ ));
	wp_enqueue_style( 'Business directory admin styles', plugins_url( 'css/admin.css', __FILE__ ));
}

/* Options Page for Chamber Dashboard Business Directory */

// --------------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: register_uninstall_hook(__FILE__, 'cdash_delete_plugin_options')
// --------------------------------------------------------------------------------------

// Delete options table entries ONLY when plugin deactivated AND deleted
function cdash_delete_plugin_options() {
	delete_option('cdash_directory_options');
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: register_activation_hook(__FILE__, 'cdash_add_defaults')
// ------------------------------------------------------------------------------

// Define default option settings
function cdash_add_defaults() {
	$tmp = get_option('cdash_directory_options');
  if(!isset($tmp['bus_phone_type'])){
    $tmp['bus_phone_type'] = 'Main, Office, Cell';
  }

  if(!isset($tmp['bus_email_type'])){
    $tmp['bus_email_type'] = 'Main, Sales, Accounting, HR';
  }

  if(!isset($tmp['sv_description'])){
    $tmp['sv_description'] = '1';
  }

  if(!isset($tmp['sv_name'])){
    $tmp['sv_name'] = '1';
  }

  if(!isset($tmp['sv_address'])){
    $tmp['sv_address'] = '1';
  }

  if(!isset($tmp['sv_hours'])){
    $tmp['sv_hours'] = '1';
  }

  if(!isset($tmp['sv_address'])){
    $tmp['sv_address'] = '1';
  }

  if(!isset($tmp['sv_url'])){
    $tmp['sv_url'] = '1';
  }

  if(!isset($tmp['sv_logo'])){
    $tmp['sv_logo'] = '1';
  }

  if(!isset($tmp['sv_category'])){
    $tmp['sv_category'] = '1';
  }

  if(!isset($tmp['sv_tags'])){
    $tmp['sv_tags'] = '1';
  }

  if(!isset($tmp['tax_name'])){
    $tmp['tax_name'] = '1';
  }

  if(!isset($tmp['tax_address'])){
    $tmp['tax_address'] = '1';
  }

  if(!isset($tmp['tax_hours'])){
    $tmp['tax_hours'] = '1';
  }

  if(!isset($tmp['tax_url'])){
    $tmp['tax_url'] = '1';
  }

  if(!isset($tmp['tax_logo'])){
    $tmp['tax_logo'] = '1';
  }

  if(!isset($tmp['tax_category'])){
    $tmp['tax_category'] = '1';
  }

  if(!isset($tmp['tax_tags'])){
    $tmp['tax_tags'] = '1';
  }

  if(!isset($tmp['sm_display'])){
    $tmp['sm_display'] = '1';
  }

  if(!isset($tmp['sm_display'])){
    $tmp['sm_display'] = 'icons';
  }

  if(!isset($tmp['sm_icon_size'])){
    $tmp['sm_icon_size'] = '32px';
  }

  if(!isset($tmp['currency_position'])){
    $tmp['currency_position'] = 'before';
  }

  if(!isset($tmp['currency_symbol'])){
    $tmp['currency_symbol'] = '$';
  }

  if(!isset($tmp['currency'])){
    $tmp['currency'] = 'USD';
  }

  if(!isset($tmp['search_results_per_page'])){
    $tmp['search_results_per_page'] = '5';
  }

  if(!isset($tmp['business_listings_url'])){
    $tmp['business_listings_url'] = '';
  }

  if(!isset($tmp['business_listings_url_text'])){
    $tmp['business_listings_url_text'] = 'Return to Business Listings';
  }

  if(!isset($tmp['google_maps_api'])){
    $tmp['google_maps_api'] = '';
  }
  /*if(!is_array($tmp)) {
		delete_option('cdash_directory_options'); // so we don't have to reset all the 'off' checkboxes too! (don't think this is needed but leave for now)
		$arr = array(	"bus_phone_type" => "Main, Office, Cell",
						"bus_email_type" => "Main, Sales, Accounting, HR",
						"sv_description" => "1",
						"sv_name"		 	=> "1",
						"sv_address"	=> "1",
            "sv_hours"    => "1",
						"sv_url"		 	=> "1",
						"sv_logo"		 	=> "1",
						"sv_category"	=> "1",
            "sv_tags"     => "1",
						"tax_name"		=> "1",
						"tax_address"	=> "1",
            "tax_hours"   => "1",
						"tax_url" 		=> "1",
						"tax_logo"		=> "1",
            "tax_category"	=> "1",
            "tax_tags"     => "1",
						"sm_display"	=> "icons",
						"sm_icon_size"=> "32px",
						"currency_position" => "before",
						"currency_symbol" => "$",
						"currency" => "USD",
            "search_results_per_page"   =>  "5",
            "business_listings_url"   =>  '',
            'business_listings_url_text' => 'Return to Business Listings',
            'google_maps_api' =>  ''
		);
		update_option('cdash_directory_options', $arr);
	}*/
  update_option('cdash_directory_options', $tmp);
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: add_action('admin_init', 'cdash_init' )
// ------------------------------------------------------------------------------
// THIS FUNCTION RUNS WHEN THE 'admin_init' HOOK FIRES, AND REGISTERS YOUR PLUGIN
// SETTING WITH THE WORDPRESS SETTINGS API. YOU WON'T BE ABLE TO USE THE SETTINGS
// API UNTIL YOU DO.
// ------------------------------------------------------------------------------

// Init plugin options to white list our options
function cdash_init(){
	register_setting( 'cdash_plugin_options', 'cdash_directory_options', 'cdash_validate_options' );
	register_setting( 'cdash_plugin_version', 'cdash_directory_version', 'cdash_validate_options' );
}

// ------------------------------------------------------------------------------
// ADDING SECTIONS AND FIELDS TO THE SETTINGS PAGE
// ------------------------------------------------------------------------------
add_action( 'admin_init', 'cdash_options_init' );

function cdash_options_init(){

  add_settings_section(
    'cdash_options_main_section',
    __('Business Directory Settings', 'cdash'),
    '',
    'cdash_plugin_options'
  );

  add_settings_section(
    'cdash_options_single_view_section',
    __('Single Business View Options', 'cdash'),
    'single_business_view_text_callback',
    'cdash_plugin_options'
  );

  add_settings_field(
		'bus_phone_type',
		__( 'Phone Number Types', 'cdash' ),
		'cdash_bus_phone_type_render',
		'cdash_plugin_options',
		'cdash_options_main_section',
		array(
			__( 'When you enter a phone number for a business, you can choose what type of phone number it is.  The default options are "Main, Office, Cell".  To change these options, enter a comma-separated list here.  (Note: your entry will over-ride the default, so if you still want main and/or office and/or cell, you will need to enter them.', 'cdash' )
		)
	);

  add_settings_field(
		'bus_email_type',
		__( 'Email Types', 'cdash' ),
		'cdash_bus_email_type_render',
		'cdash_plugin_options',
		'cdash_options_main_section',
		array(
			__( 'When you enter an email address for a business, you can choose what type of email address it is.  The default options are "Main, Sales, Accounting, HR".  To change these options, enter a comma-separated list here.  (Note: your entry will over-ride the default, so if you still want main and/or sales and/or accounting and/or HR, you will need to enter them.', 'cdash' )
		)
	);

  add_settings_field(
		'sv_description',
		__( 'Description', 'cdash' ),
		'cdash_sv_description_render',
		'cdash_plugin_options',
		'cdash_options_single_view_section',
		array(
			__( '', 'cdash' )
		)
	);

  add_settings_field(
		'sv_name',
		__( 'Location Name', 'cdash' ),
		'cdash_sv_name_render',
		'cdash_plugin_options',
		'cdash_options_single_view_section',
		array(
			__( 'Note: you can hide individual locations in the "edit business" view.', 'cdash' )
		)
	);


}

function single_business_view_text_callback(){
  echo __('What information would you like to display on the single business view?', 'cdash');
}

function cdash_bus_phone_type_render( $args ) {

	$options = get_option('cdash_directory_options');
	?>
  <input type='text' name='cdash_directory_options[bus_phone_type]' value='<?php echo $options['bus_phone_type']; ?>'>
	<br /><span class="description"><?php echo $args[0]; ?></span>
	<?php

}

function cdash_bus_email_type_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input type="text" size="57" name="cdash_directory_options[bus_email_type]" value="<?php echo $options['bus_email_type']; ?>" />
<?php
}

function cdash_sv_description_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_description]" type="checkbox" value="1" <?php if (isset($options['sv_description'])) { checked('1', $options['sv_description']); } ?> />
  <?php
}

function cdash_sv_name_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_name]" type="checkbox" value="1" <?php if (isset($options['sv_name'])) { checked('1', $options['sv_name']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_options_section_callback(  ) {

	//echo __( 'Chamber Dashboard Business Directory Settings', 'cdash' );

}





//Check if license page exists in the CD admin menu
function cdash_license_page(){
	if ( empty ( $GLOBAL['admin_page_hooks']['chamber_dashboard_license'] ) ){
		add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Licenses', 'Licenses', 'manage_options', 'chamber_dashboard_license', 'cdash_about_screen' );
	}
}

//Creating the custom hook for adding the license page
function cdash_add_licence_page_menu_hook(){
  do_action('cdash_add_licence_page_menu_hook');
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: add_action('admin_menu', 'cdash_add_options_page');
// ------------------------------------------------------------------------------

// Add menu page
/*function cdash_add_options_page(){
  add_menu_page(
		'Chamber Dashboard',
		'Chamber Dashboard',
		'manage_options',
		'/chamber-dashboard-business-directory/options.php',
		'cdash_render_form',
		plugin_dir_url( __FILE__ ) . '/images/cdash-settings.png',
		85
	);

  add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Addons', 'Addons', 'manage_options', 'chamber_dashboard_addons', 'cdash_about_screen' );

  $license_url = get_admin_url() . 'admin.php?page=cdash-about&tab=chamber_dashboard_license';
  $plugins = cdash_get_active_plugin_list();
      if( in_array( 'cdash-recurring-payments.php', $plugins ) || in_array('cdash-member-updater.php', $plugins) || in_array('cdash-exporter.php', $plugins) || in_array('cdash-crm-importer.php', $plugins) || in_array('cdash-member-manager-pro.php', $plugins) || in_array( 'cdash-wc-payments.php', $plugins ) ) {
          add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Licenses', 'Licenses', 'manage_options', 'chamber_dashboard_license', 'cdash_about_screen' );
      }
      add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Support', 'Support', 'manage_options', 'chamber_dashboard_support', 'cdash_about_screen' );
}*/


function cdash_add_options_page() {
	add_menu_page(
		'Chamber Dashboard',
		'Chamber Dashboard',
		'manage_options',
		'/chamber-dashboard-business-directory/options.php',
		'cdash_render_form',
		plugin_dir_url( __FILE__ ) . '/images/cdash-settings.png',
		85
	);
	add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Export Directory', 'Export Directory', 'manage_options', 'chamber-dashboard-export', 'cdash_export_form' );
	add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Directory Import', 'Directory Import', 'manage_options', 'chamber-dashboard-import', 'cdash_import_form' );

    add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Addons', 'Addons', 'manage_options', 'chamber_dashboard_addons', 'cdash_about_screen' );
		//add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Licenses', 'Licenses', 'manage_options', 'chamber_dashboard_license', 'chamber_dashboard_licenses_page_render' );
    $license_url = get_admin_url() . 'admin.php?page=cdash-about&tab=chamber_dashboard_license';
    $plugins = cdash_get_active_plugin_list();
        if( in_array( 'cdash-recurring-payments.php', $plugins ) || in_array('cdash-member-updater.php', $plugins) || in_array('cdash-exporter.php', $plugins) || in_array('cdash-crm-importer.php', $plugins) || in_array('cdash-member-manager-pro.php', $plugins) || in_array( 'cdash-wc-payments.php', $plugins ) ) {
            add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Licenses', 'Licenses', 'manage_options', 'chamber_dashboard_license', 'cdash_about_screen' );
        }
				//cdash_add_licence_page_menu_hook();

	add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Support', 'Support', 'manage_options', 'chamber_dashboard_support', 'cdash_about_screen' );

	// this is a hidden submenu page for updating geolocation data
	add_submenu_page( NULL, 'Update Geolocation Data', 'Update Geolocation Data', 'manage_options', 'chamber-dashboard-update-geolocation', 'cdash_update_geolocation_data_page' );
}


// ------------------------------------------------------------------------------
// CALLBACK FUNCTION SPECIFIED IN: add_options_page()
// ------------------------------------------------------------------------------
// THIS FUNCTION IS SPECIFIED IN add_options_page() AS THE CALLBACK FUNCTION THAT
// ACTUALLY RENDER THE PLUGIN OPTIONS FORM AS A SUB-MENU UNDER THE EXISTING
// SETTINGS ADMIN MENU.
// ------------------------------------------------------------------------------

// Render the Plugin options form
function cdash_render_form() {
	?>
	<div class="wrap">

		<!-- Display Plugin Icon, Header, and Description -->
		<h1><img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/cdash-32.png'?>"><?php _e('Chamber Dashboard Business Directory Settings', 'cdash'); ?></h1>


		<div id="main" style="width:90%; min-width:350px; float:left;">
      <div class="cdash_column_left">
        <form method="post" action="options.php">
  				<?php settings_fields('cdash_plugin_options');
                do_settings_sections('cdash_plugin_options');
                submit_button();
          ?>
  				<?php $options = get_option('cdash_directory_options'); ?>

  			</form>
      </div><!--end of left_column-->
      <div class="cdash_sidebar">
        <?php cdash_settings_sidebar();

         ?>
      </div><!--end of sidebar-->
			<!-- Beginning of the Plugin Options Form -->


			<script type="text/javascript">
			// Add a new repeating section
			var attrs = ['for', 'id', 'name'];
			function resetAttributeNames(section) {
			    var tags = section.find('input, label'), idx = section.index();
			    tags.each(function() {
			      var $this = jQuery(this);
			      jQuery.each(attrs, function(i, attr) {
			        var attr_val = $this.attr(attr);
			        if (attr_val) {
			            $this.attr(attr, attr_val.replace(/\[bus_custom\]\[\d+\]\[/, '\[bus_custom\]\['+(idx + 1)+'\]\['))
			        }
			      })
			    })
			}

			jQuery('.repeat').click(function(e){
			        e.preventDefault();
			        var lastRepeatingGroup = jQuery('.repeating').last();
			        var cloned = lastRepeatingGroup.clone(true)
			        cloned.insertAfter(lastRepeatingGroup);
			        cloned.find("input").val("");
			        cloned.find("select").val("");
			        cloned.find("input:radio").attr("checked", false);
			        resetAttributeNames(cloned)
			    });

			jQuery('.delete-this').click(function(e){
				e.preventDefault();
			    jQuery(this).parent('div').remove();
			});

			</script>


		</div><!-- #main -->
	</div><!--end of wrap-->

	<?php
}



// Sanitize and validate input. Accepts an array, return a sanitized array.
function cdash_validate_options($input) {
	// delete the old custom fields
	delete_option('cdash_directory_options');
	$input['bus_phone_type'] =  wp_filter_nohtml_kses($input['bus_phone_type']);
	$input['bus_email_type'] =  wp_filter_nohtml_kses($input['bus_email_type']);
	if( isset( $input['currency_symbol'] ) ) {
		$input['currency_symbol'] =  wp_filter_nohtml_kses($input['currency_symbol']);
	}
	// $input['txt_one'] =  wp_filter_nohtml_kses($input['txt_one']); // Sanitize textbox input (strip html tags, and escape characters)
	// $input['textarea_one'] =  wp_filter_nohtml_kses($input['textarea_one']); // Sanitize textarea input (strip html tags, and escape characters)
	return $input;
}

// Display a Settings link on the main Plugins page
function cdash_plugin_action_links( $links, $file ) {

	if ( $file == plugin_basename( __FILE__ ) ) {
		$cdash_links = '<a href="'.get_admin_url().'options-general.php?page=chamber-dashboard-business-directory/options.php">'.__('Settings').'</a>';
		// make the 'Settings' link appear first
		array_unshift( $links, $cdash_links );
	}

	return $links;
}

add_action( 'admin_init', 'cdash_watch_for_export' );
function cdash_watch_for_export() {
	if( isset( $_POST['cdash_export'] ) && 'cdash_do_export' == $_POST['cdash_export'] ) {
		require_once( dirname(__FILE__) . '/export.php' );
		cdash_simple_export();
        exit();
	}
}
function cdash_export_form() {

	$export_form =
		'<p>' . __( 'Click the button below to download a CSV file of all of your businesses.', 'cdash' ) . '</p>
		<form method="post" action="' . admin_url( 'admin.php?page=chamber-dashboard-export') . '">
		<input type="hidden" name="cdash_export" value="cdash_do_export">
		<input type="submit" class="button-primary" value="' . __( 'Download CSV', 'cdash' ) . '">
		</form>
		<p>' . __( 'This free export feature can only export limited information about businesses.  If you want to export more information, or export people or businesses, try the <a href="' . admin_url( 'admin.php?page=chamber-dashboard-addons' ) . '" >Chamber Dashboard Exporter</a>.', 'cdash' );

	$export_form = apply_filters( 'cdash_export_form', $export_form );

	$export_page =
		'<div class="wrap">
			<div class="icon32" id="icon-options-general"><br></div>
			<h1>' . __( 'Export', 'cdash' ) . '</h1>' .
			$export_form .
		'</div>';

	echo $export_page;
}

function cdash_import_form() { ?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
			<h1><?php _e('Import', 'cdash'); ?></h1>
			<h3><?php _e( 'Import Businesses', 'cdash' ); ?></h3>
			<p><?php _e('Chamber Dashboard Business Directory plugin includes a free import feature. You can import businesses from a CSV file.  First, you must format the CSV properly.  Your CSV must have the following columns in the following order, even if some of the columns are empty: <ul><li>Business Name</li><li>Description</li><li>Category (separate multiple with semicolons)</li><li>Membership Level (separate multiple with semicolons)</li><li>Location Name</li><li>Address</li><li>City</li><li>State</li><li>Zip</li><li>Country</li><li>Business Hours</li><li>URL</li><li>Phone (separate multiple with semicolons)</li><li>Email (separate multiple with semicolons)</li></ul>', 'cdash'); ?></p>
			<p><?php _e( 'Some programs format CSV files differently.  You might need to use either Google Drive or Open Office to save your CSV file so that it will upload correctly. Visit our <a href="https://chamberdashboard.com/documentation/" target="_blank">documentation</a> pages for more information.', 'cdash' ); ?></p>
			<p><a href="<?php echo plugin_dir_url( __FILE__ ); ?>cdash-import-sample.zip"><?php _e('Download a sample CSV to see how to format your file.', 'cdash'); ?></a></p>
			<?php wp_import_upload_form('admin.php?page=chamber-dashboard-import'); ?>
	<?php

		$args =  array(
			'post_type' => 'business'
		);
		$query = new WP_Query($args);

		?>
		</div>

	<?php $file = wp_import_handle_upload();

	if(isset($file['file'])) {

		$row = 0;
		$header_row = [];
		if (($handle = fopen($file['file'], "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				 //print_r($data);

		    	if($row == 0) {
		    		// Don't do anything with the header row
		    		$row++;
		    		continue;
		    	} else {
		    		$row++;
					// Get the post data
					$businessinfo = array (
						'post_type'     => 'business',
						'post_title'    => sanitize_text_field($data[0]),
						'post_content' 	=> $data[1],
						'post_status'   => 'publish',
						);
					// Create a business
					$newbusiness = wp_insert_post($businessinfo, true);
					// Add business categories
					if(isset($data[2])) {
						$categories = explode(';', $data[2]);
						wp_set_object_terms( $newbusiness, $categories, 'business_category' );
					}

					// Add membership levels
					if(isset($data[3])) {
						$levels = explode(';', $data[3]);
						wp_set_object_terms( $newbusiness, $levels, 'membership_level' );
					}

					// add a serialised array for wpalchemy to work - see http://www.2scopedesign.co.uk/wpalchemy-and-front-end-posts/
					$fields = array('_cdash_location');
					$str = $fields;
					update_post_meta( $newbusiness, 'buscontact_meta_fields', $str );

					// Get all the phone numbers and put them in the array format wpalchemy expects
					$numbers = array();
					if(isset($data[12]) && !empty($data[12])) {
						$tempnums = explode(';', $data[12]);
						foreach ($tempnums as $number) {
							$numbers[]['phonenumber'] = $number;
						}
					} else {
						$numbers = '';
					}

					// Get all the email addresses and put them in the array format wpalchemy expects
					$emails = array();
					if(isset($data[13]) && !empty($data[13])) {
						$tempmails = explode(';', $data[13]);
						foreach ($tempmails as $email) {
							$emails[]['emailaddress'] = $email;
						}
					} else {
						$emails = '';
					}

					// Get the geolocation data
					if( isset( $data[5] ) ) {
						// ask Google for the latitude and longitude
						$rawaddress = $data[5];
						if( isset( $data[6] ) ) {
							$rawaddress .= ' ' . $data[6];
						}
						if( isset( $data[7] ) ) {
							$rawaddress .= ' ' . $data[7];
						}
						if( isset( $data[8] ) ) {
							$rawaddress .= ' ' . $data[8];
						}
						$address = urlencode( $rawaddress );
						//$json = wp_remote_get("https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDAh8Bc9eoDDifM5TKtnNgpWEHd1jIUa2U&address=" . $address . "&sensor=true");
            $json = wp_remote_get(cdash_get_google_map_url($address));
						$json = json_decode($json['body'], true);
						if( is_array( $json ) && $json['status'] == 'OK') {
							$latitude = $json['results'][0]['geometry']['location']['lat'];
							$longitude = $json['results'][0]['geometry']['location']['lng'];
						}
					}

					// Create the array of location information for wpalchemy
					$locationfields = array(
							array(
							'altname' 	=> $data[4],
							'address'	=> $data[5],
							'city'		=> $data[6],
							'state'		=> $data[7],
							'zip'		=> $data[8],
              'country'   => $data[9],
              'hours'     => $data[10],
							'latitude'	=> $latitude,
							'longitude'	=> $longitude,
							'url'		=> $data[11],
							'phone'		=> $numbers,
							'email'		=> $emails,
							)
						);

					// Add all of the post meta data in one fell swoop
					add_post_meta( $newbusiness, '_cdash_location', $locationfields );
				}
		    }
		    $success = $row - 1;
		    echo "<p style='font-size:1.2em;'>" . $success . " businesses successfully imported!</p>";
		    fclose($handle);
		}
	}

	do_action( 'cdash_importer' );
}

?>
