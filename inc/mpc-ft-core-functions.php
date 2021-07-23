<?php
/**
 * Core function
 */

defined( 'ABSPATH' ) || exit;

function mpc_ft_get_template( $slug, $args = array() ) {
    if ( ! empty( $args ) && is_array( $args ) ) {
        extract( $args );
    }

    $template = MPC_FT_ABSPATH . "templates/{$slug}.php";

    if ( ! file_exists( $template ) ) {
        return false;
    }

    include $template;
}

function mpc_ft_is_wp_ui() {
    global $post;

    return 'on' === get_post_meta( $post->ID, 'mpc_ft_hide_wp_ui', true ) ? true : false;
}

function mpc_ft_use_react() {
    global $post;

    return 'on' === get_post_meta( $post->ID, 'mpc_ft_use_react', true ) ? true : false;
}