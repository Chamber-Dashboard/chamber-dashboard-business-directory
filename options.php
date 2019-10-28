<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_enqueue_scripts', 'cdash_addons_enqueue_scripts' );
function cdash_addons_enqueue_scripts(){
  // enqueue the thickbox scripts and styles
  wp_enqueue_script( 'thickbox' );
  wp_enqueue_style( 'thickbox' );

  wp_enqueue_style( 'addons.css', plugins_url( 'includes/addons.css', __FILE__ ));
	wp_enqueue_style( 'Business directory admin styles', plugins_url( 'css/admin.css', __FILE__ ));
}

/* Options Page for Chamber Dashboard Business Directory */

// --------------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: register_uninstall_hook(__FILE__, 'cdash_delete_plugin_options')
// --------------------------------------------------------------------------------------

// Delete options table entries ONLY when plugin deactivated AND deleted
function cdash_delete_plugin_options() {
	delete_option('cdash_directory_options');
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: register_activation_hook(__FILE__, 'cdash_add_defaults')
// ------------------------------------------------------------------------------

// Define default option settings
function cdash_add_defaults() {
	$tmp = get_option('cdash_directory_options');
  if(!isset($tmp['bus_phone_type'])){
    $tmp['bus_phone_type'] = 'Main, Office, Cell';
  }

  if(!isset($tmp['bus_email_type'])){
    $tmp['bus_email_type'] = 'Main, Sales, Accounting, HR';
  }

  if(!isset($tmp['cdash_default_thumb'])){
    $tmp['cdash_default_thumb'] = '';
  }

  if(!isset($tmp['sv_description'])){
    $tmp['sv_description'] = '1';
  }

  if(!isset($tmp['sv_name'])){
    $tmp['sv_name'] = '1';
  }

  if(!isset($tmp['sv_address'])){
    $tmp['sv_address'] = '1';
  }

  if(!isset($tmp['sv_hours'])){
    $tmp['sv_hours'] = '1';
  }

  if(!isset($tmp['sv_map'])){
    $tmp['sv_map'] = '1';
  }

  if(!isset($tmp['sv_url'])){
    $tmp['sv_url'] = '1';
  }

  if(!isset($tmp['sv_phone'])){
    $tmp['sv_phone'] = '1';
  }

  if(!isset($tmp['sv_email'])){
    $tmp['sv_email'] = '1';
  }

  if(!isset($tmp['sv_logo'])){
    $tmp['sv_logo'] = '1';
  }

  if(!isset($tmp['sv_thumb'])){
    $tmp['sv_thumb'] = '1';
  }

  if(!isset($tmp['sv_memberlevel'])){
    $tmp['sv_memberlevel'] = '1';
  }

  if(!isset($tmp['sv_category'])){
    $tmp['sv_category'] = '1';
  }

  if(!isset($tmp['sv_tags'])){
    $tmp['sv_tags'] = '1';
  }

  if(!isset($tmp['sv_social'])){
    $tmp['sv_social'] = '1';
  }

  if(!isset($tmp['sv_comments'])){
    $tmp['sv_comments'] = '1';
  }

  if(!isset($tmp['tax_name'])){
    $tmp['tax_name'] = '1';
  }

  if(!isset($tmp['tax_address'])){
    $tmp['tax_address'] = '1';
  }

  if(!isset($tmp['tax_hours'])){
    $tmp['tax_hours'] = '1';
  }

  if(!isset($tmp['tax_url'])){
    $tmp['tax_url'] = '1';
  }

  if(!isset($tmp['tax_phone'])){
    $tmp['tax_phone'] = '1';
  }

  if(!isset($tmp['tax_email'])){
    $tmp['tax_email'] = '1';
  }

  if(!isset($tmp['tax_logo'])){
    $tmp['tax_logo'] = '1';
  }

  if(!isset($tmp['tax_thumb'])){
    $tmp['tax_thumb'] = '1';
  }

  if(!isset($tmp['tax_category'])){
    $tmp['tax_category'] = '1';
  }

  if(!isset($tmp['tax_tags'])){
    $tmp['tax_tags'] = '1';
  }

  if(!isset($tmp['tax_social'])){
    $tmp['tax_social'] = '1';
  }

  if(!isset($tmp['tax_orderby_name'])){
    $tmp['tax_orderby_name'] = '1';
  }

  if(!isset($tmp['sm_display'])){
    $tmp['sm_display'] = 'icons';
  }

  if(!isset($tmp['sm_icon_size'])){
    $tmp['sm_icon_size'] = '32px';
  }

  if(!isset($tmp['currency'])){
    $tmp['currency'] = 'USD';
  }

  if(!isset($tmp['currency_symbol'])){
    $tmp['currency_symbol'] = '$';
  }

  if(!isset($tmp['currency_position'])){
    $tmp['currency_position'] = 'before';
  }

  if(!isset($tmp['search_results_per_page'])){
    $tmp['search_results_per_page'] = '5';
  }

  if(!isset($tmp['business_listings_url'])){
    $tmp['business_listings_url'] = '';
  }

  if(!isset($tmp['business_listings_url_text'])){
    $tmp['business_listings_url_text'] = 'Return to Business Listings';
  }

  if(!isset($tmp['google_maps_api'])){
    $tmp['google_maps_api'] = '';
  }

  if(!isset($tmp['google_maps_server_api'])){
    $tmp['google_maps_server_api'] = '';
  }

  update_option('cdash_directory_options', $tmp);
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: add_action('admin_init', 'cdash_init' )
// ------------------------------------------------------------------------------
// THIS FUNCTION RUNS WHEN THE 'admin_init' HOOK FIRES, AND REGISTERS YOUR PLUGIN
// SETTING WITH THE WORDPRESS SETTINGS API. YOU WON'T BE ABLE TO USE THE SETTINGS
// API UNTIL YOU DO.
// ------------------------------------------------------------------------------

// Init plugin options to white list our options
function cdash_init(){
	register_setting( 'cdash_plugin_options', 'cdash_directory_options', 'cdash_validate_options' );
	register_setting( 'cdash_plugin_version', 'cdash_directory_version', 'cdash_validate_options' );
  //register_setting( 'cdash_plugin_options', 'cdash_directory_options', 'cdash_handle_file_upload' );

}

// ------------------------------------------------------------------------------
// ADDING SECTIONS AND FIELDS TO THE SETTINGS PAGE
// ------------------------------------------------------------------------------
add_action( 'admin_init', 'cdash_options_init' );

function cdash_options_init(){

  add_settings_section(
    'cdash_options_main_section',
    __('General Directory Settings', 'cdash'),
    '',
    'cdash_plugin_options'
  );

  add_settings_section(
    'cdash_options_single_view_section',
    __('Single Business View Options', 'cdash'),
    'cdash_single_business_view_text_callback',
    'cdash_plugin_options'
  );

  add_settings_section(
    'cdash_options_tax_view_section',
    __('Category/Membership Level View Options', 'cdash'),
    'cdash_taxonomy_view_text_callback',
    'cdash_plugin_options'
  );

  add_settings_section(
    'cdash_options_misc_view_section',
    __('Other Settings', 'cdash'),
    'cdash_options_misc_view_text_callback',
    'cdash_plugin_options'
  );

  add_settings_field(
    'bus_phone_type',
    __( 'Phone Number Types', 'cdash' ),
    'cdash_bus_phone_type_render',
    'cdash_plugin_options',
    'cdash_options_main_section',
    array(
      __( 'When you enter a phone number for a business, you can choose what type of phone number it is.  The default options are "Main, Office, Cell".  To change these options, enter a comma-separated list here.  (Note: your entry will over-ride the default, so if you still want main and/or office and/or cell, you will need to enter them.', 'cdash' )
    )
  );

  add_settings_field(
    'bus_email_type',
    __( 'Email Types', 'cdash' ),
    'cdash_bus_email_type_render',
    'cdash_plugin_options',
    'cdash_options_main_section',
    array(
      __( 'When you enter an email address for a business, you can choose what type of email address it is.  The default options are "Main, Sales, Accounting, HR".  To change these options, enter a comma-separated list here.  (Note: your entry will over-ride the default, so if you still want main and/or sales and/or accounting and/or HR, you will need to enter them.', 'cdash' )
    )
  );

  add_settings_field(
    'cdash_default_thumb',
    __( 'Default Featured Image for businesses', 'cdash' ),
    'cdash_default_thumb_render',
    'cdash_plugin_options',
    'cdash_options_main_section',
    array(
      __( 'This image will show up as the default featured image for any business that does not have a featured image.', 'cdash' )
    )
  );

  add_settings_field(
    'sv_description',
    __( 'Description', 'cdash' ),
    'cdash_sv_description_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sv_name',
    __( 'Location Name', 'cdash' ),
    'cdash_sv_name_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( 'Note: you can hide individual locations in the "edit business" view.', 'cdash' )
    )
  );

  add_settings_field(
    'sv_address',
    __( 'Location Address', 'cdash' ),
    'cdash_sv_address_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sv_hours',
    __( 'Location Hours', 'cdash' ),
    'cdash_sv_hours_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sv_map',
    __( 'Map', 'cdash' ),
    'cdash_sv_map_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( 'To display maps in your Directory, you’ll need to generate a new Google Maps API Key, scroll down for details.', 'cdash' )
    )
  );

  add_settings_field(
    'sv_url',
    __( 'Location Web Address', 'cdash' ),
    'cdash_sv_url_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sv_phone',
    __( 'Phone Number(s)', 'cdash' ),
    'cdash_sv_phone_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sv_email',
    __( 'Email Address(es)', 'cdash' ),
    'cdash_sv_email_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sv_logo',
    __( 'Logo', 'cdash' ),
    'cdash_sv_logo_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sv_thumb',
    __( 'Featured Image', 'cdash' ),
    'cdash_sv_thumb_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( 'Your theme might already display the featured image.  If it does not, you can check this box to display the featured image', 'cdash' )
    )
  );

  add_settings_field(
    'sv_memberlevel',
    __( 'Membership Level', 'cdash' ),
    'cdash_sv_memberlevel_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sv_category',
    __( 'Membership Level', 'cdash' ),
    'cdash_sv_category_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sv_tags',
    __( 'Business Tags', 'cdash' ),
    'cdash_sv_tags_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sv_social',
    __( 'Social Media Links', 'cdash' ),
    'cdash_sv_social_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sv_comments',
    __( 'Comments', 'cdash' ),
    'cdash_sv_comments_render',
    'cdash_plugin_options',
    'cdash_options_single_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'tax_name',
    __( 'Location Name', 'cdash' ),
    'cdash_tax_name_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( 'Note: you can hide individual locations in the "edit business" view.', 'cdash' )
    )
  );

  add_settings_field(
    'tax_address',
    __( 'Location Address', 'cdash' ),
    'cdash_tax_address_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'tax_hours',
    __( 'Location Hours', 'cdash' ),
    'cdash_tax_hours_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'tax_url',
    __( 'Location Web Address', 'cdash' ),
    'cdash_tax_url_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'tax_phone',
    __( 'Phone Number(s)', 'cdash' ),
    'cdash_tax_phone_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'tax_email',
    __( 'Email Address(es)', 'cdash' ),
    'cdash_tax_email_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'tax_logo',
    __( 'Logo', 'cdash' ),
    'cdash_tax_logo_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'tax_thumb',
    __( 'Featured Image', 'cdash' ),
    'cdash_tax_thumb_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( 'Your theme might already display the featured image.  If it does not, you can check this box to display the featured image.', 'cdash' )
    )
  );

  add_settings_field(
    'tax_memberlevel',
    __( 'Membership Level', 'cdash' ),
    'cdash_tax_memberlevel_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'tax_category',
    __( 'Business Categories', 'cdash' ),
    'cdash_tax_category_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'tax_tags',
    __( 'Business Tags', 'cdash' ),
    'cdash_tax_tags_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'tax_social',
    __( 'Socail Media Links', 'cdash' ),
    'cdash_tax_social_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'tax_orderby_name',
    __( 'Order category pages by business name (default order is by publication date)', 'cdash' ),
    'cdash_tax_orderby_name_render',
    'cdash_plugin_options',
    'cdash_options_tax_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'sm_display',
    __( 'Social Media Display', 'cdash' ),
    'cdash_sm_display_render',
    'cdash_plugin_options',
    'cdash_options_misc_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'currency',
    __( 'Currency', 'cdash' ),
    'cdash_currency_render',
    'cdash_plugin_options',
    'cdash_options_misc_view_section',
    array(
      __( 'Select the currency that will be used on invoices.', 'cdash' )
    )
  );

  add_settings_field(
    'currency_symbol',
    __( 'Currency Symbol', 'cdash' ),
    'cdash_currency_symbol_render',
    'cdash_plugin_options',
    'cdash_options_misc_view_section',
    array(
      __( 'Enter the symbol that should appear next to all currency.', 'cdash' )
    )
  );

  add_settings_field(
    'currency_position',
    __( 'Currency Position', 'cdash' ),
    'cdash_currency_position_render',
    'cdash_plugin_options',
    'cdash_options_misc_view_section',
    array(
      __( '', 'cdash' )
    )
  );

  add_settings_field(
    'search_results_per_page',
    __( 'Search Results Per Page', 'cdash' ),
    'cdash_search_results_per_page_render',
    'cdash_plugin_options',
    'cdash_options_misc_view_section',
    array(
      __( 'Enter the number of search results you would like to display per page.', 'cdash' )
    )
  );

  add_settings_field(
    'business_listings_url',
    __( 'Business Listings URL', 'cdash' ),
    'cdash_business_listings_url_render',
    'cdash_plugin_options',
    'cdash_options_misc_view_section',
    array(
      __( 'Enter the url for your business listings page here. It will be displayed on the single business pages so that users can navigate back to the business listings page.', 'cdash' )
    )
  );

  add_settings_field(
    'business_listings_url_text',
    __( 'Business Listings URL text', 'cdash' ),
    'cdash_business_listings_url_text_render',
    'cdash_plugin_options',
    'cdash_options_misc_view_section',
    array(
      __( 'Enter the text you want to show for the Return to Business Listings link on the single business page.', 'cdash' )
    )
  );

  add_settings_field(
    'google_maps_api',
    __( 'Google Maps Browser API Key', 'cdash' ),
    'cdash_google_maps_api_render',
    'cdash_plugin_options',
    'cdash_options_misc_view_section',
    array(
      __( 'Enter the Google Maps API Key. You can find the instructions <a href="https://chamberdashboard.com/docs/plugin-features/business-directory/google-maps-api-key/" target="_blank">here</a>.', 'cdash' )
    )
  );

  add_settings_field(
    'google_maps_server_api',
    __( 'Google Maps Server API Key', 'cdash' ),
    'cdash_google_maps_server_api_render',
    'cdash_plugin_options',
    'cdash_options_misc_view_section',
    array(
      __( 'Enter the Google Maps Server API Key. You can find the instructions <a href="https://chamberdashboard.com/docs/plugin-features/business-directory/google-maps-api-key/" target="_blank">here</a>.', 'cdash' )
    )
  );

  add_settings_field(
    'cdash_custom_fields',
    __( 'Custom Fields', 'cdash' ),
    'cdash_custom_fields_render',
    'cdash_plugin_options',
    'cdash_options_misc_view_section',
    array(
      __( 'If you need to store additional information about businesses, you can create custom fields here.', 'cdash' )
    )
  );

}

