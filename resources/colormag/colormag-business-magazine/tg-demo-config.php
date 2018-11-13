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
		'colormag-business-magazine' => array(
			'name'                   => __( 'ColorMag Business Magazine', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-business-magazine/',
			'demo_pack'              => true,
			'theme'                  => 'ColorMag',
			'template'               => 'colormag',
			'core_options'           => array(
				'blogname'      => 'ColorMag Business Magazine',
				'page_on_front' => 'Home',
			),
			'elementor_data_update'  => array(
				'home'             => array(
					'post_title'  => 'Home',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Grid-5'  => array(
								6 => 'Employment',
							),
							'ColorMag-Posts-Block-1' => array(
								5 => 'Corporate',
							),
							'ColorMag-Posts-Block-4' => array(
								8 => 'Money',
							),
							'ColorMag-Posts-Block-6' => array(
								4 => 'Investments',
							),
							'ColorMag-Posts-Block-9' => array(
								9 => 'Market',
							),
						),
					),
				),
				'corporate'        => array(
					'post_title'  => 'Corporate',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								5 => 'Corporate',
							),
						),
					),
				),
				'global-trade'     => array(
					'post_title'  => 'Global Trade',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								14 => 'Global Trade',
							),
						),
					),
				),
				'companies'        => array(
					'post_title'  => 'Companies',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								15 => 'Companies',
							),
						),
					),
				),
				'entrepreneurship' => array(
					'post_title'  => 'Entrepreneurship',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								16 => 'Entrepreneurship',
							),
						),
					),
				),
				'employment'       => array(
					'post_title'  => 'Employment',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								6 => 'Employment',
							),
						),
					),
				),
				'investment'       => array(
					'post_title'  => 'Investment',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								4 => 'Investments',
							),
						),
					),
				),
				'market'           => array(
					'post_title'  => 'Market',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								9 => 'Market',
							),
						),
					),
				),
				'money'            => array(
					'post_title'  => 'Money',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								8 => 'Money',
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
function colormag_business_magazine_delete_post_import() {
	$page = get_page_by_title( 'Hello world!', OBJECT, 'post' );

	if ( is_object( $page ) && $page->ID ) {
		wp_delete_post( $page->ID, true );
	}
}

add_filter( 'themegrill_ajax_demo_imported', 'colormag_business_magazine_delete_post_import' );

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
function colormag_business_magazine_set_cat_colors_free( $data, $demo_data, $demo_id ) {
	$cat_colors    = array();
	$cat_prevent   = array();
	$wp_categories = array();

	// Format the data based on demo ID.
	switch ( $demo_id ) {
		case 'colormag-business-magazine':
			$wp_categories = array(
				4  => 'Investments',
				5  => 'Corporate',
				6  => 'Employment',
				8  => 'Money',
				9  => 'Market',
				14 => 'Global Trade',
				15 => 'Companies',
				16 => 'Entrepreneurship',
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

add_filter( 'themegrill_customizer_demo_import_settings', 'colormag_business_magazine_set_cat_colors_free', 20, 3 );
