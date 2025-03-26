import { Component, EventEmitter, Input, Output } from '@angular/core';
import { AlumnoService } from '../../servicios/alumno.service';
import { Alumno } from '../../modelos/alumno';
import { empty } from 'rxjs';
@Component({
  selector: 'app-alumno-del',
  imports: [],
  templateUrl: './alumno-del.component.html',
  styleUrl: './alumno-del.component.css'
})
export class AlumnoDelComponent {
  @Input() alumnoViene:Alumno | null = null ;

  @Output() cancel = new EventEmitter<void>(); // Evento para cancelar
  @Output() alumno = new EventEmitter<Alumno[]>(); // Evento cuando se añade o edita un tipo
  idAlumno:number | undefined = this.alumnoViene?.id;
  constructor(
    private alumService: AlumnoService,

  ) {
    // Crear el formulario reactivo con validaciones
  }

  
    // eliminarAlum() {
    //   //Confirmacion
    //   if (confirm("Desea eliminar a  " + this.alumnoViene?.nombre + " "+this.alumnoViene?.apellidos +"?")) {
    //     this.alumService.eliminarAlum(this.idAlumno).subscribe({
    //       next: res => {
    //         this.alumno.emit(res);
    //         this.cancel.emit();
    //       },
    //       error: err => {
    //         console.log("Error al eliminar Owner: ", err);
    //       }
    //     })
    //   }
    // }
}
