import { Component, EventEmitter, Input, Output, OnInit, signal } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Zona } from '../../../models/zona';
import { ZonasService } from '../../../services/zonas.service';
import { ReactiveFormsModule } from '@angular/forms';

@Component({
  selector: 'app-zonas-form',
  templateUrl: './zonas-form.component.html',
  styleUrl: './zonas-form.component.css',
})
export class ZonasFormComponent implements OnInit {
  @Input() addMode: boolean = true;  
  @Input() typeToEdit: Zona | null = null;  

  @Output() cancel = new EventEmitter<void>();  
  @Output() typeAddedMod = new EventEmitter<void>();  

  zonasForm: FormGroup;  
  isSubmitted = signal(false); // Para manejar la validación con señales

  constructor(private fb: FormBuilder, private zonaService: ZonasService) {
    this.zonasForm = this.fb.group({
      nombre: ['', Validators.required],
    });
  }

  ngOnInit() {
    if (!this.addMode && this.typeToEdit) {
      this.zonasForm.patchValue({
        nombre: this.typeToEdit.nombre,
      });
    }
  }

  onSubmit() {
    this.isSubmitted.set(true);
    if (this.zonasForm.invalid) return; 

    if (this.addMode) {
      this.zonaService.insertarzona(this.zonasForm.value).subscribe({
        next: () => {
          this.typeAddedMod.emit();
          this.cancel.emit();
        },
        error: err => console.log('Error al insertar Type:', err),
      });
    } else {
      const updatedZona: Zona = { ...this.typeToEdit, ...this.zonasForm.value };

      this.zonaService.modificarzona(updatedZona).subscribe({
        next: () => {
          this.typeAddedMod.emit();
          this.cancel.emit();
        },
        error: err => console.log('Error al modificar Type:', err),
      });
    }
  }

  cancelar() {
    this.cancel.emit();
  }
}
