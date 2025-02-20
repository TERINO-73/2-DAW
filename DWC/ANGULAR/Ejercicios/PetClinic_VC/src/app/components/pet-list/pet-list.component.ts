import { Component, Input } from '@angular/core';
import { Pet } from '../../models/pet';
import { PetService } from '../../services/pet.service';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { VisitListComponent } from "../visit-list/visit-list.component";

@Component({
  selector: 'app-pet-list',
  imports: [VisitListComponent, RouterLink],
  templateUrl: './pet-list.component.html',
  styleUrl: './pet-list.component.css'
})
export class PetListComponent {
  // Propiedad de entrada para recibir el ID del propietario de detailOwner
  @Input() ownerId: number = -1;

  // Propiedad para almacenar la lista de mascotas
  public petList: Pet[] = [];

  constructor(
    private petService: PetService,
  ) {}

  // Metodo que se ejecutara al iniciar el componente
  ngOnInit() {
    if (this.ownerId != -1 && this.ownerId != undefined) {
      this.listarPets();
    } else {
      console.log("No se ha recibido un ID de propietario válido.");
    }
  }

  //OTROS METODOS
  listarPets() {
    //Obtener las mascotas del propietario
    this.petService.obtenerTodoPorOwnerId(this.ownerId).subscribe({
      next: (owner) => {
        this.petList = owner.pets;
      },
      error: (err) => {
        console.log("Error al obtener Pets: ", err);
      }
    })
  }

  eliminarPet(petId: number) {
    //Confirmacion
    if (confirm("Are you sure you want to delete this pet with id " + petId + "?")) {
      this.petService.eliminarPet(petId).subscribe({
        next: () => {
          this.listarPets();
        },
        error: (err) => {
         console.log("Error al eliminar Pet: ", err); 
        }
      })
    }
  }
}
