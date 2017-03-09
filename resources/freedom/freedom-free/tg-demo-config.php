<?php
/**
 * Demo Name: Freedom Free
 * Demo URI: https://demo.themegrill.com/freedom/
 * Description: Freedom Free demo pack for ThemeGrill Official theme.
 * Version: 1.0.0
 * Template: freedom
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
function freedom_demo_importer_config( $demo_config ) {
	$demo_config['freedom-free'] = array(
		'name'         => 'Freedom Free',
		'theme'        => 'Freedom',
		'template'     => 'freedom',
		'demo_url'     => 'https://demo.themegrill.com/freedom/',
		'demo_pack'    => true,
		'core_options' => array(
			'blogname'       => 'Freedom',
		),
		
		'customizer_data_update' => array(
			'nav_menu_locations' => array(
				'primary' => 'Main Menu',
			),
		),
		'plugins_list' => array(
			'contact-form-7' => array(
				'name'     => 'Contact Form 7',
				'slug'     => 'contact-form-7/wp-contact-form-7.php',
				'required' => false,
			),
		),
	);

	return $demo_config;
}
add_filter( 'themegrill_demo_importer_config', 'freedom_demo_importer_config' );
