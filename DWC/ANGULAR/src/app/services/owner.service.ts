import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Pet } from '../models/pet';
import { Owner } from '../models/owner';
import { environment } from '../../environments/environment.development';
@Injectable({
  providedIn: 'root',
})
export class OwnerService {
  private url: string = environment.API_URL;
  constructor(private http: HttpClient) {}

  getOwners() {
    let pa = JSON.stringify({ accion: 'ListarOwners' });
    // return this.http.post(this.url, pa);
    return this.http.post<Owner[]>(this.url, pa);
  }

  borrar(id:number){
    let pa = JSON.stringify({accion: "BorraOwner",id:id});
    console.log("pa.borrar:",pa)
    return this.http.post<Owner[]>(this.url, pa);
  }
  anadir(owner:Owner){
    //clonacion de objetos:
    let pa = JSON.parse(JSON.stringify(owner));
    

    pa.accion = "AnadeOwner";
    return this.http.post<Owner[]>(this.url,JSON.stringify(pa));
  }
  selOwner(id:number){
    let pa = JSON.stringify({accion: "ObtenerOwnerId", id:id,});
    return this.http.post<Owner>(this.url, pa);
  }

  modificar(owner:Owner){
    let pa = JSON.parse(JSON.stringify(owner));
    pa.accion = "ModificaOwner";
    console.log("pa",pa);
    return this.http.post<Owner[]>(this.url,JSON.stringify(pa));
}
}
