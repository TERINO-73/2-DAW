import { Component, EventEmitter, Input, input, Output } from '@angular/core';
import { Carta } from '../../../models/carta';
import { CartasService } from '../../../services/cartas.service';
import { RouterLink } from '@angular/router';
import { CurrencyPipe } from '@angular/common';
@Component({
  selector: 'app-cartas-list',
  imports: [RouterLink,CurrencyPipe],
  templateUrl: './cartas-list.component.html',
  styleUrl: './cartas-list.component.css'
})
export class CartasListComponent {
  @Input() ArrCartas: Carta[] =[];  
  @Input() IdCarta:number = -1;

  @Output() elimina = new EventEmitter<void>(); // Evento para cancelar
//Propiedad para almacenar el id de la mascota que se pasa desde pet-list
//Propiedades para la lista de visitas


constructor(
  private CartaService: CartasService
  
) { }

// Metodo que se ejecutara al iniciar el componente
ngOnInit() {

}



eliminarCarta(visitId: number) {
  
  if (confirm("Are you sure you want to delete this visit with id " + visitId + "?")) {
    this.CartaService.eliminarliniaCarta(visitId).subscribe({
      next: (Carta) => {
        this.elimina.emit();
      },
      error: (err) => {
        console.log("Error al eliminar Visit: ", err);
      }
    })
  }
}

listarCarta() {
  //Obtener las visitas de las mascotas
  this.CartaService.obtenerCartaPorId(this.IdCarta).subscribe({
    next: (Carta) => {
      this.ArrCartas = Carta;
    },
    error: (err) => {
      console.log("Error al obtener Visits: ", err);
    }
  })
}
}
