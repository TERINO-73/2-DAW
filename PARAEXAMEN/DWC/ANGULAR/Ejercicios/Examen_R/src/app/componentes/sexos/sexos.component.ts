import { Component, numberAttribute } from '@angular/core';
import { Sexo } from '../../modelos/sexo';
import { RouterLink } from '@angular/router';
import { SexoService } from '../../servicios/sexo.service';

@Component({
  selector: 'app-sexos',
  imports: [RouterLink],
  templateUrl: './sexos.component.html',
  styleUrl: './sexos.component.css'
})
export class SexosComponent {

  // Lista de owners
  public listSexos: Sexo[] = [];

  constructor
    (
      private serviceSexo: SexoService,
    ) {}

    ngOnInit(){
      // Listar Owners al comienzo
      this.serviceSexo.listaSexo().subscribe({
        next: res => {
          this.listSexos = res;
        },
        error: err => {
          console.log("Error al listar Owners: ", err);
        }
      })
    }


     eliminarSexo(id:string,nombre:string) {
      //Confirmacion
       
      if (confirm("Desea eliminar el sexo  " + nombre + " ?")) {
        this.serviceSexo.eliminarSexo(id).subscribe({
          next: res => {
            this.listSexos= res;
          },
          error: err => {
            console.log("Error al eliminar Owner: ", err);
          }
        })
      }
    }

}
