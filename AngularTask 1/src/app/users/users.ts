import { Component } from '@angular/core';
interface User {
  id: number;
  name: string;
  active: boolean;
}

@Component({
  selector: 'app-users',
  standalone: false,
  templateUrl: './users.html',
  styleUrl: './users.css'
})


export class Users {
  showList = true;
  users: User[] = [
    { id: 1, name: 'Usf', active: true },
    { id: 2, name: 'Hany', active: false },
    { id: 3, name: 'layla', active: true }
  ];

  toggleList() {
    this.showList = !this.showList;
  }

  toggleActive(u: User) {
    u.active = !u.active;
  }

  addUser(nameInput: HTMLInputElement) {
    const name = nameInput.value.trim();
    if (!name) return;
    this.users.push({ id: this.users.length + 1, name, active: true });
    nameInput.value = '';
  }
}
