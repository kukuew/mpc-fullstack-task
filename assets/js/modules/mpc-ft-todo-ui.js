class MPC_FT_Todo_UI {

    constructor( element ) {
        this.todo = element;
        this.form = this.todo.querySelector( '.mpc-ft-todo__form' );
        this.list = this.todo.querySelector( '.mpc-ft-todo__list' );
        this.template = wp.template( 'mpc-ft-todo-item' );
    }

    output_items( items ) {
        this.list.innerHTML = '';

        let i = 0;
        for ( let item of items ) {
            item.i = i;
            this.list.innerHTML += this.template( {
                i: i,
                item: item
            } );
            i++;
        }
    }

    reset_ui() {
        this.form.reset();
    }

}

module.exports = MPC_FT_Todo_UI;