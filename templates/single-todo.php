<?php
/**
 * Single content
 */

defined( 'ABSPATH' ) || exit;

wp_head(); ?>

<body <?php body_class(); ?>>
    <?php mpc_ft_get_template( 'content-todo' ); ?>
</body>

<?php
wp_footer();