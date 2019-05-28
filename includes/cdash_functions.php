<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// ------------------------------------------------------------------------
// REQUIRE MINIMUM VERSION OF WORDPRESS:
// ------------------------------------------------------------------------
function cdash_plugins_requires_wordpress_version($plugin_name, $plugin_path) {
    global $wp_version;

  	if ( version_compare($wp_version, "4.6", "<" ) ) {
  		if( is_plugin_active($plugin_path) ) {
  			deactivate_plugins( $plugin_path );
  			wp_die( "'".$plugin_name."' requires WordPress 4.6 or higher, and has been deactivated! Please upgrade WordPress and try again.<br /><br />Back to <a href='".admin_url()."plugins.php'>WordPress admin</a>." );
  		}
  	}
}

//Plugin Update Message
function cdash_update_message(){
  $settings_url = get_admin_url() . 'admin.php?page=chamber-dashboard-business-directory/options.php#google_maps_api';
  $hide_notice_url = get_admin_url() . 'plugins.php?cdash_update_message_ignore=0';
  global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'cdash_update_message_ignore') ) {
    echo '<div class="notice notice is-dismissible cdashrc_update cdash_update_notice"><p>';
    printf(__('If you’d like to display maps in your Directory, you’ll need to generate a new Google Maps API Key and add it in the <a href="' . $settings_url . '">settings</a> page. | <a href="' . $hide_notice_url . '">Hide Notice</a>'));
    echo "</p></div>";
	}
}

add_action( 'admin_notices', 'cdash_update_message' );

function cdash_update_message_ignore() {
	global $current_user;
    $user_id = $current_user->ID;
    /* If user clicks to ignore the notice, add that to their user meta */
    if ( isset($_GET['cdash_update_message_ignore']) && '0' == $_GET['cdash_update_message_ignore'] ) {
         add_user_meta($user_id, 'cdash_update_message_ignore', 'true', true);
    }
}
add_action('admin_init', 'cdash_update_message_ignore');

//Get the Google Maps API Key
function cdash_get_google_maps_api_key(){
  $options = get_option( 'cdash_directory_options' );
  $google_map_api_key = $options['google_maps_api'];
  cd_debug("Custom Google maps api key: " . $google_map_api_key);
  //$google_map_api_key = $options['google_maps_api'];
  /*if($options['google_maps_api'] == ''){
    $google_map_api_key = 'AIzaSyAoqmdfczTk4HY0qqDtQQJjRN4mhf9e7hE';
    cd_debug("Google maps api key from CD: " . $google_map_api_key);
  }
  else{
    $google_map_api_key = $options['google_maps_api'];
    cd_debug("Custom Google maps api key: " . $google_map_api_key);
  }*/
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

function display_categories_grid($taxonomies, $showcount){
if ( !empty($taxonomies) ) :
    $output = '<div class="business_category responsive">';
    foreach( $taxonomies as $category ) {
      if($showcount == 1){
        $num_posts = " (" . $category->count . ")";
      }else{
        $num_posts = '';
      }
        if( $category->parent == 0 ) {
            $output.= '<div class="cdash_parent_category"><div><a class="cdash_pc_link" href="'. get_term_link($category->slug, 'business_category') .'"><b>' . esc_attr( $category->name ) . '</b></a><span class="number_posts">' . $num_posts . '</span></div>';
            $taxonomy_output = array();
            foreach( $taxonomies as $subcategory ) {
                if($subcategory->parent == $category->term_id) {
                  $taxonomy_output[] = '<span class="cdash_child_category"><a class="cdash_cc_link" href="'. get_term_link($subcategory->slug, 'business_category') .'">
                    '. esc_html( $subcategory->name ) .'</a>' . $num_posts . '</span>';
                }
            }
            $output .= join($taxonomy_output, ", ");
            $output.='</div>';
        }
    }
    $output.='</div>';
    return $output;
endif;
}

function cdash_display_categories_dropdown($args){
  //if ( !empty($taxonomies) ) :

    //$output = '<li id="categories">';
    $output = '';
    $output .= wp_dropdown_categories( $args );
    ?>

      <?php
    //$output .= '</li>';

    return $output;
//endif;
?>

<?php
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

function cdash_enqueue_styles(){
  wp_enqueue_style( 'cdash-business-directory', plugins_url( 'css/cdash-business-directory.css', dirname(__FILE__) ) );
}

function cdash_enqueue_scripts(){
  wp_enqueue_script( 'cdash-business-directory', plugins_url( 'js/cdash-business-directory.js', dirname(__FILE__) ) );
}

//TODO: remove the current time from the script before plugin release
function cdash_admin_scripts() {
  //wp_enqueue_script('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js');
  wp_enqueue_script('jquery-ui');
  wp_enqueue_script( 'jquery-ui-dialog' );
  wp_enqueue_script(' jquery-ui-draggable');

  //wp_enqueue_script( 'cdash-demo-content', plugins_url( 'js/cdash_demo_content.js', dirname(__FILE__) ) );
  wp_enqueue_script( 'cdash-demo-content', plugins_url( 'js/cdash_demo_content.js', dirname(__FILE__)), 'jquery-ui', filemtime(dirname(__FILE__). '/../js/cdash_demo_content.js') );
}

add_action('admin_enqueue_scripts', 'cdash_admin_scripts');
//add_action( 'admin_init', 'cdash_admin_scripts' );

function cdash_demo_content_styles(){
	wp_enqueue_style('jquery-ui-styles', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');
}

global $pagenow;
if(isset($_GET['page'])){
  $page = $_GET['page'];
}
if(isset($_GET['tab'])){
  $tab = $_GET['tab'];
}

if($pagenow == 'admin.php' && $page == 'cdash-about' && $tab == 'cdash-about'){
  add_action('admin_enqueue_scripts', 'cdash_demo_content_styles');
  //add_action( 'admin_init', 'cdash_demo_content_styles' );
}

function cdash_check_license_message($license_validity, $site_count, $license_limit, $license_expiry_date){
  $message = '';
  if($license_validity == 'valid'){
    $message .= '<p class="license_information" style="font-style:italic; font-size:12px;"><span class="cdash_active_license" style="color:green;">';
    $message .= __( 'Your license key is active. ' );
    $message .= '</span>';

    if(isset($license_expiry_date) && $license_expiry_date != 'lifetime'){
      $message .= __( 'It expires on ' . date_i18n( get_option( 'date_format' ), strtotime( $license_expiry_date, current_time( 'timestamp' ) ) ) );
    }
     $message .=  __(' You have ' . $site_count .'/' .$license_limit . ' sites active.' );
     $message .= '</p>';
  }elseif($license_validity == 'invalid'){
    $message .= '<p class="license_information" style="font-style:italic; font-size:12px;"><span class="cdash_inactive_license" style="color:red;">';
    $message .= __( 'Your license key is not active.' );
    $message .= '</span></p>';
  }
  return $message;
}
?>
