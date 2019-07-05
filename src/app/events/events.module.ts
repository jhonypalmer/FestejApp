import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { FormsModule } from "@angular/forms";
import { Routes, RouterModule } from "@angular/router";

import { IonicModule } from "@ionic/angular";

import { EventsPage } from "./events.page";
import { EventosApiService } from "./eventos-api.service";

const routes: Routes = [
  {
    path: "",
    component: EventsPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [EventsPage],
  providers: [EventosApiService]
})
export class EventsPageModule {}
