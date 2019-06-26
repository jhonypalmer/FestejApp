import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-events',
  templateUrl: './events.page.html',
  styleUrls: ['./events.page.scss'],
})
export class EventsPage implements OnInit {
  public title_card: string = "Festa dos Esquecidos 02";

  constructor() { }

  ngOnInit() {
  }

}
