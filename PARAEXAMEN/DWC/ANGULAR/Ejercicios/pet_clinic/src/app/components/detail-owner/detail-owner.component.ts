import { Component } from '@angular/core';
import { OwnerService } from '../../services/owner.service';
import { Owner } from '../../models/owner';
import { Router, ActivatedRoute, RouterLink } from '@angular/router';
import { CommonModule } from '@angular/common';
import{FormsModule} from '@angular/forms';
import { PetListComponent } from '../pet-list/pet-list.component';
@Component({
  selector: 'app-detail-owner',
  imports: [CommonModule,FormsModule,RouterLink,PetListComponent],
  templateUrl: './detail-owner.component.html',
  styleUrl: './detail-owner.component.css'
})
export class DetailOwnerComponent {
  public owner: Owner = <Owner>{};


  constructor(private ServiceOwner: OwnerService,private petition:OwnerService,private ruta : Router,private route: ActivatedRoute) {
    const ownerId = this.route.snapshot.params["id"];

    this.ServiceOwner.selOwner(ownerId).subscribe((daticos:any)=>{
      
      this.owner = daticos

    
   });


  }
  iraLista() {
    this.ruta.navigate(['/']);

  }
  borrar(id:number,nombre:string){
    var listado = "NO"
    console.log("Tamos en el borrar",id);
    if(confirm("¿Estas seguro de borrar a "+nombre+"?")){
      this.petition.borrar(id,listado).subscribe((daticos:any)=>{
        console.log("Tamos en el borrar",daticos);
    });
    
   }
   }
   iraEditar(id:number){
    this.ruta.navigate(['/pet-add/',id]);
   }
   AnadePet(){
    this.ruta.navigate(['/pet-add/']);
   }
}
