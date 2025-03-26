import { Component } from '@angular/core';
import { ZonasFormComponent } from "../zonas-form/zonas-form.component";
import { Zona } from '../../../models/zona';
import { ZonasService } from '../../../services/zonas.service';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
@Component({
  selector: 'app-zonas-list',
  imports: [ZonasFormComponent,RouterLink],
  templateUrl: './zonas-list.component.html',
  styleUrl: './zonas-list.component.css'
})
export class ZonasListComponent {
 //array de tipos
 zonas: Zona[] = [];
 showForm: boolean = false;
 addMode: boolean = true;  // Controla si es para añadir o editar
 idL:number =-1;
 typeToEdit: Zona | null = null;  // Almacena el tipo que se está editando

 constructor(
   private ZonaService: ZonasService,

  private ruta: Router,
  private rutaActiva: ActivatedRoute,
 ) { }

 // Metodo que se ejecutara al iniciar el componente
 ngOnInit() {
  this.idL = this.rutaActiva.snapshot.params['id'];
   this.ZonaService.obtenerzonas().subscribe({
     next: (zonas) => {
       this.zonas = zonas;
     },
     error: (err) => {
       console.log("Error al obtener Types: ", err);
     }
   })
 }


 eliminarZona(id: number) {
   //Confirmacion
   if (confirm("Are you sure you want to delete this type with id " + id + "?")) {
     this.ZonaService.eliminarzona(id).subscribe({
       next: () => {
         this.ngOnInit();
       },
       error: (err) => {
         console.log("Error al eliminar Type: ", err);
       }
     })
   }
 }

 addNewZona() {
   this.showForm = true;
   this.addMode = true;  // Modo añadir
   this.typeToEdit = null;  // No hay tipo para editar
 }

 editZona(type: Zona) {
   this.showForm = true;
   this.addMode = false;  // Modo editar
   this.typeToEdit = {...type};  // Se pasa el tipo a editar
 }


 modificarZona() {
   
 }
}
