<?php
/**
 * Demo Name: FoodHunt Free
 * Demo URI: https://demo.themegrill.com/foodhunt/
 * Description: Foodhunt Free demo pack for ThemeGrill Official theme.
 * Version: 1.0.0
 * Template: foodhunt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Setup demo importer config.
 *
 * @param  array $demo_config
 * @return array
 */
function foodhunt_demo_importer_config( $demo_config ) {
	$demo_config['foodhunt-free'] = array(
		'name'         => 'FoodHunt',
		'theme'        => 'FoodHunt',
		'template'     => 'foodhunt',
		'demo_url'     => 'https://demo.themegrill.com/foodhunt/',
		'demo_pack'    => true,
		'core_options' => array(
			'blogname'       => 'FoodHunt',
			'page_on_front'  => 'Home page',
			'page_for_posts' => 'Blog',
		),
		'widgets_data_update' => array(

			/**
			 * Dropdown Pages - Handles widgets Page ID.
			 *
			 * 1. foodhunt_about_us_widget
			 */
			'dropdown_pages' => array(
				'foodhunt_about_us_widget' => array(
					2 => array(
						'page_id' => 'About Us',
					),
				),
			),
		),
		'customizer_data_update' => array(
			'nav_menu_locations' => array(
				'primary_one' => 'Left Menu',
				'primary_two' => 'Right Menu',
				'social' 	  => 'Social Menu',
				'footer'  	  => 'Footer Menu',
			),
		),
		'restaurantpress_data_update' => array(
			'food_group' => array(
				'Appetizers' => array(
					1  => 'Appetizers'
				),
				'Breakfast' => array(
					1  => 'Breakfast'
				),
				'Dinner' => array(
					1  => 'Dinner'
				),
				'Lunch' => array(
					1  => 'Lunch'
				),
			)
		),
		'plugins_list' => array(
			'restaurantpress' => array(
				'name'     => 'RestaurantPress',
				'slug'     => 'restaurantpress/restaurantpress.php',
				'required' => false,
			),
			'google-maps-widget' => array(
				'name'     => 'Google Maps Widget',
				'slug'     => 'google-maps-widget/google-maps-widget.php',
				'required' => false,
			),
		),
	);

	return $demo_config;
}
add_filter( 'themegrill_demo_importer_config', 'foodhunt_demo_importer_config' );

/**
 * Update taxonomies ids for restaurantpress
 * @param  string $demo_id
 * @param  array $demo_data
 */
function restaurantpress_data_update( $demo_id, $demo_data ) {
	if ( ! empty( $demo_data['restaurantpress_data_update'] ) ) {
		foreach ( $demo_data['restaurantpress_data_update'] as $data_type => $data_value ) {
			$data = [];
			switch ( $data_type ) {
				case 'food_group':
					foreach ($data_value as $group_name => $taxonomy_values) {
						$group = get_page_by_title( $group_name, OBJECT, $data_type );
						foreach ($taxonomy_values as $option_key => $taxonomy) {
							$term = get_term_by( 'name', $taxonomy, 'food_menu_cat' );
							if ( is_object( $term ) && $term->term_id ) {
								$data[] = $term->term_id;
							}
						}
						update_post_meta($group->ID,'food_grouping',$data);
						unset($data);
					}
				break;
			}
		}
	}
}
add_action( 'themegrill_ajax_demo_imported', 'restaurantpress_data_update', 10, 2 );