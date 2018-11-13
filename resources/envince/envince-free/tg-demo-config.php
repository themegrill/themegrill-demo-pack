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
		'envince-free' => array(
			'name'                          => 'Envince',
			'theme'                         => 'Envince',
			'template'                      => 'envince',
			'demo_url'                      => 'https://demo.themegrill.com/envince/',
			'demo_pack'                     => true,
			'core_options'                  => array(
				'blogname'      => 'Envince',
				'page_on_front' => 'Home',
			),
			'siteorigin_panels_data_update' => array(
				'homepage' => array(
					'post_title'  => 'Home',
					'data_update' => array(
						'widgets_data' => array(

							/**
							 * Dropdown Categories - Handles widgets Category ID.
							 *
							 * A. Core Post Category:
							 *    1. envince_featured_posts_slider_widget
							 *    2. envince_twocol_posts
							 *      3. envince_imagegrid_posts
							 *
							 * Note: Supported Taxonomy:
							 *    A. Core Post Category - category
							 */
							'dropdown_categories' => array(
								'category' => array(
									'envince_featured_posts_slider_widget' => array(
										0 => array(
											'category' => 'Featured'
										)
									),
									'envince_twocol_posts'                 => array(
										1 => array(
											'category' => 'Photography'
										)
									),
									'envince_imagegrid_posts'              => array(
										2 => array(
											'category' => 'Life'
										)
									),
									'envince_onecol_posts'                 => array(
										4 => array(
											'category' => 'Games'
										),
										6 => array(
											'category' => 'Programming'
										),
										7 => array(
											'category' => 'Animals'
										),
										8 => array(
											'category' => 'World News'
										)
									),
								),
							)
						)
					)
				)
			),
			'customizer_data_update'        => array(
				'nav_menu_locations' => array(
					'primary'       => 'Main',
					'social-header' => 'Social',
					'social-footer' => 'Social',
				)
			),
			'plugins_list'                  => array(
				'siteorigin-panels' => array(
					'name'     => 'Page Builder by SiteOrigin',
					'slug'     => 'siteorigin-panels/siteorigin-panels.php',
					'required' => true,
				),
				'everest-forms'     => array(
					'name'     => 'Everest Forms – Easy Contact Form and Form Builder',
					'slug'     => 'everest-forms/everest-forms.php',
					'required' => true,
				)
			),
		),
	);

	return array_merge( $new_demo_config, $demo_config );
}

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );

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
function envince_set_cat_colors_free( $data, $demo_data, $demo_id ) {
	$cat_colors    = array();
	$cat_prevent   = array();
	$wp_categories = array();

	// Format the data based on demo ID.
	switch ( $demo_id ) {
		case 'envince-free':
			$wp_categories = array(
				3 => 'Life',
				4 => 'Featured',
				6 => 'Games',
				7 => 'Animals',
				8 => 'Programming',
				9 => 'Photography',
			);
			break;
	}

	// Fetch categories color settings.
	foreach ( $wp_categories as $term_id => $term_name ) {
		if ( ! empty( $data['mods'][ 'envince_category_color_' . $term_id ] ) ) {
			$cat_colors[ 'envince_category_color_' . $term_id ] = $data['mods'][ 'envince_category_color_' . $term_id ];
		}
	}

	// Set categories color settings properly.
	foreach ( $wp_categories as $term_id => $term_name ) {
		if ( ! empty( $data['mods'][ 'envince_category_color_' . $term_id ] ) ) {
			$term  = get_term_by( 'name', $term_name, 'category' );
			$color = $cat_colors[ 'envince_category_color_' . $term_id ];

			if ( is_object( $term ) && $term->term_id ) {
				$cat_prevent[]                                              = $term->term_id;
				$data['mods'][ 'envince_category_color_' . $term->term_id ] = $color;

				// Prevent deleting stored color settings.
				if ( ! in_array( $term_id, $cat_prevent ) ) {
					unset( $data['mods'][ 'envince_category_color_' . $term_id ] );
				}
			}
		}
	}

	return $data;
}

add_filter( 'themegrill_customizer_demo_import_settings', 'envince_set_cat_colors_free', 20, 3 );
