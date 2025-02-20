import { Component } from '@angular/core';
import { Specialty } from '../../models/specialty';
import { VetService } from '../../services/vet.service';
import { SpecialtyAddComponent } from '../specialty-add/specialty-add.component';

@Component({
  selector: 'app-specialty-list',
  imports: [SpecialtyAddComponent],
  templateUrl: './specialty-list.component.html',
  styleUrl: './specialty-list.component.css'
})
export class SpecialtyListComponent {

  public specialties: Specialty[] = [];

  showForm: boolean = false;
  addMode: boolean = true;

  specialtyToEdit: Specialty | null = null;


  constructor(private vetService: VetService) { }

  ngOnInit() {
    this.vetService.listarSpecialties().subscribe({
      next: (specialties) => {
        this.specialties = specialties;
      },
      error: (err) => {
        console.log("Error al obtener specialties: ", err);
      }
    });
  }

  eliminarSpecialty(id: number) {
    if (confirm("Are you sure you want to delete this specialty with id " + id + "?")) {
      this.vetService.eliminarSpecialty(id).subscribe({
        next: () => this.ngOnInit(),
        error: (err) => console.log("Error al eliminar specialty: ", err)
      });
    }
  }

  addNewSpecialty() {
    this.showForm = true;
    this.addMode = true;
    this.specialtyToEdit = null;
  }

  editSpecialty(specialty: Specialty) {
    this.showForm = true;
    this.addMode = false;
    this.specialtyToEdit = {... specialty};
  }
}
