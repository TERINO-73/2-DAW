import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Vet } from '../models/vet';
import { Specialty } from '../models/specialty';

@Injectable({
  providedIn: 'root'
})
export class VetService {
  
  //URL
  private url = environment.API_URL
  
  constructor(
    private http: HttpClient
  ) { }

  //LISTAR
  
  obtenerVetPorId(id: number) {
    let body = JSON.stringify({
      accion: 'ObtenerVetId',
      id: id
    });
    return this.http.post<Vet>(this.url, body);
  }

  listarVets() {
    let body = JSON.stringify({
      accion: 'ListarVets'
    });

    return this.http.post<Vet[]>(this.url, body);
  }

  listarSpecialties() {
    let body = JSON.stringify({
      accion: 'ListarSpecialties'
    });

    return this.http.post<Specialty[]>(this.url, body);
  }

  //INSERTAR

  insertarVet(vet: Vet) {
    let body = JSON.stringify({
      accion: 'AnadeVet',
      vet: vet
    });
    return this.http.post<Vet>(this.url, body);
  }

  insertarSpecialty(specialty: Specialty) {
    let body = JSON.stringify({
      accion: 'AnadeSpecialty',
      specialty: specialty
    });
    return this.http.post<Specialty>(this.url, body);
  }

  //MODIFICAR

  modificarVet(vet: Vet) {
    let body = JSON.stringify({
      accion: 'ModificaVet',
      vet: vet
    });
    return this.http.post<Vet>(this.url, body);
  }

  modificarSpecialty(specialty: Specialty) {
    let body = JSON.stringify({
      accion: 'ModificaSpecialty',
      specialty: specialty
    });
    return this.http.post<Specialty>(this.url, body);
  }

  //ELIMINAR

  eliminarVet(id: number) {
    let body = JSON.stringify({
      accion: 'BorraVet',
      id: id
    });
    return this.http.post(this.url, body);
  }

  eliminarSpecialty(id: number) {
    let body = JSON.stringify({
      accion: 'BorraSpecialty',
      id: id
    });
    return this.http.post(this.url, body);
  }
}
