import { Component, signal } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.html',
  standalone: false,
  styleUrl: './app.css'
})
export class MainApp {
  protected readonly title = signal('e-store');
  protected readonly version = signal('1.0.0');
  protected readonly year = signal(new Date().getFullYear());
}
