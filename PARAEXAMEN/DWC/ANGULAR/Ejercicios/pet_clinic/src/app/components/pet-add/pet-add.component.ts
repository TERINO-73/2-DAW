import { Component} from '@angular/core';
import { OwnerService } from '../../services/owner.service';
import { Pet } from '../../models/pet';
import { Router, ActivatedRoute, RouterLink } from '@angular/router';
import { CommonModule } from '@angular/common';
import{FormsModule} from '@angular/forms';

@Component({
  selector: 'app-pet-add',
  imports: [CommonModule,FormsModule,RouterLink],
  templateUrl: './pet-add.component.html',
  styleUrl: './pet-add.component.css'
})
export class PetAddComponent {
  public pet: Pet = <Pet>{};
  public textoBoton: string;
  

  constructor(private peticion: OwnerService, private ruta: Router, private route: ActivatedRoute) {


    this.textoBoton = "AÑADIR";

  }
  ngOnInit() {
    const petId = this.route.snapshot.params["id"];
    console.log("Id", petId);
    if (petId == -1) {
      this.textoBoton = "AÑADIR";

    } else {
      this.textoBoton = "MODIFICAR"

      this.peticion.selPet(petId).subscribe({  
        next: res =>{
          console.log("res",res);
          this.pet = res;

       },
       error:error=>console.log("Error",error)
       

        });

    }
  }
  iraLista() {
    this.ruta.navigate(['/']);

  }


  onSubmit(pet: Pet) {
    const personaId = this.route.snapshot.params["id"];

    if(personaId == -1){
    this.peticion.anadePet(pet).subscribe({
      next:resp => {
        this.ruta.navigate(['/']);

      },
      error:error=>console.log("Error",error)
    });
    }else{

      this.peticion.modificaPet(this.pet).subscribe(
        res => {
          this.ruta.navigate(['/']);
  
        })
    }

  }
}
