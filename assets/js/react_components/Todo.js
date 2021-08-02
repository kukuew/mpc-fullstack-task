const {useState} = React
import TodoAdd from './TodoAdd'
import TodoList from './TodoList'

let initValue = typeof mpc_ft.todo_items === 'object' ? mpc_ft.todo_items.map((el, id) => ({...el, id})) : []

function Todo() {
    const [todo, setTodo] = useState(initValue)
    return (
        <>
            <TodoAdd todo={todo} setTodo={setTodo} />
            <TodoList todo={todo} setTodo={setTodo} />
        </>
    );
}

export default Todo