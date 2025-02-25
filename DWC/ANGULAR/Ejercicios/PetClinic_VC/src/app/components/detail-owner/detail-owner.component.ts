import { Component } from '@angular/core';
import { Owner } from '../../models/owner';
import { OwnerService } from '../../services/owner.service';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { PetListComponent } from "../pet-list/pet-list.component";

@Component({
  selector: 'app-detail-owner',
  imports: [RouterLink, PetListComponent],
  templateUrl: './detail-owner.component.html',
  styleUrl: './detail-owner.component.css'
})
export class DetailOwnerComponent {
  //Objeto Owner
  public owner: Owner = <Owner>{};

  constructor(
    private serviceOwner: OwnerService,
    private ruta: Router,
    private rutaActiva: ActivatedRoute
  ){}

  //Metodo que se ejecutara al iniciar el componente
  ngOnInit() {
    //Obtener el id del owner
    this.owner.id = this.rutaActiva.snapshot.params['idOwner'];
    //Obtener los datos del owner
    this.serviceOwner.obtenerOwnerPorId(this.owner.id).subscribe({
      next: (owner) => {
        this.owner = owner;
      },
      error: (err) => {
        console.log("Error al obtener Owner: ", err);
      }
    })
  }

  //OTROS METODOS
  eliminarOwner(id: number) {
    //Confirmacion
    if (confirm("Estas seguro d que quieres borrar el local con " + id + "?")) {
      this.serviceOwner.eliminarOwner(id).subscribe({
        next: res => {
          this.ruta.navigate(['/']);
        },
        error: err => {
          console.log("Error al eliminar Owner: ", err);
        }
      })
    }
  }
}
