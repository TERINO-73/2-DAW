import { Component } from '@angular/core';
import { Local } from '../../../models/local';
import { LocalesService } from '../../../services/locales.service';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-locales-form',
  imports: [CommonModule, RouterLink, FormsModule],
  templateUrl: './locales-form.component.html',
  styleUrl: './locales-form.component.css'
})
export class FormLocalComponent {
  //Objeto Local tanto para añadir como para editar
  public local: Local = <Local>{};

  //Texto para el título y el botón
  public texto: string = 'Add Local';


  constructor(
    private serviceLocal: LocalesService,
    private ruta: Router,
    private rutaActiva: ActivatedRoute,
  ) {}

  //Metodo que se ejecutara al iniciar el componente
  ngOnInit() {
    //Obtener el id del Local
    const localId = this.rutaActiva.snapshot.params['id'];

    //Si el id es -1, es un nuevo Local
    if (localId != -1) {
      this.texto = 'Edit Local'; //Cambiar el texto

      //Si el id no es -1, es un Local existente
      this.obtenerLocalPorId(localId);
    }
  }

  //Metodo que se ejecutara al enviar el formulario
  onSubmit(form: Local) { }


  //OTROS METODOS
  obtenerLocalPorId(id: number) {
    this.serviceLocal.obtenerLocalPorId(id).subscribe({
      next: (Local) => {
        this.local = Local;
      },
      error: (err) => {
        console.log("Error al obtener Local: ", err);
      }
    })
  }

  anadirYeditarLocal() {
    //Obtener el id del Local
    this.local.id = this.rutaActiva.snapshot.params['id'];

    //Si el id es -1, es un nuevo Local
    if (this.local.id == -1) {
      console.log(this.local);
      this.serviceLocal.insertarLocal(this.local).subscribe({
        next: (Local) => {
          this.local = Local;
          this.ruta.navigate(['/']);
        },
        error: (err) => {
          console.log("Error al insertar Local: ", err);
        }
      })
    } else { //Si el id no es -1, es un Local existente
      this.serviceLocal.modificarLocal(this.local).subscribe({
        next: (Local) => {
          this.local = Local;
          this.ruta.navigate(['/']);
        },
        error: (err) => {
          console.log("Error al modificar Local: ", err);
        }
      })
    }
  }
}
