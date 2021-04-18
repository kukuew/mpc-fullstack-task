<?php
/**
 * Content
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="mpc-ft">
    <div class="mpc-ft__container">
        <div class="mpc-ft__inner <?php echo mpc_ft_is_wp_ui() ? 'mpc-ft__inner--full-screen' : ''; ?>">
            <?php mpc_ft_get_template( 'parts/todo' ); ?>
        </div>
    </div>
</section>