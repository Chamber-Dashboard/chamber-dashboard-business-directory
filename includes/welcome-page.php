<?php
function cdash_admin_menus() {
	$welcome_page_title = __('Welcome to Chamber Dashboard Business Directory', 'cdash');
	// About
	$about = add_dashboard_page($welcome_page_title, $welcome_page_title, 'manage_options', 'cdash-about', 'cdash_about_screen');
}
add_action('admin_menu', 'cdash_admin_menus');

// remove dashboard page links.
function cdash_admin_head() {
	remove_submenu_page( 'index.php', 'cdash-about' );
}
add_action('admin_head', 'cdash_admin_head');


// Display the welcome page
function cdash_about_screen()
	{
		?>
		<div class="wrap">

		<h1><?php esc_attr_e('Welcome to Chamber Dashboard Business Directory', 'cdash'); ?></h1>
		<?php cdash_email_subscribe(); ?>

		<div class="cdash-about-text">
			<h2>
			<?php
				esc_attr_e('Power your membership organization with WordPress plugins and themes', 'cdash');
			?>
		</h2>
			<?php
						$page = $_GET['page'];
						if(isset($_GET['tab'])){
							$tab = $_GET['tab'];
						}
						if($page == 'chamber_dashboard_addons'){
							$active_tab = 'chamber_dashboard_addons';
						}else if($page == 'chamber_dashboard_license'){
								$active_tab = 'chamber_dashboard_license';
						}else{
							$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'chamber_dashboard_support';
						}
            //$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'chamber_dashboard_support';


        ?>
		</div>

		<h2 class="nav-tab-wrapper">
			<a href="?page=cdash-about&tab=cdash-about" class="nav-tab <?php echo $active_tab == 'cdash-about' ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Getting Started', 'cdash' ); ?></a>

			<a href="?page=cdash-about&tab=chamber_dashboard_addons" class="nav-tab <?php echo $active_tab == 'chamber_dashboard_addons' ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Addons', 'cdash' ); ?></a>

			<a href="?page=cdash-about&tab=chamber_dashboard_license" class="nav-tab <?php echo $active_tab == 'chamber_dashboard_license' ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Licenses', 'cdash' ); ?></a>

			<a href="?page=cdash-about&tab=chamber_dashboard_support" class="nav-tab <?php echo $active_tab == 'chamber_dashboard_support' ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Support', 'cdash' ); ?></a>

			<a href="?page=cdash-about&tab=chamber_dashboard_technical_details" class="nav-tab <?php echo $active_tab == 'chamber_dashboard_technical_details' ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Technical Details', 'cdash' ); ?></a>

		</h2>

            <div id="main" style="width: 100%; float: left;">
            <?php
            if( $active_tab == 'cdash-about' )
            {
                cdash_about_page_render();
            }else if($active_tab == 'chamber_dashboard_support'){
								cdash_support_page_render();
            }else if($active_tab == 'chamber_dashboard_addons'){
								chamber_dashboard_addons_page_render();
            }else if($active_tab == 'chamber_dashboard_license'){
								chamber_dashboard_licenses_page_render();
            }else if($active_tab == 'chamber_dashboard_technical_details'){
								chamber_dashboard_technical_details_page_render();
            }



            ?>
            </div><!--end of #main-->

		</div>
		<?php
	}


//Displaying the Support Page
function cdash_support_page_render(){
?>
    <div class="wrap">
	   <div class="changelog">
            <h3><?php esc_attr_e('Chamber Dashboard Support', 'cdash'); ?></h3>
            <div class="feature-section col three-col">
                <p><?php esc_attr_e('Please review the plugin documentation and troubleshooting guide first. If you still can\'t find the answer, open a support ticket and we will be happy to answer your questions and assist you with any problems. Please note: If you have not purchased a premium plugin from us, support is available here -'); ?> <a href="https://chamberdashboard.com/priority-support-package/" target="_blank">https://chamberdashboard.com/priority-support-package/</a>  </p>

                <p> <?php esc_attr_e('Documentation'); ?> - <a href="https://chamberdashboard.com/chamber-dashboard-support/documentation/" target="_blank">https://chamberdashboard.com/chamber-dashboard-support/documentation/</a> <br />
                    <?php esc_attr_e('Troubleshooting'); ?> - <a href="https://chamberdashboard.com/trouble-shooting-guide/"target="_blank">https://chamberdashboard.com/trouble-shooting-guide/</a><br />
                    <?php esc_attr_e('Submit Ticket'); ?> - <a href="https://chamberdashboard.com/submit-support-ticket/"target="_blank">https://chamberdashboard.com/submit-support-ticket/</a><br />
                    <?php esc_attr_e('Premium Plugins'); ?> - <a href="https://chamberdashboard.com/add-ons/"target="_blank">https://chamberdashboard.com/add-ons/</a></p>
            </div>
        </div>
    </div>
<?php
}

// Redirect to welcome page after activation
function cdash_welcome()
{

	// Bail if no activation redirect transient is set
    if (!get_transient('_cdash_activation_redirect'))
		return;

	// Delete the redirect transient
	delete_transient('_cdash_activation_redirect');

	// Bail if activating from network, or bulk, or within an iFrame
	if (is_network_admin() || isset($_GET['activate-multi']) || defined('IFRAME_REQUEST'))
		return;

	if ((isset($_GET['action']) && 'upgrade-plugin' == $_GET['action']) && (isset($_GET['plugin']) && strstr($_GET['plugin'], 'cdash-business-directory.php')))
		return;

	wp_safe_redirect(admin_url(add_query_arg( array( 'page' => 'cdash-about', 'tab' => 'cdash-about'), 'admin.php')));
	exit;
}
add_action('admin_init', 'cdash_welcome');

