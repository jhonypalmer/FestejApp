import { Component, OnInit } from "@angular/core";
import { LoginService } from "./login.service";
import { ActivatedRoute, Router } from "@angular/router";

@Component({
  selector: "app-login",
  templateUrl: "./login.page.html",
  styleUrls: ["./login.page.scss"]
})
export class LoginPage implements OnInit {
  email?: string;
  senha?: string;

  private _callback: string;

  constructor(
    private _activatedRoute: ActivatedRoute,
    private _router: Router,
    private _loginService: LoginService
  ) {}

  ngOnInit() {
    this._callback = this._activatedRoute.snapshot.queryParams.callback || "/";
  }

  logar() {
    if (this.email && this.senha) {
      this._loginService.logar(this.email, this.senha).then(() => {
        this._router.navigate([this._callback]);
      });
    }
  }
}
