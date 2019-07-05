import { Component, OnInit } from "@angular/core";
import { AlertController } from '@ionic/angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: "app-profile",
  templateUrl: "./profile.page.html",
  styleUrls: ["./profile.page.scss"]
})
export class ProfilePage implements OnInit {
  email = "";
  password = "";
  passwordConfirmation = "";
  cadastro = false;

  constructor(
    private alert: AlertController,
  ) {
  }

  loginClick() {}

  ngOnInit() {}

  toogleCad() {
    this.cadastro = !this.cadastro;
  }

  changeEmail(event) {
    this.email = event.target.value;
  }

  changePassword(event) {
    this.password = event.target.value;
  }

  changePasswordConfirmation(event) {
    this.passwordConfirmation = event.target.value;
  }

  efetuaCadastro() {
    this.alert.create({
      message: this.email + " | " + this.password + " | " + this.passwordConfirmation,
      header: 'Atenção',
      buttons: ['ok']
    }).then((alert) => {
      alert.present()
    });
    this.cadastro = false;
  }
}
