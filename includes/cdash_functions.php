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

?>
