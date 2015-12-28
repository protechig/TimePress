<?php
/**
 * Plugin Name: TimePress
 * Plugin URI: https://protechig.com/timepress
 * Description: Time Tracking in WordPress
 * Version: 0.1
 * Author: Zachary Russell
 * Author URI: http://zachrussell.net
 * License: GPL2
 */

 if ( ! function_exists('timepress') ) {

// Register Custom Post Type
function timepress() {

	$labels = array(
		'name'                  => _x( 'Time Entries', 'Post Type General Name', 'timepress' ),
		'singular_name'         => _x( 'Time Entry', 'Post Type Singular Name', 'timepress' ),
		'menu_name'             => __( 'TimePress', 'timepress' ),
		'name_admin_bar'        => __( 'TimePress', 'timepress' ),
		'archives'              => __( 'Time Sheet', 'timepress' ),
		'parent_item_colon'     => __( 'Parent Item:', 'timepress' ),
		'all_items'             => __( 'All Time Entries', 'timepress' ),
		'add_new_item'          => __( 'Add New Time Entry', 'timepress' ),
		'add_new'               => __( 'Add New', 'timepress' ),
		'new_item'              => __( 'New Time entry', 'timepress' ),
		'edit_item'             => __( 'Edit Time entry', 'timepress' ),
		'update_item'           => __( 'Update Time entry', 'timepress' ),
		'view_item'             => __( 'View Time entry', 'timepress' ),
		'search_items'          => __( 'Search Time entries', 'timepress' ),
		'not_found'             => __( 'No Time entries Found', 'timepress' ),
		'not_found_in_trash'    => __( 'No Time entries Found in Trash', 'timepress' ),
		'featured_image'        => __( 'Featured Image', 'timepress' ),
		'set_featured_image'    => __( 'Set featured image', 'timepress' ),
		'remove_featured_image' => __( 'Remove featured image', 'timepress' ),
		'use_featured_image'    => __( 'Use as featured image', 'timepress' ),
		'insert_into_item'      => __( 'Insert into item', 'timepress' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'timepress' ),
		'items_list'            => __( 'Items list', 'timepress' ),
		'items_list_navigation' => __( 'Items list navigation', 'timepress' ),
		'filter_items_list'     => __( 'Filter items list', 'timepress' ),
	);
	$args = array(
		'label'                 => __( 'Time entry', 'timepress' ),
		'description'           => __( 'Time Tracking for WordPress', 'timepress' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'excerpt', 'custom-fields', 'page-attributes', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-backup',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'timepress', $args );

}
add_action( 'init', 'timepress', 0 );

}