function cdash_single_business_view_text_callback(){
  echo __('What information would you like to display on the single business view?', 'cdash');
}

function cdash_taxonomy_view_text_callback(){
  echo __('What information would you like to display on the category/membership level view?  Note: Chamber Dashboard might not be able to over-ride all of your theme settings (for instance, your theme might show the featured image on category pages).  If you don\'t like how your theme displays category and membership level pages, you might want to create custom pages using the [business_directory] shortcode.  This is more labor-intensive, but gives you more control over appearance.', 'cdash');
}

function cdash_options_misc_view_text_callback(){

}

function cdash_bus_phone_type_render( $args ) {
	$options = get_option('cdash_directory_options');
	?>
  <input type='text' name='cdash_directory_options[bus_phone_type]' value='<?php echo $options['bus_phone_type']; ?>'>
	<br /><span class="description"><?php echo $args[0]; ?></span>
	<?php
}

function cdash_bus_email_type_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input type="text" size="57" name="cdash_directory_options[bus_email_type]" value="<?php echo $options['bus_email_type']; ?>" />
  <br /><span class="description"><?php echo $args[0]; ?></span>
<?php
}

function cdash_default_thumb_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input id="cdash_default_thumb" type="text" name="cdash_directory_options[cdash_default_thumb]" value="<?php if(isset($options['cdash_default_thumb'])){ echo $options['cdash_default_thumb']; } ?>" />

  <input id="cdash_default_thumb_button" type="button" class="button-primary" value="Upload Image" />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_description_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_description]" type="checkbox" value="1" <?php if (isset($options['sv_description'])) { checked('1', $options['sv_description']); } ?> />
  <?php
}

