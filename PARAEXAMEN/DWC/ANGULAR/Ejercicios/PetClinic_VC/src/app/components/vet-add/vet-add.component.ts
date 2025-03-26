import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Vet } from '../../models/vet';
import { Specialty } from '../../models/specialty';
import { VetService } from '../../services/vet.service';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { MultiSelectModule } from 'primeng/multiselect';

@Component({
  selector: 'app-vet-add',
  standalone:true,
  imports: [FormsModule, RouterLink, MultiSelectModule],
  templateUrl: './vet-add.component.html',
  styleUrl: './vet-add.component.css'
})
export class VetAddComponent {
  // Variable para saber si es inserción o edicion
  public addMode: boolean = true;

  //objeto veterinario
  public vet: Vet = <Vet>{};

  //Array de especialidades
  public specialties: Specialty[] = [];

  //Array de especialidades seleccionadas
  public idSelectedSpecialties: number[] = [];

  constructor(
    private vetService: VetService,
    private ruta: Router,
    private rutaActiva: ActivatedRoute
  ) { }


  // Metodo que se ejecutara al iniciar el componente
  ngOnInit() {
    const vetId = this.rutaActiva.snapshot.params['idVet'];

    this.vetService.listarSpecialties().subscribe({
      next: (specialties) => {
        this.specialties = specialties;
      },
      error: (err) => {
        console.log("Error al obtener Specialties: ", err);
      }
    });

    if (vetId != -1) {
      this.addMode = false;
      this.vetService.obtenerVetPorId(vetId).subscribe({
        next: (vet) => {
          this.vet = vet;
          //Recorrer array de especialidades para obtener array con sus id.
          //Array de id seleccionados
          this.idSelectedSpecialties = vet.specialties.map(s => s.id);
        },
        error: (err) => {
          console.log("Error al obtener Vet: ", err);
        }
      });
    } else {
      this.addMode = true;
    }
  }


  //Metodo que se ejecutara al enviar el formulario
  onSubmit(form: Vet) {
    //Filtra las especialidades seleccionadas para asociarlas al veterinario.
    this.vet.specialties = this.specialties.filter(s => this.idSelectedSpecialties.includes(s.id));

    if (this.addMode) {
      this.insertarVet();
    } else {
      this.modificarVet();
    }
  }

  insertarVet() {
    this.vetService.insertarVet(this.vet).subscribe({
      next: () => {
        this.ruta.navigate(['/vetList']);
      },
      error: (err) => {
        console.log("Error al insertar Vet: ", err);
      }
    });
  }

  modificarVet() {
    this.vetService.modificarVet(this.vet).subscribe({
      next: () => {
        this.ruta.navigate(['/vetList']);
      },
      error: (err) => {
        console.log("Error al modificar Vet: ", err);
      }
    });
  }
}
