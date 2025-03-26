import { Component } from '@angular/core';
import { PAjaxService } from '../../servicios/p-ajax.service';
import {Router } from '@angular/router';
import { Persona } from '../../modelos/persona';
@Component({
  selector: 'app-listado',
  standalone: false,
  
  templateUrl: './listado.component.html',
  styleUrl: './listado.component.css'
})
export class ListadoComponent {

   public listarPer:Persona[]= [];
  constructor(private petition:PAjaxService, private ruta: Router) {

    this.petition.listar().subscribe((daticos:any)=>{
      console.log("Tamos en el constructor",daticos);
      this.listarPer = daticos;
  });
}
ngOnInit(){

}


borrar(id:number,nombre:string){
  console.log("Tamos en el borrar",id);
  if(confirm("¿Estas seguro de borrar a "+nombre+"?")){
    this.petition.borrar(id).subscribe((daticos:any)=>{
      console.log("Tamos en el borrar",daticos);
      this.listarPer = daticos;
    
  });
}

}

iraNuevaPersona(){
  //this.ruta.navigate(['personas-add/-1']);

  this.ruta.navigate(['personas-add',-1]);
}
iraEditar(id:number){
  this.ruta.navigate(['personas-add',id]);
}

}
