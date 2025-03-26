import { Component, Input} from '@angular/core';
import { Visit } from '../../models/visit';
import { CommonModule } from '@angular/common';
import { OwnerService } from '../../services/owner.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-visit-list',
  imports: [CommonModule],
  templateUrl: './visit-list.component.html',
  styleUrl: './visit-list.component.css'
})
export class VisitListComponent {
 

  @Input() listarVist: Visit[] = [];

          constructor(private petition:OwnerService,private ruta : Router,private route: ActivatedRoute) { 
   

          }

borrarVisit(id:Number,date:string){

    
    if(confirm("¿Estas seguro de borrar la visita del dia "+date+"?")){
      this.petition.borraVisit(id).subscribe((daticos:any)=>{
        console.log("Tamos en el borrar",daticos);
        this.listarVist = daticos;

    });
    
   }
}

editarVisit(id:number){
  this.ruta.navigate(["visit-add/",id]);
}
}
 