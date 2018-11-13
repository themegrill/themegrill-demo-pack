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
		'colormag-dark' => array(
			'name'                   => __( 'ColorMag Dark', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-dark/',
			'demo_pack'              => true,
			'theme'                  => 'ColorMag',
			'template'               => 'colormag',
			'core_options'           => array(
				'blogname'      => 'ColorMag Dark',
				'page_on_front' => 'Home',
			),
			'elementor_data_update'  => array(
				'home'          => array(
					'post_title'  => 'Home',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-1' => array(
								9  => 'Fashion',
								11 => 'News',
							),
							'ColorMag-Posts-Block-4' => array(
								10 => 'Food &amp; Health',
							),
							'ColorMag-Posts-Block-6' => array(
								4 => 'Travel',
								6 => 'World',
								7 => 'Technology',
							),
							'ColorMag-Posts-Grid-5'  => array(
								8 => 'Entertainment',
							),
						),
					),
				),
				'entertainment' => array(
					'post_title'  => 'Entertainment',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								8 => 'Entertainment',
							),
							'ColorMag-Posts-Block-4' => array(
								8 => 'Entertainment',
							),
						),
					),
				),
				'fashion'       => array(
					'post_title'  => 'Fashion',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								9 => 'Fashion',
							),
							'ColorMag-Posts-Block-4' => array(
								9 => 'Fashion',
							),
						),
					),
				),
				'food-health'   => array(
					'post_title'  => 'Food & Health',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								10 => 'Food &amp; Health',
							),
							'ColorMag-Posts-Block-4' => array(
								10 => 'Food &amp; Health',
							),
						),
					),
				),
				'news'          => array(
					'post_title'  => 'News',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								2 => 'Politics',
								3 => 'Sports',
								6 => 'World',
							),
						),
					),
				),
				'politics'      => array(
					'post_title'  => 'Politics',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								2 => 'Politics',
							),
							'ColorMag-Posts-Block-4' => array(
								2 => 'Politics',
							),
						),
					),
				),
				'sports'        => array(
					'post_title'  => 'Sports',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								3 => 'Sports',
							),
							'ColorMag-Posts-Block-4' => array(
								3 => 'Sports',
							),
						),
					),
				),
				'technology'    => array(
					'post_title'  => 'Technology',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								7 => 'Technology',
							),
							'ColorMag-Posts-Block-4' => array(
								7 => 'Technology',
							),
						),
					),
				),
				'travel'        => array(
					'post_title'  => 'Travel',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								4 => 'Travel',
							),
							'ColorMag-Posts-Block-4' => array(
								4 => 'Travel',
							),
						),
					),
				),
				'world'         => array(
					'post_title'  => 'World',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								6 => 'World',
							),
							'ColorMag-Posts-Block-4' => array(
								6 => 'World',
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
				'required' => array(
					'elementor'     => array(
						'name' => __( 'Elementor', 'colormag' ),
						'slug' => 'elementor/elementor.php',
					),
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

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );

/**
 * Delete the `Hello world!` post after successful demo import
 */
function colormag_dark_delete_post_import() {
	$page = get_page_by_title( 'Hello world!', OBJECT, 'post' );

	if ( is_object( $page ) && $page->ID ) {
		wp_delete_post( $page->ID, true );
	}
}

add_filter( 'themegrill_ajax_demo_imported', 'colormag_dark_delete_post_import' );

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
function colormag_dark_set_cat_colors_free( $data, $demo_data, $demo_id ) {
	$cat_colors    = array();
	$cat_prevent   = array();
	$wp_categories = array();

	// Format the data based on demo ID.
	switch ( $demo_id ) {
		case 'colormag-dark':
			$wp_categories = array(
				2  => 'Politics',
				3  => 'Sports',
				4  => 'Travel',
				6  => 'World',
				7  => 'Technology',
				8  => 'Entertainment',
				9  => 'Fashion',
				10 => 'Food &amp; Health',
				11 => 'News',
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

add_filter( 'themegrill_customizer_demo_import_settings', 'colormag_dark_set_cat_colors_free', 20, 3 );
