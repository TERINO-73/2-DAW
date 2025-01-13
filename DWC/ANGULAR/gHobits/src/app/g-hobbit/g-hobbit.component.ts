import { Component } from '@angular/core';

@Component({
  selector: 'app-g-hobbit',
  standalone: false,
  
  templateUrl: './g-hobbit.component.html',
  styleUrl: './g-hobbit.component.css'
})
export class GHobbitComponent {
  public lista: string[]=[];
  public gHobit: string="";
  private accion: {id:number,nombre:string,indice:number};

  constructor() { 
    this.lista=["Frodo","Sam","Merry","Pippin"];
    this.gHobit = "";
    this.accion = {id:1,nombre:"Añadir",indice:1};
  }
}
