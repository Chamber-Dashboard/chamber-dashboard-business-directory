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

		<h1><?php _e('Welcome to Chamber Dashboard Business Directory', 'cdash'); ?></h1>

		<div class="cdash-about-text">
			<h2>
			<?php
				_e('Power your membership organization with WordPress plugins and themes', 'cdash');
			?>
		</h2>
			<?php
            $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'chamber_dashboard_support';

        ?>
		</div>

		<h2 class="nav-tab-wrapper">
			<a href="?page=cdash-about&tab=cdash-about" class="nav-tab <?php echo $active_tab == 'cdash-about' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Getting Started', 'cdash' ); ?></a>

			<a href="?page=cdash-about&tab=chamber_dashboard_addons" class="nav-tab <?php echo $active_tab == 'chamber_dashboard_addons' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Addons', 'cdash' ); ?></a>

			<a href="?page=cdash-about&tab=chamber_dashboard_license" class="nav-tab <?php echo $active_tab == 'chamber_dashboard_license' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Licenses', 'cdash' ); ?></a>

			<a href="?page=cdash-about&tab=chamber_dashboard_support" class="nav-tab <?php echo $active_tab == 'chamber_dashboard_support' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Support', 'cdash' ); ?></a>

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
            <h3><?php _e('Chamber Dashboard Support', 'cdash'); ?></h3>
            <div class="feature-section col three-col">
                <p><?php _e('Please review the plugin documentation and troubleshooting guide first. If you still can\'t find the answer, open a support ticket and we will be happy to answer your questions and assist you with any problems. Please note: If you have not purchased a premium plugin from us, support is available here -'); ?> <a href="https://chamberdashboard.com/priority-support-package/" target="_blank">https://chamberdashboard.com/priority-support-package/</a>  </p>

                <p> <?php _e('Documentation'); ?> - <a href="https://chamberdashboard.com/chamber-dashboard-support/documentation/" target="_blank">https://chamberdashboard.com/chamber-dashboard-support/documentation/</a> <br />
                    <?php _e('Troubleshooting'); ?> - <a href="https://chamberdashboard.com/trouble-shooting-guide/"target="_blank">https://chamberdashboard.com/trouble-shooting-guide/</a><br />
                    <?php _e('Submit Ticket'); ?> - <a href="https://chamberdashboard.com/submit-support-ticket/"target="_blank">https://chamberdashboard.com/submit-support-ticket/</a><br />
                    <?php _e('Premium Plugins'); ?> - <a href="https://chamberdashboard.com/add-ons/"target="_blank">https://chamberdashboard.com/add-ons/</a></p>
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

?>
