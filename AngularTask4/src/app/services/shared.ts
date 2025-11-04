import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class Shared {
  private sharedMessage: string = 'Shared Service';
  setMessage(msg: string) {
    this.sharedMessage = msg;
  }

  getMessage() {
    return this.sharedMessage;
  }
}
