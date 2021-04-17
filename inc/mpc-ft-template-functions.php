<?php
/**
 * Template
 *
 */

defined( 'ABSPATH' ) || exit;

function mpc_ft__body_class( $classes ) {
    $classes = (array) $classes;

    if ( mpc_ft_is_wp_ui() ) {
        $classes[] = 'mpc-ft-hide-wp-ui';
    }

    return $classes;
}
