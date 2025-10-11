import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { Home } from './home/home';
import { Reports } from './reports/reports';
import { Users } from './users/users';
import { Settings } from './settings/settings';


const routes: Routes = [
  { path: 'home', component: Home },
  { path: 'users', component: Users },
  { path: 'reports', component: Reports },
  { path: 'settings', component: Settings },
  { path: '', redirectTo: '/home', pathMatch: 'full' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
