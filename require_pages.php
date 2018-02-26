<?php
/*All the pages that are required for the Business Directory */

// Require welcome page
//require_once( plugin_dir_path( __FILE__ ) . 'includes/welcome-page.php' );
// Require views
require_once( plugin_dir_path( __FILE__ ) . 'views.php' );
// Require widgets
require_once( plugin_dir_path( __FILE__ ) . 'widgets.php' );
// Require currency list
//require_once( plugin_dir_path( __FILE__ ) . 'includes/currency_list.php' );
// Require Addons
require_once( plugin_dir_path( __FILE__ ) . 'addons.php' );
// Require licenses page
require_once( plugin_dir_path( __FILE__ ) . 'license.php' );

// Require Getting started page
require_once( plugin_dir_path( __FILE__ ) . 'getting_started.php' );

// Require Email Subscribe page
//require_once( plugin_dir_path( __FILE__ ) . 'includes/email_subscribe.php' );

foreach ( glob( plugin_dir_path( __FILE__ ) . "includes/*.php" ) as $file ) {
    require_once $file;
}

?>
