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

  //Business Directory Shortcode rendering
  if ( function_exists( 'register_block_type' ) ) {
      // Hook server side rendering into render callback
	register_block_type(
        'cdash-bd-blocks/business-directory', [
            'render_callback' => 'cdash_bus_directory_block_callback',
            'attributes'  => array(
                'format'    => array(
                    'type'  => 'string',
                    'default'   => 'list',
                ),
                'category'    => array(
                    'type'  => 'string',
                    'default'   => '',
                ),
                'tags'    => array(
                    'type'  => 'string',
                    'default'   => '',
                ),
                'level'    => array(
                    'type'  => 'string',
                    'default'   => '',
                ),
                'text'    => array(
                    'type'  => 'string',
                    'default'   => 'excerpt',
                ),
                'display'    => array(
                    'type'  => 'string',
                    'default'   => '',
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
                'status'    => array(
                    'type'  => 'string',
                    'default'   => '',
                ),
                'image_size'    => array(
                    'type'  => 'string',
                    'default'   => '',
                ),
                'alpha'    => array(
                    'type'  => 'string',
                    'default'   => 'no',
                ),
                'logo_gallery'    => array(
                    'type'  => 'string',
                    'default'   => 'no',
                ),
                'show_category_filter'    => array(
                    'type'  => 'string',
                    'default'   => 'no',
                ),
            ),
        ]
    );
  }

  function cdash_bus_directory_block_callback($attributes){
    extract( $attributes );

    $business_listings = cdash_business_directory_shortcode($attributes);

    return $business_listings;
    
    //return sprintf( $shortcode_string, $format, $category, $tags, $level, $text, $display, $single_link, $perpage, $orderby, $order, $image, $status, $image_size, $alpha, $logo_gallery, $show_category_filter );
  }
?>