import { Component, EventEmitter, Input, Output } from '@angular/core';
import { Pettype } from '../../models/pettype';
import { FormsModule } from '@angular/forms';
import { PetService } from '../../services/pet.service';

@Component({
  selector: 'app-pettype-add',
  imports: [FormsModule],
  templateUrl: './pettype-add.component.html',
  styleUrl: './pettype-add.component.css'
})
export class PettypeAddComponent {

  @Input() addMode: boolean = true;  // Recibe el modo de añadir o editar
  @Input() typeToEdit: Pettype | null = null;  // Recibe el tipo de mascota a editar

  @Output() cancel = new EventEmitter<void>(); // Evento para cancelar
  @Output() typeAddedMod = new EventEmitter<void>(); // Evento para notificar que se ha agregado un nuevo tipo

  public editableType: Pettype = <Pettype>{}; //Copia para editar antes de enviar

  public newType: Pettype = <Pettype>{};  // Nuevo tipo de mascota 

  constructor(
    private petService: PetService,
  ) { }

  // Metodo que se ejecutara al iniciar el componente
  ngOnInit() {
    if (!this.addMode && this.typeToEdit) {
      this.editableType = { ...this.typeToEdit };  // Copia del objeto
    }
  }
  

  // Metodo que se ejecutara al enviar el formulario
  onSubmit(form: Pettype) {
    if (this.addMode) {
      this.petService.insertarType(this.newType).subscribe({
        next: () => {
          this.typeAddedMod.emit();
          this.cancel.emit();
        },
        error: err => {
          console.log("Error al insertar Type: ", err);
        }
      });
    } else {
      this.petService.modificarType(this.editableType).subscribe({
        next: () => {
          this.typeAddedMod.emit();
          this.cancel.emit();
        },
        error: err => {
          console.log("Error al modificar Type: ", err);
        }
      })
    }
  }

  cancelar() {
    this.cancel.emit();
    }
}
