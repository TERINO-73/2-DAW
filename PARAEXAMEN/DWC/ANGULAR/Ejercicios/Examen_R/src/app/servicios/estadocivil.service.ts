import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Estadocivil } from '../modelos/estadocivil';

@Injectable({
  providedIn: 'root'
})
export class EstadocivilService {

  private url = environment.API_URL;

  constructor(
    private http: HttpClient
  ) { }

  //LISTAR

  listaEstado() {
    let body = JSON.stringify({
      accion: 9
    });

    return this.http.post<Estadocivil[]>(this.url, body);
  }
}
