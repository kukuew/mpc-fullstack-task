<?php
/**
 * MPC Fullstack task setup
 */

defined( 'ABSPATH' ) || exit;

class MPC_FT {

    protected static $_instance;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        $this->includes();
        $this->init_hooks();
    }

    public function includes() {
        include_once MPC_FT_ABSPATH . '/inc/mpc-ft-core-functions.php';
        include_once MPC_FT_ABSPATH . '/inc/class-mpc-ft-post-types.php';
        include_once MPC_FT_ABSPATH . '/inc/class-mpc-ft-template-loader.php';
        include_once MPC_FT_ABSPATH . '/inc/class-mpc-ft-meta-box.php';

        if ( ! is_admin() ) {
            include_once MPC_FT_ABSPATH . '/inc/class-mpc-ft-frontend-scripts.php';
            include_once MPC_FT_ABSPATH . '/inc/mpc-ft-template-hooks.php';
            include_once MPC_FT_ABSPATH . '/inc/mpc-ft-template-functions.php';
        }
    }

    private function init_hooks() {

    }


}