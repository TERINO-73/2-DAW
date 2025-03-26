import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { Alumno } from '../modelos/alumno';

@Injectable({
  providedIn: 'root'
})
export class AlumnoService {
  private url = environment.API_URL;

  constructor(
    private http: HttpClient
  ) { }

  //LISTAR

  listarAlum() {
    let body = JSON.stringify({
      accion: 3
    });

    return this.http.post<Alumno[]>(this.url, body);
  }

  obtenerAlumPorId(id: number) {
    let body = JSON.stringify({
      accion: 4,
      id: id
    });
    return this.http.post<Alumno>(this.url, body);
  }

  insertarAlum(alumno: Alumno) {
    let body = JSON.stringify({
      accion: 0,
      alumno: alumno
    });
    return this.http.post<Alumno>(this.url, body);
  }

  //MODIFICAR

  modificarAlum(alumno: Alumno) {
    let body = JSON.stringify({
      accion: 1,
      alumno:alumno
    });
    return this.http.post<Alumno>(this.url, body);
  }

  eliminarAlum(id: number) {
    let body = JSON.stringify({
      accion: 0,
      id: id,
   
    });
    return this.http.post<Alumno[]>(this.url, body);
  }

}
