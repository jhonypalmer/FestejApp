import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { CadUsuarioPage } from './cad-usuario.page';
import { CadUsuarioService } from './cad-usuario.service';

const routes: Routes = [
  {
    path: '',
    component: CadUsuarioPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [CadUsuarioPage],
  providers: [
    CadUsuarioService
  ]
})
export class CadUsuarioPageModule {}