function cdash_sv_name_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_name]" type="checkbox" value="1" <?php if (isset($options['sv_name'])) { checked('1', $options['sv_name']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_address_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_address]" type="checkbox" value="1" <?php if (isset($options['sv_address'])) { checked('1', $options['sv_address']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_hours_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_hours]" type="checkbox" value="1" <?php if (isset($options['sv_hours'])) { checked('1', $options['sv_hours']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_map_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_map]" type="checkbox" value="1" <?php if (isset($options['sv_map'])) { checked('1', $options['sv_map']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_url_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_url]" type="checkbox" value="1" <?php if (isset($options['sv_url'])) { checked('1', $options['sv_url']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_phone_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_phone]" type="checkbox" value="1" <?php if (isset($options['sv_phone'])) { checked('1', $options['sv_phone']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_email_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_email]" type="checkbox" value="1" <?php if (isset($options['sv_email'])) { checked('1', $options['sv_email']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_logo_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_logo]" type="checkbox" value="1" <?php if (isset($options['sv_logo'])) { checked('1', $options['sv_logo']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_thumb_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_thumb]" type="checkbox" value="1" <?php if (isset($options['sv_thumb'])) { checked('1', $options['sv_thumb']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_memberlevel_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_memberlevel]" type="checkbox" value="1" <?php if (isset($options['sv_memberlevel'])) { checked('1', $options['sv_memberlevel']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}


function cdash_sv_category_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_category]" type="checkbox" value="1" <?php if (isset($options['sv_category'])) { checked('1', $options['sv_category']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_tags_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_tags]" type="checkbox" value="1" <?php if (isset($options['sv_tags'])) { checked('1', $options['sv_tags']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_social_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_social]" type="checkbox" value="1" <?php if (isset($options['sv_social'])) { checked('1', $options['sv_social']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sv_comments_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sv_comments]" type="checkbox" value="1" <?php if (isset($options['sv_comments'])) { checked('1', $options['sv_comments']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_name_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_name]" type="checkbox" value="1" <?php if (isset($options['tax_name'])) { checked('1', $options['tax_name']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_address_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_address]" type="checkbox" value="1" <?php if (isset($options['tax_address'])) { checked('1', $options['tax_address']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_hours_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_hours]" type="checkbox" value="1" <?php if (isset($options['tax_hours'])) { checked('1', $options['tax_hours']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_url_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_url]" type="checkbox" value="1" <?php if (isset($options['tax_url'])) { checked('1', $options['tax_url']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_phone_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_phone]" type="checkbox" value="1" <?php if (isset($options['tax_phone'])) { checked('1', $options['tax_phone']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_email_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_email]" type="checkbox" value="1" <?php if (isset($options['tax_email'])) { checked('1', $options['tax_email']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}


function cdash_tax_logo_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_logo]" type="checkbox" value="1" <?php if (isset($options['tax_logo'])) { checked('1', $options['tax_logo']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_thumb_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_thumb]" type="checkbox" value="1" <?php if (isset($options['tax_thumb'])) { checked('1', $options['tax_thumb']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_memberlevel_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_memberlevel]" type="checkbox" value="1" <?php if (isset($options['tax_memberlevel'])) { checked('1', $options['tax_memberlevel']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_category_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_category]" type="checkbox" value="1" <?php if (isset($options['tax_category'])) { checked('1', $options['tax_category']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_tags_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_tags]" type="checkbox" value="1" <?php if (isset($options['tax_tags'])) { checked('1', $options['tax_tags']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_social_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_social]" type="checkbox" value="1" <?php if (isset($options['tax_social'])) { checked('1', $options['tax_social']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_tax_orderby_name_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[tax_orderby_name]" type="checkbox" value="1"<?php if (isset($options['tax_orderby_name'])) { checked('1', $options['tax_orderby_name']); } ?> />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_sm_display_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[sm_display]" type="radio" value="text" <?php checked('text', $options['sm_display']); ?> /> <?php _e( 'Text links ', 'cdash' ); ?><?php _e( '(Display social media as text links)', 'cdash' ); ?><br /><br />

  <input name="cdash_directory_options[sm_display]" type="radio" value="icons" <?php checked('icons', $options['sm_display']); ?> /> <?php _e( 'Icons ', 'cdash' ); ?><?php _e( '(Display social media links as icons)', 'cdash' ); ?>
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <label><?php _e('Icon Size: ', 'cdash'); ?></label>
  <select name='cdash_directory_options[sm_icon_size]'>
  <option value='16px' <?php selected('16px', $options['sm_icon_size']); ?>>16px</option>
  <option value='32px' <?php selected('32px', $options['sm_icon_size']); ?>>32px</option>
  <option value='64px' <?php selected('64px', $options['sm_icon_size']); ?>>64px</option>
  <option value='128px' <?php selected('128px', $options['sm_icon_size']); ?>>128px</option>
</select>
<br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_currency_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <select name='cdash_directory_options[currency]'>
  <?php global $currencies;
  foreach($currencies['codes'] as $code => $currency)
  {
    echo '<option value="'.esc_attr($code).'"'.selected($options['currency'], $code, false).'>'.esc_html($currency).'</option>';
  } ?>
</select>
<br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_currency_symbol_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input type="text" size="35" name="cdash_directory_options[currency_symbol]" value="<?php if(isset($options['currency_symbol'])) { echo $options['currency_symbol']; } ?>" />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_currency_position_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input name="cdash_directory_options[currency_position]" type="radio" value="before" <?php checked('before', $options['currency_position']); ?> /><?php _e( ' Before the price', 'cdash' ); ?><br />
  <input name="cdash_directory_options[currency_position]" type="radio" value="after" <?php checked('after', $options['currency_position']); ?> /><?php _e( ' After the price', 'cdash' ); ?>
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_search_results_per_page_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input type="text" size="35" name="cdash_directory_options[search_results_per_page]" value="<?php if(isset($options['search_results_per_page'])) { echo $options['search_results_per_page']; } ?>" />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_business_listings_url_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input type="text" size="35" name="cdash_directory_options[business_listings_url]" value="<?php if(isset($options['business_listings_url'])) { echo $options['business_listings_url']; } ?>" />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_business_listings_url_text_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input type="text" size="35" name="cdash_directory_options[business_listings_url_text]" value="<?php if(isset($options['business_listings_url_text'])) { echo $options['business_listings_url_text']; } ?>" />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_google_maps_api_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input type="text" size="35" name="cdash_directory_options[google_maps_api]" value="<?php if(isset($options['google_maps_api'])) { echo $options['google_maps_api']; } ?>" />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_google_maps_server_api_render($args){
  $options = get_option('cdash_directory_options');
  ?>
  <input type="text" size="35" name="cdash_directory_options[google_maps_server_api]" value="<?php if(isset($options['google_maps_server_api'])) { echo $options['google_maps_server_api']; } ?>" />
  <br /><span class="description"><?php echo $args[0]; ?></span>
  <?php
}

function cdash_custom_fields_render($args){
  $options = get_option('cdash_directory_options');
  if(isset($options['bus_custom']) && is_array($options['bus_custom']) && array_filter($options['bus_custom']) != [] ) {
    $field_set = true;
  	$customfields = $options['bus_custom'];
  	$i = 1;
  	foreach($customfields as $field) {
       ?>
  		<div class="repeating" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
  			<?php
        cdash_custom_fields_name($field_set, $options, $i);
        cdash_custom_fields_type($field_set, $options, $i);
        cdash_custom_fields_display_dir($field_set, $options, $i);
        cdash_custom_fields_display_single($field_set, $options, $i);
        ?>
        <br />
        <a href="#" class="delete-this"><?php _e('Delete This Custom Field', 'cdash'); ?></a>
  		</div>
  		<?php $i++;
  	}
  } else {
    ?>
  	<div class="repeating" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
  		<?php cdash_custom_fields_name(false, $options, '');
            cdash_custom_fields_type(false, $options, '');
            cdash_custom_fields_display_dir(false, $options, '');
            cdash_custom_fields_display_single(false, $options, '');
       ?>
       <br />
  		<a href="#" class="delete-this"><?php _e('Delete This Custom Field', 'cdash'); ?></a>
  	</div>
  <?php } ?>
  <p><a href="#" class="repeat"><?php _e('Add Another Custom Field', 'cdash'); ?></a></p>
<?php
}


function cdash_options_section_callback(  ) {

	//echo __( 'Chamber Dashboard Business Directory Settings', 'cdash' );

}

function cdash_custom_fields_name($field_set, $options, $i){
  ?>
  <p><strong><?php _e('Custom Field Name', 'cdash'); ?></strong></p>
  <p><span style="color:#666666;margin-left:2px;"><?php _e('<strong>Note:</strong> If you change the name of an existing custom field, you will lose all data stored in that field!', 'cdash'); ?></span></p>
  <?php
  if($field_set){
  ?>
    <input type="text" size="30" name="cdash_directory_options[bus_custom][<?php echo $i; ?>][name]" value="<?php if(isset($options['bus_custom'])){ echo $options['bus_custom'][$i]['name']; } ?>" />
  <?php
  }else{
  ?>
    <input type="text" size="30" name="cdash_directory_options[bus_custom][1][name]" value="<?php if(isset($options['bus_custom'])){ echo $options['bus_custom'][1]['name']; } ?>" />
  <?php
  }
}

function cdash_custom_fields_name_new($i, $value){
  ?>
  <p><strong><?php _e('Custom Field Name', 'cdash'); ?></strong></p>
  <p><span style="color:#666666;margin-left:2px;"><?php _e('<strong>Note:</strong> If you change the name of an existing custom field, you will lose all data stored in that field!', 'cdash'); ?></span></p>
  <input type="text" size="30" name="cdash_directory_options[bus_custom][<?php echo $i; ?>][name]" value="<?php echo $value; ?>" />
  <?php
}

function cdash_custom_fields_type($field_set, $options, $i){
  if($field_set){
    ?>
    <p><strong><?php _e('Custom Field Type'); ?></strong></p>
      <select name='cdash_directory_options[bus_custom][<?php echo $i; ?>][type]'>
        <option value=''></option>
        <option value='text' <?php selected('text', $options['bus_custom'][$i]['type']); ?>><?php _e('Short Text Field', 'cdash'); ?></option>
        <option value='textarea' <?php selected('textarea', $options['bus_custom'][$i]['type']); ?>><?php _e('Multi-line Text Area', 'cdash'); ?></option>
      </select>
    <?php
  }else{
    ?>
    <p><strong><?php _e('Custom Field Type'); ?></strong></p>
      <select name='cdash_directory_options[bus_custom][1][type]'>
        <option value=''></option>
        <option value='text' <?php if(isset($options['bus_custom'][1]['type']) == "text" ){echo "selected='selected'";}  ?>><?php _e('Short Text Field', 'cdash'); ?></option>
        <option value='textarea' <?php if(isset($options['bus_custom'][1]['type']) == "textarea" ){echo "selected='selected'";} ?>><?php _e('Multi-line Text Area', 'cdash'); ?></option>
      </select>
    <?php
  }
}

function cdash_custom_fields_display_dir($field_set, $options, $i){
  if($field_set){
    ?>
    <p><strong><?php _e('Display in Business Directory?', 'cdash'); ?></strong></p>
    <?php $field['display_dir'] = ""; ?>
      <label><input name="cdash_directory_options[bus_custom][<?php echo $i; ?>][display_dir]" type="radio" value="yes" <?php checked('yes', $options['bus_custom'][$i]['display_dir'], true ); ?> /><?php _e('Yes', 'cdash'); ?></label><br />
      <label><input name="cdash_directory_options[bus_custom][<?php echo $i; ?>][display_dir]" type="radio" value="no" <?php checked('no', $options['bus_custom'][$i]['display_dir'], true); ?> /><?php _e('No', 'cdash'); ?></label><br />
    <?php
  }else{
    ?>
    <p><strong><?php _e('Display in Business Directory?', 'cdash'); ?></strong></p>
      <label><input name="cdash_directory_options[bus_custom][1][display_dir]" type="radio" value="yes" /> <?php _e('Yes', 'cdash'); ?></label><br />
      <label><input name="cdash_directory_options[bus_custom][1][display_dir]" type="radio" value="no" /><?php _e('No', 'cdash'); ?></label><br />
    <?php
  }
}

function cdash_custom_fields_display_single($field_set, $options, $i){
  if($field_set){
    ?>
    <p><strong><?php _e('Display in Single Business View?', 'cdash'); ?></strong></p>
    <?php $field['display_single'] = ""; ?>
      <label><input name="cdash_directory_options[bus_custom][<?php echo $i; ?>][display_single]" type="radio" value="yes" <?php checked('yes', $options['bus_custom'][$i]['display_single']); ?> /><?php _e('Yes', 'cdash'); ?></label><br />
      <label><input name="cdash_directory_options[bus_custom][<?php echo $i; ?>][display_single]" type="radio" value="no" <?php checked('no', $options['bus_custom'][$i]['display_single']); ?> /><?php _e('No', 'cdash'); ?></label><br />
    <?php
  }else{
    ?>
    <p><strong><?php _e('Display in Single Business View?', 'cdash'); ?></strong></p>
      <label><input name="cdash_directory_options[bus_custom][1][display_single]" type="radio" value="yes" /><?php _e('Yes', 'cdash'); ?></label><br />
      <label><input name="cdash_directory_options[bus_custom][1][display_single]" type="radio" value="yes" /><?php _e('No', 'cdash'); ?></label><br />
    <?php
  }
}





//Check if license page exists in the CD admin menu
function cdash_license_page(){
	if ( empty ( $GLOBAL['admin_page_hooks']['chamber_dashboard_license'] ) ){
		add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Licenses', 'Licenses', 'manage_options', 'chamber_dashboard_license', 'cdash_about_screen' );
	}
}

//Creating the custom hook for adding the license page
function cdash_add_licence_page_menu_hook(){
  do_action('cdash_add_licence_page_menu_hook');
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: add_action('admin_menu', 'cdash_add_options_page');
// ------------------------------------------------------------------------------

// Add menu page
/*function cdash_add_options_page(){
  add_menu_page(
		'Chamber Dashboard',
		'Chamber Dashboard',
		'manage_options',
		'/chamber-dashboard-business-directory/options.php',
		'cdash_render_form',
		plugin_dir_url( __FILE__ ) . '/images/cdash-settings.png',
		85
	);

  add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Addons', 'Addons', 'manage_options', 'chamber_dashboard_addons', 'cdash_about_screen' );

  $license_url = get_admin_url() . 'admin.php?page=cdash-about&tab=chamber_dashboard_license';
  $plugins = cdash_get_active_plugin_list();
      if( in_array( 'cdash-recurring-payments.php', $plugins ) || in_array('cdash-member-updater.php', $plugins) || in_array('cdash-exporter.php', $plugins) || in_array('cdash-crm-importer.php', $plugins) || in_array('cdash-member-manager-pro.php', $plugins) || in_array( 'cdash-wc-payments.php', $plugins ) ) {
          add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Licenses', 'Licenses', 'manage_options', 'chamber_dashboard_license', 'cdash_about_screen' );
      }
      add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Support', 'Support', 'manage_options', 'chamber_dashboard_support', 'cdash_about_screen' );
}*/


function cdash_add_options_page() {
	add_menu_page(
		'Chamber Dashboard',
		'Chamber Dashboard',
		'manage_options',
		'/chamber-dashboard-business-directory/options.php',
		'cdash_render_form',
		plugin_dir_url( __FILE__ ) . '/images/cdash-settings.png',
		85
	);
  add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Directory Settings', 'Directory Settings', 'manage_options', 'chamber-dashboard-business-directory/options.php', 'cdash_render_form' );
	add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Export Directory', 'Export Directory', 'manage_options', 'chamber-dashboard-export', 'cdash_export_form' );
	add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Directory Import', 'Directory Import', 'manage_options', 'chamber-dashboard-import', 'cdash_import_form' );

    add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Addons', 'Addons', 'manage_options', 'chamber_dashboard_addons', 'cdash_about_screen' );
		//add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Licenses', 'Licenses', 'manage_options', 'chamber_dashboard_license', 'chamber_dashboard_licenses_page_render' );
    $license_url = get_admin_url() . 'admin.php?page=cdash-about&tab=chamber_dashboard_license';
    $plugins = cdash_get_active_plugin_list();
        if( in_array( 'cdash-recurring-payments.php', $plugins ) || in_array('cdash-member-updater.php', $plugins) || in_array('cdash-exporter.php', $plugins) || in_array('cdash-crm-importer.php', $plugins) || in_array('cdash-member-manager-pro.php', $plugins) || in_array( 'cdash-wc-payments.php', $plugins ) ) {
            add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Licenses', 'Licenses', 'manage_options', 'chamber_dashboard_license', 'cdash_about_screen' );
        }
				//cdash_add_licence_page_menu_hook();

	add_submenu_page( '/chamber-dashboard-business-directory/options.php', 'Support', 'Support', 'manage_options', 'chamber_dashboard_support', 'cdash_about_screen' );

	// this is a hidden submenu page for updating geolocation data
	add_submenu_page( NULL, 'Update Geolocation Data', 'Update Geolocation Data', 'manage_options', 'chamber-dashboard-update-geolocation', 'cdash_update_geolocation_data_page' );
}


// ------------------------------------------------------------------------------
// CALLBACK FUNCTION SPECIFIED IN: add_options_page()
// ------------------------------------------------------------------------------
// THIS FUNCTION IS SPECIFIED IN add_options_page() AS THE CALLBACK FUNCTION THAT
// ACTUALLY RENDER THE PLUGIN OPTIONS FORM AS A SUB-MENU UNDER THE EXISTING
// SETTINGS ADMIN MENU.
// ------------------------------------------------------------------------------

// Render the Plugin options form
function cdash_render_form() {
	?>
	<div class="wrap">

		<!-- Display Plugin Icon, Header, and Description -->
		<h1><img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/cdash-32.png'?>"><?php _e('Chamber Dashboard Business Directory Settings', 'cdash'); ?></h1>


		<div id="main" style="width:90%; min-width:350px; float:left;">
      <div class="cdash_column_left">
        <form method="post" action="options.php">
  				<?php settings_fields('cdash_plugin_options');
                do_settings_sections('cdash_plugin_options');
                submit_button();
          ?>
  				<?php $options = get_option('cdash_directory_options'); ?>

  			</form>
      </div><!--end of left_column-->
      <div class="cdash_sidebar">
        <?php cdash_settings_sidebar();

         ?>
      </div><!--end of sidebar-->
			<!-- Beginning of the Plugin Options Form -->


			<script type="text/javascript">
			// Add a new repeating section
			var attrs = ['for', 'id', 'name'];
			function resetAttributeNames(section, idx) {
			    //var tags = section.find('input, label, select'), idx = section.index();
          var tags = section.find('input, label, select');
          //alert("Section Index idx: " + idx);
			    tags.each(function() {
			      var $this = jQuery(this);
			      jQuery.each(attrs, function(i, attr) {
			        var attr_val = $this.attr(attr);
			        if (attr_val) {
			            $this.attr(attr, attr_val.replace(/\[bus_custom\]\[\d+\]\[/, '\[bus_custom\]\['+(idx + 1)+'\]\['));
			        }
			      })
			    })
			}

			jQuery('.repeat').click(function(e){
			        e.preventDefault();
			        var lastRepeatingGroup = jQuery('.repeating').last();
              var idx = jQuery('.repeating').length;

              //Saving the value of the radio buttons from the last repeating section
              var displayDirName = "cdash_directory_options[bus_custom]["+idx+"][display_dir]";
              var display_dir = jQuery("input[name='"+displayDirName+"']:checked").val();

              var displaySingleName = "cdash_directory_options[bus_custom]["+idx+"][display_single]";
              var display_single = jQuery("input[name='"+displaySingleName+"']:checked").val();

              //Clone the lastRepeatingGroup
              var cloned = lastRepeatingGroup.clone(true);

			        cloned.insertAfter(lastRepeatingGroup);

              //Clearing out the values in the newly cloned section
			        cloned.find("input[type=text]").val("");
			        cloned.find("select").val("");
              cloned.find('input[type=radio]').removeAttr('checked');
			        resetAttributeNames(cloned, idx);

              //Resetting the values of the radio buttons in the previous section
              jQuery("input[name='"+displayDirName+"']").filter("[value="+display_dir+"]").attr("checked", true);
              jQuery("input[name='"+displaySingleName+"']").filter("[value="+display_single+"]").attr("checked", true);
			    });

			jQuery('.delete-this').click(function(e){
				e.preventDefault();
			    jQuery(this).parent('div').remove();
			});

			</script>


		</div><!-- #main -->
	</div><!--end of wrap-->

	<?php
}



// Sanitize and validate input. Accepts an array, return a sanitized array.
function cdash_validate_options($input) {
	// delete the old custom fields
	delete_option('cdash_directory_options');
	$input['bus_phone_type'] =  wp_filter_nohtml_kses($input['bus_phone_type']);
	$input['bus_email_type'] =  wp_filter_nohtml_kses($input['bus_email_type']);
	if( isset( $input['currency_symbol'] ) ) {
		$input['currency_symbol'] =  wp_filter_nohtml_kses($input['currency_symbol']);
	}

  if( isset( $input['business_listings_url'] ) ) {
		$input['business_listings_url'] =  esc_url_raw($input['business_listings_url']);
	}

  if( isset( $input['business_listings_url_text'] ) ) {
		$input['business_listings_url_text'] =  wp_filter_nohtml_kses($input['business_listings_url_text']);
	}

  if( isset( $input['cdash_default_thumb'] ) ){
    $input['cdash_default_thumb'] = esc_url_raw( cdash_sanitize_image( $input['cdash_default_thumb'] ) );
  }
	return $input;
}

function cdash_sanitize_image( $input ){

    /* default output */
    $output = '';

    /* check file type */
    $filetype = wp_check_filetype( $input );
    $mime_type = $filetype['type'];

    /* only mime type "image" allowed */
    if ( strpos( $mime_type, 'image' ) !== false ){
        $output = $input;
    }

    return $output;
}

// Display a Settings link on the main Plugins page
function cdash_plugin_action_links( $links, $file ) {

	if ( $file == plugin_basename( __FILE__ ) ) {
		$cdash_links = '<a href="'.get_admin_url().'options-general.php?page=chamber-dashboard-business-directory/options.php">'.__('Settings').'</a>';
		// make the 'Settings' link appear first
		array_unshift( $links, $cdash_links );
	}

	return $links;
}

add_action( 'admin_init', 'cdash_watch_for_export' );
function cdash_watch_for_export() {
	if( isset( $_POST['cdash_export'] ) && 'cdash_do_export' == $_POST['cdash_export'] ) {
		require_once( dirname(__FILE__) . '/export.php' );
		cdash_simple_export();
        exit();
	}
}
function cdash_export_form() {

	$export_form =
		'<p>' . __( 'Click the button below to download a CSV file of all of your businesses.', 'cdash' ) . '</p>
		<form method="post" action="' . admin_url( 'admin.php?page=chamber-dashboard-export') . '">
		<input type="hidden" name="cdash_export" value="cdash_do_export">
		<input type="submit" class="button-primary" value="' . __( 'Download CSV', 'cdash' ) . '">
		</form>
		<p>' . __( 'This free export feature can only export limited information about businesses.  If you want to export more information, or export people or businesses, try the <a href="' . admin_url( 'admin.php?page=chamber-dashboard-addons' ) . '" >Chamber Dashboard Exporter</a>.', 'cdash' );

	$export_form = apply_filters( 'cdash_export_form', $export_form );

	$export_page =
		'<div class="wrap">
			<div class="icon32" id="icon-options-general"><br></div>
			<h1>' . __( 'Export', 'cdash' ) . '</h1>' .
			$export_form .
		'</div>';

	echo $export_page;
}

function cdash_import_form() { ?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
			<h1><?php _e('Import', 'cdash'); ?></h1>
			<h3><?php _e( 'Import Businesses', 'cdash' ); ?></h3>
			<p><?php _e('Chamber Dashboard Business Directory plugin includes a free import feature. You can import businesses from a CSV file.  First, you must format the CSV properly.  Your CSV must have the following columns in the following order, even if some of the columns are empty: <ul><li>Business Name</li><li>Description</li><li>Category (separate multiple with semicolons)</li><li>Membership Level (separate multiple with semicolons)</li><li>Location Name</li><li>Address</li><li>City</li><li>State</li><li>Zip</li><li>Country</li><li>Business Hours</li><li>URL</li><li>Phone (separate multiple with semicolons)</li><li>Email (separate multiple with semicolons)</li></ul>', 'cdash'); ?></p>
			<p><?php _e( 'Some programs format CSV files differently.  You might need to use either Google Drive or Open Office to save your CSV file so that it will upload correctly. Visit our <a href="https://chamberdashboard.com/documentation/" target="_blank">documentation</a> pages for more information.', 'cdash' ); ?></p>
			<p><a href="<?php echo plugin_dir_url( __FILE__ ); ?>cdash-import-sample.zip"><?php _e('Download a sample CSV to see how to format your file.', 'cdash'); ?></a></p>
			<?php wp_import_upload_form('admin.php?page=chamber-dashboard-import'); ?>
	<?php

		$args =  array(
			'post_type' => 'business'
		);
		$query = new WP_Query($args);

		?>
		</div>

	<?php $file = wp_import_handle_upload();

	if(isset($file['file'])) {

		$row = 0;
		$header_row = [];
		if (($handle = fopen($file['file'], "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				 //print_r($data);

		    	if($row == 0) {
		    		// Don't do anything with the header row
		    		$row++;
		    		continue;
		    	} else {
		    		$row++;
					// Get the post data
					$businessinfo = array (
						'post_type'     => 'business',
						'post_title'    => sanitize_text_field($data[0]),
						'post_content' 	=> $data[1],
						'post_status'   => 'publish',
						);
					// Create a business
					$newbusiness = wp_insert_post($businessinfo, true);
					// Add business categories
					if(isset($data[2])) {
						$categories = explode(';', $data[2]);
						wp_set_object_terms( $newbusiness, $categories, 'business_category' );
					}

					// Add membership levels
					if(isset($data[3])) {
						$levels = explode(';', $data[3]);
						wp_set_object_terms( $newbusiness, $levels, 'membership_level' );
					}

					// add a serialised array for wpalchemy to work - see http://www.2scopedesign.co.uk/wpalchemy-and-front-end-posts/
					$fields = array('_cdash_location');
					$str = $fields;
					update_post_meta( $newbusiness, 'buscontact_meta_fields', $str );

					// Get all the phone numbers and put them in the array format wpalchemy expects
					$numbers = array();
					if(isset($data[12]) && !empty($data[12])) {
						$tempnums = explode(';', $data[12]);
						foreach ($tempnums as $number) {
							$numbers[]['phonenumber'] = $number;
						}
					} else {
						$numbers = '';
					}

					// Get all the email addresses and put them in the array format wpalchemy expects
					$emails = array();
					if(isset($data[13]) && !empty($data[13])) {
						$tempmails = explode(';', $data[13]);
						foreach ($tempmails as $email) {
							$emails[]['emailaddress'] = $email;
						}
					} else {
						$emails = '';
					}

					// Get the geolocation data
					if( isset( $data[5] ) ) {
						// ask Google for the latitude and longitude
						$rawaddress = $data[5];
						if( isset( $data[6] ) ) {
							$rawaddress .= ' ' . $data[6];
						}
						if( isset( $data[7] ) ) {
							$rawaddress .= ' ' . $data[7];
						}
						if( isset( $data[8] ) ) {
							$rawaddress .= ' ' . $data[8];
						}
						$address = urlencode( $rawaddress );
                        $json = wp_remote_get(cdash_get_google_map_url($address));
						$json = json_decode($json['body'], true);
						if( is_array( $json ) && $json['status'] == 'OK') {
							$latitude = $json['results'][0]['geometry']['location']['lat'];
							$longitude = $json['results'][0]['geometry']['location']['lng'];
						}
					}

					// Create the array of location information for wpalchemy
					$locationfields = array(
							array(
							'altname' 	=> $data[4],
							'address'	=> $data[5],
							'city'		=> $data[6],
							'state'		=> $data[7],
							'zip'		=> $data[8],
              'country'   => $data[9],
              'hours'     => $data[10],
							'latitude'	=> $latitude,
							'longitude'	=> $longitude,
							'url'		=> $data[11],
							'phone'		=> $numbers,
							'email'		=> $emails,
							)
						);

					// Add all of the post meta data in one fell swoop
					add_post_meta( $newbusiness, '_cdash_location', $locationfields );
				}
		    }
		    $success = $row - 1;
		    echo "<p style='font-size:1.2em;'>" . $success . " businesses successfully imported!</p>";
		    fclose($handle);
		}
	}

	do_action( 'cdash_importer' );
}

?>
