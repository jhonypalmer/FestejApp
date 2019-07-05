import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { CadUsuarioService } from './cad-usuario.service';
import { AlertController, NavController } from '@ionic/angular';

@Component({
  selector: 'app-cad-usuario',
  templateUrl: './cad-usuario.page.html',
  styleUrls: ['./cad-usuario.page.scss'],
})
export class CadUsuarioPage implements OnInit {

  public form: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private cadUsuarioService: CadUsuarioService,
    private alertCtrl: AlertController,
    private navCtrl: NavController
  ) {
    this.form = this.formBuilder.group({
      nome: ['', [Validators.required]],
      sobrenome: ['', [Validators.required]],
      data_nascimento: ['', [Validators.required]],
      cpf: ['', []],
      cnpj: ['', []],
      email: ['', [Validators.required]],
      senha: ['', [Validators.required]],
    });
  }

  submit() {
    this.cadUsuarioService.cadUsuario(this.form.value).subscribe(() => {
      this.alertCtrl.create({message: 'Usuario cadastrado com sucesso'}).then((alert) => {
        alert.present();
        alert.onDidDismiss().then(() => {
          this.navCtrl.back();
        });
      });
    });
  }

  ngOnInit() {
  }

}
