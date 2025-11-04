import { Component } from '@angular/core';

@Component({
  selector: 'app-p',
  standalone: false,
  templateUrl: './p.html',
  styleUrl: './p.css'
})
export class P {
 receivedMessage = '';

  onMessageReceived(message: string) {
    this.receivedMessage = message;
  }
}
