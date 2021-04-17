class MPC_FT_Ajax {

    save_todo_items( items ) {

        let data = new FormData();

        data.append( 'action', 'mpc_ft_save_todo_items' );
        data.append( 'nonce', mpc_ft.nonce );
        data.append( 'items', JSON.stringify( items ) );
        data.append( 'post_id', mpc_ft.post_id );

        fetch( mpc_ft.ajax_url, {
            method: 'POST',
            body: data
        } );

    }

}

module.exports = MPC_FT_Ajax;