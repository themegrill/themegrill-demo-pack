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
		'accelerate-free' => array(
			'name'                   => 'Accelerate',
			'theme'                  => 'Accelerate',
			'template'               => 'accelerate',
			'demo_url'               => 'http://demo.themegrill.com/accelerate/',
			'demo_pack'              => true,
			'core_options'           => array(
				'blogname'       => 'Accelerate',
				'page_on_front'  => 'Business Page',
				'page_for_posts' => 'Blog',
			),
			'widgets_data_update'    => array(

				/**
				 * Dropdown Pages - Handles widgets Page ID.
				 *
				 * 1. accelerate_featured_single_page_widget
				 * 2. accelerate_image_service_widget
				 * 3. accelerate_recent_work_widget
				 */
				'dropdown_pages' => array(
					'accelerate_featured_single_page_widget' => array(
						2 => array(
							'page_id' => 'About Us',
						),
					),
					'accelerate_image_service_widget'        => array(
						2 => array(
							'page_id0' => 'Clean Code',
							'page_id1' => 'Cool Design',
							'page_id2' => 'Nice Support',
						),
					),
					'accelerate_recent_work_widget'          => array(
						3 => array(
							'page_id0' => 'Nice Shoes',
							'page_id1' => 'Sky Diving',
							'page_id2' => 'Jumping Girl',
							'page_id3' => 'Sea Diving',
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
		),
	);

	return array_merge( $new_demo_config, $demo_config );
}

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );
