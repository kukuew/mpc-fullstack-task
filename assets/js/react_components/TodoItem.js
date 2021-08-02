function TodoItem({el, todo, setTodo}) {

    function update(element, action, newValue = null) {
        let newTodo = [...todo]
        let index = newTodo.map(e => e.id).indexOf(element.id)

        switch(action) {
            case('text'):
                newTodo[index].text = newValue
                break
            case('checkbox'):
                newTodo[index].checkbox = !newTodo[index].checkbox
                break
            case('remove'):
                newTodo.splice(index, 1)
                break
            default:
                break
        }

        setTodo(newTodo)
    }

    return (
        <li className="mpc-ft-todo__item">
            <div className="mpc-ft-todo__col-checkbox">
                <input
                    className="mpc-ft-todo__input-checkbox"
                    type="checkbox"
                    checked={el.checkbox}
                    onChange={() => update(el, 'checkbox')}
                />
            </div>
            <div className="mpc-ft-todo__col-text">
                <input
                    className="mpc-ft-todo__input-text"
                    type="text"
                    value={el.text}
                    onChange={e => update(el, 'text', e.nativeEvent.target.value)}
                />
            </div>
            <button
                className="mpc-ft-todo__action mpc-ft-todo__action--remove has-background"
                type="button"
                aria-label="Remove item"
                onClick={() => update(el, 'remove')} >
            </button>
        </li>
    )
}

export default TodoItem