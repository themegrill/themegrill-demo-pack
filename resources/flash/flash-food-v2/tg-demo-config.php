<?php
/**
 * Demo Name: Flash Food V2
 * Demo URI: http://demo.themegrill.com/flash-food-v2/
 * Description: Flash Food V2 demo pack for ThemeGrill Official theme.
 * Version: 1.0.0
 * Template: flash
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Setup demo importer config.
 *
 * @param  array $demo_config
 * @return array
 */
function flash_food_demo_importer_config( $demo_config ) {
	$demo_config['flash-food-v2'] = array(
		'name'         => 'Flash Food V2',
		'theme'        => 'Flash',
		'template'     => 'flash',
		'demo_url'     => 'http://demo.themegrill.com/flash-food-v2/',
		'demo_pack'    => true,
		'core_options' => array(
			'blogname'       => 'Flash Food V2',
			'page_on_front'  => 'Home',
			'page_for_posts' => 'Blog',
		),
		'siteorigin_panels_data_update' => array(
			'homepage' => array(
				'post_title'  => 'Home',
				'data_update' => array(
					'grids_data'  => array(
						0 => array(
							'style' => array(
								'background_image_attachment' => 'Untitled-1.jpg',
							)
						),
						1 => array(
							'style' => array(
								'background_image_attachment' => 'about-image.jpg',
							)
						),
						2 => array(
							'style' => array(
								'background_image_attachment' => 'background.jpg',
							)
						),
						3 => array(
							'style' => array(
								'background_image_attachment' => 'background-1.jpg',
							)
						),
						4 => array(
							'style' => array(
								'background_image_attachment' => 'How-Much-Do-You-Hate-the-Sound-of-People-Chewing.jpg',
							)
						),
					),
				),
			),
		),
		'customizer_data_update' => array(
			'nav_menu_locations' => array(
				'primary' => 'Primary Menu',
			)
		),
      'restaurantpress_data_update' => array(
         'food_group' => array(
            'Meats &amp; Seafoods' => array(
               1  => 'Meats &amp; Seafoods'
            ),
            'Desserts' => array(
               1  => 'Desserts'
            ),
            'Lunch' => array(
               1  => 'Lunch'
            ),
            'Drinks' => array(
               1  => 'Drinks'
            ),
            'Breakfast' => array(
               1  => 'Breakfast'
            ),
            'Today&apos;s Special' => array(
               1  => 'Today&apos;s Special'
            )
         )
      ),
		'plugins_list' => array(
			'flash-toolkit' => array(
				'name'     => 'Flash Toolkit',
				'slug'     => 'flash-toolkit/flash-toolkit.php',
				'required' => true,
			),
			'siteorigin-panels' => array(
				'name'     => 'Page Builder by SiteOrigin',
				'slug'     => 'siteorigin-panels/siteorigin-panels.php',
				'required' => true,
			),
			'restaurantpress' => array(
				'name'     => 'RestaurantPress',
				'slug'     => 'restaurantpress/restaurantpress.php',
				'required' => false,
			),
			'contact-form-7' => array(
				'name'     => 'Contact Form',
				'slug'     => 'contact-form-7/contact-form-7.php',
				'required' => false,
			),
		),
	);

	return $demo_config;
}
add_filter( 'themegrill_demo_importer_config', 'flash_food_demo_importer_config' );

/**
 * Update taxonomies ids for restaurantpress
 * @param  string $demo_id
 * @param  array $demo_data
 */
function restaurantpress_data_update( $demo_id, $demo_data ) {
   if ( ! empty( $demo_data['restaurantpress_data_update'] ) ) {
      foreach ( $demo_data['restaurantpress_data_update'] as $data_type => $data_value ) {
         $data = [];
         switch ( $data_type ) {
            case 'food_group':
               foreach ($data_value as $group_name => $taxonomy_values) {
                  $group = get_page_by_title( $group_name, OBJECT, $data_type );
                  foreach ($taxonomy_values as $option_key => $taxonomy) {
                        $term = get_term_by( 'name', $taxonomy, 'food_menu_cat' );
                        if ( is_object( $term ) && $term->term_id ) {
                           $data[] = $term->term_id;
                        }
                  }
                  update_post_meta($group->ID,'food_grouping',$data);
                  unset($data);
               }
            break;
         }
      }
   }
}
add_action( 'themegrill_ajax_demo_imported', 'restaurantpress_data_update', 10, 2 );
