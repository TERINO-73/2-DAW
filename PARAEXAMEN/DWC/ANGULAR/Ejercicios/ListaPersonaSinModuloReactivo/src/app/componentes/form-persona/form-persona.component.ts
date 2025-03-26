import { Component } from '@angular/core';
import { PAjaxService } from '../../servicios/p-ajax.service';
import { Router, ActivatedRoute, RouterLink } from '@angular/router';
import { Persona } from '../../modelos/persona';
import {ReactiveFormsModule,FormGroup, FormBuilder, Validators} from '@angular/forms'
import { CommonModule } from '@angular/common';
@Component({
  selector: 'app-form-persona',
  standalone:true,
  imports:[RouterLink,ReactiveFormsModule,CommonModule],
  templateUrl: './form-persona.component.html',
  styleUrl: './form-persona.component.css'
})
export class FormPersonaComponent {
  public persona: Persona = <Persona>{};
  public textoBoton: string;
  public form :FormGroup;

  constructor(private peticion: PAjaxService, private ruta: Router, private route: ActivatedRoute,private fb:FormBuilder) {

    this.form = this.fb.group({
//Declaramos los diferentes campos del formulario
        id: this.fb.control(-1),
      dni: this.fb.control('',[Validators.required,Validators.minLength(9)]),
      nombre: this.fb.control('',[Validators.required,Validators.minLength(1)]),
      apellidos:this.fb.control('',[Validators.required,Validators.minLength(1)]),
    });
    this.textoBoton = "AÑADIR";

  }

  ngOnInit() {
    const personaId = this.route.snapshot.params["id"];
    console.log("Id", personaId);

    if (personaId == -1) {
      this.textoBoton = "AÑADIR";

    } else {
      this.textoBoton = "MODIFICAR"

      this.peticion.selPersona(personaId).subscribe({  
        next: res =>{
          console.log("res",res);
          this.form.patchValue(res);

       },
       error:error=>console.log("Error",error)
       

        });

    }
  }
  iraLista() {
    this.ruta.navigate(['/']);

  }


  onSubmit() {
    const personaId = this.route.snapshot.params["id"];

    if(personaId == -1){
    this.peticion.anadir(this.form.value).subscribe(
      res => {
        this.ruta.navigate(['/']);

      })
    }else{

      this.peticion.modificar(this.form.value).subscribe(
        res => {
          this.ruta.navigate(['/']);
  
        })
    }

  }
}


