# React Lab

A React application featuring two main components:
1. **Users List** - Display and search users with role-based chips
2. **To Do App** - Task management with component-based architecture

## Features

### Users List
- Display user cards with profile picture, username, email, phone number, and birthdate
- Role-based chips with color coding:
  - Admin: Red
  - User: Green
  - Moderator: Yellow
- Search functionality by email
- Reset button to clear search and show all users

### To Do App
- Add new tasks
- Delete tasks
- Mark tasks as completed (with line-through styling)
- Component-based architecture:
  - Parent component manages state
  - Child 1: Add task form
  - Child 2: Task list display

## Installation

1. Install dependencies:
```bash
npm install
```

## Running the Application

Start the development server:
```bash
npm run dev
```

The application will be available at `http://localhost:5173` (or the port shown in the terminal).

## Build for Production

```bash
npm run build
```

## Preview Production Build

```bash
npm run preview
```

## Project Structure

```
reactlab/
├── src/
│   ├── components/
│   │   ├── UsersList.jsx          # Users list component
│   │   ├── UsersList.css
│   │   ├── TodoApp.jsx            # Parent component for To Do app
│   │   ├── TodoApp.css
│   │   ├── AddTaskForm.jsx        # Child 1: Add task form
│   │   ├── AddTaskForm.css
│   │   ├── TaskList.jsx           # Child 2: Task list
│   │   └── TaskList.css
│   ├── App.jsx                    # Main app component
│   ├── App.css
│   ├── main.jsx                   # Entry point
│   └── index.css                  # Global styles
├── index.html
├── package.json
├── vite.config.js
└── README.md
```

## Technologies Used

- React 18
- Vite
- CSS3

