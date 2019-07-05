import { Injectable, Inject } from "@angular/core";
import { HttpClient, HttpParams } from "@angular/common/http";
import { API_BASE_PATH } from "../api-base-path";
import { Subject, BehaviorSubject } from "rxjs";

@Injectable({
  providedIn: "root"
})
export class LoginService {
  private _tokenSubject = new BehaviorSubject<string | undefined>(undefined);
  readonly tokenChange$ = this._tokenSubject.asObservable();

  constructor(
    @Inject(API_BASE_PATH) private _basePath: string,
    private _http: HttpClient
  ) {
    this._subscribeToSessionStorage();
  }

  get currentToken() {
    return this._tokenSubject.value;
  }

  logar(email: string, senha: string): Promise<void> {
    const params = new HttpParams().set("email", email).set("senha", senha);
    const req = this._http.post(`${this._basePath}/api/login`, params);

    req.subscribe((jwt: { token: string }) => {
      this._tokenSubject.next(jwt.token);
    });

    return req.toPromise().then(() => undefined);
  }

  deslogar() {
    this._tokenSubject.next(undefined);
  }

  private _subscribeToSessionStorage() {
    const localToken = sessionStorage.getItem("token");

    if (localToken) {
      this._tokenSubject.next(localToken);
    }

    this._tokenSubject.subscribe(token => {
      sessionStorage.setItem("token", token);
    });
  }
}
