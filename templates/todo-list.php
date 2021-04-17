<?php

$dummy_data = array(
    array(
        'checkbox' => false,
        'text' => 'This is some dummy item!'
    ),
    array(
        'checkbox' => true,
        'text' => 'Awesome item!'
    ),
    array(
        'checkbox' => true,
        'text' => 'Code is poetry'
    )
);

?>

<div class="mpc-ft-todo">

    <div class="mpc-ft-todo__add">
        <form class="mpc-ft-todo__form">
            <div class="mpc-ft-todo__col-checkbox">
                <input class="mpc-ft-todo__input-checkbox mpc-ft-todo__input-checkbox--add" type="checkbox">
            </div>
            <div class="mpc-ft-todo__col-text">
                <input class="mpc-ft-todo__input-text mpc-ft-todo__input-text--add" type="text">
            </div>
        </form>
    </div>

    <?php
    if ( $dummy_data ): ?>
        <ul class="mpc-ft-todo__list">
            <?php
            foreach ( $dummy_data as $data):
                $checked = $data['checkbox'] ? 'checked' : ''; ?>
                <li class="mpc-ft-todo__item">
                    <div class="mpc-ft-todo__col-checkbox">
                        <input class="mpc-ft-todo__input-checkbox" type="checkbox" <?php echo $checked; ?>>
                    </div>
                    <div class="mpc-ft-todo__col-text">
                        <input class="mpc-ft-todo__input-text" type="text" value="<?php echo $data['text']; ?>">
                    </div>
                </li>
            <?php
            endforeach; ?>
        </ul>
    <?php
    endif; ?>

</div>