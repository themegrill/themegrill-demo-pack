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
		'himalayas-free' => array(
			'name'                   => 'Himalayas',
			'theme'                  => 'Himalayas',
			'template'               => 'himalayas',
			'demo_url'               => 'https://demo.themegrill.com/himalayas/',
			'demo_pack'              => true,
			'core_options'           => array(
				'blogname'       => 'Himalayas',
				'page_on_front'  => 'Front Page',
				'page_for_posts' => 'Blog',
			),
			'widgets_data_update'    => array(

				/**
				 * Dropdown Pages - Handles widgets Page ID.
				 *
				 * 1. himalayas_about_us_widget
				 * 2. himalayas_contact_widget
				 */
				'dropdown_pages' => array(
					'himalayas_about_us_widget' => array(
						2 => array(
							'page_id' => 'Want to try it?',
						),
					),
					'himalayas_contact_widget'  => array(
						2 => array(
							'page_id' => 'Contact Us Now',
						),
					),
				),
			),
			'customizer_data_update' => array(
				'pages'              => array(
					'himalayas_slide1' => 'Best Clean Parallax Theme',
					'himalayas_slide2' => 'Himalayas Welcome You',
				),
				'nav_menu_locations' => array(
					'primary' => 'Main Menu',
					'footer'  => 'Social Menu',
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
