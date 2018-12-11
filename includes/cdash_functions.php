<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// ------------------------------------------------------------------------
// REQUIRE MINIMUM VERSION OF WORDPRESS:
// ------------------------------------------------------------------------
function cdash_plugins_requires_wordpress_version($plugin_name, $plugin_path) {
    //cdash_requires_wordpress_version(PLUGIN_NAME);
    global $wp_version;
  	//$plugin = plugin_basename( __FILE__ );
    //$plugin = $plugin_path;
  	//$plugin_data = get_plugin_data( __FILE__, false );

  	if ( version_compare($wp_version, "4.9", "<" ) ) {
  		if( is_plugin_active($plugin_path) ) {
  			deactivate_plugins( $plugin_path );
  			wp_die( "'".$plugin_name."' requires WordPress 4.9 or higher, and has been deactivated! Please upgrade WordPress and try again.<br /><br />Back to <a href='".admin_url()."'>WordPress admin</a>." );
  		}
  	}
}
//add_action( 'admin_init', 'cdash_plugins_requires_wordpress_version' );

//Plugin Update Message
function cdash_update_message(){
  $settings_url = get_admin_url() . 'admin.php?page=chamber-dashboard-business-directory/options.php#google_maps_api';
  global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'cdash_update_message_ignore') ) {
    echo '<div class="notice notice is-dismissible cdash_update_notice"><p>'. esc_html__('If you’d like to display maps in your Directory, you’ll need to generate a new Google Maps API Key and add it in the <a href="'.$settings_url.'">settings</a> page.') .' <a href="?cdash_update_message_dismissed">Hide Notice</a></p></div>';
	}
}

add_action( 'admin_notices', 'cdash_update_message' );

function cdash_update_message_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset( $_GET['cdash_update_message_dismissed'] ) )
            add_user_meta($user_id, 'cdash_update_message_ignore', 'true', true );
}
add_action('admin_init', 'cdash_update_message_ignore');

//Get the Google Maps API Key
function cdash_get_google_maps_api_key(){
  $options = get_option( 'cdash_directory_options' );
  //$google_map_api_key = $options['google_maps_api'];
  if($options['google_maps_api'] == ''){
    $google_map_api_key = 'AIzaSyAoqmdfczTk4HY0qqDtQQJjRN4mhf9e7hE';
    cd_debug("Google maps api key from CD: " . $google_map_api_key);
  }
  else{
    $google_map_api_key = $options['google_maps_api'];
    cd_debug("Custom Google maps api key: " . $google_map_api_key);
  }
  return $google_map_api_key;
}

function cdash_get_google_map_url($address) {
  $google_map_api_key = cdash_get_google_maps_api_key();
    return "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&key=" . $google_map_api_key;
    cd_debug("Google maps api key 1: " . $google_map_api_key);
}

// ask Google for the latitude and longitude
function cdash_get_lat_long($address, $city, $state, $zip, $country) {
  $rawaddress = $address;
  if( isset( $city ) ) {
   $rawaddress .= ' ' . $city;
  }
  if( isset( $state ) ) {
    $rawaddress .= ' ' . $state;
  }
  if( isset( $zip ) ) {
    $rawaddress .= ' ' . $zip;
  }
  if( isset( $country ) ) {
    $rawaddress .= ' ' . $country;
  }
  cd_debug("Constructed raw address $rawaddress from $address, $city, $state, $zip, $country");
  $address = urlencode( $rawaddress );
  $url = cdash_get_google_map_url($address);
  cd_debug("Google maps url: " . $url);
  $response = wp_remote_get($url);
  $lat = 0;
  $lng = 0;
  if(is_array($response)) {
    $json = json_decode($response['body'], true);
    if( is_array( $json ) && $json['status'] == 'OK') {
      $lat = $json['results'][0]['geometry']['location']['lat'];
      $lng = $json['results'][0]['geometry']['location']['lng'];
      cd_info("Got lat long ($lat, $lng) for $url");
    } else {
      cd_warn("Google Maps response body is not an array or does not have OK: $json");
    }
  } else {
    cd_warn("Got $response from google maps for $url");
  }
  return array($lat, $lng);
}

function cd_debug($message) {
  cd_log_message(1, $message);
}

function cd_info($message) {
  cd_log_message(2, $message);
}

function cd_warn($message) {
  cd_log_message(3, $message);
}

function cd_error($message) {
  cd_log_message(4, $message);
}

function cd_log_message($level, $message) {
  if(defined('CHAMBER_DASHBOARD_DEBUG_LEVEL') && defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
    if($level >= CHAMBER_DASHBOARD_DEBUG_LEVEL) {
      error_log($message);
    }
  }
}
?>
