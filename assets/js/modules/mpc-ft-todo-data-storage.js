class MPC_FT_Todo_Data_Storage {

    get_items() {
        if ( undefined === this._items ) {
            this._items = '' !== mpc_ft.todo_items ? mpc_ft.todo_items : [] ;
        }

        return this._items;
    }

    add_item( item ) {
        let items = this.get_items();

        items.unshift( item );

        this._items = items;
    }

    remove_item( index ) {
        let items = this.get_items();

        items.splice( index, 1 );

        this._items = items;
    }

}

module.exports = MPC_FT_Todo_Data_Storage;