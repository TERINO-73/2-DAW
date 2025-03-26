import { Component } from '@angular/core';
import { Local } from '../../../models/local';
import { LocalesService } from '../../../services/locales.service';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-locales-list',
  imports: [RouterLink],
  templateUrl: './locales-list.component.html',
  styleUrl: './locales-list.component.css'
})
export class LocalesListComponent {

  // Lista de owners
  public listLocales: Local[] = [];

  constructor
    (
      private serviceLocal: LocalesService,
    ) {}

    ngOnInit(){
      // Listar Owners al comienzo
      this.serviceLocal.listarLocales().subscribe({
        next: res => {
          this.listLocales = res;
        },
        error: err => {
          console.log("Error al listar Owners: ", err);
        }
      })
    }


}
