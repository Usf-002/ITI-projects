import { Component, EventEmitter, Output } from '@angular/core';

@Component({
  selector: 'app-c',
  standalone: false,
  templateUrl: './c.html',
  styleUrl: './c.css'
})
export class C {
  @Output() messageEvent = new EventEmitter<string>();

  sendMessage() {
    this.messageEvent.emit('output task complete');
  }

}
