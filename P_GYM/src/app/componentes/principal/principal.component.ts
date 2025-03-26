import { Component, AfterViewInit } from '@angular/core';
import { HorarioComponent } from '../horario/horario.component';
import { CommonModule } from '@angular/common';
import { TarifasComponent } from '../tarifas/tarifas.component';
import * as bootstrap from 'bootstrap';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-principal',
  imports: [CommonModule, HorarioComponent, TarifasComponent, RouterLink],
  templateUrl: './principal.component.html',
  styleUrls: ['./principal.component.css']
})
export class PrincipalComponent implements AfterViewInit {

  // Variable para controlar la visibilidad de las tarifas
  showTarifas = false;

  ngAfterViewInit(): void {
    const myCarouselElement = document.querySelector('#carouselExampleIndicators');
    if (myCarouselElement) {
      const carousel = new bootstrap.Carousel(myCarouselElement, {
        interval: 2000,
        touch: true
      });
    }
  }

  // Función para alternar la visibilidad de las tarifas
  toggleTarifas(): void {
    this.showTarifas = !this.showTarifas;
  }
}
