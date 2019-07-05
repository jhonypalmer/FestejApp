import { Injectable, Inject } from "@angular/core";
import { HttpClient, HttpParams } from "@angular/common/http";
import { API_BASE_PATH } from "../api-base-path";

@Injectable({
  providedIn: "root"
})
export class LoginService {
  token?: string;

  constructor(
    @Inject(API_BASE_PATH) private _basePath: string,
    private _http: HttpClient
  ) {}

  logar(email: string, senha: string) {
    const params = new HttpParams().set("email", email).set("senha", senha);
    const req = this._http.post(`${this._basePath}/api/login`, params);

    req.subscribe((jwt: { token: string }) => {
      this.token = jwt.token;
    });
  }

  deslogar() {
      this.token = undefined;
  }
}
