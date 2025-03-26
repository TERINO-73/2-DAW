import { Component, EventEmitter, Input, Output } from '@angular/core';
import { FormBuilder, FormGroup, Validators, ReactiveFormsModule } from '@angular/forms';
import { Pettype } from '../../models/pettype';
import { PetService } from '../../services/pet.service';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-pettype-add',
  standalone: true,
  imports: [ReactiveFormsModule, CommonModule],
  templateUrl: './pettype-add.component.html',
  styleUrl: './pettype-add.component.css'
})
export class PettypeAddComponent {

  @Input() addMode: boolean = true;  // Modo añadir o editar
  @Input() typeToEdit: Pettype | null = null;  // Tipo de mascota a editar

  @Output() cancel = new EventEmitter<void>(); // Evento para cancelar
  @Output() typeAddedMod = new EventEmitter<void>(); // Evento cuando se añade o edita un tipo

  public form: FormGroup;

  constructor(
    private petService: PetService,
    private fb: FormBuilder
  ) {
    // Crear el formulario reactivo con validaciones
    this.form = this.fb.group({
      name: ['', [Validators.required]]
    });
  }

  // Método que se ejecuta al iniciar el componente
  ngOnInit() {
    if (!this.addMode && this.typeToEdit) {
      this.form.patchValue(this.typeToEdit); // Rellena el formulario con los valores del tipo a editar
    }
  }

  // Método que se ejecuta al enviar el formulario
  onSubmit() {
    if (this.form.valid) {
      const petType: Pettype = { ...this.typeToEdit, ...this.form.value }; // Combina los datos del formulario con los actuales

      if (this.addMode) {
        this.petService.insertarType(petType).subscribe({
          next: () => {
            this.typeAddedMod.emit();
            this.cancel.emit();
          },
          error: err => console.log("Error al insertar Type:", err)
        });
      } else {
        this.petService.modificarType(petType).subscribe({
          next: () => {
            this.typeAddedMod.emit();
            this.cancel.emit();
          },
          error: err => console.log("Error al modificar Type:", err)
        });
      }
    }
  }

  cancelar() {
    this.cancel.emit();
  }
}
