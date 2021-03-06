import { NgModule } from "@angular/core";
import { PreloadAllModules, RouterModule, Routes } from "@angular/router";
import { AuthenticatedGuard } from "./login/authenticated-guard.service";

const routes: Routes = [
  { path: '', loadChildren: './tabs/tabs.module#TabsPageModule' },
  { path: 'login', loadChildren: './login/login.module#LoginPageModule' },
  { path: 'profile', loadChildren: './profile/profile.module#ProfilePageModule' },
  { path: 'events', loadChildren: './events/events.module#EventsPageModule' },
  { path: 'create', loadChildren: './create/create.module#CreatePageModule' },
  { path: 'edit-event', loadChildren: './edit-event/edit-event.module#EditEventPageModule' },
  { path: 'cad-usuario', loadChildren: './cad-usuario/cad-usuario.module#CadUsuarioPageModule' }
];
@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
