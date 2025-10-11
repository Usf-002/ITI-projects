import { NgModule, provideBrowserGlobalErrorListeners } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';

import { AppRoutingModule } from './app-routing-module';
import { App } from './app';
import { Header } from './header/header';
import { Footer } from './footer/footer';
import { Home } from './home/home';
import { Users } from './users/users';
import { Reports } from './reports/reports';
import { Settings } from './settings/settings';
import { Highlight } from './directives/highlight';

@NgModule({
  declarations: [
    App,
    Header,
    Footer,
    Home,
    Users,
    Reports,
    Settings,
    Highlight
  ],
  imports: [
    BrowserModule,
    FormsModule,
    AppRoutingModule
  ],
  providers: [
    provideBrowserGlobalErrorListeners()
  ],
  bootstrap: [App]
})
export class AppModule { }
