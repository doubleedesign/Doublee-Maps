<?php
// Register Custom Post Type
function doublee_address_cpt() {

	$labels = array(
		'name'                  => 'Addresses',
		'singular_name'         => 'Address',
		'menu_name'             => 'Addresses',
		'name_admin_bar'        => 'Address',
		'archives'              => 'Address Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Address:',
		'all_items'             => 'All Addresses',
		'add_new_item'          => 'Add New Address',
		'add_new'               => 'Add New',
		'new_item'              => 'New Address',
		'edit_item'             => 'Edit Address',
		'update_item'           => 'Update Address',
		'view_item'             => 'View Address',
		'view_items'            => 'View Addresses',
		'search_items'          => 'Search Addresses',
		'not_found'             => 'No addresses found',
		'not_found_in_trash'    => 'No addresses found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Address',
		'uploaded_to_this_item' => 'Uploaded to this address',
		'items_list'            => 'Address list',
		'items_list_navigation' => 'Address list navigation',
		'filter_items_list'     => 'Filter address list',
	);
	$args = array(
		'label'                 => 'Address',
		'description'           => 'List contact details to be formatted semantically in the theme.',
		'labels'                => $labels,
		'supports'              => array( 'title', 'author', 'revisions', 'page-attributes', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-location-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'address', $args );

}
add_action( 'init', 'doublee_address_cpt', 0 );
?>