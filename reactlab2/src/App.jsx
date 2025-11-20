import React, { useState } from 'react'
import UsersList from './components/UsersList'
import TodoApp from './components/TodoApp'
import './App.css'

function App() {
  const [currentView, setCurrentView] = useState('users')

  return (
    <div className="app">
      <nav className="nav">
        <button 
          className={currentView === 'users' ? 'active' : ''}
          onClick={() => setCurrentView('users')}
        >
          Users List
        </button>
        <button 
          className={currentView === 'todo' ? 'active' : ''}
          onClick={() => setCurrentView('todo')}
        >
          To Do App
        </button>
      </nav>
      <main className="main-content">
        {currentView === 'users' ? <UsersList /> : <TodoApp />}
      </main>
    </div>
  )
}

export default App

