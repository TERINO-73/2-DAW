import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { ReactiveFormsModule } from '@angular/forms';
import { FormBuilder,FormGroup,Validators } from '@angular/forms';
import { Sexo } from '../../modelos/sexo';
import { Estadocivil } from '../../modelos/estadocivil';
import { Alumno } from '../../modelos/alumno';
import { AlumnoService } from '../../servicios/alumno.service';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { SexoService } from '../../servicios/sexo.service';
import { EstadocivilService } from '../../servicios/estadocivil.service';
@Component({
  selector: 'app-alumno-form',
  imports: [ReactiveFormsModule,CommonModule,RouterLink],
  templateUrl: './alumno-form.component.html',
  styleUrl: './alumno-form.component.css'
})
export class AlumnoFormComponent {
  public form: FormGroup;
  public addMode: boolean = true;
  public Alum: Alumno = <Alumno>{};
  public estadosciviles: Estadocivil[] = [];

  public sexos: Sexo[] = [];

  constructor(
    private fb: FormBuilder,
    private serviceAlum: AlumnoService,
    private ruta: Router,
    private rutaActiva: ActivatedRoute,
    private serviceSexo:SexoService,
    private serviceEstado:EstadocivilService,
    ) {
    this.form = this.fb.group({
      id: this.fb.control(-1),
      nombre: this.fb.control('', [Validators.required]),
      apellidos: this.fb.control('', [Validators.required]),
      sexo: this.fb.control('', [Validators.required]),
      fecha_nacimiento: this.fb.control('', [Validators.required]),
      estado_civil: this.fb.control('', [Validators.required]), // ✅ Asegurarse de que type está incluido
    });
    
  }

  ngOnInit() {
    const idAlum = this.rutaActiva.snapshot.params['id'];
    
    this.serviceAlum.obtenerAlumPorId(idAlum).subscribe({
      next: (resA) => {
        console.log("alumno:",resA);
        this.Alum = resA;
        this.form.patchValue(resA);
      },
      error: (err) => console.log("Error al obtener Alumno: ", err)
    });

    this.serviceSexo.listaSexo().subscribe({
      next: (resA) => {
        console.log("sexos:",resA);
        
        this.sexos = resA;
      },
      error: (err) => console.log("Error al obtener Alumno: ", err)
    });
    this.serviceEstado.listaEstado().subscribe({
      next: (resA) => {
        console.log("estados:",resA);
        this.estadosciviles = resA;
      },
      error: (err) => console.log("Error al obtener Alumno: ", err)
    });


    if (idAlum != -1) {
      this.addMode = false;
    }
  }

  onSubmit() {
    if (this.form.valid) {
      this.Alum = { 
        ...this.Alum, 
        ...this.form.value, 
      };
  
      if (this.addMode) {
        this.insertarAlum();
      } else {
        this.modificarAlum();
      }
    }
  }
  

  insertarAlum() {
    this.serviceAlum.insertarAlum(this.Alum).subscribe({
      next: () => this.ruta.navigate(["alumnos-list"]),
      error: (err) => console.log("Error al insertar Pet: ", err)
    });
  }

  modificarAlum() {
    this.serviceAlum.modificarAlum(this.Alum).subscribe({
      next: () => this.ruta.navigate(["alumnos-list"]),
      error: (err) => console.log("Error al modificar Pet: ", err)
    });
  }
}
