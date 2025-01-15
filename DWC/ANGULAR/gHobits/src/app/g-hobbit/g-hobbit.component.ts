import { Component } from '@angular/core';

@Component({
  selector: 'app-g-hobbit',
  standalone: false,
  
  templateUrl: './g-hobbit.component.html',
  styleUrl: './g-hobbit.component.css'
})
export class GHobbitComponent {

  public lista: string[];
  public gHobbit: string;
  // private accion: Object;
  private accion: {id: number, nombre: string, indice:number};

  constructor() {
    this.lista = ["Bilbo Bolsón", "Sam Gamyi", "Frodo Bolsón", 
      "Pippin Paladin", "Merry Brandigamo", "Rosita Coto"];
    this.gHobbit = "";
    this.accion = {id:1, nombre:"Añadir", indice:-1}; // 1 -> Añadir;
  }

  eliminar(hobbit:string, i:number){
    console.log("llega. hobbit: ", hobbit, "i: ", i);
    confirm("¿Desea eliminar a " + hobbit + "?");
    const indice = this.lista.indexOf(hobbit);
    this.lista.splice(indice,1);
  }

  anade(){
    console.log("llega. gHobbit: ", this.gHobbit);
    if(this.accion.id == 1){
      this.lista.push(this.gHobbit);
    }else{
      this.lista[this.accion.indice] = this.gHobbit;
    }
    this.gHobbit = "";
  }

  editar(hobbit:string, i:number){
    console.log("llega. hobbit: ", hobbit, "i: ", i);
    this.gHobbit = hobbit;
    this.accion = {id:2, nombre:"Editar", indice:i}; // 2 -> Editar;
  }


}
