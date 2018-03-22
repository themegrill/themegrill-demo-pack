<?php
/**
 * Functions for configuring demo importer.
 *
 * @author   ThemeGrill
 * @category Admin
 * @package  Importer/Functions
 * @version  1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Setup demo importer config.
 *
 * @param  array $demo_config
 *
 * @return array
 */
function masonic_demo_importer_config( $demo_config ) {
	$new_demo_config = array(
		'masonic-free' => array(
			'name'                   => 'Masonic',
			'theme'                  => 'Masonic',
			'template'               => 'masonic',
			'demo_url'               => 'https://demo.themegrill.com/masonic/',
			'demo_pack'              => true,
			'core_options'           => array(
				'blogname' => 'Masonic',
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary Menu',
				),
			),
			'plugins_list'           => array(
				'recent-posts-widget-extended' => array(
					'name'     => 'Recent Posts Widget Extended',
					'slug'     => 'recent-posts-widget-extended/rpwe.php',
					'required' => false,
				),
				'everest-forms'                => array(
					'name'     => 'Everest Forms – Easy Contact Form and Form Builder',
					'slug'     => 'everest-forms/everest-forms.php',
					'required' => true,
				),
			),
		),
	);

	return array_merge( $new_demo_config, $demo_config );
}

add_filter( 'themegrill_demo_importer_config', 'masonic_demo_importer_config' );
