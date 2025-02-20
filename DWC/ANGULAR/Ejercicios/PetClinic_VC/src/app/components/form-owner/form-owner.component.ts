import { Component } from '@angular/core';
import { Owner } from '../../models/owner';
import { OwnerService } from '../../services/owner.service';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-form-owner',
  imports: [CommonModule, RouterLink, FormsModule],
  templateUrl: './form-owner.component.html',
  styleUrl: './form-owner.component.css'
})
export class FormOwnerComponent {
  //Objeto owner tanto para añadir como para editar
  public owner: Owner = <Owner>{};

  //Texto para el título y el botón
  public texto: string = 'Add Owner';


  constructor(
    private serviceOwner: OwnerService,
    private ruta: Router,
    private rutaActiva: ActivatedRoute,
  ) {}

  //Metodo que se ejecutara al iniciar el componente
  ngOnInit() {
    //Obtener el id del owner
    const ownerId = this.rutaActiva.snapshot.params['idOwner'];

    //Si el id es -1, es un nuevo owner
    if (ownerId != -1) {
      this.texto = 'Edit Owner'; //Cambiar el texto

      //Si el id no es -1, es un owner existente
      this.obtenerOwnerPorId(ownerId);
    }
  }

  //Metodo que se ejecutara al enviar el formulario
  onSubmit(form: Owner) { }


  //OTROS METODOS
  obtenerOwnerPorId(id: number) {
    this.serviceOwner.obtenerOwnerPorId(id).subscribe({
      next: (owner) => {
        this.owner = owner;
      },
      error: (err) => {
        console.log("Error al obtener Owner: ", err);
      }
    })
  }

  anadirYeditarOwner() {
    //Obtener el id del owner
    this.owner.id = this.rutaActiva.snapshot.params['idOwner'];

    //Si el id es -1, es un nuevo owner
    if (this.owner.id == -1) {
      console.log(this.owner);
      this.serviceOwner.insertarOwner(this.owner).subscribe({
        next: (owner) => {
          this.owner = owner;
          this.ruta.navigate(['/']);
        },
        error: (err) => {
          console.log("Error al insertar Owner: ", err);
        }
      })
    } else { //Si el id no es -1, es un owner existente
      this.serviceOwner.modificarOwner(this.owner).subscribe({
        next: (owner) => {
          this.owner = owner;
          this.ruta.navigate(['/']);
        },
        error: (err) => {
          console.log("Error al modificar Owner: ", err);
        }
      })
    }
  }
}
