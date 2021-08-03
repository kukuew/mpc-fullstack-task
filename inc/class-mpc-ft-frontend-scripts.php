<?php
/**
 * Handle frontend scripts
 *
 */

defined( 'ABSPATH' ) || exit;

class MPC_FT_Frontend_Scripts {

    public static function init() {
        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'load_scripts' ), 20 );
    }

    public static function load_scripts() {
        if ( ! is_singular( 'mpc_ft_todo' ) ) {
            return;
        }

        wp_enqueue_style( 'font_open_sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap' );
        wp_enqueue_style( 'mpc_ft', self::get_asset_url( 'assets/css/main.min.css' ), '', MPC_FT_PLUGIN_VERSION );

        if ( mpc_ft_use_react() ) {
            wp_enqueue_script( 'mpc_ft', self::get_asset_url( 'assets/js/react.min.js' ), array( 'react', 'react-dom' ), MPC_FT_PLUGIN_VERSION, true );
        } else {
            wp_enqueue_script( 'mpc_ft', self::get_asset_url( 'assets/js/main.min.js' ), array( 'wp-util' ), MPC_FT_PLUGIN_VERSION, true );
        }

        wp_localize_script( 'mpc_ft', 'mpc_ft', array(
            'ajax_url'   => admin_url( 'admin-ajax.php' ),
            'nonce'      => wp_create_nonce( MPC_FT_PLUGIN_FILE ),
            'todo_items' => mpc_ft_get_todo_items(),
            'post_id'    => get_the_ID()
        ) );
    }

    private static function get_asset_url( $path ) {
        return plugins_url( $path, MPC_FT_PLUGIN_FILE );
    }

}

MPC_FT_Frontend_Scripts::init();