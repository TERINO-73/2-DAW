import { Component } from '@angular/core';
import { VetService } from '../../services/vet.service';
import { Vet } from '../../models/vet';
import { Router, RouterLink } from '@angular/router';

@Component({
  selector: 'app-vets',
  standalone:true,
  imports: [RouterLink],
  templateUrl: './vets.component.html',
  styleUrl: './vets.component.css'
})
export class VetsComponent {
  // Lista de veterinarios
  public listVets: Vet[] = [];

  constructor(
    private serviceVet: VetService,
  ) { }

  // Metodo que se ejecutara al iniciar el componente
  ngOnInit() {
    // Listar veterinarios al comienzo
    this.serviceVet.listarVets().subscribe({
      next: res => {
        this.listVets = res;
        console.log(res);
      },
      error: err => {
        console.log("Error al listar Vets: ", err);
      }
    })
  }

  eliminarVet(id: number) {
    if (confirm("Are you sure you want to delete this vet with id " + id + "?")) {
        this.serviceVet.eliminarVet(id).subscribe({
            next: res => {
                this.serviceVet.listarVets().subscribe({
                    next: res => {
                        this.listVets = res;
                        console.log(res);
                    },
                    error: err => {
                        console.log("Error al listar Vets: ", err);
                    }
                })
            },
            error: err => {
                console.log("Error al eliminar Vet: ", err);
            }
        });
    }
}

}
