import {
  HttpInterceptor,
  HttpHandler,
  HttpRequest
} from "@angular/common/http";
import { Injectable } from "@angular/core";
import { LoginService } from "./login.service";
import { nextContext } from "@angular/core/src/render3";

@Injectable({
  providedIn: "root"
})
export class AuthInterceptor implements HttpInterceptor {
  constructor(private _loginService: LoginService) {}

  intercept(req: HttpRequest<unknown>, next: HttpHandler) {
    const { token } = this._loginService;

    if (token) {
      return next.handle(
        req.clone({
          setHeaders: {
            Authorization: `Bearer ${token}`
          }
        })
      );
    }

    return next.handle(req);
  }
}
