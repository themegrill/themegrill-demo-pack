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

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );

/**
 * Setup demo importer config.
 *
 * @param  array $demo_config
 *
 * @return array
 */
function tg_demo_importer_config( $demo_config ) {
	$new_demo_config = array(
		'suffice-free' => array(
			'name'                   => 'Suffice',
			'theme'                  => 'Suffice',
			'template'               => 'suffice',
			'demo_url'               => 'http://demo.themegrill.com/suffice/',
			'demo_pack'              => true,
			'core_options'           => array(
				'blogname'       => 'Suffice',
				'page_on_front'  => 'Home',
				'page_for_posts' => 'Blog',
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary',
					'social'  => 'Social Menu',
					'footer'  => 'Footer Menu',
				)
			),
			'plugins_list'           => array(
				'suffice-toolkit'   => array(
					'name'     => 'Suffice Toolkit',
					'slug'     => 'suffice-toolkit/suffice-toolkit.php',
					'required' => true,
				),
				'siteorigin-panels' => array(
					'name'     => 'Page Builder by SiteOrigin',
					'slug'     => 'siteorigin-panels/siteorigin-panels.php',
					'required' => true,
				),
				'everest-forms'     => array(
					'name'     => 'Everest Forms - Easy Contact Form and Form Builder',
					'slug'     => 'everest-forms/everest-forms.php',
					'required' => true,
				),
			),
		),
	);

	return array_merge( $new_demo_config, $demo_config );
}
