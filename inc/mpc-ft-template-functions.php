<?php
/**
 * Template
 *
 */

defined( 'ABSPATH' ) || exit;

function mpc_ft_body_class( $classes ) {
    $classes = (array) $classes;

    if ( mpc_ft_is_wp_ui() ) {
        $classes[] = 'mpc-ft-hide-wp-ui';
    }

    return $classes;
}

function mpc_ft_get_todo_items() {
    if ( ! is_singular( 'mpc_ft_todo' ) ) {
        return false;
    }

    return (array) get_post_meta( get_the_ID(), 'mpc_ft_todo_items', true );
}

function mpc_ft_todo_item_template() {

    if ( ! is_singular( 'mpc_ft_todo' ) ) {
        return;
    } ?>

    <script type="text/template" id="tmpl-mpc-ft-todo-item">
        <?php
        $args = array(
            'i'       => '{{{ data.i }}}',
            'checked' => '<# if ( data.item.checkbox ) { #>checked<# } #>',
            'text'    => '{{{ data.item.text }}}'
        );
        mpc_ft_get_template( 'parts/todo-item', $args ); ?>
    </script>

    <?php
}