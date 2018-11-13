<?php
/**
 * Demo Name: Flash Default
 * Demo URI: http://demo.themegrill.com/flash/
 * Description: Flash Default demo pack for ThemeGrill Official theme.
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
function tg_demo_importer_config( $demo_config ) {
	$demo_config['flash-default'] = array(
		'name'                          => __( 'Flash Default', 'flash' ),
		'theme'                         => 'Flash',
		'template'                      => 'flash',
		'demo_url'                      => 'https://demo.themegrill.com/flash/',
		'demo_pack'                     => true,
		'core_options'                  => array(
			'blogname'       => 'Flash',
			'page_on_front'  => 'Home',
			'page_for_posts' => 'Blog',
		),
		'siteorigin_panels_data_update' => array(
			'homepage' => array(
				'post_title'  => 'Home',
				'data_update' => array(
					'grids_data'   => array(
						4 => array(
							'style' => array(
								'background_image_attachment' => 'CALL-TO-ACTION.jpg',
							)
						),
						6 => array(
							'style' => array(
								'background_image_attachment' => 'fun-facts-bg.jpg',
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
							'category'      => array(
								'FT_Widget_Blog' => array(
									15 => array(
										'category' => 'Blog'
									)
								),
							),
							'portfolio_cat' => array(
								'FT_Widget_Portfolio' => array(
									5 => array(
										'categories' => 'portfolio'
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
				'primary' => 'Menu',
				'social'  => 'Social',
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
			'woocommerce'       => array(
				'name'     => 'WooCommerce',
				'slug'     => 'woocommerce/woocommerce.php',
				'required' => false,
			),
		),
	);

	return $demo_config;
}

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );
