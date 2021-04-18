const MPC_FT_Ajax = require( './mpc-ft-ajax' );

class MPC_FT_Todo_Data_Storage {

    constructor() {
        this.ajax = new MPC_FT_Ajax();
    }

    get_items() {
        if ( undefined === this._items ) {
            this._items = '' !== mpc_ft.todo_items ? mpc_ft.todo_items : [] ;
        }

        return this._items;
    }

    get_item( index ) {
        let items = this.get_items();

        return items[ index ];
    }

    add_item( item ) {
        let items = this.get_items();

        items.unshift( item );

        this._items = items;
        this.save();
    }

    remove_item( index ) {
        let items = this.get_items();

        items.splice( index, 1 );

        this._items = items;
        this.save();
    }

    update_item( index, item ) {
        let items = this.get_items();

        items[ index ] = item;

        this._items = items;
        this.save();
    }

    save() {
        let items = this.sanitize_items( this.get_items() );

        this.ajax.save_todo_items( items );
    }

    sanitize_items( items ) {
        for ( let i = 0; items.length > i; i++ ) {
            let item = items[ i ];

            delete item.i;

            if ( ! item.hasOwnProperty( 'text' ) || '' === item.text ) {
                items.splice( i, 1 );
            }
        }

        return items;
    }

}

module.exports = MPC_FT_Todo_Data_Storage;