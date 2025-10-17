import { NgModule, provideBrowserGlobalErrorListeners } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing-module';
import { App } from './app';
import { Parent } from '../app/components/parent/parent';
import { Child } from '../app/components/child/child';
import { P } from './components/parent2/p';
import { C } from './components/child2/c';
import { One } from './components/comp.one/one';
import { Two } from './components/comp.two/two';

@NgModule({
  declarations: [
    App,
    Parent,
    Child,
    P,
    C,
    One,
    Two
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [
    provideBrowserGlobalErrorListeners()
  ],
  bootstrap: [App]
})
export class AppModule { }
