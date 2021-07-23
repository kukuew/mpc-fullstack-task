<?php
/**
 * Meta Boxe
 *
 */

defined( 'ABSPATH' ) || exit;

class MPC_FT_Meta_Box {

    public static function init() {
        add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
        add_action( 'save_post', array( __CLASS__, 'save_post' ), 10, 2 );
    }

    public static function add_meta_boxes() {
        add_meta_box( 'mpc-ft-settings', __( 'Settings', 'mpc-ft' ), 'MPC_FT_Meta_Box::output', 'mpc_ft_todo', 'normal' );
    }

    public static function output() {

        wp_nonce_field( MPC_FT_PLUGIN_BASENAME, 'mpc_ft_metabox_nonce' );
        $hide_wp_ui = mpc_ft_is_wp_ui() ? 'checked' : '';
        $use_react = mpc_ft_use_react() ? 'checked' : ''; ?>

        <p>
            <input id="mpc_ft_hide_wp_ui" type="checkbox" name="mpc_ft_hide_wp_ui" <?php echo $hide_wp_ui; ?>>
            <label for="mpc_ft_hide_wp_ui"><?php echo __( 'Hide WordPress UI', 'mpc-ft' ); ?></label>
        </p>

        <p>
            <input id="mpc_ft_use_react" type="checkbox" name="mpc_ft_use_react" <?php echo $use_react; ?>>
            <label for="mpc_ft_use_react"><?php echo __( 'Use React', 'mpc-ft' ); ?></label>
        </p>

        <?php
    }

    public static function save_post( $post_id, $post ) {
        if ( ! isset( $_POST['mpc_ft_metabox_nonce'] ) || ! wp_verify_nonce( $_POST['mpc_ft_metabox_nonce'], MPC_FT_PLUGIN_BASENAME ) ) {
            return $post_id;
        }

        $post_type = get_post_type_object( $post->post_type );

        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return $post_id;
        }

        $meta_keys = array(
            'mpc_ft_hide_wp_ui',
            'mpc_ft_use_react'
        );

        foreach ( $meta_keys as $meta_key ) {
            $meta_value = get_post_meta( $post_id, $meta_key, true );
            $new_meta_value = ( isset( $_POST[ $meta_key ] ) ? sanitize_html_class( $_POST[ $meta_key ] ) : '' );

            if ( ! empty( $new_meta_value ) && $new_meta_value !== $meta_value ) {
                update_post_meta( $post_id, $meta_key, $new_meta_value );
            }

            if ( empty( $new_meta_value ) && ! empty( $meta_value ) ) {
                delete_post_meta( $post_id, $meta_key, $meta_value );
            }
        }
    }

}

MPC_FT_Meta_Box::init();