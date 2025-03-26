import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { Sexo } from '../modelos/sexo';

@Injectable({
  providedIn: 'root'
})
export class SexoService {

  private url = environment.API_URL;

  constructor(
    private http: HttpClient
  ) { }

  //LISTAR

  listaSexo() {
    let body = JSON.stringify({
      accion: 5
    });

    return this.http.post<Sexo[]>(this.url, body);
  }

  
  
    //MODIFICAR
  
    modificarSexo(sexo: Sexo) {
      let body = JSON.stringify({
        accion: 1,
        sexo:sexo
      });
      return this.http.post<Sexo>(this.url, body);
    }

      insertarSexo(sexo: Sexo) {
        let body = JSON.stringify({
          accion: 0,
          sexo: sexo
        });
        return this.http.post<Sexo>(this.url, body);
      }

  
    eliminarSexo(id:string) {
      let body = JSON.stringify({
        accion: 0,
        id: id,
     
      });
      return this.http.post<Sexo[]>(this.url, body);
    }
}
