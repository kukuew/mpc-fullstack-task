<?php
/**
 * Installation related functions and actions.
 *
 */

defined( 'ABSPATH' ) || exit;

class MPC_FT_Install {

    public static function activation() {
        if ( ! is_blog_installed() ) {
            return;
        }

        self::create_dummy_todo();
    }

    public static function create_dummy_todo() {
        if ( self::is_dummy_todo_exist() ) {
            return;
        }

        $posts = array(
            array(
                'title' => 'ToDo with WordPress UI',
                'meta'  => array(
                    'mpc_ft_todo_items' => self::get_todo_dummy_items()
                )
            ),
            array(
                'title' => 'ToDo without WordPress UI',
                'meta'  => array(
                    'mpc_ft_todo_items' => self::get_todo_dummy_items(),
                    'mpc_ft_hide_wp_ui' => 'on',
                )
            )
        );

        foreach ( $posts as $post ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $post['title'],
                'post_type'    => 'mpc_ft_todo',
                'post_status'  => 'publish',
            ) );

            if ( ! empty( $post['meta'] ) ) {
                foreach ( $post['meta'] as $meta_key => $meta_value ) {
                    update_post_meta( $post_id, $meta_key, $meta_value );
                }
            }
        }
    }

    public static function get_todo_dummy_items() {
        return array(
            array(
                'checkbox' => true,
                'text'     => 'Hello!'
            ),
            array(
                'checkbox' => true,
                'text'     => 'This is dummy content'
            ),
            array(
                'checkbox' => false,
                'text'     => 'Unchecked example'
            ),
            array(
                'checkbox' => true,
                'text'     => 'Code is poetry'
            )
        );
    }

    public static function is_dummy_todo_exist() {
        $post_with_ui = get_posts( array(
            'post_type'    => 'mpc_ft_todo',
            'name'         => 'todo-with-wordpress-ui',
            'post_status'  => 'publish'
        ) );

        $post_without_ui = get_posts( array(
            'post_type'    => 'mpc_ft_todo',
            'name'         => 'todo-without-wordpress-ui',
            'post_status'  => 'publish'
        ) );

        return $post_with_ui || $post_without_ui;
    }

}
