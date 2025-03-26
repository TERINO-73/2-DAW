import { Component } from '@angular/core';
import { Alumno } from '../../modelos/alumno';
import { AlumnoService } from '../../servicios/alumno.service';
import { RouterLink } from '@angular/router';
import { DatePipe } from '@angular/common';
import { AlumnoDelComponent } from '../alumno-del/alumno-del.component';
@Component({
  selector: 'app-alumnos-listado',
  imports: [RouterLink,DatePipe,AlumnoDelComponent],
  templateUrl: './alumnos-listado.component.html',
  styleUrl: './alumnos-listado.component.css'
})
export class AlumnosListadoComponent {

  // Lista de owners
  public listAlumnos: Alumno[] = [];

  constructor
    (
      private serviceAlum: AlumnoService,
    ) {}

    ngOnInit(){
      // Listar Owners al comienzo
      this.serviceAlum.listarAlum().subscribe({
        next: res => {
          this.listAlumnos = res;
        },
        error: err => {
          console.log("Error al listar Owners: ", err);
        }
      })
    }

}
