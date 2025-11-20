import React, { useState } from 'react'
import './AddTaskForm.css'

function AddTaskForm({ onAddTask }) {
  const [taskText, setTaskText] = useState('')

  const handleSubmit = (e) => {
    e.preventDefault()
    onAddTask(taskText)
    setTaskText('')
  }

  return (
    <div className="add-task-form-container">
      <div className="child-label">Child 1</div>
      <div className="add-task-form">
        <h1 className="todo-title">To-Do App!</h1>
        <h2 className="add-new-title">Add New To-Do</h2>
        <form onSubmit={handleSubmit} className="task-form">
          <input
            type="text"
            className="task-input"
            placeholder="Enter new task"
            value={taskText}
            onChange={(e) => setTaskText(e.target.value)}
          />
          <button type="submit" className="add-button">
            Add
          </button>
        </form>
      </div>
    </div>
  )
}

export default AddTaskForm

