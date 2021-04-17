<?php
/**
 * Post Types
 *
 * Registers post types and taxonomies.
 *
 */

defined( 'ABSPATH' ) || exit;

class MPC_FT_Post_Types {
    
    public static function init() {
        add_action( 'init', array( __CLASS__, 'register_post_types' ) );
    }

    public static function register_post_types() {
        if ( ! is_blog_installed() || post_type_exists( 'mpc_ft_todo' ) ) {
            return;
        }

        register_post_type(
            'mpc_ft_todo',
            array(
                'labels'              => array(
                    'name'                  => __( 'ToDo', 'mpc-ft' ),
                    'singular_name'         => __( 'ToDo', 'mpc-ft' ),
                    'all_items'             => __( 'All ToDo', 'mpc-ft' ),
                    'menu_name'             => _x( 'ToDo', 'Admin menu name', 'mpc-ft' ),
                    'add_new'               => __( 'Add New', 'mpc-ft' ),
                    'add_new_item'          => __( 'Add new ToDo', 'mpc-ft' ),
                    'edit'                  => __( 'Edit', 'mpc-ft' ),
                    'edit_item'             => __( 'Edit ToDo', 'mpc-ft' ),
                    'new_item'              => __( 'New ToDo', 'mpc-ft' ),
                    'view_item'             => __( 'View ToDo', 'mpc-ft' ),
                    'view_items'            => __( 'View ToDo', 'mpc-ft' ),
                    'search_items'          => __( 'Search ToDo', 'mpc-ft' ),
                    'not_found'             => __( 'No ToDo found', 'mpc-ft' ),
                    'not_found_in_trash'    => __( 'No ToDo found in trash', 'mpc-ft' ),
                    'parent'                => __( 'Parent ToDo', 'mpc-ft' ),
                    'featured_image'        => __( 'ToDo image', 'mpc-ft' ),
                    'set_featured_image'    => __( 'Set ToDo image', 'mpc-ft' ),
                    'remove_featured_image' => __( 'Remove ToDo image', 'mpc-ft' ),
                    'use_featured_image'    => __( 'Use as ToDo image', 'mpc-ft' ),
                    'insert_into_item'      => __( 'Insert into ToDo', 'mpc-ft' ),
                    'uploaded_to_this_item' => __( 'Uploaded to this ToDo', 'mpc-ft' ),
                    'filter_items_list'     => __( 'Filter ToDo', 'mpc-ft' ),
                    'items_list_navigation' => __( 'Products navigation', 'mpc-ft' ),
                    'items_list'            => __( 'Products list', 'mpc-ft' ),
                ),
                'description'         => __( 'This is where you can add new ToDo.', 'mpc-ft' ),
                'public'              => true,
                'show_ui'             => true,
                'publicly_queryable'  => true,
                'exclude_from_search' => false,
                'hierarchical'        => false,
                'query_var'           => true,
                'supports'            => array( 'title' ),
                'has_archive'         => false,
                'show_in_nav_menus'   => true,
                'show_in_rest'        => true,
            )
        );
    }
    
}

MPC_FT_Post_types::init();