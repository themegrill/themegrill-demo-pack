<?php
/**
 * Demo Name: Flash Construction
 * Demo URI: http://demo.themegrill.com/flash-construction/
 * Description: Flash Construction demo pack for ThemeGrill Official theme.
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
function flash_construction_demo_importer_config( $demo_config ) {
	$demo_config['flash-construction'] = array(
		'name'         => __( 'Flash Construction', 'flash' ),
		'template'     => 'flash',
		'demo_url'     => 'http://demo.themegrill.com/flash-construction/',
		'demo_pack'    => true,
		'core_options' => array(
			'blogname'       => 'Flash Construction',
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
								17 => array(
									'categories' => 'works'
								)
							),
						),
						'category' => array (
							'FT_Widget_Blog' => array(
								21 => array(
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
				'primary'	=> 'Main',
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
add_filter( 'themegrill_demo_importer_config', 'flash_construction_demo_importer_config' );
