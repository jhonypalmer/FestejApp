import { Injectable, Inject } from "@angular/core";
import { HttpClient } from '@angular/common/http';
import { API_BASE_PATH } from '../api-base-path';

@Injectable({
  providedIn: 'root'
})
export class CadUsuarioService {
  constructor(
    private http: HttpClient,
    @Inject(API_BASE_PATH) private  basePath: string,
  ) { }

  public cadUsuario(f) {
    return this.http.post(`${this.basePath}/api/usuario`, f);
  }
}
