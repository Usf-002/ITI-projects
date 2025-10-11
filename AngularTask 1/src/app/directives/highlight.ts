import { Directive, HostBinding, HostListener } from '@angular/core';

@Directive({
  selector: '[appHighlight]',
  standalone: false
})
export class Highlight {

  @HostBinding('style.backgroundColor') bg: string | null = null;

  @HostListener('mouseenter') onEnter() {
    this.bg = '#f8f9fa'; 
  }
  @HostListener('mouseleave') onLeave() {
    this.bg = null;
  }
  constructor() { }

}
