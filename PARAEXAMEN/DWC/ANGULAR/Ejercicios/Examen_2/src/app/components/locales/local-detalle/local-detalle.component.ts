import { Component } from '@angular/core';
import { LocalesService } from '../../../services/locales.service';
import { Local } from '../../../models/local';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { CartasListComponent } from '../../cartas/cartas-list/cartas-list.component';
import { Carta } from '../../../models/carta';

@Component({
  selector: 'app-local-detalle',
  imports: [CartasListComponent,RouterLink],
  templateUrl: './local-detalle.component.html',
  styleUrl: './local-detalle.component.css'
})
export class LocalDetalleComponent {
//Objeto local
public local: Local = <Local>{};
errorMessage: string = '';

constructor(
  private servicelocal: LocalesService,
  private ruta: Router,
  private rutaActiva: ActivatedRoute,
  
){}

//Metodo que se ejecutara al iniciar el componente
ngOnInit() {
  //Obtener el id del local
  this.local.id = this.rutaActiva.snapshot.params['id'];
  //Obtener los datos del local
  console.log("ID:",this.local.id);
  this.servicelocal.obtenerLocalPorId(this.local.id).subscribe({
    next: (local) => {
      this.local = local;
    },
    error: (err) => {
      console.log("Error al obtener Local: ", err);
    }
  })
  this.ObtenerCartaPorId(this.local.id);

}

//OTROS METODOS
eliminarLocal(id: number,name:string) {
  //Confirmacion
  if (confirm("Estas seguro de que quieres borrar el local " + name + "?")) {
    this.servicelocal.eliminarLocal(id).subscribe({
      next: res => {
        this.ruta.navigate(['/']);
      },
      error: err => {
        alert(this.errorMessage);

      }
    })
  }
}

ObtenerCartaPorId(id:number){
  this.servicelocal.obtenerCartaPorId(id).subscribe({
  next:(carta)=>{
  
    this.local.carta = carta;
  },
  error:(err) =>{
      console.log("Error al obtener Carta: ", err);
  }

})

}
}

