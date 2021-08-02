import TodoItem from './TodoItem'

function TodoList({todo, setTodo}) {
    return (
        <ul className="mpc-ft-todo__list">
            {todo.map(el =>  <TodoItem key={el.id} el={el} todo={todo} setTodo={setTodo} />)}
        </ul>
    )
}

export default TodoList