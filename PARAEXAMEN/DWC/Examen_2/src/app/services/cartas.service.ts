import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Carta } from '../models/carta';
@Injectable({
  providedIn: 'root'
})
export class CartasService {

  //URL
  private url = environment.API_URL;

  constructor(
    private http: HttpClient
  ) { }

  //LISTAR



  obtenerDatosVisit(visitId: number) {
    const body = JSON.stringify({
      accion: 'ObtenerLiniaCartaId',
      id: visitId
    });
    return this.http.post<Carta>(this.url, body);
  }

  //INSERTAR

  insertarliniaCarta(visit: Carta) {
    const body = JSON.stringify({
      accion: 'AnadeLiniaCarta',
      visit: visit
    });
    return this.http.post<Carta>(this.url, body);
  }

  //MODIFICAR

  modificarliniaCarta(visit: Carta) {
    const body = JSON.stringify({
      accion: 'ModificaLiniaCarta',
      visit: visit
    });
    return this.http.post<Carta>(this.url, body);
  }

  //ELIMINAR
  eliminarliniaCarta(visitId: number) {
    const body = JSON.stringify({
      accion: 'BorrarLiniaCarta',
      id: visitId
    });
    return this.http.post<Carta[]>(this.url, body);
  }

  obtenerCartaPorId(id: number) {
    let body = JSON.stringify({
      accion: 'ObtenerCartaIdLocal',
      id: id
    });
    return this.http.post<Carta[]>(this.url, body);
  }
}