import { Component, OnInit } from "@angular/core";

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

  constructor() {}

  ngOnInit() {}

  cadastroClick() {
    this.cadastro = true;
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
    alert(
      this.email + " | " + this.password + " | " + this.passwordConfirmation
    );
    this.cadastro = false;
  }
}
