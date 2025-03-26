import { Component, EventEmitter, Input, Output } from '@angular/core';
import { Specialty } from '../../models/specialty';
import { VetService } from '../../services/vet.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-specialty-add',
  standalone:true,
  imports: [FormsModule],
  templateUrl: './specialty-add.component.html',
  styleUrl: './specialty-add.component.css'
})
export class SpecialtyAddComponent {
  @Input() addMode: boolean = true;
  @Input() specialtyToEdit: Specialty | null = null;

  @Output() cancel = new EventEmitter<void>();
  @Output() specialtyAdded = new EventEmitter<void>();

  public editableSpecialty: Specialty = <Specialty>{};

  public newSpecialty: Specialty = <Specialty>{};

  constructor(private vetService: VetService) { }


  ngOnInit() {
    if (this.specialtyToEdit) {
      this.editableSpecialty = { ...this.specialtyToEdit };
      this.newSpecialty = { ...this.specialtyToEdit };
    }
  }

  onSubmit(form: Specialty) {
    if (this.addMode) {
      this.vetService.insertarSpecialty(this.newSpecialty).subscribe({
        next: () => {
          this.specialtyAdded.emit();
          this.cancel.emit();
        },
        error: err => console.log("Error al insertar specialty: ", err)
      });
    } else {
      this.vetService.modificarSpecialty(this.editableSpecialty).subscribe({
        next: () => {
          this.specialtyAdded.emit();
          this.cancel.emit();
        },
        error: err => console.log("Error al modificar specialty: ", err)
      });
    }
  }

  cancelar() {
    this.cancel.emit();
  }
}
