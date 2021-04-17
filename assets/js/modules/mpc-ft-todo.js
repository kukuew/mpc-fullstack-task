const MPC_FT_Todo_Data_Storage = require( './mpc-ft-todo-data-storage' );
const MPC_FT_Todo_UI = require( './mpc-ft-todo-ui' );

class MPC_FT_Todo {
    constructor( element ) {
        this.todo = element;
        this.form = this.todo.querySelector( '.mpc-ft-todo__form' );
        this.data_storage = new MPC_FT_Todo_Data_Storage();
        this.ui = new MPC_FT_Todo_UI( this.todo );

        this.listeners();
    }

    listeners() {
        this.form.addEventListener( 'submit', this.on_sumbit.bind( this ) );
        this.todo.addEventListener( 'click', this.on_remove.bind( this ) );
    }

    on_sumbit( e ) {
        e.preventDefault();

        this.save_form_data();
        this.ui.output_items( this.data_storage.get_items() );
        this.ui.reset_ui();
    }

    on_remove( e ) {
        if ( ! e.target.classList.contains( 'mpc-ft-todo__remove' ) ) {
            return;
        }

        let index = e.target.dataset.index;

        this.data_storage.remove_item( index );
        this.ui.output_items( this.data_storage.get_items() );
    }

    save_form_data() {
        let form_data = new FormData( this.form );
        let item = {};

        if ( '' === form_data.get( 'text' ) ) {
            return;
        }

        item.checkbox = 'on' === form_data.get( 'checkbox' );
        item.text = form_data.get( 'text' );

        this.data_storage.add_item( item );
    }
}

module.exports = MPC_FT_Todo;