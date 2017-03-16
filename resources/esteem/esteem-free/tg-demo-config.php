<?php
/**
 * Demo Name: Esteem Free
 * Demo URI: https://demo.themegrill.com/esteem/
 * Description: Esteem Free demo pack for ThemeGrill Official theme.
 * Version: 1.0.0
 * Template: esteem
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Setup demo importer config.
 *
 * @param  array $demo_config
 * @return arrayesteem_demo_importer_config
 */
function esteem_demo_importer_config( $demo_config ) {
	$demo_config['esteem-free'] = array(
		'name'         => 'Esteem Free',
		'theme'        => 'Esteem',
		'template'     => 'esteem',
		'demo_url'     => 'https://demo.themegrill.com/esteem/',
		'demo_pack'    => true,
		'core_options' => array(
			'blogname'       => 'Esteem',
			'page_on_front'  => 'Business',
			'page_for_posts' => 'Blog',
		),
		'widgets_data_update' => array(
			/**
			 * Dropdown Pages - Handles widgets Page ID.
			 *
			 * 1. esteem_service_widget
			 * 2. esteem_recent_work_widget
			 */
			'dropdown_pages' => array(
				'esteem_service_widget' => array(
					2 => array(
						'page_id0' => 'Responsive Design',
						'page_id1' => 'Retina Ready',
						'page_id2' => 'Elegant Design',
					),
				),
				'esteem_recent_work_widget' => array(
					2 => array(
						'page_id0' => 'Theme Options',
						'page_id1' => 'SEO Optimized',
						'page_id2' => 'Featured Slider',
						'page_id3' => 'Business layout',
					),
				),
			),
		),
		'customizer_data_update' => array(
			'nav_menu_locations' => array(
				'primary' => 'Primary',
			),
		),
		'plugins_list' => array(
			'contact-form-7' => array(
				'name'     => 'Contact Form 7',
				'slug'     => 'contact-form-7/wp-contact-form-7.php',
				'required' => false,
			),
			'breadcrumb-navxt' => array(
				'name'     => 'Breadcrumb NavXT',
				'slug'     => 'breadcrumb-navxt/breadcrumb-navxt.php',
				'required' => false,
			),
		),
	);

	return $demo_config;
}
add_filter( 'themegrill_demo_importer_config', 'esteem_demo_importer_config' );
