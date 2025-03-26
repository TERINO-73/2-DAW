import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Clase } from '../modelos/clase';
import { environment } from '../../environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class ServiciosService {

  private url = environment.API_URL_Jesus;

  constructor(private http: HttpClient) { }

  listarClases() {
    let pa = JSON.stringify({
      servicio: "listarClases"
    });
    return this.http.post<Clase[]>(this.url, pa);
  }

  borrarClase(id:number){
    let pa = JSON.stringify({servicio: "borrarClase", id:id});
    return this.http.post<Clase[]>(this.url, pa);
  }
  anadeClase(clase:Clase){
    let body = JSON.stringify({
      servicio: 'anadirClase',
      clase: clase,
    });
    return this.http.post<Clase>(this.url, body);
  }
  modificaClase(clase:Clase){
    let body = JSON.parse(JSON.stringify({
      servicio: 'modificarClase',
      clase: clase
    }));
    console.log("MOD",body);
    return this.http.post<Clase>(this.url, body);
  }

  selClaseId(id: number) {
    let body = JSON.stringify({
      servicio: 'infoClase',
      id: id
    });
    return this.http.post<Clase>(this.url, body);
  }
}