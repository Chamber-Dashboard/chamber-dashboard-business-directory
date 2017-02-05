<?php
/* License Page for Chamber Dashboard Business Directory */

if ( ! defined( 'ABSPATH' ) ) exit;

function cdash_get_active_plugin_list() {
    $active_plugins = wp_get_active_and_valid_plugins();
    $plugin_names = array();
    foreach( $active_plugins as $plugin ) {
        $plugin_names[] = substr($plugin, strrpos($plugin, '/') + 1);
    }

    return $plugin_names;
}

function chamber_dashboard_licenses_page_render(){
?>
    <div class="wrap">
        <div class="icon32" id="icon-options-general"><br></div>
        <h2><?php _e('Chamber Dashboard Licenses'); ?></h2>
        <?php settings_errors(); ?>
        
        <div id="main" style="min-width: 350px; float: left;">
            <?php
                $plugins = cdash_get_active_plugin_list();
                if( in_array( 'cdash-recurring-payments.php', $plugins ) ) {
                    cdashrp_edd_license_page();
                }
                if( in_array( 'cdash-member-updater.php', $plugins ) ) {
                    cdash_mu_edd_license_page();
                }
                if( in_array( 'cdash-exporter.php', $plugins ) ) {
                    cdexport_edd_license_page();
                }                                                  
                
            ?>
        </div>
    </div>
<?php
}
?>