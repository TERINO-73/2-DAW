import { Component, OnInit } from '@angular/core';
import { OwnerService } from '../../services/owner.service';
import { Owner } from '../../models/owner';
import { Router, ActivatedRoute, RouterLink } from '@angular/router';
import { CommonModule } from '@angular/common';
import{FormsModule} from '@angular/forms';
@Component({
  selector: 'app-owners',
  imports: [CommonModule,FormsModule,RouterLink],
  templateUrl: './owners.component.html',
  styleUrl: './owners.component.scss'
})
export class OwnersComponent  {
  public listarOwn: Owner[]= [];
  constructor(private ServiceOwner: OwnerService,private petition:OwnerService,private ruta : Router) { 

    this.ServiceOwner.getOwners().subscribe((daticos:any)=>{
      
      this.listarOwn = daticos;

    
   });
  }
  ngOnInit(){
 
   
  }
  borrar(id:number,nombre:string){
    console.log("Tamos en el borrar",id);
    if(confirm("¿Estas seguro de borrar a "+nombre+"?")){
      this.petition.borrar(id).subscribe((daticos:any)=>{
        console.log("Tamos en el borrar",daticos);
        this.listarOwn = daticos;
      
    });
   }
   
   }
   
   iraNuevoOwner(){
    //this.ruta.navigate(['personas-add/-1']);
   
    this.ruta.navigate(['Owner-add',-1]);
   }
   iraEditar(id:number){
    this.ruta.navigate(['Owner-add',id]);
   }
  }


