import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { OwnersComponent } from './components/owners/owners.component';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet,OwnersComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss'
})
export class AppComponent {
  title = 'bootcamp-angular';

  public msgEventSearch: string = '';
   constructor(){}

   searchChanged(event: any) {
    this.msgEventSearch = event.query + '=> ' + event.resultado
   }
}
