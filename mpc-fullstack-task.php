<?php
/**
 * Plugin Name: MPC Fullstack Task
 * Description: This is recruitment task for MPC Company.
 * Author:      Mykola Smuzhanytsia
 *
 * Text Domain: mpc-ft
 *
 * Version: 1.0
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 */

defined( 'ABSPATH' ) || exit;

// Define constants
if ( ! defined( 'MPC_FT_PLUGIN_FILE' ) ) {
    define( 'MPC_FT_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'MPC_FT_ABSPATH' ) ) {
    define( 'MPC_FT_ABSPATH', plugin_dir_path( MPC_FT_PLUGIN_FILE ) );
}

if ( ! defined( 'MPC_FT_PLUGIN_BASENAME' ) ) {
    define( 'MPC_FT_PLUGIN_BASENAME', plugin_basename( MPC_FT_PLUGIN_FILE ) );
}

if ( ! defined( 'MPC_FT_PLUGIN_VERSION' ) ) {
    define( 'MPC_FT_PLUGIN_VERSION', '1.0' );
}

// Include the main plugin class.
if ( ! class_exists( 'MPC_FT' ) ) {
    include_once MPC_FT_ABSPATH . '/inc/class-mpc-ft.php';
}


