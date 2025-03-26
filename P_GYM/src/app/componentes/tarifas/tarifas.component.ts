import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { trigger, state, style, transition, animate } from '@angular/animations';

@Component({
  selector: 'app-tarifas',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './tarifas.component.html',
  styleUrls: ['./tarifas.component.css'],
  animations: [
    trigger('fadeIn', [
      state('void', style({ opacity: 0 })),
      transition(':enter', [
        animate('500ms ease-in', style({ opacity: 1 }))
      ])
    ])
  ]
})
export class TarifasComponent {
  isVisible = true;
  tarifas = [
    { nombre: 'Mensual', precio: '30€', descripcion: 'Acceso ilimitado durante un mes.' },
    { nombre: 'Trimestral', precio: '80€', descripcion: 'Acceso ilimitado durante tres meses.' },
    { nombre: 'Anual', precio: '300€', descripcion: 'Acceso ilimitado durante un año.' },
    { nombre: 'Clase Individual', precio: '10€', descripcion: 'Acceso a una clase individual.' }
  ];
}