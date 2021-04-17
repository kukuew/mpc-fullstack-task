<?php
/**
 * Template Loader
 *
 */

defined( 'ABSPATH' ) || exit;

class MPC_FT_Template_Loader {

    public static function init() {
        add_action( 'wp', array( __CLASS__, 'load' ) );
    }

    public static function load() {
        if ( is_admin() ) {
            return;
        }

        if ( mpc_ft_is_wp_ui() ) {
            add_filter( 'template_include', array( __CLASS__, 'template_loader' ) );
        } else {
            add_filter( 'the_content', array( __CLASS__, 'content_filter' ) );
        }
    }

    public static function template_loader( $template ) {
        $default_file = self::get_template_loader_default_file();

        if ( $default_file ) {
            $template = MPC_FT_ABSPATH . "templates/{$default_file}";
        }

        return $template;
    }

    public static function get_template_loader_default_file() {
        if ( is_singular( 'mpc_ft_todo' ) ) {
            $default_file = 'single-todo.php';
        } else {
            $default_file = '';
        }

        return $default_file;
    }

    public static function content_filter( $content ) {
        if ( ! is_main_query() || ! in_the_loop() || ! is_singular( 'mpc_ft_todo' ) ) {
            return $content;
        }

        return mpc_ft_get_template_part( 'content-todo', true );
    }

}

add_action( 'init', array( 'MPC_FT_Template_Loader', 'init' ) );