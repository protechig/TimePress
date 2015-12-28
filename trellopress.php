<?php
/**
 * Plugin Name: TrelloPress
 * Plugin URI: https://protechig.com/trellopress
 * Description: Time Tracking in Trello
 * Version: 0.1
 * Author: Zachary Russell
 * Author URI: http://zachrussell.net
 * License: GPL2
 */

 if ( ! function_exists('trellopress') ) {

// Register Custom Post Type
function trellopress() {

	$labels = array(
		'name'                  => _x( 'Time Cards', 'Post Type General Name', 'trellopress' ),
		'singular_name'         => _x( 'Time Card', 'Post Type Singular Name', 'trellopress' ),
		'menu_name'             => __( 'TrelloPress', 'trellopress' ),
		'name_admin_bar'        => __( 'TrelloPress', 'trellopress' ),
		'archives'              => __( 'Time Card Archives', 'trellopress' ),
		'parent_item_colon'     => __( 'Parent Item:', 'trellopress' ),
		'all_items'             => __( 'All Time Cards', 'trellopress' ),
		'add_new_item'          => __( 'Add New Time Card', 'trellopress' ),
		'add_new'               => __( 'Add New', 'trellopress' ),
		'new_item'              => __( 'New Time Card', 'trellopress' ),
		'edit_item'             => __( 'Edit Time Card', 'trellopress' ),
		'update_item'           => __( 'Update Time Card', 'trellopress' ),
		'view_item'             => __( 'View Time Card', 'trellopress' ),
		'search_items'          => __( 'Search Time Cards', 'trellopress' ),
		'not_found'             => __( 'No Time Cards Found', 'trellopress' ),
		'not_found_in_trash'    => __( 'No Time Cards Found in Trash', 'trellopress' ),
		'featured_image'        => __( 'Featured Image', 'trellopress' ),
		'set_featured_image'    => __( 'Set featured image', 'trellopress' ),
		'remove_featured_image' => __( 'Remove featured image', 'trellopress' ),
		'use_featured_image'    => __( 'Use as featured image', 'trellopress' ),
		'insert_into_item'      => __( 'Insert into item', 'trellopress' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'trellopress' ),
		'items_list'            => __( 'Items list', 'trellopress' ),
		'items_list_navigation' => __( 'Items list navigation', 'trellopress' ),
		'filter_items_list'     => __( 'Filter items list', 'trellopress' ),
	);
	$args = array(
		'label'                 => __( 'Time Card', 'trellopress' ),
		'description'           => __( 'Time Tracking for Trello', 'trellopress' ),
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
	register_post_type( 'trellopress', $args );

}
add_action( 'init', 'trellopress', 0 );

}
