import { Component } from '@angular/core';
import { Pettype } from '../../models/pettype';
import { PetService } from '../../services/pet.service';
import { PettypeAddComponent } from "../pettype-add/pettype-add.component";

@Component({
  selector: 'app-pettype-list',
  standalone:true,
  imports: [PettypeAddComponent],
  templateUrl: './pettype-list.component.html',
  styleUrl: './pettype-list.component.css'
})
export class PettypeListComponent {


  //array de tipos
  pettypes: Pettype[] = [];

  showForm: boolean = false;
  addMode: boolean = true;  // Controla si es para añadir o editar
  
  typeToEdit: Pettype | null = null;  // Almacena el tipo que se está editando

  constructor(
    private petService: PetService
  ) { }

  // Metodo que se ejecutara al iniciar el componente
  ngOnInit() {
    this.petService.obtenerTypes().subscribe({
      next: (types) => {
        this.pettypes = types;
      },
      error: (err) => {
        console.log("Error al obtener Types: ", err);
      }
    })
  }


  eliminarType(id: number) {
    //Confirmacion
    if (confirm("Are you sure you want to delete this type with id " + id + "?")) {
      this.petService.eliminarType(id).subscribe({
        next: () => {
          this.ngOnInit();
        },
        error: (err) => {
          console.log("Error al eliminar Type: ", err);
        }
      })
    }
  }

  addNewType() {
    this.showForm = true;
    this.addMode = true;  // Modo añadir
    this.typeToEdit = null;  // No hay tipo para editar
  }

  editType(type: Pettype) {
    this.showForm = true;
    this.addMode = false;  // Modo editar
    this.typeToEdit = {...type};  // Se pasa el tipo a editar
  }


  modificarType() {
    
  }
}
