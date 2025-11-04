import { Component } from '@angular/core';
import { Shared } from '../../services/shared';

@Component({
  selector: 'app-one',
  standalone: false,
  templateUrl: './one.html',
  styleUrl: './one.css'
})
export class One {
  constructor(public sharedService: Shared) {} 
  changeMessage() {
    this.sharedService.setMessage('Message sent by Component 1');
  }
}
