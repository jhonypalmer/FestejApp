import { Component, OnInit } from "@angular/core";
import { Evento } from "./evento.type";
import { EventosApiService } from "./eventos-api.service";

@Component({
  selector: "app-events",
  templateUrl: "./events.page.html",
  styleUrls: ["./events.page.scss"]
})
export class EventsPage implements OnInit {
  public title_card: string = "Festa dos Esquecidos 02";

  eventos: Evento[] = [];

  constructor(private evtService: EventosApiService) {}

  ngOnInit() {
    this.evtService.listar().then(res => {
      this.eventos = res;
    });
  }

  openMap() {
    window.open('/assets/map.html');
  }
}
