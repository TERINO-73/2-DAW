import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Local } from '../models/local';
import { Carta } from '../models/carta';
@Injectable({
  providedIn: 'root'
})
export class LocalesService {

  private url = environment.API_URL;

  constructor(
    private http: HttpClient
  ) { }

  listarLocales() {
    let body = JSON.stringify({
      accion: 'ListarLocales'
    });

    return this.http.post<Local[]>(this.url, body);
  }

  eliminarLocal(id: number) {
    let body = JSON.stringify({
      accion: 'BorrarLocal',
      id: id,
    });
    return this.http.post<Local[]>(this.url, body);
  }

  modificarLocal(local: Local) {
    let body = JSON.stringify({
      accion: 'ModificaLocal',
      local: local
    });
    return this.http.post<Local>(this.url, body);
  }

  insertarLocal(local: Local) {
    local.id_zona = 2;
    let body = JSON.stringify({
      accion: 'AnadeLocal',
      local: local
      
    });
    
    return this.http.post<Local>(this.url, body);
  }

  obtenerLocalPorId(id: number) {
    let body = JSON.stringify({
      accion: 'ObtenerLocalId',
      id: id
    });
    return this.http.post<Local>(this.url, body);
  }
  obtenerCartaPorId(id: number) {
    let body = JSON.stringify({
      accion: 'ObtenerCartaIdLocal',
      id: id
    });
    return this.http.post<Carta[]>(this.url, body);
  }
}
