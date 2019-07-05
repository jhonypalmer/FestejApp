import { Component, OnInit } from '@angular/core';
import { CreateRequest } from './create.request';
import { NavController } from '@ionic/angular';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-create',
  templateUrl: './create.page.html',
  styleUrls: ['./create.page.scss'],
})
export class CreatePage implements OnInit {

  constructor(
    private request: CreateRequest,
    private navCtrl: NavController
  ) { }

  ngOnInit() {
  }

  submit(f) {
    console.log(f);
    let form = new FormData(f)
    this.request.cadEvento(form).subscribe((data) => {
      this.navCtrl.back();
    })
  }

}
