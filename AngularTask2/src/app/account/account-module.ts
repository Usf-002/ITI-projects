import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { AccountRoutingModule } from './account-routing-module';
import { AccountShell } from './components/account-shell/account-shell';
import { Profile } from './components/profile/profile';
import { Settings } from './components/settings/settings';


@NgModule({
  declarations: [
    AccountShell,
    Profile,
    Settings
  ],
  imports: [
    CommonModule,
    AccountRoutingModule
  ]
})
export class AccountModule { }
