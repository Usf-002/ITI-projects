import { Component } from '@angular/core';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-sign-in',
  standalone: false,
  templateUrl: './login.html',
  styleUrl: './login.css'
})
export class Login {
  
  handleLogin(form: NgForm) {
    if (!form.valid) {
      
      Object.values(form.controls).forEach(c => c.markAsTouched());
      return;
    }
    console.log('Login payload:', form.value);
    alert('Signed in!');
  }
}
