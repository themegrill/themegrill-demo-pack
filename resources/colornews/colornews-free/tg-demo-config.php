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
 * @return array
 */
function colornews_demo_importer_config( $demo_config ) {
	$new_demo_config = array(
		'colornews-free' => array(
			'name'         => 'ColorNews',
			'theme'        => 'ColorNews',
			'template'     => 'colornews',
			'demo_url'     => 'https://demo.themegrill.com/colornews/',
			'demo_pack'    => true,
			'core_options' => array(
				'blogname'       => 'ColorNews',
			),
			'widgets_data_update' => array(

				/**
				 * Dropdown Categories - Handles widgets Category ID.
				 *
				 * A. Core Post Category:
				 *   1. colornews_featured_post_style_one_widget
				 *   2. colornews_featured_post_style_two_widget
				 *   3. colornews_featured_post_style_three_widget
				 *   4. colornews_featured_post_style_four_widget
				 *
				 */
				'dropdown_categories' => array(
					'category' => array(
						'colornews_featured_post_style_one_widget' => array(
							2 => array(
								'category' => 'Sports'
							),
						),
						'colornews_featured_post_style_two_widget' => array(
							2 => array(
								'category' => 'Business'
							),
							3 => array(
								'category' => 'Technology'
							),
						),
						'colornews_featured_post_style_three_widget' => array(
							2 => array(
								'category' => 'Business'
							),
							3 => array(
								'category' => 'Politics'
							),
							4 => array(
								'category' => 'Food'
							),
							5 => array(
								'category' => 'Fashion'
							),
						),
						'colornews_featured_post_style_four_widget' => array(
							2 => array(
								'category' => 'Weather'
							),
							3 => array(
								'category' => 'Internet'
							),
						),
					)
				)
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary',
					'social'  => 'Social',
					'category'  => 'Category',
				)
			),
			'plugins_list' => array(
				'google-maps-widget' => array(
					'name'     => 'Google Maps Widget',
					'slug'     => 'google-maps-widget/google-maps-widget.php',
					'required' => false,
				),
				'contact-form-7' => array(
					'name'     => 'Contact Form 7',
					'slug'     => 'contact-form-7/wp-contact-form-7.php',
					'required' => false,
				),
			),
		),
	);

	return array_merge( $new_demo_config, $demo_config );
}

add_filter( 'themegrill_demo_importer_config', 'colornews_demo_importer_config' );

/**
 * Set categories color settings in theme customizer.
 *
 * Note: Used rarely, if theme_mod keys are based on term ID.
 *
 * @param  array  $data
 * @param  array  $demo_data
 * @param  string $demo_id
 * @return array
 */
function colornews_set_cat_colors_free( $data, $demo_data, $demo_id ) {
	$cat_colors    = array();
	$cat_prevent   = array();
	$wp_categories = array();

	// Format the data based on demo ID.
	switch ( $demo_id ) {
		case 'colornews-free':
			$wp_categories = array(
				1   => 'Uncategorized',
				6   => 'Sports',
				7   => 'Opening',
				8   => 'Ceremony',
				12  => 'Football',
				14  => 'Adventure',
				15  => 'Cycling',
				17  => 'Business',
				18  => 'Advertisement',
				19  => 'Travel',
				22  => 'Talent',
				25  => 'Cars',
				27  => 'Entertainment',
				29  => 'Game',
				31  => 'Mobile',
				32  => 'Computer',
				36  => 'Technology',
				37  => 'Internet',
				39  => 'Social Media',
				40  => 'NGO',
				41  => 'INGO',
				46  => 'Protest',
				47  => 'Politics',
				48  => 'Government',
				51  => 'Demonstration',
				54  => 'Election',
				56  => 'Military',
				57  => 'Soldier',
				60  => 'Food',
				61  => 'Health',
				62  => 'Nutrition',
				65  => 'Research',
				66  => 'Vitamin',
				67  => 'Hospital',
				71  => 'Drink',
				75  => 'Weather',
				76  => 'National',
				77  => 'International',
				80  => 'Nature',
				90  => 'Fashion',
				91  => 'Outfit',
				96  => 'Competition',
				97  => 'Girl',
				110 => 'Running',
			);
		break;
	}

	// Fetch categories color settings.
	foreach ( $wp_categories as $term_id => $term_name ) {
		if ( ! empty( $data['mods'][ 'colornews_category_color_' . $term_id ] ) ) {
			$cat_colors[ 'colornews_category_color_' . $term_id ] = $data['mods'][ 'colornews_category_color_' . $term_id ];
		}
	}

	// Set categories color settings properly.
	foreach ( $wp_categories as $term_id => $term_name ) {
		if ( ! empty( $data['mods'][ 'colornews_category_color_' . $term_id ] ) ) {
			$term  = get_term_by( 'name', $term_name, 'category' );
			$color = $cat_colors[ 'colornews_category_color_' . $term_id ];

			if ( is_object( $term ) && $term->term_id ) {
				$cat_prevent[] = $term->term_id;
				$data['mods'][ 'colornews_category_color_' . $term->term_id ] = $color;

				// Prevent deleting stored color settings.
				if ( ! in_array( $term_id, $cat_prevent ) ) {
					unset( $data['mods'][ 'colornews_category_color_' . $term_id ] );
				}
			}
		}
	}

	return $data;
}
add_filter( 'themegrill_customizer_demo_import_settings', 'colornews_set_cat_colors_free', 20, 3 );