//Displaying the Technical Details
function chamber_dashboard_technical_details_page_render(){
?>
    <div class="wrap">
	   <div class="changelog">
            <h2><?php esc_attr_e('Chamber Dashboard Status', 'cdash'); ?></h2>
            <div class="feature-section col three-col">
							<?php
								global $wp_version;
								$php_version = phpversion();
							?>
                <h4>Current WP Version:</b> <?php echo $wp_version; ?></h4>
								<h4>Current PHP Version:</b> <?php echo $php_version;  ?></h4>
								<h3>Chamber Dashboard Plugins</h3>
								<h4>Business Directory Version: <?php echo CDASH_BUS_VER; ?></h4>
								<?php
								$plugins = cdash_get_active_plugin_list();
								if( in_array( 'cdash-member-manager.php', $plugins ) ) {
									if ( version_compare(CDASHMM_VERSION, "2.3.7", "<" ) ) {
										//cdash_display_plugin_version('cdash_member_manager');
										echo "<h4>Member Manager Version: " . CDASHMM_VERSION . "</h4>";
									}
								}
								if( in_array( 'cdash-member-manager-pro.php', $plugins ) ) {
									if ( version_compare(CDASHMM_PRO_VERSION, "1.3.6", "<" ) ) {
										//cdash_display_plugin_version('cdash_member_manager_pro');
										echo "<h4>Member Manager Version: " . CDASHMM_PRO_VERSION . "</h4>";
									}
								}
								if( in_array( 'cdash-crm.php', $plugins ) ) {
									if ( version_compare(CDASHMM_CRM_VERSION, "1.5.0", "<" ) ) {
										//cdash_display_plugin_version('cdash_crm');
										echo "<h4>CRM Version: " . CDASHMM_CRM_VERSION . "</h4>";
									}
								}
								if( in_array( 'cdash-crm-importer.php', $plugins ) ) {
									if ( version_compare(CDCRM_IMPORT_VERSION, "1.1", "<" ) ) {
										//cdash_display_plugin_version('cdash_crm_importer');
										echo "<h4>CRM Importer Version: " . CDCRM_IMPORT_VERSION . "</h4>";
									}
								}
								if( in_array( 'cdash-exporter.php', $plugins ) ) {
									if ( version_compare(CDEXPORT_VERSION, "1.2.2", "<" ) ) {
										//cdash_display_plugin_version('cdash_exporter');
										echo "<h4>Chamber Dashboard Exporter Version: " . CDEXPORT_VERSION . "</h4>";
									}
								}
								if( in_array( 'cdash-recurring-payments.php', $plugins ) ) {
									if ( version_compare(CDASHRP_VERSION, "1.5.6", "<" ) ) {
										//cdash_display_plugin_version('cdash_recurring_payments');
										echo "<h4>Recurring Payments Version: " . CDASHRP_VERSION . "</h4>";
									}
								}
								if( in_array( 'cdash-member-updater.php', $plugins ) ) {
									if ( version_compare(CDASHMU_VERSION, "1.3.6", "<" ) ) {
										//cdash_display_plugin_version('cdash_member_updater');
										echo "<h4>Member Updater Version: " . CDASHMU_VERSION . "</h4>";
									}
								}
								cdash_technical_details_hook();
								?>

            </div>
        </div>
    </div>
<?php
}

function cdash_display_plugin_version($plugin_name){
	$plugins = cdash_get_active_plugin_list();
	if($plugin_name == 'cdash_member_manager'){
		if( in_array( 'cdash-member-manager.php', $plugins ) ) {
			echo "<h4>Member Manager Version: " . CDASHMM_VERSION . "</h4>";
		}
	}
	if($plugin_name == 'cdash_member_manager_pro'){
		if( in_array( 'cdash-member-manager-pro.php', $plugins ) ) {
			echo "<h4>Member Manager Version: " . CDASHMM_PRO_VERSION . "</h4>";
		}
	}
	if($plugin_name == 'cdash_crm'){
		if( in_array( 'cdash-crm.php', $plugins ) ) {
			echo "<h4>CRM Version: " . CDASHMM_CRM_VERSION . "</h4>";
		}
	}
	if($plugin_name == 'cdash_crm_importer'){
		if( in_array( 'cdash-crm-importer.php', $plugins ) ) {
			echo "<h4>CRM Importer Version: " . CDCRM_IMPORT_VERSION . "</h4>";
		}
	}
	if($plugin_name == 'cdash_exporter'){
		if( in_array( 'cdash-exporter.php', $plugins ) ) {
			echo "<h4>Chamber Dashboard Exporter Version: " . CDEXPORT_VERSION . "</h4>";
		}
	}
	if($plugin_name == 'cdash_member_updater'){
		if( in_array( 'cdash-member-updater.php', $plugins ) ) {
			echo "<h4>Member Updater Version: " . CDASHMU_VERSION . "</h4>";
		}
	}
	if($plugin_name == 'cdash_recurring_payments'){
		if( in_array( 'cdash-recurring-payments.php', $plugins ) ) {
			echo "<h4>Recurring Payments Version: " . CDASHRP_VERSION . "</h4>";
		}
	}
}

//Creating the custom hook for displaying license form
function cdash_technical_details_hook(){
  do_action('cdash_technical_details_hook');
}
?>
