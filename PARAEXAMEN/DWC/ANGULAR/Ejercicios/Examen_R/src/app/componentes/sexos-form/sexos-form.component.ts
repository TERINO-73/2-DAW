import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { Sexo } from '../../modelos/sexo';
import { SexoService } from '../../servicios/sexo.service';

@Component({
  selector: 'app-sexos-form',
  imports: [RouterLink,ReactiveFormsModule,CommonModule],
  templateUrl: './sexos-form.component.html',
  styleUrl: './sexos-form.component.css'
})
export class SexosFormComponent {
public form: FormGroup;
  public addMode: boolean = true;
  public sexo: Sexo = <Sexo>{};



  constructor(
    private fb: FormBuilder,
    private serviceAlum: SexoService,
    private ruta: Router,
    private rutaActiva: ActivatedRoute,
    private serviceSexo:SexoService,

    ) {
    this.form = this.fb.group({
      codigo: this.fb.control('', [Validators.required]),
      nombre: this.fb.control('', [Validators.required]),

    });
    
  }

  ngOnInit() {
    const codigo = this.rutaActiva.snapshot.params['codigo'];
    const nombre = this.rutaActiva.snapshot.params['nombre']
    

        this.form.patchValue(codigo,nombre);

   



    if (codigo != "-1") {
      this.addMode = false;
    }
  }

  onSubmit() {

  
      if (this.addMode) {
        this.insertarSexo();
      } else {
        this.modificarSexo();
      }
    }
  
  

  insertarSexo() {
    this.serviceAlum.insertarSexo(this.form.value).subscribe({
      next: () => this.ruta.navigate(["alumnos-list"]),
      error: (err) => console.log("Error al insertar Pet: ", err)
    });
  }

  modificarSexo() {
    this.serviceAlum.modificarSexo(this.sexo).subscribe({
      next: () => this.ruta.navigate(["alumnos-list"]),
      error: (err) => console.log("Error al modificar Pet: ", err)
    });
  }
}
