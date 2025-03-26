import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { ListaClasesComponent } from './componentes/lista-clases/lista-clases.component';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, ListaClasesComponent,RouterLink],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'Gimnasio-Standalone';
}
