import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../environments/environment.development';
import { Pettype } from '../models/pettype';
@Injectable({
  providedIn: 'root',
})
export class PettypeService {
  private url: string = environment.API_URL;
  constructor(private http: HttpClient) {}

  getPetTypes() {
    let pa = JSON.stringify({ accion: 'ListarPettypes' });
    // return this.http.post(this.url, pa);
    return this.http.post<Pettype[]>(this.url, pa);
  }

  modPetTypes(pettype:Pettype){
    let pa = JSON.parse(JSON.stringify({ pettype:pettype }));
    pa.accion = 'ModificaPettype';
    console.log('pa', pa);
    return this.http.post<Pettype[]>(this.url, JSON.stringify(pa));
  
  }

    delPettype(id: number) {
      let pa = JSON.stringify({ accion: 'BorraPettype', id: id });
      console.log('pa.borrar:', pa);
      return this.http.post<Pettype[]>(this.url, pa);
    }

 
}
