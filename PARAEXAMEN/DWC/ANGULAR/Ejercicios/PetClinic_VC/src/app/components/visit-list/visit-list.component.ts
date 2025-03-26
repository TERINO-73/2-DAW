import { Component, Input } from '@angular/core';
import { RouterLink } from '@angular/router';
import { VisitService } from '../../services/visit.service';
import { Visit } from '../../models/visit';

@Component({
  selector: 'app-visit-list',
  standalone:true,
  imports: [RouterLink],
  templateUrl: './visit-list.component.html',
  styleUrl: './visit-list.component.css'
})
export class VisitListComponent {

  //Propiedad para almacenar el id de la mascota que se pasa desde pet-list
  @Input() petId: number = -1;

  //Propiedades para la lista de visitas
  public visitList: Visit[] = [];

  constructor(
    private visitService: VisitService
  ) { }

  // Metodo que se ejecutara al iniciar el componente
  ngOnInit() {
    if (this.petId != -1 && this.petId != undefined) {
      this.listarVisits();
    } else {
      console.log("No se ha recibido un ID de mascota válido.");
    }
  }

  listarVisits() {
    //Obtener las visitas de las mascotas
    this.visitService.obtenerVisitsPorPetId(this.petId).subscribe({
      next: (visits) => {
        this.visitList = visits;
      },
      error: (err) => {
        console.log("Error al obtener Visits: ", err);
      }
    })
  }

  eliminarVisit(visitId: number) {
    //Confirmacion
    if (confirm("Are you sure you want to delete this visit with id " + visitId + "?")) {
      this.visitService.eliminarVisit(visitId).subscribe({
        next: () => {
          this.listarVisits();
        },
        error: (err) => {
          console.log("Error al eliminar Visit: ", err);
        }
      })
    }
  }
}
