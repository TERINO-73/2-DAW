import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { trigger, state, style, transition, animate } from '@angular/animations';

@Component({
  selector: 'app-horario',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './horario.component.html',
  styleUrls: ['./horario.component.css'],
  animations: [
    trigger('fadeIn', [
      state('void', style({ opacity: 0 })),
      transition(':enter', [
        animate('500ms ease-in', style({ opacity: 1 }))
      ])
    ])
  ]
})
export class HorarioComponent {
  isVisible = true;
  diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
  horario = [
    { dia: 'Lunes', hora: '08:00 - 09:00', clase: 'Yoga' },
    { dia: 'Lunes', hora: '18:00 - 19:00', clase: 'Spinning' },
    { dia: 'Martes', hora: '09:00 - 10:00', clase: 'Pilates' },
    { dia: 'Miércoles', hora: '17:00 - 18:00', clase: 'Boxeo' },
    { dia: 'Jueves', hora: '10:00 - 11:00', clase: 'Crossfit' },
    { dia: 'Viernes', hora: '19:00 - 20:00', clase: 'Zumba' },
    { dia: 'Sábado', hora: '11:00 - 12:00', clase: 'Calistenia' },
    { dia: 'Domingo', hora: '09:00 - 10:00', clase: 'Meditación' }
  ];
}