<?php
/**
 * Handle AJAX
 *
 */

defined( 'ABSPATH' ) || exit;

class MPC_FT_Ajax {

    public static function init() {
        add_action( 'wp_ajax_mpc_ft_save_todo_items', array( __CLASS__, 'save_todo_items' ) );
        add_action( 'wp_ajax_nopriv_mpc_ft_save_todo_items', array( __CLASS__, 'save_todo_items' ) );
    }

    public static function save_todo_items() {

        check_ajax_referer( MPC_FT_PLUGIN_FILE, 'nonce' );

        $items = json_decode( stripslashes( $_POST['items'] ), true );

        update_post_meta( $_POST['post_id'], 'mpc_ft_todo_items', $items );

        wp_die();
    }

}

MPC_FT_Ajax::init();