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
function tg_demo_importer_config( $demo_config ) {
	$new_demo_config = array(
		'radiate-free' => array(
			'name'                   => 'Radiate',
			'theme'                  => 'Radiate',
			'template'               => 'radiate',
			'demo_url'               => 'https://demo.themegrill.com/radiate/',
			'demo_pack'              => true,
			'core_options'           => array(
				'blogname' => 'Radiate',
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Main',
				),
			),
			'plugins_list'           => array(
				'everest-forms' => array(
					'name'     => 'Everest Forms – Easy Contact Form and Form Builder',
					'slug'     => 'everest-forms/everest-forms.php',
					'required' => true,
				),
			),
		),
	);

	return array_merge( $new_demo_config, $demo_config );
}

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );
