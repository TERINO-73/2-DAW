import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Zona } from '../models/zona';
import { Local } from '../models/local';

@Injectable({
  providedIn: 'root'
})
export class ZonasService {
 //URL
 private url = environment.API_URL;

 constructor(
   private http: HttpClient
 ) { }

 //LISTAR

 obtenerzonas() {
   let body = JSON.stringify({
     accion: 'ListarZonas'
   });
   return this.http.post<Zona[]>(this.url, body);
 }



 obtenerTodoPorOwnerId(ownerId: number) {
   const body = JSON.stringify({
     accion: 'ObtenerOwnerId_Pets',
     id: ownerId
   });
   return this.http.post<Local>(this.url, body);
 }

 //INSERAR



 insertarzona(zona: Zona) {
   let body = JSON.stringify({
     accion: 'AnadeZona',
     Zona: zona
   });
   return this.http.post<Zona>(this.url, body);
 }

 //MODIFICAR



 modificarzona(zona: Zona) {
   const body = JSON.stringify({
     accion: 'ModificaZona',
     zona: zona
   });
   return this.http.post<Zona>(this.url, body);
 }

 //ELIMINAR



 eliminarzona(zonaId: number) {
   const body = JSON.stringify({
     accion: 'BorrarZona',
     id: zonaId
   });
   return this.http.post<Zona[]>(this.url, body);
 }

}