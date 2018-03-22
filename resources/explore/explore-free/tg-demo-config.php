<?php
/**
 * Demo Name: Explore Free
 * Demo URI: https://demo.themegrill.com/explore/
 * Description: Explore Free demo pack for ThemeGrill Official theme.
 * Version: 1.0.0
 * Template: explore
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
function explore_demo_importer_config( $demo_config ) {
	$demo_config['explore-free'] = array(
		'name'         => 'Explore Free',
		'theme'        => 'Explore',
		'template'     => 'explore',
		'demo_url'     => 'https://demo.themegrill.com/explore/',
		'demo_pack'    => true,
		'core_options' => array(
			'blogname'       => 'Explore',
			'page_on_front'  => 'Front Page',
			'page_for_posts' => 'Blog',
		),

		'widgets_data_update' => array(

			/**
			 * Dropdown Pages - Handles widgets Page ID.
			 *
			 * 1. explore_service_widget
			 */
			'dropdown_pages' => array(
				'explore_service_widget' => array(
					2 => array(
						'page_id0' => 'Clean Design',
						'page_id1' => 'Solid Coding',
						'page_id2' => 'Awesome Support',
					),
				),
			),
		),

		'customizer_data_update' => array(
			'nav_menu_locations' => array(
				'social'  => 'Social Menu',
				'primary' => 'Primary Menu',
			),
		),
		'plugins_list'           => array(
			'everest-forms' => array(
				'name'     => 'Everest Forms – Easy Contact Form and Form Builder',
				'slug'     => 'everest-forms/everest-forms.php',
				'required' => true,
			),
		),
	);

	return $demo_config;
}

add_filter( 'themegrill_demo_importer_config', 'explore_demo_importer_config' );
