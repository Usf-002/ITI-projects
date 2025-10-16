import { Component } from '@angular/core';
import { AbstractControl, FormBuilder, FormGroup, ValidationErrors, Validators } from '@angular/forms';

@Component({
  selector: 'app-sign-up',
  standalone: false,
  templateUrl: './register.html',
  styleUrl: './register.css'
})
export class Register {
 
  signupForm: FormGroup;

  constructor(private fb: FormBuilder) {
    this.signupForm = this.fb.group(
      {
        fullName: ['', Validators.required],
        email: ['', [Validators.required, Validators.email]],
        handle: ['', [Validators.required, Validators.pattern(/^\S+$/)]],
        pass: [
          '',
          [
            Validators.required,
            Validators.minLength(8),
            Validators.pattern(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/)
          ]
        ],
        confirmPass: ['', Validators.required]
      },
      { validators: this.passwordsMatch }
    );
  }

 
  passwordsMatch(group: AbstractControl): ValidationErrors | null {
    const p = group.get('pass')?.value;
    const c = group.get('confirmPass')?.value;
    return p === c ? null : { mismatch: true };
  }

 
  submitRegistration() {
    if (this.signupForm.invalid) {
      this.signupForm.markAllAsTouched();
      return;
    }
    console.log('Registration payload:', this.signupForm.value);
    alert('Account created');
  }
}
