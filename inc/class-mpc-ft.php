<?php
/**
 * MPC Fullstack task setup
 */

defined( 'ABSPATH' ) || exit;

class MPC_FT {

    public static function init() {
        self::includes();

        register_activation_hook( MPC_FT_PLUGIN_FILE, array( 'MPC_FT_Install', 'activation' ) );
    }

    public static function includes() {
        include_once MPC_FT_ABSPATH . '/inc/mpc-ft-core-functions.php';
        include_once MPC_FT_ABSPATH . '/inc/class-mpc-ft-install.php';
        include_once MPC_FT_ABSPATH . '/inc/class-mpc-ft-post-types.php';
        include_once MPC_FT_ABSPATH . '/inc/class-mpc-ft-template-loader.php';
        include_once MPC_FT_ABSPATH . '/inc/class-mpc-ft-meta-box.php';
        include_once MPC_FT_ABSPATH . '/inc/class-mpc-ft-ajax.php';

        if ( ! is_admin() ) {
            include_once MPC_FT_ABSPATH . '/inc/mpc-ft-template-hooks.php';
            include_once MPC_FT_ABSPATH . '/inc/mpc-ft-template-functions.php';
            include_once MPC_FT_ABSPATH . '/inc/class-mpc-ft-frontend-scripts.php';
        }
    }

}

MPC_FT::init();