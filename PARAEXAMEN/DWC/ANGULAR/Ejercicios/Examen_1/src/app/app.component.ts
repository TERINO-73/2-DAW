import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { CurrencyPipe,DecimalPipe } from '@angular/common';
@Component({
  selector: 'app-root',
  imports: [RouterOutlet,CurrencyPipe,DecimalPipe],
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss'
})
export class AppComponent {
  title = 'Examen_1';
  num1:number = 67.45;


  
}
