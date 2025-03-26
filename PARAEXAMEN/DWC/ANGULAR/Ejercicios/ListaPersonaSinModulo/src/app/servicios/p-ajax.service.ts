import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import{Persona} from '../modelos/persona';
@Injectable({
  providedIn: 'root'
})
export class PAjaxService {

  private url:string = "http://localhost/DWC/ANGULAR/Ejercicios/servidor.php";
  constructor(private http:HttpClient) { }


  listar(){
    let pa = JSON.stringify({servicio: "listar"});
    return this.http.post<Persona[]>(this.url, pa);
  }

  borrar(id:number){
    let pa = JSON.stringify({servicio: "borrar", id:id});
    return this.http.post<Persona[]>(this.url, pa);
  }
  anadir(persona:Persona){
    //clonacion de objetos:
    let pa = JSON.parse(JSON.stringify(persona));
    

    pa.servicio = "insertar";
    return this.http.post<Persona[]>(this.url,JSON.stringify(pa));
  }
  selPersona(id:number){
    let pa = JSON.stringify({servicio: "selPersonaID", id:id,});
    return this.http.post<Persona>(this.url, pa);
  }

  modificar(persona:Persona){
    let pa = JSON.parse(JSON.stringify(persona));
    pa.servicio = "modificar";
    console.log("pa",pa);
    return this.http.post<Persona[]>(this.url,JSON.stringify(pa));




    //console.log("persona:",persona);
    // let pa = JSON.stringify({servicio: "modificar", persona:persona,});
    // console.log("pa mod:",pa);
    // return this.http.post<Persona[]>(this.url, pa);

  }
}