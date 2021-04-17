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
    return get_post_meta( get_the_ID(), 'mpc_ft_todo_items', true );
}

function mpc_ft_todo_item_template() {

    if ( ! is_singular( 'mpc_ft_todo' ) ) {
        return;
    } ?>

    <script type="text/template" id="tmpl-mpc-ft-todo-item">
        <li class="mpc-ft-todo__item">
            <div class="mpc-ft-todo__col-checkbox">
                <input class="mpc-ft-todo__input-checkbox" type="checkbox" <# if ( data.item.checkbox ) { #>checked<# } #>>
            </div>
            <div class="mpc-ft-todo__col-text">
                <input class="mpc-ft-todo__input-text" type="text" value="{{{ data.item.text }}}">
            </div>
            <button class="mpc-ft-todo__remove has-background" type="button" aria-label="<?php _e( 'Remove item', 'mpc-ft' ); ?>" data-index="{{{ data.i }}}"></button>
        </li>
    </script>

    <?php
}