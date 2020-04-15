<?php
function cdash_block_category( $categories, $post ) {
    return array_merge(
      $categories,
      array(
        array(
          'slug' => 'cd-blocks',
          'title' => __( 'Chamber Dashboard Blocks', 'cdash' ),
        ),
      )
    );
  }
  add_filter( 'block_categories', 'cdash_block_category', 10, 2);

  //add custom css in the in the editor
  function cdash_block_editor_css(){
    wp_enqueue_style(
        'cdash_bd_editor_styles',
        plugins_url( './css/cdash_block_editor.css', dirname(__FILE__) ),
        array()
     );
  }
  add_action( 'enqueue_block_editor_assets', 'cdash_block_editor_css' );

  //Business Directory Shortcode rendering
  if ( function_exists( 'register_block_type' ) ) {
      // Hook server side rendering into render callback
	register_block_type(
        'cdash-bd-blocks/business-directory', [
            'render_callback' => 'cdash_bus_directory_block_callback',
            'attributes'  => array(
                'cd_block'  => array(
                    'type'  => 'string',
                    'default' => 'yes',
                ),
                'postLayout'    => array(
                    'type'  => 'string',
                    'default'   => 'list',
                ),
                'format'    => array(
                    'type'  => 'string',
                    'default'   => 'list',
                ),
                'categoryArray'    => array(
                    'type'  => 'array',
                    'default'   => [],
                    'items'   => [
                        'type' => 'string',
                    ],
                ),
                'category'    => array(
                    'type'  => 'string',
                    'default'   => '',
                ),
                'tags'    => array(
                    'type'  => 'string',
                    'default'   => '',
                ),
                'membershipLevelArray'    => array(
                    'type'  => 'array',
                    'default'   => [],
                    'items'   => [
                        'type' => 'string',
                    ],
                ),
                'level'    => array(
                    'type'  => 'string',
                    'default'   => '',
                ),
                'displayPostContent'=> array(
                    'type'  => 'boolean',
                    'default'   => 'true',
                ),
                'text'    => array(
                    'type'  => 'string',
                    'default'   => 'excerpt',
                ),
                'display'    => array(
                    'type'  => 'string',
                    'default'   => '',
                ),
                'singleLinkToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'true',
                ),
                'single_link'    => array(
                    'type'  => 'string',
                    'default'   => 'yes',
                ),
                'perpage'    => array(
                    'type'  => 'number',
                    'default'   => -1,
                ),
                'orderby'    => array(
                    'type'  => 'string',
                    'default'   => 'title',
                ),
                'order'    => array(
                    'type'  => 'string',
                    'default'   => 'asc',
                ),
                'image'    => array(
                    'type'  => 'string',
                    'default'   => 'logo',
                ),
                'membershipStatusArray'    => array(
                    'type'  => 'array',
                    'default'   => [],
                    'items'   => [
                        'type' => 'string',
                    ],
                ),
                'status'    => array(
                    'type'  => 'string',
                    'default'   => '',
                ),
                'image_size'    => array(
                    'type'  => 'string',
                    'default'   => '',
                ),
                'alphaToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'alpha'    => array(
                    'type'  => 'string',
                    'default'   => 'no',
                ),
                'logoGalleryToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'logo_gallery'    => array(
                    'type'  => 'string',
                    'default'   => 'no',
                ),
                'categoryFilterToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'show_category_filter'    => array(
                    'type'  => 'string',
                    'default'   => 'no',
                ),
                'displayAddressToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'displayUrlToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'displayPhoneToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'displayEmailToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'displayLocationNameToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'displayCategoryToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'displayLevelToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'displaySocialMediaLinkToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'displaySocialMediaIconsToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'displayLocationToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
                'displayHoursToggle'    => array(
                    'type'  => 'boolean',
                    'default'   => 'false',
                ),
            ),
        ]
    );
  }

  function cdash_set_display_options($attributes, $displayOptions, $toggle_name, $string_value){
    if(isset($attributes[$toggle_name]) && $attributes[$toggle_name] === true){
        array_push($displayOptions, $string_value);
    }
    return $displayOptions;
 }

  function cdash_bus_directory_block_callback($attributes){
    
    $displayOptions = [];
 
    $displayOptions = cdash_set_display_options($attributes, $displayOptions, 'displayAddressToggle', 'address');
    $displayOptions = cdash_set_display_options($attributes, $displayOptions, 'displayUrlToggle', 'url');
    $displayOptions = cdash_set_display_options($attributes, $displayOptions, 'displayPhoneToggle', 'phone');
    $displayOptions = cdash_set_display_options($attributes, $displayOptions, 'displayEmailToggle', 'email');
    $displayOptions = cdash_set_display_options($attributes, $displayOptions, 'displayLocationNameToggle', 'location_name');
    $displayOptions = cdash_set_display_options($attributes, $displayOptions, 'displayCategoryToggle', 'category');
    $displayOptions = cdash_set_display_options($attributes, $displayOptions, 'displayLevelToggle', 'level');
    $displayOptions = cdash_set_display_options($attributes, $displayOptions, 'displaySocialMediaLinkToggle', 'social_media_links');
    $displayOptions = cdash_set_display_options($attributes, $displayOptions, 'displaySocialMediaIconsToggle', 'social_media_icons');
    $displayOptions = cdash_set_display_options($attributes, $displayOptions, 'displayLocationToggle', 'location');
    $displayOptions = cdash_set_display_options($attributes, $displayOptions, 'displayHoursToggle', 'hours');
    //cd_debug("Display Options Array 1: " . print_r($displayOptions, true));
    //cd_debug("Display Options Array 2: " . print_r($displayOptions, true));

    $attributes['display'] = implode(',', $displayOptions);
    //cd_debug("Display: ". $attributes['display']);


    if(isset($attributes['categoryArray']) && '' != $attributes['categoryArray']){
		$attributes['category'] = $attributes['categoryArray'];
    }

    if(isset($attributes['membershipLevelArray']) && '' != $attributes['membershipLevelArray']){
		$attributes['level'] = $attributes['membershipLevelArray'];
    }

    if(isset($attributes['membershipStatusArray']) && '' != $attributes['membershipStatusArray']){
		$attributes['status'] = implode(',', $attributes['membershipStatusArray']);
    }

    $business_listings = cdash_business_directory_shortcode($attributes);

    return $business_listings;

  }
?>