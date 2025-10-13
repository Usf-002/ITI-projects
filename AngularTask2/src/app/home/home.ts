import { Component } from '@angular/core';

@Component({
  selector: 'app-home',
  standalone: false,
  templateUrl: './home.html',
  styleUrl: './home.css',
})
export class Home {
  x = 'Shop';
  sale = true;
  sales() {
    this.sale = !this.sale;
  }
}
