import { Component } from '@angular/core';
import { OwnerService } from '../../services/owner.service';
import { Router, ActivatedRoute, RouterLink } from '@angular/router';
import { Owner } from '../../models/owner';
import { CommonModule } from '@angular/common';
import{FormsModule} from '@angular/forms';
@Component({
  selector: 'app-form-owner',
  imports:[CommonModule,FormsModule,RouterLink],

  templateUrl: './form-owner.component.html',
  styleUrl: './form-owner.component.css'
})
export class FormOwnerComponent {
  public owner: Owner = <Owner>{};
  public textoBoton: string;


  constructor(private peticion: OwnerService, private ruta: Router, private route: ActivatedRoute) {


    this.textoBoton = "AÑADIR";

  }

  ngOnInit() {
    const ownerId = this.route.snapshot.params["id"];
    console.log("Id", ownerId);

    if (ownerId == -1) {
      this.textoBoton = "AÑADIR";

    } else {
      this.textoBoton = "MODIFICAR"

      this.peticion.selOwner(ownerId).subscribe({  
        next: res =>{
          console.log("res",res);
          this.owner = res;

       },
       error:error=>console.log("Error",error)
       

        });

    }
  }
  iraLista() {
    this.ruta.navigate(['/']);

  }


  onSubmit(owner: Owner) {
    const personaId = this.route.snapshot.params["id"];

    if(personaId == -1){
    this.peticion.anadir(owner).subscribe(
      res => {
        this.ruta.navigate(['/']);

      })
    }else{

      this.peticion.modificar(this.owner).subscribe(
        res => {
          this.ruta.navigate(['/']);
  
        })
    }

  }
}



