<?php
/**
 * ToDo template
 */

defined( 'ABSPATH' ) || exit;

$todo_items = mpc_ft_get_todo_items(); ?>

<div class="mpc-ft-todo">

    <div class="mpc-ft-todo__add">
        <form class="mpc-ft-todo__form js-mpc-ft-form">
            <div class="mpc-ft-todo__col-checkbox">
                <input class="mpc-ft-todo__input-checkbox mpc-ft-todo__input-checkbox--add" name="checkbox" type="checkbox">
            </div>
            <div class="mpc-ft-todo__col-text">
                <input class="mpc-ft-todo__input-text mpc-ft-todo__input-text--add" name="text" type="text" placeholder="<?php _e( 'Enter new task here...', 'mpc-ft' ); ?>" required>
            </div>
            <button class="mpc-ft-todo__action mpc-ft-todo__action--add js-mpc-ft-add has-background" type="submit" aria-label="<?php _e( 'Add item', 'mpc-ft' ); ?>"></button>
        </form>
    </div>

    <ul class="mpc-ft-todo__list js-mpc-ft-list">
        <?php
        if ( ( ! empty( array_filter( $todo_items ) ) ) ):
            foreach ( $todo_items as $i => $item):
                $args = array(
                    'i'       => $i,
                    'checked' => $item['checkbox'] ? 'checked' : '',
                    'text'    => $item['text']
                );
                mpc_ft_get_template( 'parts/todo-item', $args );
            endforeach;
        endif; ?>
    </ul>

</div>