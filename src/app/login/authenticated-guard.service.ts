import {
  CanActivate,
  Router,
  RouterStateSnapshot,
  ActivatedRouteSnapshot
} from "@angular/router";
import { LoginService } from "./login.service";
import { Injectable } from "@angular/core";

@Injectable()
export class AuthenticatedGuard implements CanActivate {
  constructor(private _loginService: LoginService, private _router: Router) {}

  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot
  ): boolean {
    const result = !!this._loginService.currentToken;

    if (!result) {
      this._router.navigate(["/login"], {
        queryParams: { callback: state.url }
      });
    }

    return result;
  }
}
