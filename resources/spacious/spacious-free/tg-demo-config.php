<?php
/**
 * Demo Name: Spacious Free
 * Demo URI: http://demo.themegrill.com/spacious/
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
	$demo_config['spacious-free'] = array(
		'name'                   => 'Spacious Free',
		'theme'                  => 'Spacious',
		'template'               => 'spacious',
		'demo_url'               => 'http://demo.themegrill.com/spacious/',
		'demo_pack'              => true,
		'core_options'           => array(
			'blogname'       => 'Spacious',
			'page_on_front'  => 'Business Template',
			'page_for_posts' => 'Blog',
		),
		'widgets_data_update'    => array(

			/**
			 * Dropdown Pages - Handles widgets Page ID.
			 *
			 * 1. spacious_service_widget
			 * 2. spacious_featured_single_page_widget
			 * 3. spacious_recent_work_widget
			 */
			'dropdown_pages' => array(
				'spacious_service_widget'              => array(
					2 => array(
						'page_id0' => 'Super Fast Loading',
						'page_id1' => 'Responsive Design',
						'page_id2' => 'Awesome Support',
					),
				),
				'spacious_featured_single_page_widget' => array(
					2 => array(
						'page_id' => 'Just Arrived',
					),
				),
				'spacious_recent_work_widget'          => array(
					2 => array(
						'page_id0' => 'Recent Work Skateboard',
						'page_id1' => 'Recent Work Spectacle',
						'page_id2' => 'Recent Work Camera',
					),
				),
			),
		),
		'customizer_data_update' => array(
			'nav_menu_locations' => array(
				'primary' => 'Primary',
				'footer'  => 'Footer Menu',
			),
		),
		'plugins_list'           => array(
			'everest-forms'                => array(
				'name'     => 'Everest Forms – Easy Contact Form and Form Builder',
				'slug'     => 'everest-forms/everest-forms.php',
				'required' => true,
			),
			'woocommerce'                  => array(
				'name'     => 'WooCommerce',
				'slug'     => 'woocommerce/woocommerce.php',
				'required' => false,
			),
			'recent-posts-widget-extended' => array(
				'name'     => 'Recent Posts Widget Extended',
				'slug'     => 'recent-posts-widget-extended/rpwe.php',
				'required' => false,
			),
		),
	);

	return $demo_config;
}

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );
