<?php

function mpc_ft_get_template_part( $slug ) {
    load_template( MPC_FT_ABSPATH . "templates/{$slug}.php", false );
}