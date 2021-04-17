<?php
/**
 * Template Loader
 *
 */

defined( 'ABSPATH' ) || exit;

class MPC_FT_Template_Loader {

    public static function init() {
        add_filter( 'template_include', array( __CLASS__, 'template_loader' ) );
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

}

add_action( 'init', array( 'MPC_FT_Template_Loader', 'init' ) );