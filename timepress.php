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
		'supports'              => array( 'comments', ),
		'taxonomies'            => array( 'projects', ),
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
if ( ! function_exists( 'timepress_projects' ) ) {

// Register Custom Taxonomy
function timepress_projects() {

	$labels = array(
		'name'                       => _x( 'Projects', 'Taxonomy General Name', 'timepress' ),
		'singular_name'              => _x( 'Project', 'Taxonomy Singular Name', 'timepress' ),
		'menu_name'                  => __( 'Projects', 'timepress' ),
		'all_items'                  => __( 'All Projects', 'timepress' ),
		'parent_item'                => __( 'Parent Project', 'timepress' ),
		'parent_item_colon'          => __( 'Parent Item:', 'timepress' ),
		'new_item_name'              => __( 'New Project', 'timepress' ),
		'add_new_item'               => __( 'Add New Project', 'timepress' ),
		'edit_item'                  => __( 'Edit Project', 'timepress' ),
		'update_item'                => __( 'Update Project', 'timepress' ),
		'view_item'                  => __( 'View Project', 'timepress' ),
		'separate_items_with_commas' => __( 'Separate Projects with commas', 'timepress' ),
		'add_or_remove_items'        => __( 'Add or Remove Projects', 'timepress' ),
		'choose_from_most_used'      => __( 'Choose From Most Used Projects', 'timepress' ),
		'popular_items'              => __( 'Popular Projects', 'timepress' ),
		'search_items'               => __( 'Search Projects', 'timepress' ),
		'not_found'                  => __( 'Not Found', 'timepress' ),
		'no_terms'                   => __( 'No Projects', 'timepress' ),
		'items_list'                 => __( 'Projects List', 'timepress' ),
		'items_list_navigation'      => __( 'Projects list navigation', 'timepress' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'timepress_projects', array( 'timepress' ), $args );

}
add_action( 'init', 'timepress_projects', 0 );

}
/**
 * Generated by the WordPress Meta Box Generator at http://goo.gl/8nwllb
 */
class Rational_Meta_Box {
	private $screens = array(
		'post',
		'page',
    'timepress',
	);
	private $fields = array(
		array(
			'id' => 'time',
			'label' => 'Time',
			'type' => 'time',
		),
		array(
			'id' => 'project-or-client',
			'label' => 'Project or Client',
			'type' => 'select',
			'options' => array(
				'Bob\'s Burgers',
				'Archer',
				'The Revenant',
			),
		),
		array(
			'id' => 'notes-description-of-time-logged',
			'label' => 'Notes/Description of time logged',
			'type' => 'textarea',
		),
	);

	/**
	 * Class construct method. Adds actions to their respective WordPress hooks.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	/**
	 * Hooks into WordPress' add_meta_boxes function.
	 * Goes through screens (post types) and adds the meta box.
	 */
	public function add_meta_boxes() {
		foreach ( $this->screens as $screen ) {
			add_meta_box(
				'timepress',
				__( 'TimePress', 'timepress' ),
				array( $this, 'add_meta_box_callback' ),
				$screen,
				'advanced',
				'high'
			);
		}
	}

	/**
	 * Generates the HTML for the meta box
	 *
	 * @param object $post WordPress post object
	 */
	public function add_meta_box_callback( $post ) {
		wp_nonce_field( 'timepress_data', 'timepress_nonce' );
		echo 'Logging Time w/ TimePress';
		$this->generate_fields( $post );
	}

	/**
	 * Generates the field's HTML for the meta box.
	 */
	public function generate_fields( $post ) {
		$output = '';
		foreach ( $this->fields as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'timepress_' . $field['id'], true );
			switch ( $field['type'] ) {
				case 'select':
					$input = sprintf(
						'<select id="%s" name="%s">',
						$field['id'],
						$field['id']
					);
					foreach ( $field['options'] as $key => $value ) {
						$field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<option %s value="%s">%s</option>',
							$db_value === $field_value ? 'selected' : '',
							$field_value,
							$value
						);
					}
					$input .= '</select>';
					break;
				case 'textarea':
					$input = sprintf(
						'<textarea class="large-text" id="%s" name="%s" rows="5">%s</textarea>',
						$field['id'],
						$field['id'],
						$db_value
					);
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$field['type'] !== 'color' ? 'class="regular-text"' : '',
						$field['id'],
						$field['id'],
						$field['type'],
						$db_value
					);
			}
			$output .= $this->row_format( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}

	/**
	 * Generates the HTML for table rows.
	 */
	public function row_format( $label, $input ) {
		return sprintf(
			'<tr><th scope="row">%s</th><td>%s</td></tr>',
			$label,
			$input
		);
	}
	/**
	 * Hooks into WordPress' save_post function
	 */
	public function save_post( $post_id ) {
		if ( ! isset( $_POST['timepress_nonce'] ) )
			return $post_id;

		$nonce = $_POST['timepress_nonce'];
		if ( !wp_verify_nonce( $nonce, 'timepress_data' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		foreach ( $this->fields as $field ) {
			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
						$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
						break;
					case 'text':
						$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
						break;
				}
				update_post_meta( $post_id, 'timepress_' . $field['id'], $_POST[ $field['id'] ] );
			} else if ( $field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, 'timepress_' . $field['id'], '0' );
			}
		}
	}
}
new Rational_Meta_Box;
