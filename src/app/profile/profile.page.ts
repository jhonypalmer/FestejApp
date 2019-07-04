import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.page.html',
  styleUrls: ['./profile.page.scss'],
})
export class ProfilePage implements OnInit {
  email = ''
  password = ''
  passwordConfirmation = ''
  login = true
  cadastro = false
  perfil = false

  constructor() { }

  ngOnInit() {
  }

  cadastroClick() {
    this.login = false;
    this.cadastro = true;
  }

  loginClick() {
    this.login = true;
    this.cadastro = false;
  }

  changeEmail(event) {
    this.email = event.target.value
  }

  changePassword(event) {
    this.password = event.target.value
  }

  changePasswordConfirmation(event) {
    this.passwordConfirmation = event.target.value
  }

  efetuaLogin() {
    alert(this.email + ' | ' + this.password)
    this.login = false;
    this.cadastro = false;
    this.perfil = true
  }

  efetuaCadastro() {
    alert(this.email + ' | ' + this.password + ' | ' + this.passwordConfirmation)
    this.login = false;
    this.cadastro = false;
    this.perfil = true
  }
}
