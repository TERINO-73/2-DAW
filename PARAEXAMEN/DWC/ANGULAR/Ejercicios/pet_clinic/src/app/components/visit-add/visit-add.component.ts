import { Component } from '@angular/core';
import { OwnerService } from '../../services/owner.service';
import { Visit } from '../../models/visit';
import { Router, ActivatedRoute, RouterLink } from '@angular/router';
import { CommonModule } from '@angular/common';
import{FormsModule} from '@angular/forms';
import {ReactiveFormsModule,FormGroup, FormBuilder, Validators} from '@angular/forms'


@Component({
  selector: 'app-visit-add',
  imports: [CommonModule,FormsModule,RouterLink,ReactiveFormsModule],
  templateUrl: './visit-add.component.html',
  styleUrl: './visit-add.component.css'
})
export class visitAddComponent {
  public visit: Visit = <Visit>{};
  public textoBoton: string;
  form: FormGroup;
  

  constructor(private peticion: OwnerService, private ruta: Router, private route: ActivatedRoute,private fb:FormBuilder) {

    this.textoBoton = "AÑADIR";

    this.form = this.fb.group({
            id: this.fb.control(-1),
            visitDate: this.fb.control('',[Validators.required]),
            description: this.fb.control('',[Validators.required]),
            pet_id:this.fb.control('',[Validators.required]),
          });

  }
  ngOnInit() {
    const visitId = this.route.snapshot.params["id"];
    console.log("Id", visitId);
    if (visitId == -1) {
      this.textoBoton = "AÑADIR";

    } else {
      this.textoBoton = "MODIFICAR"

      this.peticion.selVisit(visitId).subscribe({  
        next: res =>this.form.patchValue(res),
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
    this.peticion.anadeVisit(this.form.value).subscribe({
      next:resp => {
        this.ruta.navigate(['/']);

      },
      error:error=>console.log("Error",error)
    });
    }else{

      this.peticion.editarVisit(this.form.value).subscribe(
        res => {
          this.ruta.navigate(['/']);
  
        })
    }

  }
}
