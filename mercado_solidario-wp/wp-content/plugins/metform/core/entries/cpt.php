<?php
namespace MetForm\Core\Entries;
defined( 'ABSPATH' ) || exit;

Class Cpt extends \MetForm\Base\Cpt {

    public function get_name(){
        return 'metform-entry';
    }

    public function post_type()
    {
        $labels = array(
            'name'                  => esc_html_x( 'Entries', 'Post Type General Name', 'metform' ),
            'singular_name'         => esc_html_x( 'Entry', 'Post Type Singular Name', 'metform' ),
            'menu_name'             => esc_html__( 'Entry', 'metform' ),
            'name_admin_bar'        => esc_html__( 'Entry', 'metform' ),
            'archives'              => esc_html__( 'Entry Archives', 'metform' ),
            'attributes'            => esc_html__( 'Entry Attributes', 'metform' ),
            'parent_item_colon'     => esc_html__( 'Parent Item:', 'metform' ),
            'all_items'             => esc_html__( 'Entries', 'metform' ),
            'add_new_item'          => esc_html__( 'Add New Item', 'metform' ),
            'add_new'               => esc_html__( 'Add New', 'metform' ),
            'new_item'              => esc_html__( 'New Item', 'metform' ),
            'edit_item'             => esc_html__( 'Edit Item', 'metform' ),
            'update_item'           => esc_html__( 'Update Item', 'metform' ),
            'view_item'             => esc_html__( 'View Item', 'metform' ),
            'view_items'            => esc_html__( 'View Items', 'metform' ),
            'search_items'          => esc_html__( 'Search Item', 'metform' ),
            'not_found'             => esc_html__( 'Not found', 'metform' ),
            'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'metform' ),
            'featured_image'        => esc_html__( 'Featured Image', 'metform' ),
            'set_featured_image'    => esc_html__( 'Set featured image', 'metform' ),
            'remove_featured_image' => esc_html__( 'Remove featured image', 'metform' ),
            'use_featured_image'    => esc_html__( 'Use as featured image', 'metform' ),
            'insert_into_item'      => esc_html__( 'Insert into item', 'metform' ),
            'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'metform' ),
            'items_list'            => esc_html__( 'Form entries list', 'metform' ),
            'items_list_navigation' => esc_html__( 'Form entries list navigation', 'metform' ),
            'filter_items_list'     => esc_html__( 'Filter from entry list', 'metform' ),
        );

        $args = array(
            'label'                 => esc_html__( 'Form entry', 'metform' ),
            'description'           => esc_html__( 'metform-entry', 'metform' ),
            'labels'                => $labels,
            'supports'              => ['title'],
            'capabilities'          => ['create_posts' => 'do_not_allow'],
            'map_meta_cap'          => true,
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => "metform-menu",
            'menu_icon'             => 'dashicons-format-aside',
            'menu_position'         => 5,
            'show_in_admin_bar'     => false,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,
            'publicly_queryable'    => false,
            'rewrite'               => false,
            'query_var'             => true,
            'exclude_from_search'   => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
            'rest_base'             => $this->get_name(),
        );

        return $args;
    }

}
