const MPC_FT_Todo_Data_Storage = require( './mpc-ft-todo-data-storage' );
const MPC_FT_Todo_UI = require( './mpc-ft-todo-ui' );

class MPC_FT_Todo {
    constructor( element ) {
        this.todo = element;
        this.typing = false;
        this.form = this.todo.querySelector( '.js-mpc-ft-form' );
        this.list = this.todo.querySelector( '.js-mpc-ft-list' );
        this.data_storage = new MPC_FT_Todo_Data_Storage();
        this.ui = new MPC_FT_Todo_UI( this.todo );

        this.listeners();
    }

    listeners() {
        this.form.addEventListener( 'submit', this.on_sumbit.bind( this ) );
        this.list.addEventListener( 'click', this.on_remove.bind( this ) );
        this.list.addEventListener( 'change', this.on_change_checkbox.bind( this ) );
        this.list.addEventListener( 'input', this.on_change_text.bind( this ) );
    }

    on_sumbit( e ) {
        e.preventDefault();

        this.save_form_data();
        this.ui.output_items( this.data_storage.get_items() );
        this.ui.reset_ui();
    }

    on_remove( e ) {
        if ( ! e.target.classList.contains( 'js-mpc-ft-remove' ) ) {
            return;
        }

        let index = this.get_item_index( e.target );

        this.data_storage.remove_item( index );
        this.ui.output_items( this.data_storage.get_items() );
    }

    on_change_checkbox( e ) {
        if ( ! e.target.classList.contains( 'js-mpc-ft-input-checkbox' ) ) {
            return;
        }

        let index = this.get_item_index( e.target );
        let item = this.data_storage.get_item( index );

        item.checkbox = false === item.checkbox;

        this.data_storage.update_item( index, item );
    }

    on_change_text( e ) {
        if ( ! e.target.classList.contains( 'js-mpc-ft-input-text' ) ) {
            return;
        }

        let index = this.get_item_index( e.target );
        let item = this.data_storage.get_item( index );

        item.text = e.target.value;

        clearTimeout( this.typing );
        this.typing = setTimeout( () => {
            this.data_storage.update_item( index, item );
        }, 500 );
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

    get_item_index( element ) {
        let li_item = element.closest( '.js-mpc-ft-item' );

        return li_item.dataset.index;
    }
}

module.exports = MPC_FT_Todo;