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
		<div class="wrap about-wrap">

		<h1><?php _e('Welcome to Chamber Dashboard Business Directory', 'cdash'); ?></h1>

		<div class="about-text cdash-about-text">
			<?php
				_e('Power your Chamber of Commerce with Chamber Dashboard', 'cdash');
			?>
			<?php
            $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'chamber_dashboard_support';

        ?>
		</div>

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ($_GET['page'] == 'cdash-about') echo 'nav-tab-active'; ?>" href="<?php echo esc_url(admin_url(add_query_arg( array( 'page' => 'cdash-about', 'tab' => 'cdash-about'), 'admin.php'))); ?>">
				<?php _e('About Chamber Dashboard', 'cdash'); ?>
			</a>
			<a class="nav-tab <?php if ($_GET['page'] == 'chamber_dashboard_support') echo 'nav-tab-active'; ?>" href="<?php echo esc_url(admin_url(add_query_arg( array( 'page' => 'chamber_dashboard_support'), 'admin.php'))); ?>">
				<?php _e('Support', 'cdash'); ?>
			</a>
		</h2>

            <div id="main" style="width: 70%; min-width: 350px; float: left;">
            <?php
            if( $active_tab == 'cdash-about' )
            {
                cdash_about_page_render();

            }else if($active_tab == 'chamber_dashboard_support'){
                cdash_support_page_render();
            }

            ?>
            </div><!--end of #main-->

		</div>
		<?php
	}

function cdash_about_page_render() {
    ?>
    <div class="wrap">
			<div class="changelog">

                <h3><?php _e('Core Plugins', 'cdash'); ?></h3>

				<div class="feature-section col three-col">

                    <p><?php _e('Visit'); ?> <a href="<?php echo esc_url(admin_url(add_query_arg( array( 'page' => 'chamber-dashboard-addons'), 'admin.php'))); ?>">Addons</a> <?php _e('page to install the full series of core plugins for free.'); ?></p>

					<div>
					    <ul>
                            <ol><h4><?php _e('Business Directory:', 'cdash'); ?></h4><p><?php _e('Create a directory of member businesses on your WordPress website.', 'cdash'); ?></p></ol>
                            <ol><h4><?php _e('CRM:', 'cdash'); ?></h4><p><?php _e('Keep track of the people in your organization.', 'cdash'); ?></p></ol>
                            <ol><h4><?php _e('Member Manager:', 'cdash'); ?></h4><p><?php _e('Let members join your organization right on your website!', 'cdash'); ?></p></ol>
														<ol><h4><?php _e('Events Calendar:', 'cdash'); ?></h4><p><?php _e('Add a community events calendar to your site in minutes.', 'cdash'); ?></p></ol>
                        </ul>
					</div>

                    <p>Get started right away with our <a href="https://chamberdashboard.com/5-min-getting-started-guide/" target="_blank">5 Min. Setup Guide</a><br />

                        Or go to <a href="<?php echo esc_url(admin_url(add_query_arg( array( 'page' => 'chamber-dashboard-business-directory/options.php'), 'admin.php'))); ?>">Chamber Dashboard Settings</a>
                    </p>

										<div>
										<h3><?php _e('Make your website even more dynamic with our automation plugins!', 'cdash'); ?>
										<a href="<?php echo esc_url(admin_url(add_query_arg( array( 'page' => 'chamber-dashboard-business-directory/options.php'), 'admin.php'))); ?>"><?php _e('Premium Addons', 'cdash'); ?></a></h3>
									</div>
									<?php
										$support_tab_url = esc_url(admin_url(add_query_arg( array( 'page' => 'chamber_dashboard_support'), 'admin.php')));
									?>

					<div class="last-feature">
						<h4><?php _e('Sign Up for Our Exceptional Support', 'cdash'); ?></h4>
						<p><?php _e('We are here to answer your questions and help you get the most out of Chamber Dashboard!  Click on the <a href="' . $support_tab_url . '">support</a> tab to get help with your Chamber Dashboard plugins.', 'cdash'); ?></p>
					</div>
				</div>

			</div>
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
