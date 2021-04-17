<?php

function mpc_ft_get_template_part( $slug, $return = false ) {
    ob_start();

    load_template( MPC_FT_ABSPATH . "templates/{$slug}.php", false );

    $template = ob_get_clean();

    if ( $return ) {
        return $template;
    } else {
        echo $template;
    }
}

function mpc_ft_is_wp_ui() {
    global $post;

    return 'on' === get_post_meta( $post->ID, 'mpc_ft_hide_wp_ui', true ) ? true : false;
}