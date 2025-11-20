import React, { useState } from 'react'
import './UsersList.css'

// Sample users data
const usersData = [
  {
    id: 1,
    profilePicture: 'https://i.pravatar.cc/150?img=1',
    username: 'john_doe',
    email: 'john.doe@example.com',
    phone: '+1 234-567-8900',
    birthdate: '1990-05-15',
    role: 'admin'
  },
  {
    id: 2,
    profilePicture: 'https://i.pravatar.cc/150?img=2',
    username: 'jane_smith',
    email: 'jane.smith@example.com',
    phone: '+1 234-567-8901',
    birthdate: '1992-08-20',
    role: 'user'
  },
  {
    id: 3,
    profilePicture: 'https://i.pravatar.cc/150?img=3',
    username: 'bob_wilson',
    email: 'bob.wilson@example.com',
    phone: '+1 234-567-8902',
    birthdate: '1988-12-10',
    role: 'moderator'
  },
  {
    id: 4,
    profilePicture: 'https://i.pravatar.cc/150?img=4',
    username: 'alice_brown',
    email: 'alice.brown@example.com',
    phone: '+1 234-567-8903',
    birthdate: '1995-03-25',
    role: 'user'
  },
  {
    id: 5,
    profilePicture: 'https://i.pravatar.cc/150?img=5',
    username: 'charlie_davis',
    email: 'charlie.davis@example.com',
    phone: '+1 234-567-8904',
    birthdate: '1991-07-18',
    role: 'admin'
  },
  {
    id: 6,
    profilePicture: 'https://i.pravatar.cc/150?img=7',
    username: 'diana_miller',
    email: 'diana.miller@example.com',
    phone: '+1 234-567-8905',
    birthdate: '1993-11-30',
    role: 'moderator'
  }
]

function UsersList() {
  const [users, setUsers] = useState(usersData)
  const [searchEmail, setSearchEmail] = useState('')
  const [showReset, setShowReset] = useState(false)

  const handleSearch = (e) => {
    e.preventDefault()
    if (searchEmail.trim()) {
      const filtered = usersData.filter(user =>
        user.email.toLowerCase().includes(searchEmail.toLowerCase())
      )
      setUsers(filtered)
      setShowReset(true)
    }
  }

  const handleReset = () => {
    setUsers(usersData)
    setSearchEmail('')
    setShowReset(false)
  }

  const getRoleChipColor = (role) => {
    switch (role.toLowerCase()) {
      case 'admin':
        return 'red'
      case 'user':
        return 'green'
      case 'moderator':
        return 'yellow'
      default:
        return 'gray'
    }
  }

  const formatBirthdate = (dateString) => {
    const date = new Date(dateString)
    return date.toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    })
  }

  return (
    <div className="users-list-container">
      <h1 className="users-title">Users</h1>
      
      <form className="search-form" onSubmit={handleSearch}>
        <input
          type="text"
          className="search-input"
          placeholder="email"
          value={searchEmail}
          onChange={(e) => setSearchEmail(e.target.value)}
        />
        <button type="submit" className="search-button">
          Search
        </button>
        {showReset && (
          <button type="button" className="reset-button" onClick={handleReset}>
            Reset
          </button>
        )}
      </form>

      <div className="users-grid">
        {users.map(user => (
          <div key={user.id} className="user-card">
            <div className="profile-picture-container">
              <img
                src={user.profilePicture}
                alt={user.username}
                className="profile-picture"
              />
            </div>
            <div className={`role-chip role-chip-${getRoleChipColor(user.role)}`}>
              {user.role.charAt(0).toUpperCase() + user.role.slice(1)}
            </div>
            <div className="user-details">
              <div className="user-detail-item">
                <span className="detail-label">Username:</span>
                <span className="detail-value">{user.username}</span>
              </div>
              <div className="user-detail-item">
                <span className="detail-label">Email:</span>
                <span className="detail-value">{user.email}</span>
              </div>
              <div className="user-detail-item">
                <span className="detail-label">Phone:</span>
                <span className="detail-value">{user.phone}</span>
              </div>
              <div className="user-detail-item">
                <span className="detail-label">Birthdate:</span>
                <span className="detail-value">{formatBirthdate(user.birthdate)}</span>
              </div>
            </div>
          </div>
        ))}
      </div>

      {users.length === 0 && (
        <div className="no-results">
          <p>No users found matching the search criteria.</p>
        </div>
      )}
    </div>
  )
}

export default UsersList

