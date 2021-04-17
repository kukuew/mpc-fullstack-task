<?php
/**
 * Template Hooks
 *
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'body_class', 'mpc_ft_body_class' );
add_filter( 'wp_head', 'mpc_ft_todo_item_template' );