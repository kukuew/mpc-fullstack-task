<?php
$todo_items = mpc_ft_get_todo_items(); ?>

<div class="mpc-ft-todo">

    <div class="mpc-ft-todo__add">
        <form class="mpc-ft-todo__form">
            <div class="mpc-ft-todo__col-checkbox">
                <input class="mpc-ft-todo__input-checkbox mpc-ft-todo__input-checkbox--add" name="checkbox" type="checkbox">
            </div>
            <div class="mpc-ft-todo__col-text">
                <input class="mpc-ft-todo__input-text mpc-ft-todo__input-text--add" name="text" type="text" placeholder="<?php _e( 'Enter new task here...', 'mpc-ft' ); ?>" required>
            </div>
        </form>
    </div>

    <ul class="mpc-ft-todo__list">
        <?php
        foreach ( $todo_items as $i => $item):
            $checked = $item['checkbox'] ? 'checked' : ''; ?>
            <li class="mpc-ft-todo__item" data-index="<?php echo $i; ?>">
                <div class="mpc-ft-todo__col-checkbox">
                    <input class="mpc-ft-todo__input-checkbox" type="checkbox" <?php echo $checked; ?>>
                </div>
                <div class="mpc-ft-todo__col-text">
                    <input class="mpc-ft-todo__input-text" type="text" value="<?php echo $item['text']; ?>">
                </div>
                <button class="mpc-ft-todo__remove has-background" type="button" aria-label="<?php _e( 'Remove item', 'mpc-ft' ); ?>"></button>
            </li>
        <?php
        endforeach; ?>
    </ul>

</div>