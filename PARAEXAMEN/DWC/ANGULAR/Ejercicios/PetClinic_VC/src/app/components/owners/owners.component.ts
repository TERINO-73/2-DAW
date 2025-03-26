import { Component } from '@angular/core';
import { Owner } from '../../models/owner';
import { OwnerService } from '../../services/owner.service';
import { RouterLink } from '@angular/router';
import { CurrencyPipe } from '@angular/common';


@Component({
  selector: 'app-owners',
  standalone:true,
  imports: [RouterLink,CurrencyPipe],
  templateUrl: './owners.component.html',
  styleUrl: './owners.component.css'
})
export class OwnersComponent {

  // Lista de owners
  public listOwners: Owner[] = [];

  constructor
    (
      private serviceOwner: OwnerService,
    ) {}

    ngOnInit(){
      // Listar Owners al comienzo
      this.serviceOwner.listarOwners().subscribe({
        next: res => {
          this.listOwners = res;
        },
        error: err => {
          console.log("Error al listar Owners: ", err);
        }
      })
    }

    eliminarOwner(id: number) {
      //Confirmacion
      if (confirm("Are you sure you want to delete this owner with id " + id + "?")) {
        this.serviceOwner.eliminarOwner(id).subscribe({
          next: res => {
            this.listOwners = res;
          },
          error: err => {
            console.log("Error al eliminar Owner: ", err);
          }
        })
      }
    }
}
