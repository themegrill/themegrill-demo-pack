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
		'cenote-fashion' => array(
			'name'                   => 'Cenote Fashion Demo',
			'theme'                  => 'Cenote',
			'template'               => 'cenote',
			'demo_url'               => 'https://demo.themegrill.com/cenote-fashion/',
			'demo_pack'              => true,
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'tg-menu-primary'    => 'primary',
					'tg-menu-header-top' => 'header top',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'cenote' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),
	);

	return array_merge( $new_demo_config, $demo_config );
}

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );
