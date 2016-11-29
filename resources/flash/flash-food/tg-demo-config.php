<?php
/**
 * Demo Name: Flash Food
 * Demo URI: http://demo.themegrill.com/flash-food/
 * Description: Flash Food demo pack for ThemeGrill Official theme.
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
	$demo_config['flash-food'] = array(
		'name'         => __( 'Flash Food', 'flash' ),
		'demo_url'     => 'http://demo.themegrill.com/flash-food/',
		'demo_pack'    => true,
		'core_options' => array(
			'blogname'       => 'Flash Food',
			'page_on_front'  => 'Home',
			'page_for_posts' => 'Blog',
		),
		'siteorigin_panels_data_update' => array(
			'homepage' => array(
				'post_title'  => 'Home',
				'data_update' => array(

					/**
					 * Dropdown Categories - Handles widgets Category ID.
					 *
					 * A. Core Post Category:
					 *    1. themegrill_flash_portfolio
					 *    2. themegrill_flash_blog
					 *
					 * Note: Supported Taxonomy:
					 *    A. Core Post Category - category
					 */
					'dropdown_categories' => array(
						'portfolio_cat' => array(
							'FT_Widget_Portfolio' => array(
								5 => array(
									'categories' => 'All category'
								)
							),
						),
						'category' => array (
							'FT_Widget_Blog' => array(
								8 => array(
									'category' => 'Blog'
								)
							),
						),
					)
				)
			)
		),
		'customizer_data_update' => array(
			'nav_menu_locations' => array(
				'primary'	=> 'Primary',
				'social'	=> 'Social',
				'footer'	=> 'Footer Menu',
			)
		),
		'plugins_list' => array(
			'required' => array(
				'siteorigin-panels' => array(
					'name' => __( 'Page Builder by SiteOrigin', 'flash' ),
					'slug' => 'siteorigin-panels/siteorigin-panels.php',
				),
				'flash-toolkit' => array(
					'name' => __( 'Flash Toolkit', 'flash' ),
					'slug' => 'flash-toolkit/flash-toolkit.php',
				),
			),
			'recommended' => array(
				'contact-form-7' => array(
					'name' => __( 'Contact Form', 'flash' ),
					'slug' => 'contact-form-7/contact-form-7.php',
				),
			)
		)
	);

	return $demo_config;
}
add_filter( 'themegrill_demo_importer_config', 'flash_food_demo_importer_config' );
