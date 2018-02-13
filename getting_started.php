<?php
/* License Page for Chamber Dashboard Business Directory */

if ( ! defined( 'ABSPATH' ) ) exit;


function cdash_about_page_render() {
    ?>
    <div class="wrap">
      <h3><?php _e('Chamber Dashboard plugins give you all the tools you need to manage your members, plus they add awesome features to your WordPress website.', 'cdash'); ?></h3>

      <h3>Let's get started!</h3>
      <div id="top" class="cdash_getting_started_docs cdash_admin_page">
        <div class="cdash_admin_left_sidebar cdash_wrapper">
          <h3>Contents</h3>
          <ol>
            <li><a href="#step_1">Create your first Directory Listing</a></li>
            <li><a href="#step_2">Display your Directory on your website</a></li>
            <li><a href="#step_3">Let your members update their own Listings</a></li>
            <li><a href="#step_4">Create a database of your contacts & track their activities</a></li>
            <li><a href="#step_5">Add online payments & automatically create new Directory Listings</a></li>
            <li><a href="#step_6">Add a Community Events Calendar to your website</a></li>
            <li><a href="#cd_themes">Chamber Dashboard themes for your site</a></li>
          </ol>
        </div><!--cdash_admin_left_sidebar-->
        <div class="cdash_admin_main_col_right">
        <div id="step_1" class="cdash_wrapper cdash_admin_grid">
          <div class="cdash_admin_left_col">
            <h3>Step 1. Add Listings to your Directory</h3>
            <p><a href="https://chamberdashboard.com/document/installing-chamber-dashboard-business-directory/update-chamber-business-directory-wordpress/" target="_blank">Create your first Directory Listing</a> or <a href="https://chamberdashboard.com/document/installing-chamber-dashboard-business-directory/import-businesses-via-csv-file/" target="_blank">upload a CSV file</a> of member businesses.</p>
            <p>(Chamber Dashboard >> Directory Import)</p>
            <p><span class="cdash_highlight">Hint:</span> download the example file first to see which fields are available for import.</p>
          </div><!--cdash_admin_left_col-->

          <div class="cdash_admin_right_col">
            <div class="cdash_video_container">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/c5SUYSB2gzY" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
            </div><!--cdash_video_container-->
            <p class="right"><a href="#top">Top</a></p>
          </div><!--cdash_admin_right_col-->
        </div><!--cdash_wrapper-->

        <div class="cdash_wrapper cdash_admin_grid">
          <div id="step_2" class="cdash_admin_left_col">
            <h3>Step 2. Display your Directory on your website</h3>
            <p>Create a new page and add this shortcode: [business_directory].</p>
            <p>The Business Directory picks up the formatting of your WordPress theme so that’s it! Your new directory is ready to go.</p>
            <p>You can adjust what information is displayed in your directory using these <a href="https://chamberdashboard.com/document/installing-chamber-dashboard-business-directory/displaying-business-directory-site/" target="_blank">shortcode</a> parameters. For additional info and step-by-step instructions, please visit our <a href="https://chamberdashboard.com/chamber-dashboard-support/documentation/" target="_blank">Documentation Pages</a>.</p>
          </div><!--cdash_admin_left_col-->
          <div class="cdash_admin_right_col">
            <a href="http://chamber-beautiful.chamberdashboard.com/business-directory-3-column/" target="_blank"><img src="<?php echo plugins_url( 'images/bd_3_column_layout.png' , __FILE__ ); ?>" width="80%" /></a>
            <p class="right"><a href="#top">Top</a></p>
          </div><!--cdash_admin_right_col-->
        </div><!--cdash_wrapper-->

        <div id="step_3" class="cdash_wrapper one_col cdash_admin_grid">
          <div class="cdash_admin_left_col">
            <h3>Step 3. Let your members update their own Listings</h3>
            <p>Download and install the <a href="https://chamberdashboard.com/downloads/member-updater/" target="_blank">Member Updater plugin</a>.</p>
            <p>Create ‘Claim My Business’ and ‘Edit My Business’ pages. <a href="https://chamberdashboard.com/document/install-setup-member-updater/member-updater-setup/" target="_blank">Full setup instructions here.</a></p>
        </div><!--cdash_admin_left_col-->
        <p class="right"><a href="#top">Top</a></p>
      </div><!--cdash_wrapper-->

      <div id="step_4" class="cdash_wrapper one_col cdash_admin_grid">
        <div class="cdash_admin_left_col">
          <h3>Step 4. Create a database of your contacts & track their activities</h3>
          <p><a href="https://chamberdashboard.com/document/installing-chamber-dashboard-crm/track-activities-chamber-crm/" target="_blank">Download and install</a> the CRM plugin.</a><p>
          <p>Manually enter your contacts or import them from a CSV file with the <a href="https://chamberdashboard.com/downloads/crm-importer/" target="_blank">CRM Importer</a>.</p>
          <p><a href="https://chamberdashboard.com/document/installing-chamber-dashboard-crm/track-activities-chamber-crm/" target="_blank">Create Activities</a> and link People to their Activities.</p>
        </div><!--cdash_admin_left_col-->
        <p class="right"><a href="#top">Top</a></p>
      </div><!--cdash_wrapper-->

        <div id="step_5" class="cdash_wrapper one_col cdash_admin_grid" style="padding-bottom:0; margin-bottom:0px;">
          <div class="cdash_admin_left_col">
            <h3>Step 5. Add online payments & automatically create new Directory Listings</h3>
            <p><a href="https://chamberdashboard.com/document/install-member-manager/" target="
              ">Download and install</a> the Member Manager plugin. <a href="https://chamberdashboard.com/document/install-member-manager/manage-member-invoices/" target="_blank">Connect to Paypal</a> (Chamber Dashboard >> Member Manager Options).</p>
            <p>If you wish to offer additional payment options, you can purchase the <a href="https://chamberdashboard.com/downloads/member-manager-pro/" target="_blank">Member Manager Pro.</p>
            <p><a href="https://chamberdashboard.com/document/install-member-manager/display-membership-levels-wordpress/" target="_blank">Setup Membership Levels</a> (Businesses >> Membership Levels)</p>
            <p>Create a new page and add this shortcode: [membership_form]</p>
            <p>That’s it! New members can now use this form to join your organization. Find out more about how <a href="https://chamberdashboard.com/document/install-member-manager/member-invoicing-manager/" target="_blank">Member Manager payments work</a>.</p>
            </div><!--cdash_admin_left_col-->
        </div><!--cdash_wrapper-->

        <div class="cdash_wrapper cdash_admin_grid" style="padding-top:0;">
          <div class="cdash_admin_left_col">
            <p>Send automatic Membership Renewal notices and overdue invoice reminders with the <a href="https://chamberdashboard.com/downloads/recurring-payments/" target="_blank">Recurring Payments plugin</a>.</p>
            <p>Set notification timeframes & reminder frequencies.</p>
          </div><!--cdash_admin_left_col-->
          <div class="cdash_admin_right_col">
            <img src="<?php echo plugins_url( 'images/rp_notification_image.jpg' , __FILE__ ); ?>" width="80%" />
            <p class="right"><a href="#top">Top</a></p>
          </div><!--cdash_admin_right_col-->
        </div><!--cdash_wrapper-->

        <div id="step_6" class="cdash_wrapper one_col cdash_admin_grid">
          <div class="cdash_admin_left_col">
            <h3>Step 6. Add a Community Events Calendar to your website</h3>
            <p><a href="https://chamberdashboard.com/document/events-calendar-docs/" target="_blank">Download and install</a> the Events Calendar plugin.</p>
            <img src="<?php echo plugins_url( 'images/cdash_events_calendar.png' , __FILE__ ); ?>" width="40%" />
            <p class="right"><a href="#top">Top</a></p>
          </div><!--cdash_admin_left_col-->
        </div><!--cdash_wrapper-->

        <div id="cd_themes" class="cdash_wrapper cdash_admin_grid">
          <h3>Give your site an amazing new look with a gorgeous theme from Chamber Dashboard</h3>
          <div class="cdash_admin_left_col">
            <p>Chamber Beautiful</p>
          </div><!--cdash_admin_left_col-->
          <div class="cdash_admin_right_col">
            <p>Chamber Inspired</p>
            <p class="right"><a href="#top">Top</a></p>
          </div><!--cdash_admin_right_col-->
        </div><!--cdash_wrapper-->
      </div>
      </div><!--getting_started_docs-->

  </div><!--wrap-->
<?php
}

?>
