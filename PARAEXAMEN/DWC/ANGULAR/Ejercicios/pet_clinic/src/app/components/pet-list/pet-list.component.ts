import { Component,  } from '@angular/core';
import { OwnerService } from '../../services/owner.service';
import { Pet } from '../../models/pet';
import { Router, ActivatedRoute, RouterLink } from '@angular/router';
import { CommonModule } from '@angular/common';
import { VisitListComponent } from '../visit-list/visit-list.component';
import{FormsModule} from '@angular/forms';
@Component({
  selector: 'app-pet-list',
  imports: [CommonModule,FormsModule,RouterLink,VisitListComponent],
  templateUrl: './pet-list.component.html',
  styleUrl: './pet-list.component.css'
})
export class PetListComponent {
      public listarPet: Pet[]= [];
      
      
        constructor(private ServiceOwner: OwnerService,private petition:OwnerService,private ruta : Router,private route: ActivatedRoute) { 
          const ownerId = this.route.snapshot.params["id"];
          this.ServiceOwner.getPet(ownerId).subscribe((daticos:any)=>{
            
            this.listarPet = daticos;
            console.log("pets",daticos);
            
          
         });
        }

      editaPet(id:number){
        this.ruta.navigate(["pet-add/",id]);
      }
      borraPet(id:number,nombre:string){
        var listado = "OK"
        console.log("Tamos en el borrar",id);
        if(confirm("¿Estas seguro de borrar a "+nombre+"?")){
          this.petition.borrar(id,listado).subscribe((daticos:any)=>{
            console.log("Tamos en el borrar",daticos);
            this.listarPet = daticos;

        });
        
       }
      }
      AnadeVisita(){
        this.ruta.navigate(["visit-add/",-1]);
      }
}
