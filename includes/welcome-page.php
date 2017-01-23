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
		<!--<p class="cdash-actions">
			<a href="<?php echo esc_url(admin_url('admin.php?page=chamber-dashboard-business-directory/options.php')); ?>" class="button button-primary"><?php _e('Settings', 'cdash'); ?></a>
			<a href="http://chamberdashboard.com/support/documentation/?utm_source=plugin&utm_medium=welcome-page&utm_campaign=business-directory" class="button button-primary" target="_blank"><?php _e('Documentation', 'cdash'); ?></a>
		</p>-->
		
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
                
            }elseif($active_tab == 'chamber_dashboard_support'){
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

				<h3><?php _e('Main Features', 'cdash'); ?></h3>

				<div class="feature-section col three-col">

					<div>
						<h4><?php _e('Business Directory', 'cdash'); ?></h4>
						<p><?php _e('Build a website to showcase your members\' businesses more effectively.  Customize your listings to meet member needs.', 'cdash'); ?></p>
						<p><?php _e('Display member businesses as a complete, searchable directory or single listing. Turn your site into a community resource of local business connections.', 'cdash'); ?></p>
					</div>

					<div>
						<h4><?php _e('Import Existing Member Listings', 'cdash'); ?></h4>
						<p><?php _e('Easily import listings from or export listings to a CSV file.  Customize your listings to meet member needs.', 'cdash'); ?></p>
					</div>					
					
					<div>
						<h4><?php _e('Member Manager', 'cdash'); ?></h4>
						<p><?php _e('Create membership levels, let businesses sign up for membership on your site, collect payment wiht PayPal and track when membership payments are due.', 'cdash'); ?></p>
					</div>					
                    
                    <div>
						<h4><?php _e('Member Updater', 'cdash'); ?></h4>
						<p><?php _e('Give the ability for businesses to edit their own listings and keep them up to date.', 'cdash'); ?></p>
					</div>					
                    
                    <div>
						<h4><?php _e('Import Existing Member Listings', 'cdash'); ?></h4>
						<p><?php _e('Easily import listings from or export listings to a CSV file.  Customize your listings to meet member needs.', 'cdash'); ?></p>
					</div>				
					
					<div class="last-feature">
						<h4><?php _e('Sign Up for Our Exceptional Support', 'cdash'); ?></h4>
						<p><?php _e('We are here to answer your questions and help you get the most out of Chamber Dashboard!  Click on the support tab to get help with your Chamber Dashboard plugins.', 'cdash'); ?></p>
					</div>
				</div>				
				<div class="return-to-dashboard">
				<a href="<?php echo esc_url(admin_url('admin.php?page=chamber-dashboard-business-directory/options.php')); ?>"><?php _e( 'Go to Chamber Dashboard Settings', 'cdash' ); ?></a>
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
               <p>Please review the plugin documentation and troubleshooting guide first. If you still can't find the answer open a support ticket and we will be happy to answer your questions and assist you with any problems. Please note: If you have not purchased a premium plugin from us, you will not have access to email support.  </p> 
 
                <p> Documentation - <a href="https://chamberdashboard.com/chamber-dashboard-support/documentation/" target="_blank">https://chamberdashboard.com/chamber-dashboard-support/documentation/</a> <br />
                    Troubleshooting - <a href="https://chamberdashboard.com/trouble-shooting-guide/"target="_blank">https://chamberdashboard.com/trouble-shooting-guide/</a><br /> 
                    Submit Ticket - <a href="https://chamberdashboard.com/submit-support-ticket/"target="_blank">https://chamberdashboard.com/submit-support-ticket/</a><br /> 
                    Premium Plugins - <a href="https://chamberdashboard.com/add-ons/"target="_blank">https://chamberdashboard.com/add-ons/</a></p> 
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