import React from 'react'
import './TaskList.css'

function TaskList({ tasks, onDeleteTask, onToggleComplete }) {
  return (
    <div className="task-list-container">
      <div className="child-label">Child 2</div>
      <div className="task-list">
        <h2 className="task-list-title">Let's get some work done!</h2>
        {tasks.length === 0 ? (
          <p className="no-tasks">No tasks yet. Add one to get started!</p>
        ) : (
          <div className="tasks">
            {tasks.map(task => (
              <div key={task.id} className="task-item">
                <div className="task-buttons">
                  <button
                    className={task.completed ? 'undo-button' : 'complete-button'}
                    onClick={() => onToggleComplete(task.id)}
                  >
                    {task.completed ? 'Undo' : 'Complete'}
                  </button>
                  <button
                    className="delete-button"
                    onClick={() => onDeleteTask(task.id)}
                  >
                    Delete
                  </button>
                </div>
                <span className={`task-text ${task.completed ? 'completed' : ''}`}>
                  {task.text}
                </span>
              </div>
            ))}
          </div>
        )}
      </div>
    </div>
  )
}

export default TaskList

