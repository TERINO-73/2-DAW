import { Component } from '@angular/core';
import { PAjaxService } from '../../servicios/p-ajax.service';
import { Router, ActivatedRoute, RouterLink } from '@angular/router';
import { Persona } from '../../modelos/persona';
import { CommonModule } from '@angular/common';
import{FormsModule} from '@angular/forms';
@Component({
  selector: 'app-form-persona',
  imports:[CommonModule,FormsModule,RouterLink],

  templateUrl: './form-persona.component.html',
  styleUrl: './form-persona.component.css'
})
export class FormPersonaComponent {
  public persona: Persona = <Persona>{};
  public textoBoton: string;


  constructor(private peticion: PAjaxService, private ruta: Router, private route: ActivatedRoute) {


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
          this.persona = res;

       },
       error:error=>console.log("Error",error)
       

        });

    }
  }
  iraLista() {
    this.ruta.navigate(['/']);

  }


  onSubmit(persona: Persona) {
    const personaId = this.route.snapshot.params["id"];

    if(personaId == -1){
    this.peticion.anadir(persona).subscribe(
      res => {
        this.ruta.navigate(['/']);

      })
    }else{

      this.peticion.modificar(this.persona).subscribe(
        res => {
          this.ruta.navigate(['/']);
  
        })
    }

  }
}


