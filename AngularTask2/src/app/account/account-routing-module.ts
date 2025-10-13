import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AccountShell } from './components/account-shell/account-shell';
import { Profile } from './components/profile/profile';
import { Settings } from './components/settings/settings';

const routes: Routes = [
  {
    path: '',
    component: AccountShell,
    children: [
      { path: 'profile', component: Profile },
      { path: 'settings', component: Settings },
      { path: '', redirectTo: 'profile', pathMatch: 'full' },
    ],
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class AccountRoutingModule {}
