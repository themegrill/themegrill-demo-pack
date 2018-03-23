<?php
/**
 * Demo Name: Flash OnePage
 * Demo URI: http://demo.themegrill.com/flash-one-page/
 * Description: Flash One Page demo pack for ThemeGrill Official theme.
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
 *
 * @return array
 */
function flash_one_page_demo_importer_config_free( $demo_config ) {
	$demo_config['flash-onepage'] = array(
		'name'                          => 'Flash OnePage',
		'theme'                         => 'Flash',
		'template'                      => 'flash',
		'demo_url'                      => 'http://demo.themegrill.com/flash-one-page/',
		'demo_pack'                     => true,
		'core_options'                  => array(
			'blogname'       => 'Flash One Page',
			'page_on_front'  => 'Home',
			'page_for_posts' => 'Blog',
		),
		'siteorigin_panels_data_update' => array(
			'homepage' => array(
				'post_title'  => 'Home',
				'data_update' => array(
					'grids_data'   => array(
						2 => array(
							'style' => array(
								'background_image_attachment' => 'cta.jpg',
							)
						),
						5 => array(
							'style' => array(
								'background_image_attachment' => 'face.jpg',
							)
						),
					),
					'widgets_data' => array(

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
									4 => array(
										'categories' => 'portfolio'
									)
								),
							),
							'category'      => array(
								'FT_Widget_Blog' => array(
									8 => array(
										'category' => 'building'
									)
								),
							),
						)
					)
				)
			)
		),
		'customizer_data_update'        => array(
			'nav_menu_locations' => array(
				'primary' => 'Primary Menu',
			)
		),
		'plugins_list'                  => array(
			'flash-toolkit'     => array(
				'name'     => 'Flash Toolkit',
				'slug'     => 'flash-toolkit/flash-toolkit.php',
				'required' => true,
			),
			'siteorigin-panels' => array(
				'name'     => 'Page Builder by SiteOrigin',
				'slug'     => 'siteorigin-panels/siteorigin-panels.php',
				'required' => true,
			),
			'everest-forms'     => array(
				'name'     => 'Everest Forms – Easy Contact Form and Form Builder',
				'slug'     => 'everest-forms/everest-forms.php',
				'required' => true,
			),
		),
	);

	return $demo_config;
}

add_filter( 'themegrill_demo_importer_config', 'flash_one_page_demo_importer_config_free' );
