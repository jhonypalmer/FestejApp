import { Injectable, Inject } from "@angular/core";
import { HttpClient } from '@angular/common/http';
import { API_BASE_PATH } from '../api-base-path';

@Injectable({
    providedIn: 'root'
})
export class CreateRequest {
    constructor(
        private http: HttpClient,
        @Inject(API_BASE_PATH) private basePath: string,
    ) {
    }

  public cadEvento(f) {
    return this.http.post(`${this.basePath}/api/evento`, f);
  }
}
