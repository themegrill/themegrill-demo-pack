<?php
/**
 * Demo Name: Ample Free
 * Demo URI: https://demo.themegrill.com/ample/
 * Description: Ample Free demo pack for ThemeGrill Official theme.
 * Version: 1.0.0
 * Template: spacious
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
function ample_demo_importer_config( $demo_config ) {
	$demo_config['ample-free'] = array(
		'name'         => 'Ample Free',
		'theme'        => 'Ample',
		'template'     => 'ample',
		'demo_url'     => 'https://demo.themegrill.com/ample/',
		'demo_pack'    => true,
		'core_options' => array(
			'blogname'       => 'Ample',
			'page_on_front'  => 'Business',
			'page_for_posts' => 'Blog',
		),
		'widgets_data_update' => array(

			/**
			 * Dropdown Categories - Handles widgets Category ID.
			 *
			 *   1. ample_portfolio_widget
			 *
			 */
			'dropdown_categories' => array(
				'category' => array(
					'ample_portfolio_widget' => array(
						3 => array(
							'category' => 'Portfolio'
						)
					),
				),
			),

			/**
			 * Dropdown Pages - Handles widgets Page ID.
			 *
			 * 1. ample_service_widget
			 */
			'dropdown_pages' => array(
				'ample_service_widget' => array(
					2 => array(
						'page_id1' => 'Active Support',
						'page_id3' => 'Responsive Design',
						'page_id5' => 'Robust Features',
					),
				),
			),
		),
		'customizer_data_update' => array(
			'nav_menu_locations' => array(
				'primary' => 'Primary',
				'footer'  => 'Footer',
			),
		),
		'plugins_list' => array(
			'woocommerce' => array(
				'name'     => 'WooCommerce',
				'slug'     => 'woocommerce/woocommerce.php',
				'required' => false,
			),
			'breadcrumb-navxt' => array(
				'name'     => 'Breadcrumb NavXT',
				'slug'     => 'breadcrumb-navxt/breadcrumb-navxt.php',
				'required' => false,
			),
			'google-maps-widget' => array(
				'name'     => 'Google Maps Widget',
				'slug'     => 'google-maps-widget/google-maps-widget.php',
				'required' => false,
			),
			'contact-form-7' => array(
				'name'     => 'Contact Form 7',
				'slug'     => 'contact-form-7/wp-contact-form-7.php',
				'required' => false,
			),
		),
	);

	return $demo_config;
}
add_filter( 'themegrill_demo_importer_config', 'ample_demo_importer_config' );
