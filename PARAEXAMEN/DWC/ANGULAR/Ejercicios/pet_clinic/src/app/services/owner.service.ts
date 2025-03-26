import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Pet } from '../models/pet';
import { Owner } from '../models/owner';
import { environment } from '../../environments/environment.development';
import { Visit } from '../models/visit';
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

  borrar(id: number, listado: string) {
    let pa = JSON.stringify({ accion: 'BorraOwner', id: id, listado: listado });
    console.log('pa.borrar:', pa);
    return this.http.post<Owner[]>(this.url, pa);
  }
  anadir(owner: Owner) {
    //clonacion de objetos:
    let pa = JSON.parse(
      JSON.stringify({
        accion: 'AnadeOwner',
        owner: owner,
      })
    );
    console.log('pa anande:', pa);
    return this.http.post<Owner[]>(this.url, JSON.stringify(pa));
  }
  selOwner(id: number) {
    let pa = JSON.stringify({ accion: 'ObtenerOwnerId', id: id });
    return this.http.post<Owner>(this.url, pa);
  }

  modificar(owner: Owner) {
    let pa = JSON.parse(JSON.stringify({ owner: owner }));
    pa.accion = 'ModificaOwner';
    console.log('pa', pa);
    return this.http.post<Owner[]>(this.url, JSON.stringify(pa));
  }
  getPet(id: number) {
    let pa = JSON.stringify({ accion: 'ListarPetsOwnerId', id: id });
    // return this.http.post(this.url, pa);
    return this.http.post<Pet[]>(this.url, pa);
  }
  borrarPet(id: number, listado: string) {
    let pa = JSON.stringify({ accion: 'BorraOwner', id: id, listado: listado });
    console.log('pa.borrar:', pa);
    return this.http.post<Owner[]>(this.url, pa);
  }
  anadePet(pet: Pet) {
    //clonacion de objetos:
    let pa = JSON.parse(
      JSON.stringify({
        accion: 'AnadePet',
        pet: pet,
      })
    );
    console.log('pa anande:', pa);
    return this.http.post<Pet[]>(this.url, JSON.stringify(pa));
  }
  modificaPet(pet: Pet) {
    let pa = JSON.parse(JSON.stringify({ pet: pet }));
    pa.accion = 'ModificaPet';
    console.log('pa', pa);
    return this.http.post<Pet[]>(this.url, JSON.stringify(pa));
  }

  selPet(id: number) {
    let pa = JSON.stringify({ accion: 'ObtenerPetId', id: id });
    return this.http.post<Pet>(this.url, pa);
  }
  getVisit(id: number) {
    let pa = JSON.stringify({ accion: 'ListarVisitasPet', id: id });
    // return this.http.post(this.url, pa);
    return this.http.post<Pet[]>(this.url, pa);
  }

  borraVisit(id:Number){
    let pa = JSON.stringify({ accion: 'BorraVisit', id: id});
    return this.http.post<Visit[]>(this.url, pa);
  }

  editarVisit(visit:Visit){
    let pa = JSON.parse(JSON.stringify({ visit:visit }));
    pa.accion = 'ModificaVisit';
    console.log("Estamos editando visita",pa);
    return this.http.post<Visit[]>(this.url, JSON.stringify(pa));
  }
  selVisit(id:number){
    let pa = JSON.stringify({ accion: 'ObtenerVisitId', id: id });
    return this.http.post<Visit>(this.url, pa);
  }
  anadeVisit(visit:Visit){
    let pa = JSON.parse(
      JSON.stringify({
        accion: 'AnadeVisit',
        visit: visit,
      })
    );
    console.log('pa anande:', pa);
    return this.http.post<Visit>(this.url, JSON.stringify(pa));
  }
  
}
