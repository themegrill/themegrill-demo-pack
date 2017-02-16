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
