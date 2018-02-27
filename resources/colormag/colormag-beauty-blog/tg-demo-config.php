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
function colormag_beauty_blog_demo_importer_config( $demo_config ) {
	$new_demo_config = array(
		'colormag-beauty-blog' => array(
			'name'                   => __( 'ColorMag Beauty Blog', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-beauty-blog/',
			'demo_pack'              => true,
			'theme'                  => 'ColorMag',
			'template'               => 'colormag',
			'core_options'           => array(
				'blogname'      => 'ColorMag Beauty Blog',
				'page_on_front' => 'Home',
			),
			'elementor_data_update'  => array(
				'home'      => array(
					'post_title'  => 'Home',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Grid-3'  => array(
								10 => 'News',
							),
							'ColorMag-Posts-Block-2' => array(
								5 => 'Hair',
								6 => 'Fashion',
								8 => 'Health',
								9 => 'Eye Make up',
							),
							'ColorMag-Posts-Block-6' => array(
								10 => 'News',
							),
						),
					),
				),
				'make-up'   => array(
					'post_title'  => 'Make Up',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								9 => 'Eye Make up',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								4 => 'Product',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'hair'      => array(
					'post_title'  => 'Hair',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								5 => 'Hair',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								4 => 'Product',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'products'  => array(
					'post_title'  => 'Products',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								4 => 'Product',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								4 => 'Product',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'lifestyle' => array(
					'post_title'  => 'Lifestyle',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-6' => array(
								4 => 'Product',
								2 => 'Food &amp; Drinks',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'food'      => array(
					'post_title'  => 'Food',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								2 => 'Food &amp; Drinks',
							),
							'ColorMag-Posts-Block-6' => array(
								4 => 'Product',
								2 => 'Food &amp; Drinks',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'health'    => array(
					'post_title'  => 'Health',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								8 => 'Health',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								4 => 'Product',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'fashion'   => array(
					'post_title'  => 'Fashion',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								6 => 'Fashion',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								4 => 'Product',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'tips'      => array(
					'post_title'  => 'Tips',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								7 => 'Beauty Tips',
							),
							'ColorMag-Posts-Block-6' => array(
								4 => 'Product',
								2 => 'Food &amp; Drinks',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'news'      => array(
					'post_title'  => 'News',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								10 => 'News',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								7 => 'Beauty Tips',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary',
				),
			),
			'plugins_list'           => array(
				'required'    => array(
					'elementor' => array(
						'name' => __( 'Elementor', 'colormag' ),
						'slug' => 'elementor/elementor.php',
					),
				),
				'recommended' => array(
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),
	);

	return array_merge( $new_demo_config, $demo_config );
}

add_filter( 'themegrill_demo_importer_config', 'colormag_beauty_blog_demo_importer_config' );

/**
 * Delete the `Hello world!` post after successful demo import
 */
function colormag_beauty_blog_delete_post_import() {
	$page = get_page_by_title( 'Hello world!', OBJECT, 'post' );

	if ( is_object( $page ) && $page->ID ) {
		wp_delete_post( $page->ID, true );
	}
}

add_filter( 'themegrill_ajax_demo_imported', 'colormag_beauty_blog_delete_post_import' );

/**
 * Set categories color settings in theme customizer.
 *
 * Note: Used rarely, if theme_mod keys are based on term ID.
 *
 * @param  array $data
 * @param  array $demo_data
 * @param  string $demo_id
 *
 * @return array
 */
function colormag_beauty_blog_set_cat_colors_free( $data, $demo_data, $demo_id ) {
	$cat_colors    = array();
	$cat_prevent   = array();
	$wp_categories = array();

	// Format the data based on demo ID.
	switch ( $demo_id ) {
		case 'colormag-beauty-blog':
			$wp_categories = array(
				2  => 'Food & Drinks',
				4  => 'Product',
				5  => 'Hair',
				6  => 'Fashion',
				7  => 'Beauty Tips',
				8  => 'Health',
				9  => 'Eye Make up',
				10 => 'News',
			);
			break;
	}

	// Fetch categories color settings.
	foreach ( $wp_categories as $term_id => $term_name ) {
		if ( ! empty( $data['mods'][ 'colormag_category_color_' . $term_id ] ) ) {
			$cat_colors[ 'colormag_category_color_' . $term_id ] = $data['mods'][ 'colormag_category_color_' . $term_id ];
		}
	}

	// Set categories color settings properly.
	foreach ( $wp_categories as $term_id => $term_name ) {
		if ( ! empty( $data['mods'][ 'colormag_category_color_' . $term_id ] ) ) {
			$term  = get_term_by( 'name', $term_name, 'category' );
			$color = $cat_colors[ 'colormag_category_color_' . $term_id ];

			if ( is_object( $term ) && $term->term_id ) {
				$cat_prevent[]                                               = $term->term_id;
				$data['mods'][ 'colormag_category_color_' . $term->term_id ] = $color;

				// Prevent deleting stored color settings.
				if ( ! in_array( $term_id, $cat_prevent ) ) {
					unset( $data['mods'][ 'colormag_category_color_' . $term_id ] );
				}
			}
		}
	}

	return $data;
}

add_filter( 'themegrill_customizer_demo_import_settings', 'colormag_beauty_blog_set_cat_colors_free', 20, 3 );
