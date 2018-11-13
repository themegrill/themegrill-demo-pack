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
 *
 * @return array
 */
function tg_demo_importer_config( $demo_config ) {
	$demo_config['ample-free'] = array(
		'name'                   => 'Ample Free',
		'theme'                  => 'Ample',
		'template'               => 'ample',
		'demo_url'               => 'https://demo.themegrill.com/ample/',
		'demo_pack'              => true,
		'core_options'           => array(
			'blogname'       => 'Ample',
			'page_on_front'  => 'Business',
			'page_for_posts' => 'Blog',
		),
		'widgets_data_update'    => array(

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
							'category' => 'Portfolio',
						),
					),
				),
			),

			/**
			 * Dropdown Pages - Handles widgets Page ID.
			 *
			 * 1. ample_service_widget
			 */
			'dropdown_pages'      => array(
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
		'plugins_list'           => array(
			'everest-forms'      => array(
				'name'     => 'Everest Forms – Easy Contact Form and Form Builder',
				'slug'     => 'everest-forms/everest-forms.php',
				'required' => true,
			),
			'woocommerce'        => array(
				'name'     => 'WooCommerce',
				'slug'     => 'woocommerce/woocommerce.php',
				'required' => false,
			),
			'breadcrumb-navxt'   => array(
				'name'     => 'Breadcrumb NavXT',
				'slug'     => 'breadcrumb-navxt/breadcrumb-navxt.php',
				'required' => false,
			),
			'google-maps-widget' => array(
				'name'     => 'Google Maps Widget',
				'slug'     => 'google-maps-widget/google-maps-widget.php',
				'required' => false,
			),
		),
	);

	return $demo_config;
}

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );

/**
 * Set categories checkbox to hide from blog page settings in theme customizer.
 *
 * Note: Used rarely, if `ample_option` keys are based on term ID.
 *
 * @param  array  $data
 * @param  array  $demo_data
 * @param  string $demo_id
 *
 * @return array
 */
function tg_ample_set_cat_hide( $data, $demo_data, $demo_id ) {
	// Format the data based on demo ID.
	switch ( $demo_id ) {
		case 'ample-free':
			$wp_categories = array(
				5 => 'Portfolio',
			);
			break;
	}

	// Fetch categories selected and assign it to new category generated on demo import.
	foreach ( $wp_categories as $term_id => $term_name ) {
		if ( ! empty( $data['options']['ample[ample_hide_category]'] ) ) {
			$term = get_term_by( 'name', $term_name, 'category' );
			if ( is_object( $term ) && $term->term_id ) {
				$data['options']['ample[ample_hide_category]'] = $term->term_id;
			}
		}
	}

	return $data;
}

add_filter( 'themegrill_customizer_demo_import_settings', 'tg_ample_set_cat_hide', 20, 3 );
