<?php
/**
 * Demo Name: Spacious Blog
 * Demo URI: http://demo.themegrill.com/spacious-blog/
 * Description: Spacious Free demo pack for ThemeGrill Official theme.
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
	$demo_config['spacious-blog'] = array(
		'name'                   => 'Spacious Blog',
		'theme'                  => 'Spacious',
		'template'               => 'spacious',
		'demo_url'               => 'http://demo.themegrill.com/spacious-blog/',
		'demo_pack'              => true,
		'core_options'           => array(
			'blogname'      => 'Spacious Blog',
			'page_on_front' => 'Home',
		),
		'customizer_data_update' => array(
			'nav_menu_locations' => array(
				'primary' => 'primary',
			),
		),
		'plugins_list'           => array(
			'elementor'        => array(
				'name'     => 'Elementor',
				'slug'     => 'elementor/elementor.php',
				'required' => true,
			),
			'spacious-toolkit' => array(
				'name'     => 'Spacious Toolkit',
				'slug'     => 'spacious-toolkit/spacious-toolkit.php',
				'required' => true,
			),
			'everest-forms'    => array(
				'name'     => 'Everest Forms – Easy Contact Form and Form Builder',
				'slug'     => 'everest-forms/everest-forms.php',
				'required' => true,
			),
		),
	);

	return $demo_config;
}

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );
