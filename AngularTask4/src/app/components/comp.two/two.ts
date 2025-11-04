import { Component } from '@angular/core';
import { Shared } from '../../services/shared';
@Component({
  selector: 'app-two',
  standalone: false,
  templateUrl: './two.html',
  styleUrl: './two.css'
})
export class Two {
  constructor(public sharedService: Shared) {}

}
