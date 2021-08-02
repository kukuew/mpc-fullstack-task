function TodoAdd({todo, setTodo}) {

    function addTodo(e) {
        e.preventDefault()

        let checkbox = e.nativeEvent.target.elements.checkbox.checked
        let text = e.nativeEvent.target.elements.text.value
        let id = todo.length ? todo[todo.length - 1].id + 1 : 1

        setTodo([...todo, {id, checkbox, text}])
        e.nativeEvent.target.reset()
    }

    return (
        <div className="mpc-ft-todo__add">
            <form className="mpc-ft-todo__form" onSubmit={addTodo}>
                <div className="mpc-ft-todo__col-checkbox">
                    <input
                        className="mpc-ft-todo__input-checkbox mpc-ft-todo__input-checkbox--add"
                        name="checkbox"
                        type="checkbox"
                    />
                </div>
                <div className="mpc-ft-todo__col-text">
                    <input
                        className="mpc-ft-todo__input-text mpc-ft-todo__input-text--add"
                        name="text"
                        type="text"
                        placeholder="Enter new task here..."
                        required
                    />
                </div>
                <button
                    className="mpc-ft-todo__action mpc-ft-todo__action--add has-background"
                    type="submit"
                    aria-label="Add item">
                </button>
            </form>
        </div>
    );
}

export default TodoAdd