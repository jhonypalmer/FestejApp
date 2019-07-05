import { Injectable, Inject } from "@angular/core";
import { API_BASE_PATH } from "../api-base-path";
import { HttpClient } from "@angular/common/http";
import { Evento } from "./evento.type";

@Injectable()
export class EventosApiService {
  constructor(
    @Inject(API_BASE_PATH) private _basePath: string,
    private _http: HttpClient
  ) {}

  listar(): Promise<Evento[]> {
    return this._http.get<Evento[]>(`${this._basePath}/api/evento`).toPromise();
  }
}
