import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Visit } from '../models/visit';

@Injectable({
  providedIn: 'root'
})
export class VisitService {

  //URL
    private url = environment.API_URL;

  constructor(
    private http: HttpClient
  ) { }

  //LISTAR

  obtenerVisitsPorPetId(petId: number) {
    const body = JSON.stringify({
      accion: 'ListarVisitasPet',
      id: petId
    });
    return this.http.post<Visit[]>(this.url, body);
  }

  obtenerDatosVisit(visitId: number) {
    const body = JSON.stringify({
      accion: 'ObtenerVisitId',
      id: visitId
    });
    return this.http.post<Visit>(this.url, body);
  }

  //INSERTAR

  insertarVisit(visit: Visit) {
    const body = JSON.stringify({
      accion: 'AnadeVisit',
      visit: visit
    });
    return this.http.post<Visit>(this.url, body);
  }

  //MODIFICAR

  modificarVisit(visit: Visit) {
    const body = JSON.stringify({
      accion: 'ModificaVisit',
      visit: visit
    });
    return this.http.post<Visit>(this.url, body);
  }

  //ELIMINAR
  eliminarVisit(visitId: number) {
    const body = JSON.stringify({
      accion: 'BorraVisit',
      id: visitId
    });
    return this.http.post<Visit[]>(this.url, body);
  }

}
