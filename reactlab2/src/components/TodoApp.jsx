import React, { useState } from 'react'
import AddTaskForm from './AddTaskForm'
import TaskList from './TaskList'
import './TodoApp.css'

function TodoApp() {
  const [tasks, setTasks] = useState([])

  const addTask = (taskText) => {
    if (taskText.trim()) {
      const newTask = {
        id: Date.now(),
        text: taskText,
        completed: false
      }
      setTasks([...tasks, newTask])
    }
  }

  const deleteTask = (taskId) => {
    setTasks(tasks.filter(task => task.id !== taskId))
  }

  const toggleComplete = (taskId) => {
    setTasks(tasks.map(task =>
      task.id === taskId
        ? { ...task, completed: !task.completed }
        : task
    ))
  }

  return (
    <div className="todo-app-parent">
      <div className="parent-label">Parent (state List)</div>
      <div className="todo-app-container">
        <AddTaskForm onAddTask={addTask} />
        <TaskList
          tasks={tasks}
          onDeleteTask={deleteTask}
          onToggleComplete={toggleComplete}
        />
      </div>
    </div>
  )
}

export default TodoApp

