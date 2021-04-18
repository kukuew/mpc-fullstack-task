<?php
/**
 * ToDo item template part
 */

defined( 'ABSPATH' ) || exit;
?>

<li class="mpc-ft-todo__item js-mpc-ft-item" data-index="<?php echo $i; ?>">
    <div class="mpc-ft-todo__col-checkbox">
        <input class="mpc-ft-todo__input-checkbox js-mpc-ft-input-checkbox" type="checkbox" <?php echo $checked; ?>>
    </div>
    <div class="mpc-ft-todo__col-text">
        <input class="mpc-ft-todo__input-text js-mpc-ft-input-text" type="text" value="<?php echo $text; ?>">
    </div>
    <button class="mpc-ft-todo__action mpc-ft-todo__action--remove js-mpc-ft-remove has-background" type="button" aria-label="<?php _e( 'Remove item', 'mpc-ft' ); ?>"></button>
</li>