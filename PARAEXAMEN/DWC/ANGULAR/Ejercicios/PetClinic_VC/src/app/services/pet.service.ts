import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Pettype } from '../models/pettype';
import { Pet } from '../models/pet';
import { Owner } from '../models/owner';

@Injectable({
  providedIn: 'root'
})
export class PetService {
  //URL
  private url = environment.API_URL;

  constructor(
    private http: HttpClient
  ) { }

  //LISTAR

  obtenerTypes() {
    let body = JSON.stringify({
      accion: 'ListarPettypes'
    });
    return this.http.post<Pettype[]>(this.url, body);
  }

  obtenerPetPorId(id: number) {
    let body = JSON.stringify({
      accion: 'ObtenerPetId',
      id: id
    });
    return this.http.post<Pet>(this.url, body);
  }

  obtenerTodoPorOwnerId(ownerId: number) {
    const body = JSON.stringify({
      accion: 'ObtenerOwnerId_Pets',
      id: ownerId
    });
    return this.http.post<Owner>(this.url, body);
  }

  //INSERAR

  insertarPet(pet: Pet) {
    let body = JSON.stringify({
      accion: 'AnadePet',
      pet: {
        name: pet.name,
        birthDate: pet.birthDate,
        type: pet.type,
        owner: pet.owner
      }
    });
    return this.http.post<Pet>(this.url, body);
  }

  insertarType(type: Pettype) {
    let body = JSON.stringify({
      accion: 'AnadePettype',
      pettype: type
    });
    return this.http.post<Pettype>(this.url, body);
  }

  //MODIFICAR

  modificarPet(pet: Pet) {
    const body = JSON.stringify({
      accion: 'ModificaPet',
      pet: {
        id: pet.id,
        name: pet.name,
        birthDate: pet.birthDate,
        type: pet.type,
        owner: pet.owner
      }
    });
    return this.http.post<Pet>(this.url, body);
  }

  modificarType(type: Pettype) {
    const body = JSON.stringify({
      accion: 'ModificaPettype',
      pettype: type
    });
    return this.http.post<Pettype>(this.url, body);
  }

  //ELIMINAR

  eliminarPet(petId: number) {
    const body = JSON.stringify({
      accion: 'BorraPet',
      id: petId
    });
    return this.http.post<Pet[]>(this.url, body);
  }

  eliminarType(typeId: number) {
    const body = JSON.stringify({
      accion: 'BorraPettype',
      id: typeId
    });
    return this.http.post<Pettype[]>(this.url, body);
  }

}
