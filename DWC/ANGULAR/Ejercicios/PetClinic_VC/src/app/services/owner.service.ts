import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Owner } from '../models/owner';

@Injectable({
  providedIn: 'root'
})
export class OwnerService {
  // URL
  private url = environment.API_URL;

  constructor(
    private http: HttpClient
  ) { }

  //LISTAR

  listarOwners() {
    let body = JSON.stringify({
      accion: 'ListarOwners'
    });

    return this.http.post<Owner[]>(this.url, body);
  }

  obtenerOwnerPorId(id: number) {
    let body = JSON.stringify({
      accion: 'ObtenerOwnerId',
      id: id
    });
    return this.http.post<Owner>(this.url, body);
  }

  //INSERTAR

  insertarOwner(owner: Owner) {
    let body = JSON.stringify({
      accion: 'AnadeOwner',
      owner: owner
    });
    return this.http.post<Owner>(this.url, body);
  }

  //MODIFICAR

  modificarOwner(owner: Owner) {
    let body = JSON.stringify({
      accion: 'ModificaOwner',
      owner: owner
    });
    return this.http.post<Owner>(this.url, body);
  }

  //ELIMINAR

  eliminarOwner(id: number) {
    let body = JSON.stringify({
      accion: 'BorraOwner',
      id: id,
      listado: 'OK'
    });
    return this.http.post<Owner[]>(this.url, body);
  }

}
