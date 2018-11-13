<?php
/**
 * Demo Name: Estore Default
 * Demo URI: http://demo.themegrill.com/estore/
 * Description: Estore Default demo pack for ThemeGrill Official theme.
 * Version: 1.0.0
 * Template: estore
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
	$demo_config['estore-free'] = array(
		'name'                   => __( 'eStore', 'estore' ),
		'theme'                  => 'eStore',
		'template'               => 'estore',
		'demo_url'               => 'https://demo.themegrill.com/estore/',
		'demo_pack'              => true,
		'core_options'           => array(
			'blogname'       => 'eStore',
			'page_on_front'  => 'Front Page',
			'page_for_posts' => 'Blog',
		),
		'widgets_data_update'    => array(

			/**
			 * Dropdown Pages - Handles widgets Page ID.
			 *
			 * 1. estore_about
			 */
			'dropdown_pages'      => array(
				'estore_about' => array(
					3 => array(
						'page_id' => 'Multicolor & Multipurpose Woocommerce Theme',
					),
				),
			),

			/**
			 * Dropdown Categories - Handles widgets Category ID.
			 *
			 * A. Core Post Category:
			 *    1. estore_featured_posts_widget
			 *    2. estore_featured_posts_carousel_widget
			 *
			 * B. WooCommerce Product Category:
			 *    1. estore_woocommerce_product_slider
			 *    2. estore_woocommerce_vertical_promo_widget
			 *    3. estore_woocommerce_product_grid
			 *    4. estore_woocommerce_full_width_promo_widget
			 *    5. estore_woocommerce_product_carousel
			 *
			 * Note: Supported Taxonomy:
			 *    A. Core Post Category - category
			 *    B. WooCommerce Product Category - product_cat
			 */
			'dropdown_categories' => array(
				'category'    => array(
					'estore_featured_posts_widget'          => array(
						3 => array(
							'category' => 'Featured Posts',
						),
					),
					'estore_featured_posts_carousel_widget' => array(
						2 => array(
							'category' => 'Hand picked collection',
						),
					),
				),
				'product_cat' => array(
					'estore_woocommerce_product_slider'          => array(
						3 => array(
							'category' => 'Slider',
						),
					),
					'estore_woocommerce_vertical_promo_widget'   => array(
						2 => array(
							'cat_id0' => 'Watch collection',
							'cat_id1' => 'Shoe Collection',
						),
					),
					'estore_woocommerce_product_grid'            => array(
						4 => array(
							'category' => 'Men Collection',
						),
						5 => array(
							'category' => 'Women Collection',
						),
					),
					'estore_woocommerce_full_width_promo_widget' => array(
						3 => array(
							'cat_id0' => 'Kid Collection',
							'cat_id1' => 'Teen Collection',
							'cat_id2' => 'Adult Collection',
						),
					),
					'estore_woocommerce_product_carousel'        => array(
						2 => array(
							'source'   => 'Certain Category',
							'category' => 'Featured Product Collection',
						),
					),
				),
			),
		),
		'customizer_data_update' => array(
			'nav_menu_locations' => array(
				'primary'   => 'Main Menu',
				'secondary' => 'Category',
			),
		),
		'plugins_list'           => array(
			'woocommerce'   => array(
				'name'     => 'WooCommerce',
				'slug'     => 'woocommerce/woocommerce.php',
				'required' => true,
			),
			'everest-forms' => array(
				'name'     => 'Everest Forms – Easy Contact Form and Form Builder',
				'slug'     => 'everest-forms/everest-forms.php',
				'required' => true,
			),
		),
	);

	return $demo_config;
}

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );
