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
		</div>
		<p class="cdash-actions">
			<a href="<?php echo esc_url(admin_url('admin.php?page=chamber-dashboard-business-directory/options.php')); ?>" class="button button-primary"><?php _e('Settings', 'cdash'); ?></a>
			<a href="http://chamberdashboard.com/support/documentation/?utm_source=plugin&utm_medium=welcome-page&utm_campaign=business-directory" class="button button-primary" target="_blank"><?php _e('Documentation', 'cdash'); ?></a>
		</p>

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ($_GET['page'] == 'cdash-about') echo 'nav-tab-active'; ?>" href="<?php echo esc_url(admin_url(add_query_arg( array( 'page' => 'cdash-about'), 'index.php'))); ?>">
				<?php _e('About Chamber Dashboard', 'cdash'); ?>		
			</a>
		</h2>

			<div class="changelog">

				<h3><?php _e('Main Features', 'cdash'); ?></h3>

				<div class="feature-section col three-col">

					<div>
						<h4><?php _e('Create Your Directory', 'cdash'); ?></h4>
						<p><?php _e('Build a website to showcase your members\' businesses more effectively.  Customize your listings to meet member needs.', 'cdash'); ?></p>
					</div>

					<div>
						<h4><?php _e('Import Existing Member Listings', 'cdash'); ?></h4>
						<p><?php _e('Easily import listings from or export listings to a CSV file.  Customize your listings to meet member needs.', 'cdash'); ?></p>
					</div>

					<div>
						<h4><?php _e('Display Directory on your Website', 'cdash'); ?></h4>
						<p><?php _e('Display member businesses as a complete, searchable directory or single listing. Turn your site into a community resource of local business connections.', 'cdash'); ?></p>
					</div>

					<div class="last-feature">
						<h4><?php _e('Sign Up for Our Exceptional Support', 'cdash'); ?></h4>
						<p><?php _e('We are here to answer your questions and help you get the most out of Chamber Dashboard!  Go to the Upgrade page in the Chamber Dashboard menu to receive our first-class support.', 'cdash'); ?></p>
					</div>

				</div>
				
			</div>

			<div class="return-to-dashboard">
				<a href="<?php echo esc_url(admin_url('admin.php?page=chamber-dashboard-business-directory/options.php')); ?>"><?php _e( 'Go to Chamber Dashboard Settings', 'cdash' ); ?></a>
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

	wp_safe_redirect(admin_url('index.php?page=cdash-about'));
	exit;
}
add_action('admin_init', 'cdash_welcome');
	
?>