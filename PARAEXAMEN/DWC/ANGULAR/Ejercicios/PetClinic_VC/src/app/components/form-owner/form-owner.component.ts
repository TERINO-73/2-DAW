import { Component } from '@angular/core';
import { Owner } from '../../models/owner';
import { OwnerService } from '../../services/owner.service';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';

@Component({
  selector: 'app-form-owner',
  standalone: true,
  imports: [ReactiveFormsModule,RouterLink,CommonModule],
  templateUrl: './form-owner.component.html',
  styleUrl: './form-owner.component.css'
})
export class FormOwnerComponent {
  //Objeto owner tanto para añadir como para editar
  public owner: Owner = <Owner>{};
  public form:FormGroup;
  //Texto para el título y el botón
  public texto: string = 'Add Owner';


  constructor(
    private serviceOwner: OwnerService,
    private ruta: Router,
    private rutaActiva: ActivatedRoute,
    private fb:FormBuilder,
  ) {
    this.form = this.fb.group({
      //Declaramos los diferentes campos del formulario
              id: this.fb.control(-1),
            firstName: this.fb.control('',[Validators.required]),
            lastName: this.fb.control('',[Validators.required,]),
            address:this.fb.control('',[Validators.required]),
            city:this.fb.control('',[Validators.required]),
            telephone:this.fb.control('',[Validators.required,Validators.minLength(9)]),

          });
  }

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
        this.form.patchValue(owner);
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
      this.serviceOwner.insertarOwner(this.form.value).subscribe({
        next: (owner) => {
          this.owner = owner;
          this.ruta.navigate(['/']);
        },
        error: (err) => {
          console.log("Error al insertar Owner: ", err);
        }
      })
    } else { //Si el id no es -1, es un owner existente
      this.serviceOwner.modificarOwner(this.form.value).subscribe({
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
